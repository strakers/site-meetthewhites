<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\StreamOutput;


Route::get('/', function () {
    return redirect('guest');
    #return view('welcome');
})->name('guest.login');

Auth::routes();

Route::get('/home', 'HomeController@index');

#Route::get('/guest', 'Auth\InviteAuthController@index');note
Route::post('/guest', 'Auth\InviteAuthController@login');

Route::group([ 'middleware' => 'auth' ], function($route){
    $route->get('admin', 'AdminController@show');
    $route->get('admin/invites', 'AdminController@listInvites');
    $route->get('admin/invites/new', 'AdminController@addInvites');
    $route->get('admin/invites/edit/{invite}', 'AdminController@editInvites');
    $route->get('admin/invites/remove/{invite}', 'AdminController@removeInvites');
    $route->get('admin/invites/restore/{invite}', 'AdminController@restoreInvites');
    $route->post('admin/invites', 'AdminController@updateInvites');
    $route->get('admin/rsvps', 'AdminController@listRSVPs');
    $route->get('admin/outstanding', 'AdminController@listNotResponded');
    $route->get('admin/meta', 'AdminController@listMetas');
    $route->get('admin/meta/new', 'AdminController@addMetas');
    $route->get('admin/meta/edit/{meta}', 'AdminController@editMetas');
    $route->get('admin/meta/restore/{meta}', 'AdminController@restoreMetas');
    $route->get('admin/meta/remove/{meta}', 'AdminController@removeMetas');
    $route->post('admin/meta', 'AdminController@updateMetas');
    $route->get('admin/pages', 'AdminController@showPages');
    $route->post('admin/pages/update', 'AdminController@updatePageAjax');
    $route->get('admin/pages/{page}', 'AdminController@editPage');
    $route->get('admin/songs', 'AdminController@listSongs');
    $route->get('admin/songs/export', 'AdminController@exportSongs')->name('song.export');
});

Route::get('guest', 'GuestController@welcome')->name('guest.login');
Route::get('guest/gallery', 'GuestController@gallery');
Route::get('guest/media', 'GuestController@media');
Route::get('guest/media/init', 'GuestController@mediaInit');
Route::get('guest/media/more', 'GuestController@mediaGram');
Route::get('guest/proposal', 'GuestController@proposal');
Route::get('guest/story', 'GuestController@story');
Route::get('guest/crew', 'GuestController@crew');
Route::get('guest/recap', 'GuestController@recap');
Route::get('guest/events', 'GuestController@events');
Route::get('guest/event/{event}', 'GuestController@event')->name('event');
Route::get('guest/imagekit', 'GuestController@getimages');
Route::get('guest/thanks', 'GuestController@thanks');
Route::get('guest/vendors', 'GuestController@vendors');
Route::get('guest/share', 'GuestController@share');
Route::post('guest/share/comments', 'GuestController@shareComments')->name('share.comments');
Route::get('guest/share/media', 'GuestController@shareMedia');
Route::get('guest/test', 'GuestController@testeroo');

Route::group([ 'middleware' => 'App\Http\Middleware\InviteAuthenticated' ], function($route){
    /*$route->get('guest', 'GuestController@welcome')->name('guest.login');
    $route->get('guest/gallery', 'GuestController@gallery');
    $route->get('guest/proposal', 'GuestController@proposal');
    $route->get('guest/story', 'GuestController@story');
    $route->get('guest/crew', 'GuestController@crew');
    $route->get('guest/thanks', 'GuestController@thanks');
    $route->get('guest/test', 'GuestController@testeroo');*/
    #$route->get('guest/rsvp', 'GuestController@rsvp');
    #$route->post('guest/rsvp', 'GuestController@submitRSVP')->name('guest.rsvp');
    #$route->get('guest/rsvp', 'GuestController@rsvpClosed');
    #$route->get('guest/venue', 'GuestController@venue');
    #$route->get('guest/logout', 'GuestController@logout');
});

Route::get('logout', 'Auth\LoginController@logout');

/*
Route::get('/db/seed', function () { db_seed(); });
Route::get('/db/migrate/{seed?}', function ($seed = null) { db_migrate($seed); });
Route::get('/db/rollback', function () { db_rollback(); });
Route::get('/db/refresh/{seed?}', function ($seed = null) { db_refresh($seed); });
Route::get('/ini', function () {
    return phpinfo();
});
//*/
