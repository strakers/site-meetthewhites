<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use App\Invite;
Use App\Metafield;
use Illuminate\Support\Facades\Session;

#use Symfony\Component\HttpFoundation\Request;

class InviteAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/guest';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
        return view('guest.login');
    }

    public function login(Request $request){

        $v = $this->validator($request->all());
        $guest = Invite::where('code', $request->code)->first();
        session()->put("guest", $guest);

        if($guest){
            Auth::guard('invite')->login($guest);
            $meta = Metafield::all();
            return view('guest.entry',[
                'guest' => $guest,
                'metadata' => $meta
            ]);
        }

        $errors = $v->errors();
        $errors->add('code','No match was found for the given code.');

        return redirect()->back()->withErrors($errors)->withMessage(['error'=>'The given code cannot be matched.']);
    }

    public function logout(){
        session()->forgot("guest");
        redirect()->to('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'code' => 'required|alpha_num'
        ]);
    }

    /*protected function guard()
    {
        return Auth::guard('auth');
    }*/
}
