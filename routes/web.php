<?php

declare(strict_types=1);

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |.
 */
use Illuminate\Support\Facades\Storage;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
// Route::get('/welcome', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('threads', 'ThreadsController@index')->name('threads');
Route::post('threads', 'ThreadsController@store')->middleware('auth'); //->middleware('must-be-confirmed');
Route::get('threads/create', 'ThreadsController@create')->name('threads.create');
Route::get('threads/search', 'SearchController@show')->name('threads.search');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::patch('threads/{channel}/{thread}', 'ThreadsController@update');
Route::delete('threads/{channel}/{thread}', 'ThreadsController@destroy');
Route::get('threads/{channel}', 'ThreadsController@index');

Route::post('locked-threads/{thread}', 'LockedThreadsController@store')->name('locked-threads.store')->middleware('admin');
Route::delete('locked-threads/{thread}', 'LockedThreadsController@destroy')->name('locked-threads.destroy')->middleware('admin');

Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::patch('/replies/{reply}', 'RepliesController@update');
Route::delete('/replies/{reply}', 'RepliesController@destroy')->name('replies.destroy');

Route::post('/replies/{reply}/best', 'BestRepliesController@store')->name('best-replies.store');

Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user}/notifications', 'UserNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');

Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

Route::get('api/users', 'Api\UsersController@index');
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');

Route::get('sync', 'HomeController@syncIndex')->name('sync');
Route::post('sync', 'HomeController@syncStore')->middleware('role:admin|leader|officer|member');
Route::prefix('g')->group(function (): void {
    Route::get('/', 'PagesController@home')->name('guild');
    Route::get('{guild}', 'GuildController@home')->name('guild.home');
    Route::get('{guild}/sync', 'HomeController@syncIndex')->name('sync2');
    Route::post('{guild}/sync', 'HomeController@syncStore')->middleware('role:admin|leader|officer|member');
    // Route::get('{guild}/own/roster', 'PagesController@roster')->name('guild.roster');
    Route::get('{guild}/own/ships/{chunk?}', 'PagesController@rosterShips')->name('guild.ships');
    Route::get('{guild}/own/toons/{chunk?}', 'PagesController@rosterToons')->name('guild.toons');
    Route::get('{guild}/list/zetas', 'PagesController@zetasList')->name('guild.list.zetas');
    Route::get('{guild}/list/events', 'PagesController@eventsList')->name('guild.list.events');
    Route::get('{guild}/list/battles', 'PagesController@battlesList')->name('guild.list.battles');
    Route::get('{guild}/list/squads', 'PagesController@squadsList')->name('guild.list.squads');
    Route::get('{guild}/stats/{chunk?}', 'GuildController@stats')->name('guild.stats');
    Route::get('{guild}/team/ships', 'PagesController@squadsShips')->name('guild.team.ships');
    Route::post('{guild}/team/ships', 'PagesController@squadsShips');
    Route::get('{guild}/team/toons', 'PagesController@squadsToons')->name('guild.team.toons');
    Route::post('{guild}/team/toons', 'PagesController@squadsToons');
    // Route::get('{guild}/info', function () {
    //     return view('guild.info');
    // })->name('guild.info');

    Route::get('{guild}/{page}', 'PagesController@show');
    Route::get('{guild}/{page}/edit', 'PagesController@showEdit');
    Route::delete('{guild}/{page}', 'PagesController@destroy')->middleware('auth');
    Route::post('{guild}/{page}/edit', 'MemosController@store');
    Route::get('{guild}/{page}/edit/memos', 'MemosController@index');
    Route::get('{guild}/{page}/edit/pages', 'PagesController@index');
    Route::post('{guild}/{page}/upload', 'Api\UploadController@storeCkeditor')->middleware('auth'); //->middleware('must-be-confirmed');

    Route::get('{guild}/{page}/memos', 'MemosController@index');
    Route::post('{guild}/{page}/memos', 'MemosController@store')->middleware('auth'); //->middleware('must-be-confirmed');
    Route::put('{guild}/{page}/memos/{memo}', 'MemosController@update')->middleware('auth');
    Route::delete('{guild}/{page}/memos/{memo}', 'MemosController@destroy')->middleware('auth');
    Route::put('{guild}/{page}/memos/{memo}/relocate', 'MemosController@relocate')->middleware('auth');
    Route::post('{guild}/{page}/memos/{memo}/lock', 'MemosController@getLock')->name('memos.lock.store')->middleware('auth');
    Route::delete('{guild}/{page}/memos/{memo}/lock', 'MemosController@releaseLock')->name('memos.lock.destroy')->middleware('auth');
});
Route::prefix('p')->group(function (): void {
    Route::get('/', 'PagesController@home')->name('player');
    Route::get('{player}', 'PlayerController@home')->name('player.home');
    Route::get('{player}/calc', 'PlayerController@calc')->name('player.calc'); //TODO
});

Route::prefix('admin')->group(function (): void {
    // Route::get('users', function (): void {
    //     // Matches The "/admin/users" URL
    // });
    Route::resource('guilds', 'GuildController', ['as' => 'admin'])->middleware('admin');
    Route::post('pages', 'PagesController@store')->name('pages')->middleware(['permission:edit pages']); //->middleware('must-be-confirmed');
    Route::get('pages/create', 'PagesController@create')->name('pages.create')->middleware(['permission:edit pages']);
    Route::post('memos', 'MemosController@storeAdmin')->name('memos')->middleware('admin'); //->middleware('must-be-confirmed');
    Route::get('memos', 'MemosController@index');
    Route::get('memos/create', 'MemosController@create')->name('memos.create');
    Route::get('memos/{memo}', 'MemosController@show');
    Route::put('memos/{memo}', 'MemosController@update');
    // Route::post('memos/{memo}', 'MemosController@update');
    // Route::patch('memos/{memo}', 'MemosController@update');
    Route::delete('memos/{memo}', 'MemosController@destroy')->middleware('auth');
    Route::post('files', 'Api\UploadController@storeAdmin')->name('files')->middleware('admin'); //->middleware('must-be-confirmed');
    Route::get('files/upload', 'Api\UploadController@create')->name('files.upload');
    Route::post('channels', 'PagesController@storeChannel')->name('channels')->middleware('admin'); //->middleware('must-be-confirmed');
    Route::get('channels/create', 'PagesController@createChannel')->name('channels.create');
});

    Route::post('api/upload', 'Api\UploadController@store')->middleware('auth')->name('upload');
    // Route::get('memos/search', 'SearchController@show')->name('memos.search');

Route::prefix('f')->group(function (): void {
    Route::get('a/{filename}', function (string $filename) {
        // return Storage::disk('avatars')->get($filename);
        return response()->file(Storage::disk('avatars')->path($filename));
        // return response()->download(Storage::disk('avatars')->path($filename));
        //$exists = Storage::disk('s3')->exists('file.jpg');
        //$url = Storage::url('file1.jpg');
    })->name('files.avatars');
    Route::get('d/{filename}', function (string $filename) {
        if (Storage::disk('sync')->exists($filename)) {
            return response()->download(Storage::disk('sync')->path($filename));
        }
        abort(404);
    })->where('filename', '(.*)\\.json')->name('files.sync');
});

Route::group(
    [
        'prefix' => 'admin',
        // 'name' => 'permissions.',
        'namespace' => 'Permissions',
        'middleware' => ['auth'], //fine grained access done via authorizable trait on controllers
    ],
    function (): void {
        Route::resource('users', 'UserController', ['as' => 'admin']);
        Route::resource('roles', 'RoleController', ['as' => 'admin']);
        Route::resource('posts', 'PostController', ['as' => 'admin']);
    }
);

Route::post('admin/posts/{post}/upload', 'Api\UploadController@storeCkeditor')->middleware('auth'); //->middleware('must-be-confirmed');

Route::get('testitnow/{param1MayContainSlash}/{param2}/{param3}', function ($param1Slashable, $param2, $param3) {
    $content = 'PATH: '.Request::path().'</br>';
    $content .= "PARAM1: $param1Slashable </br>";
    $content .= "PARAM2: $param2 </br>".PHP_EOL;
    $content .= "PARAM3: $param3 </br>".PHP_EOL;

    return Response::make($content);
})->where('param1MayContainSlash', '(.*(?:%2F:)?.*)');
