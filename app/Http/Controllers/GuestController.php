<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
#use Illuminate\Support\Facades\Auth;
use App\InviteGuest;
use App\InviteGuestMetafield;
use App\Metafield;
use App\Invite;
use App\Page;
use App\Songlist;
use App\ContentBox;
use App\Comment;
use App\GramEater;
use ImageKit\ImageKit;

class GuestController extends Controller
{

    private static $media_excludes = [
        '1621480997718929021',
        '1624589154484517283',
        '1622518599807705088',
        '1621770707740587391',
        '1621872663034915218',
        '1622522767318688537',
        '1622780102549116136',
        '1621845344969126321',
        '1623257607567526738',
        '1622499178066301520',
        '1622847606709332493',
        '1621449343231842783',
        '1564105035829470634',
        '1605636641677123990',
        '1524828989377891083',
        '1521740661391737083',
        '1550169481576579979',
        '1519927996215218933',
        '1522514275104757724',
        '1549559838693317161',
        '1565028793352003951',
        '1565210849633799542',
        '1585883865078209300',
        '1565028005250842314',
        '1524877374406141319'
    ];

    public function welcome(){
        $page = Page::where('slug','guest')->first();
        return view("guest.entry",[
            'page' => $page,
        ]);
    }

    public function story(){
        $page = Page::where('slug','story')->first();
        return view("guest.story",[
            'page' => $page,
        ]);
    }

    public function proposal(){
        $page = Page::where('slug','proposal')->first();
        return view("guest.proposal",[
            'page' => $page,
        ]);
    }

    public function recap(){
        $page = Page::where('slug','recap')->first();
        return view("guest.recap",[
            'page' => $page,
        ]);
    }

    public function rsvp(){
        $page = Page::where('slug','rsvp')->first();
        $meta = Metafield::all();
        $invite_id = session('guest')->id;
        $invite_guests = InviteGuest::where(['invite_id'=>$invite_id]);
        $guests = $invite_guests->get();
        $songs = $invite_guests->first()->invite->songs;

        return view("guest.rsvp",[
            'page' => $page,
            'guest' => session('guest'),
            'guests' => $guests,
            'metadata' => $meta,
            'songs' => $songs
        ]);
    }

    public function rsvpClosed(){
        $page = Page::where('slug','rsvp')->first();
        $meta = Metafield::all();
        $invite_id = session('guest')->id;
        $invite_guests = InviteGuest::where(['invite_id'=>$invite_id]);
        $guests = $invite_guests->get();
        $songs = $invite_guests->first()->invite->songs;

        return view("guest.rsvp-closed",[
            'page' => $page,
            'guest' => session('guest'),
            'guests' => $guests,
            'metadata' => $meta,
            'songs' => $songs
        ]);
    }

    public function venue(){
        $page = Page::where('slug','venue')->first();
        return view("guest.venue",[
            'page' => $page,
        ]);
    }

    public function gallery(){
        $page = Page::where('slug','gallery')->first();
        return view("guest.gallery",[
            'page' => $page,
        ]);
    }

    public function media(){
        $page = Page::where('slug','media')->first();

        return view("guest.media",[
            'page' => $page,
            'instagram' => null
        ]);
    }

    public function mediaInit(){

        $tag = 'meetthewhites2017';
        $excludes = self::$media_excludes;
        $eater = new GramEater();
        $eater->consume($tag);
        $eater->getMedia($excludes);
        $media = $eater->shuffle();

        return [ 'data' => $media ];
    }

    public function mediaGram( Request $request){

        $tag = 'meetthewhites2017';
        $excludes = self::$media_excludes;
        $eater = new GramEater();
        $eater->consume($tag);
        $eater->getMedia($excludes);

        if( $request->id && $request->cursor ){
            $results = $eater->getMoreWithId($excludes, $request->id, $request->cursor);
        }
        else {
            $results = $eater->getMore(12, $excludes);
        }

        return $results;
    }

    public function thanks(){
        $page = Page::where('slug','thanks')->first();
        return view("guest.thanks",[
            'page' => $page,
        ]);
    }

    public function crew(){
        $page = Page::where('slug','crew')->first();
        return view("guest.crew",[
            'page' => $page,
        ]);
    }

    public function vendors(){
        $page = Page::where('slug','vendors')->first();
        return view("guest.vendors",[
            'page' => $page,
        ]);
    }

    public function share(){
        $page = Page::whereNotNull('id')->where('slug','share')->first();
        $comments = Comment::whereNotNull('id')->orderBy('id','DESC')->get();
        return view("guest.share",[
            'page' => $page,
            'comments' => $comments
        ]);
    }

    public function logout(){
        session()->forget('guest');
        return redirect()->to('/');
    }

    public function events(){
        return view("guest.events",[
            'page' => 'events',
        ]);
    }

    public function event($event) {
        $template = "guest.events.{$event}";
        if(view()->exists($template)) {
            return view($template, [
                'page' => 'event',
            ]);
        }

        return ['event' => $event, 'template' => $template];
    }

    public function getimages(){
        $rootPath = 'https://ik.imagekit.io/strakez';
        //$joinPath = $rootPath . '/thewhites/kbaptism/';
        $joinPath = $rootPath . '/thewhites/360videos/';
        $imageKit = new ImageKit(
            config('imagekit.pubkey'),
            config('imagekit.privkey'),
            $joinPath
        );

        $collection = [];
        $listFiles = $imageKit->listFiles();

        //return [1,2,3];
        return json_encode($listFiles);
    }

    public function shareComments(Request $request){
        $rules = [
            'name' => 'required|min:2',
            'comment' => 'required|min:4',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        else {
            $comment = new Comment();
            $comment->name = $request->name;
            $comment->expression = $request->comment;
            $comment->save();
        }

        return redirect()->to('guest/share');
    }


    public function submitRSVP(Request $request){

        /*header('Content-type: text/plain');
        print_r($request->all()); exit;*/

        $rules = [
            'invite_id' => 'required|numeric|min:1',
            'guests' => 'required|array',
            'songs' => 'array',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
        else {

            $invite = Invite::find( $request->invite_id );
            // if invite cannot be found throw error

            foreach ($request->guests as $invite_guest_id => $response) {

                $rsvp = InviteGuest::find($invite_guest_id);
                // add clause if invite_guest cant be found

                /*header('Content-type: text/plain');
                print_r($rsvp); exit;*/

                if( !$rsvp->is_named && array_key_exists('name', $response) && $response['name']){
                    // ig named Guest, return error

                    $rsvp->name = $response['name'] ;
                }

                $rsvp->is_attending = array_key_exists('is_attending', $response) ? 1 : 0 ;
                $rsvp->has_responded = 1 ;
                if(!$rsvp->responded_at) $rsvp->responded_at = \Carbon\Carbon::now() ;

                if ($rsvp->save() && array_key_exists('meta', $response)) {


                    /*header('Content-type: text/plain');
                    print_r($response['meta']); exit;*/

                    foreach($response['meta'] as $meta_id => $meta_value) {
                        $rsvp->fields()->updateOrCreate(['invite_guest_id'=>$invite_guest_id,'metafield_id'=>$meta_id],['meta_value'=>$meta_value]);
                    }

                }
            }

            foreach ($request->songs as $type => $set) {
                foreach($set as $key => $data) {

                    if( $data['title'] && $data['artist'] ) {

                        if ($type == 'saved') {
                            $song = Songlist::find($key);
                        } else {
                            $song = Songlist::firstOrNew($data);
                        }

                        if ($song) {
                            $song->title = $data['title'];
                            $song->artist = $data['artist'];
                            if ($song->save()) {
                                $invite->songs()->syncWithoutDetaching([$song->id]);
                            }
                        }

                    }

                }
            }

            return redirect()->to('guest/rsvp');

        }
    }
}


