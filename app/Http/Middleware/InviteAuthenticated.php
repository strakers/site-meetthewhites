<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Invite;
use App\Page;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

class InviteAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        #return redirect()->to('/home');
        $guest = Session::get("guest");
        $page = Page::where('slug','guest')->first();
        #return response()->json($guest);

        if( $guest ){
            $authRequest = new Request([
                'guest' => $guest,
                'page' => $page
            ]);
            #Auth::login($guest);
            #return response()->json($authRequest->all());
            #return redirect()->to('/guest');
            return $next($authRequest);
        }

        $e = new MessageBag([
            'code' => 'Please enter the passcode from your invitation.'
        ]);
        #return response()->json($request->all());
        #return $next($request);
        return redirect()->to('/')->withErrors($e);
    }
}
