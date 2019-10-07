<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Invite;
use App\InviteGuest;
use App\Metafield;
use App\MetafieldType;
use App\InviteGuestMetafield;
use App\Page;
use App\ContentBox;
use App\Songlist as Song;
use Keygen\Keygen;

class AdminController extends Controller
{
    //
    public function showLogin(){

        return View::make('admin-login');
    }

    public function doLogin(){

        $rules = [
            'email' => 'required|email',
            'password' => 'required|alpha|min:3',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::to('admin-login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else {
            $userdata = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];

            if( Auth::attempt($userdata) ){
                echo 'YAYYYYY';
            }
            else {
                return Redirect::to('admin-login');
            }
        }
    }

    public function doLogout(){
        Auth::logout();
        return Redirect::to('admin-login');
    }


    public function show(){

        $invites = Invite::get();
        $guests = InviteGuest::get();
        $responded = InviteGuest::responded()->get();
        return view('admin.dashboard', [
            'section_title' => 'Dashboard',
            'invites' => $invites,
            'inviteGuests' => $guests,
            'responded' => $responded
        ]);
    }

    /*
     * Invites ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    public function listInvites(){

        $invites = Invite::withTrashed()->get();

        return view('admin.invites',[
            'section_title' => 'View Invites',
            'invites' => $invites
        ]);
    }

    public function addInvites(){
        $groups = Group::withTrashed()->orderBy('deleted_at', 'asc')->get();
        return view('admin.invites-add',[
            'section_title' => 'Add Invite',
            'invite' => null,
            'groups' => $groups
        ]);
    }

    public function editInvites($invite){

        $invite = Invite::find($invite);
        $groups = Group::withTrashed()->orderBy('deleted_at', 'asc')->get();

        return view('admin.invites-add',[
            'section_title' => 'Edit Invite',
            'invite' => $invite,
            'groups' => $groups
        ]);
    }

    public function removeInvites($invite){

        $invite = Invite::find($invite);

        if($invite->delete()){
            return redirect()->back();
        }

        return redirect()->route('admin/meta')->withMessage();
    }

    public function restoreInvites($invite){

        $invite = Invite::withTrashed()->find($invite);
        if($invite) $invite->restore();

        return redirect()->to('admin/invites');
    }

    public function updateInvites( Request $request ){

        $rules = [
            'name' => 'required|string|min:3',
            'group' => 'required|integer',
            'address1' => 'string|min:3',
            'address2' => 'string',
            'email' => 'string',
            'guests' => 'array',
        ];

        $validator = Validator::make($request->all(), $rules);

        $guests = [
            'update' => [],
            'new' => [],
        ];

        if(!array_key_exists('existing',$request->guests) && !array_key_exists('new',$request->guests) && !$request->guests['existing'] && !$request->guests['new']){
            // cancel
        }

        if(array_key_exists('existing',$request->guests)){
            foreach($request->guests['existing'] as $id=>$guest){
                $guests['update'][$id] = [
                    ['id' => $id],
                    ['name' => $guest],
                ];
            }
        }

        if(array_key_exists('new',$request->guests)){
            foreach($request->guests['new'] as $guest){
                $guests['new'][] = [
                    'name' => $guest,
                ];
            }
        }

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        else {

            if( $request->id ){
                $invite = Invite::find($request->id);

                // set clause for when cannot find id

                $invite->group_id = $request->group;
                $invite->name = $request->name;
                $invite->address1 = $request->address1;
                $invite->address2 = $request->address2;
                $invite->email = $request->email;

                if($guests['update']) {
                    foreach($guests['update'] as $id=>$guestdata){

                        $invite->guests($id)->updateOrCreate($guestdata[0],$guestdata[1]);
                    }
                    $master_id_list = array_keys($guests['update']);
                    $invite->guests()->whereNotIn('id',$master_id_list)->delete();
                }
            }
            else {
                $invitedata = [
                    'group_id' => $request->group,
                    'name' => $request->name,
                    'address1' => $request->address1,
                    'address2' => $request->address2,
                    'email' => $request->email,
                    'code' => Invite::generateCode()
                ];
                $invite = new Invite($invitedata);
            }

            if ($invite->save()) {

                if($guests['new']) {
                    foreach($guests['new'] as $guestdata){
                        $invite->guests()->create($guestdata);
                    }
                }

                return redirect('admin/invites');
            }

            return redirect()->route('admin/invites')->withMessage();
        }

    }

    /*
     * RSVPs ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    public function listRSVPs(){

        $rsvps = InviteGuest::orderBy('is_attending','DESC')->orderBy('id','ASC')->get();
        $responded = InviteGuest::responded()->orderBy('is_attending','DESC')->orderBy('id','ASC')->get();
        $meta = Metafield::find(1);

        return view('admin.rsvps',[
            'section_title' => 'View RSVPs',
            'inviteGuests' => $rsvps,
            'responded' => $responded,
            'metadata' => $meta
        ]);
    }

    public function listNotResponded(){

        config(['app.debug' => true]);

        $not_responded = Invite::whereDoesntHave('guests', function( $query ){
            $query->where('has_responded','=',1);
        })->get();

        return view('admin.outstanding',[
            'section_title' => 'View Not Responded',
            'invites' => $not_responded
        ]);
    }

    public function updateRSVPs( Request $request ){

        $rules = [
            'name' => 'required|string|min:3',
            'is_attending' => 'required|numeric',
            'meta' => 'array'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        else {

            if( $request->id ){
                $invite = Invite::find($request->id);
                $invite->name = $request->name;
                $invite->address = $request->address;
                $invite->email = $request->email;
                $invite->total_invited = $request->total_invited;
            }
            else {
                $rsvpdata = [
                    'name' => $request->name,
                    'is_attending' => $request->address
                ];
                $rsvp = new InviteGuest($rsvpdata);

                if ($rsvp->save()) {
                    if($request->meta){
                        foreach($request->meta as $meta){
                            $rsvp_meta = RSVPMeta::updateOrCreate([
                                'rsvp_id' => $rsvp->id,
                                'meta_key' => $meta->key,
                                'meta_value' => $meta->val,
                            ]);
                            $rsvp_meta->save();
                        }
                    }

                    return redirect('admin/rsvps');
                }
            }

            if ($invite->save()) {
                return redirect('admin/invites');
            }

            return redirect()->route('admin/invites')->withMessage();
        }
    }

    /*
     * Meta ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    public function listSongs(){

        $songs = Song::withTrashed()->orderBy('artist')->orderBy('title')->get();

        return view('admin.songs',[
            'section_title' => 'View Songs',
            'songs' => $songs
        ]);
    }

    public function exportSongs(){
        $songs = Song::withTrashed()->orderBy('artist')->orderBy('title')->get();
        $headers = [ 'Artist(s)', 'Title' ];
        $list = [];

        $dt = (new \Datetime())->format('Ymd-His');

        #header("Content-type: text/plain; charset=utf-8");
        ini_set("default_charset", "UTF-8");
        header("Content-type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=wedding-songlist_{$dt}.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        $out = fopen('php://output', 'w');
        fputcsv($out, $headers);
        foreach( $songs as $song ){
            $set = json_decode(json_encode([ $song->artist, $song->title ]));
            $list[] = $set;
            fputcsv($out, $set);
        }
        fclose($out);
        #return $list;
    }

    /*
     * Meta ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    public function listMetas(){

        $meta = Metafield::withTrashed()->orderBy('deleted_at', 'asc')->get();
        $types = MetafieldType::withTrashed()->orderBy('deleted_at', 'asc')->get();

        return view('admin.meta',[
            'section_title' => 'View RSVP Meta Fields',
            'metadata' => $meta,
            'metatypes' => $types
        ]);
    }

    public function addMetas(){
        $types = MetafieldType::withTrashed()->orderBy('deleted_at', 'asc')->get();
        return view('admin.meta-add',[
            'section_title' => 'Add Meta Field',
            'metadata' => null,
            'metaTypes' => $types
        ]);
    }

    public function editMetas($meta){

        $meta = Metafield::find($meta);
        $types = MetafieldType::withTrashed()->orderBy('deleted_at', 'asc')->get();

        return view('admin.meta-add',[
            'section_title' => 'Edit Meta Fields',
            'metadata' => $meta,
            'metaTypes' => $types
        ]);
    }

    public function removeMetas($meta){

        $meta = Metafield::find($meta);

        if($meta->delete()){
            return redirect()->back();
        }

        return redirect()->route('admin/meta')->withMessage();
    }

    public function restoreMetas($meta){

        $meta = Metafield::withTrashed()->find($meta);
        if($meta) $meta->restore();

        return redirect()->to('admin/meta');
    }

    public function updateMetas( Request $request )
    {
        $rules = [
            'id' => 'integer',
            'name' => 'required|string|min:3',
            'type' => 'integer',
            'options' => 'string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        } else {

            $options = trim($request->options);
            if($options && $request->type > 1){
                if(strpos($options,"\n")!== false){
                    $options = array_map('trim',explode("\n",$options));
                }
            }

            // if edit
            if ($request->id) {

                $meta = Metafield::find($request->id);
                $meta->name = $request->name;
                $meta->slugify();
                $meta->metafield_type_id = $request->type;
                $meta->options = $options;
            }

            // if add
            else {

                $metadata = [
                    'name' => $request->name
                ];

                // check if exists but deleted
                $meta = Metafield::withTrashed()->where($metadata)->first();
                if( $meta ){
                    // then restore
                    $meta->restore();
                }

                // else create new
                else {
                    $metadata['metafield_type_id'] = $request->type;
                    $metadata['options'] = $options;
                    $meta = new Metafield($metadata);
                    $meta->slugify();
                }
            }

            if ($meta->save()) {
                return redirect('admin/meta');
            }

            return redirect()->route('admin/meta')->withMessage();
        }
    }

    public function showPages(){
        $pages = Page::all();
        return view('admin.pages',[
            'pages' => $pages,
        ]);
    }

    public function editPage( $page ){
        $section = Page::find( $page );
        if( $section ) {
            return view('admin.page-content', [
                'page' => $section,
            ]);
        }
        else {
            return redirect()->route('admin/pages')->withMessage('No such page exists.');
        }
    }

    public function updatePageAjax( Request $request ){

        // setup rules and attempt to validate
        $rules = [
            'id' => 'required|integer',
            'text' => 'required|string'
        ];
        $validator = Validator::make($request->all(), $rules);

        // return error if cannot validate
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        // locate box or fail
        $box = ContentBox::find( $request->id );
        if( $box ) {

            // prepare data for update
            $data = ['content'=> $request->text ];

            // update record and return success (if successful)
            if( $box->update( $data ) ) {
                return response()->json('Success!');
            }
        }

        // if box not found, return error
        else {
            return response()->json(['id'=>['Page with the given id could not be found.']],404);
        }

        //catch all other errors
        return response()->json(['all'=>['There was an error while attempting to save this record.']],500);
    }

}
