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
use App\User;
use App\Helper\FeedReader;
use App\Helper\SyncClient;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Response;
use App\Events\OfficialAnnouncementAdded;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\MemosController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Dev\AssetController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\BestRepliesController;
use App\Http\Controllers\LockedThreadsController;
use App\Http\Controllers\Api\UserAvatarController;
use App\Http\Controllers\Permissions\PostController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\Permissions\UserController;
use App\Http\Controllers\UserNotificationsController;
use App\Http\Controllers\ThreadSubscriptionsController;
use App\Http\Controllers\Auth\RegisterConfirmationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/news/{type?}', function (string $type = '') {
    switch ($type) {
        case 'updates':
            $feed_key = 'official-game-updates';
            break;
        case 'units':
            $feed_key = 'official-unit-updates';
            break;

        case 'announcements':
        default:
            $feed_key = 'official-announcements';
            break;
    }

    $data = Cache::remember('feed.data.'.$feed_key, now()->addMinutes(120), function () use ($feed_key) {
        $fr = new FeedReader();
        return $fr->getFeedData($feed_key);
    });
    return View::make('feed', $data);
})->name('feeds')->where('type', 'announcements|updates|units');
Route::get('/changes', function () {
    $changes = file_get_contents(base_path(). '/CHANGELOG.md');
    $changes = Markdown::parse($changes);
    return view('changes')->with(['changes' => $changes]);
})->name('changes');
Auth::routes();

Route::get('threads', [ThreadsController::class, 'index'])->name('threads');
Route::post('threads', [ThreadsController::class, 'store'])->middleware('auth'); //->middleware('must-be-confirmed');
Route::get('threads/create', [ThreadsController::class, 'create'])->name('threads.create');
Route::get('threads/search', [SearchController::class, 'show'])->name('threads.search');
Route::get('threads/{channel}/{thread}', [ThreadsController::class, 'show']);
Route::patch('threads/{channel}/{thread}', [ThreadsController::class, 'update']);
Route::delete('threads/{channel}/{thread}', [ThreadsController::class, 'destroy']);
Route::get('threads/{channel}', [ThreadsController::class, 'index']);

Route::post('locked-threads/{thread}', [LockedThreadsController::class, 'store'])->name('locked-threads.store')->middleware('admin');
Route::delete('locked-threads/{thread}', [LockedThreadsController::class, 'destroy'])->name('locked-threads.destroy')->middleware('admin');

Route::get('/threads/{channel}/{thread}/replies', [RepliesController::class, 'index']);
Route::post('/threads/{channel}/{thread}/replies', [RepliesController::class, 'store']);
Route::patch('/replies/{reply}', [RepliesController::class, 'update']);
Route::delete('/replies/{reply}', [RepliesController::class, 'destroy'])->name('replies.destroy');

Route::post('/replies/{reply}/best', [BestRepliesController::class, 'store'])->name('best-replies.store');

Route::post('/threads/{channel}/{thread}/subscriptions', [ThreadSubscriptionsController::class, 'store'])->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', [ThreadSubscriptionsController::class, 'destroy'])->middleware('auth');

Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);
Route::delete('/replies/{reply}/favorites', [FavoritesController::class, 'destroy']);

Route::get('/profiles/{user}', [ProfilesController::class, 'show'])->name('profile');
Route::get('/profiles/{user}/notifications', [UserNotificationsController::class, 'index'])->name('notifications');
Route::delete('/profiles/{user}/notifications/{notification}', [UserNotificationsController::class, 'destroy']);
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/{id}/edit', [UserController::class, 'editRestricted'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'updateRestricted'])->name('user.update');

Route::get('/register/confirm', [RegisterConfirmationController::class, 'index'])->name('register.confirm');

Route::get('api/users', [UsersController::class, 'index']);
Route::post('api/users/{user}/avatar', [UserAvatarController::class, 'store'])->middleware('auth')->name('avatar');

Route::get('sync', [HomeController::class, 'syncIndex'])->name('sync');
Route::post('sync', [HomeController::class, 'syncStore'])->middleware('role:admin|leader|officer|member');
Route::prefix('g')->group(function (): void {
    Route::get('/', [PagesController::class, 'home'])->name('guild');
    Route::get('{guild}', [GuildController::class, 'home'])->name('guild.home');
    Route::get('{guild}/sync', [HomeController::class, 'syncIndex'])->name('sync2');
    Route::post('{guild}/sync', [HomeController::class, 'syncStore'])->middleware('role:admin|leader|officer|member');
    // Route::get('{guild}/own/roster', [PagesController::class, 'roster'])->name('guild.roster');
    Route::get('{guild}/own/ships/{chunk?}', [PagesController::class, 'rosterShips'])->name('guild.ships');
    Route::get('{guild}/own/toons/{chunk?}', [PagesController::class, 'rosterToons'])->name('guild.toons');
    Route::get('{guild}/list/ability_mats/{type?}', [ListController::class, 'ability_mats_guild'])->name('guild.list.ability_mats')->where('type', 'levels|tiers|gear|stars|relics|recipes');
    Route::get('{guild}/list/targeting', [ListController::class, 'targeting'])->name('guild.list.targeting');
    Route::get('{guild}/list/zetas', [ListController::class, 'zetas'])->name('guild.list.zetas');
    Route::get('{guild}/list/events', [ListController::class, 'events'])->name('guild.list.events');
    // Route::get('{guild}/list/battles', [PagesController::class, 'battlesList'])->name('guild.list.battles');
    Route::get('{guild}/list/squads', [ListController::class, 'squads'])->name('guild.list.squads');
    Route::get('{guild}/sanctions/{code}', [GuildController::class, 'indexSanction'])->name('sanction');
    Route::post('{guild}/sanctions/{code}', [GuildController::class, 'storeSanction'])->middleware('role:admin|leader|officer');
    Route::get('{guild}/sanctions/{code}/create', [GuildController::class, 'createSanction'])->name('sanction.create');
    // Route::get('{guild}/sanctions/{code}/{sanction}', [GuildController::class, 'showSanction']);
    Route::put('{guild}/sanctions/{code}/{sanction}', [GuildController::class, 'updateSanction'])->name('sanction.update');
    Route::delete('{guild}/sanctions/{code}/{sanction}', [GuildController::class, 'destroySanction'])->name('sanction.destroy');
    Route::get('{guild}/sanctions/{code}/{sanction}/edit', [GuildController::class, 'editSanction'])->name('sanction.edit');
    Route::get('{guild}/stats/players/percent', [GuildController::class, 'stats_players_percent'])->name('guild.stats.players.percent');
    Route::get('{guild}/stats/players/secondary/{limit?}', [GuildController::class, 'stats_players_secondary'])->name('guild.stats.players.secondary')->where('limit', '\d{0,4}');
    Route::get('{guild}/stats/players', [GuildController::class, 'stats_players'])->name('guild.stats.players');
    Route::get('{guild}/stats/{chunk?}/{code?}', [GuildController::class, 'stats'])->name('guild.stats');
    Route::get('{guild}/team/ships', [PagesController::class, 'squadsShips'])->name('guild.team.ships');
    Route::post('{guild}/team/ships', [PagesController::class, 'squadsShips']);
    Route::get('{guild}/team/toons', [PagesController::class, 'squadsToons'])->name('guild.team.toons');
    Route::post('{guild}/team/toons', [PagesController::class, 'squadsToons']);
    // Route::get('{guild}/info', function () {
    //     return view('guild.info');
    // })->name('guild.info');

    Route::get('{guild}/pages', [PagesController::class, 'info'])->name('guild.pages');
    Route::get('{guild}/{page}', [PagesController::class, 'show']);
    Route::get('{guild}/{page}/edit', [PagesController::class, 'showEdit']);
    Route::delete('{guild}/{page}', [PagesController::class, 'destroy'])->middleware('auth');
    Route::post('{guild}/{page}/edit', [MemosController::class, 'store']);
    Route::get('{guild}/{page}/edit/memos', [MemosController::class, 'index']);
    Route::get('{guild}/{page}/edit/pages', [PagesController::class, 'index']);
    Route::post('{guild}/{page}/upload', [UploadController::class, 'storeCkeditor'])->middleware('auth'); //->middleware('must-be-confirmed');

    Route::get('{guild}/{page}/memos', [MemosController::class, 'index']);
    Route::post('{guild}/{page}/memos', [MemosController::class, 'store'])->middleware('auth'); //->middleware('must-be-confirmed');
    Route::put('{guild}/{page}/memos/{memo}', [MemosController::class, 'update'])->middleware('auth');
    Route::delete('{guild}/{page}/memos/{memo}', [MemosController::class, 'destroy'])->middleware('auth');
    Route::put('{guild}/{page}/memos/{memo}/relocate', [MemosController::class, 'relocate'])->middleware('auth');
    Route::post('{guild}/{page}/memos/{memo}/lock', [MemosController::class, 'getLock'])->name('memos.lock.store')->middleware('auth');
    Route::delete('{guild}/{page}/memos/{memo}/lock', [MemosController::class, 'releaseLock'])->name('memos.lock.destroy')->middleware('auth');
});
Route::prefix('p')->group(function (): void {
    Route::get('/', [PagesController::class, 'home'])->name('player');
    Route::get('{player}', [PlayerController::class, 'home'])->name('player.home');
    Route::get('{player}/roster', [PlayerController::class, 'roster'])->name('player.roster');
    Route::get('{player}/toons', [PlayerController::class, 'toons'])->name('player.toons');
    Route::get('{player}/toons/category', [PlayerController::class, 'toons_by_category'])->name('player.toons_by_category');
    Route::get('{player}/gear', [PlayerController::class, 'gear'])->name('player.gear');
    Route::post('{player}/gear', [PlayerController::class, 'gear']);
    Route::get('{player}/stats', [PlayerController::class, 'stats'])->name('player.stats');
    Route::get('{player}/stats/full', [PlayerController::class, 'statsVerbose'])->name('player.stats.full');
    Route::get('{player}/stats/gear', [PlayerController::class, 'statsGear'])->name('player.stats.gear');
    Route::get('{player}/stats/salvage', [PlayerController::class, 'statsSalvage'])->name('player.stats.salvage');
});
Route::get('/list/ability_mats/{type?}', [ListController::class, 'ability_mats'])->name('ability_mats')->where('type', 'levels|tiers|gear|stars|relics|recipes');
Route::get('/list/targeting', [ListController::class, 'targeting'])->name('targeting');
Route::get('/list/zetas', [ListController::class, 'zetas'])->name('zetas');
Route::get('/list/events', [ListController::class, 'zetas'])->name('events');
Route::get('/list/table', [ListController::class, 'table_list'])->name('list.table');

Route::prefix('admin')->group(function (): void {
    // Route::get('users', function (): void {
    //     // Matches The "/admin/users" URL
    // });
    Route::resource('guilds', 'GuildController', ['as' => 'admin'])->middleware('admin');
    Route::post('pages', [PagesController::class, 'store'])->name('pages')->middleware(['permission:edit pages']); //->middleware('must-be-confirmed');
    Route::get('pages/create', [PagesController::class, 'create'])->name('pages.create')->middleware(['permission:edit pages']);
    Route::post('memos', [MemosController::class, 'storeAdmin'])->name('memos')->middleware('admin'); //->middleware('must-be-confirmed');
    Route::get('memos', [MemosController::class, 'index']);
    Route::get('memos/create', [MemosController::class, 'create'])->name('memos.create');
    Route::get('memos/{memo}', [MemosController::class, 'show']);
    Route::put('memos/{memo}', [MemosController::class, 'update']);
    // Route::post('memos/{memo}', [MemosController::class, 'update']);
    // Route::patch('memos/{memo}', [MemosController::class, 'update']);
    Route::delete('memos/{memo}', [MemosController::class, 'destroy'])->middleware('auth');
    Route::post('files', [UploadController::class, 'storeAdmin'])->name('files')->middleware('admin'); //->middleware('must-be-confirmed');
    Route::get('files/upload', [UploadController::class, 'create'])->name('files.upload');
    Route::post('channels', [PagesController::class, 'storeChannel'])->name('channels')->middleware('admin'); //->middleware('must-be-confirmed');
    Route::get('channels/create', [PagesController::class, 'createChannel'])->name('channels.create');
});

    Route::post('api/upload', [UploadController::class, 'store'])->middleware('auth')->name('upload');
    // Route::get('memos/search', [SearchController::class, 'show'])->name('memos.search');

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

// Route::get('game-asset/{category}/{item}', function (string $category, string $item) {
//     $filename = "game-asset/$category/$item.png";
//     $source = "https://swgoh.gg/game-asset/$category/$item";
//     if (Storage::disk('public')->exists($filename)) {
//         return Storage::disk('public')->get($filename);
//         return response()->file(Storage::disk('public')->path($filename));
//     }
//     $data_stream = fopen($source, 'r', false);
//     if (false !== $data_stream) {
//         // always save original response for debugging api errors
//         Storage::disk('public')->putStream($filename, $data_stream);
//         if (is_resource($data_stream)) {
//             fclose($data_stream);
//         }
//     }
//     if (Storage::disk('public')->exists($filename)) {
//         return Storage::disk('public')->download($filename);
//         return response()->file(Storage::disk('public')->path($filename));
//     }
//     abort(404);
//     return redirect($source);
// });

Route::group(
    [
        'prefix' => 'admin',
        // 'name' => 'permissions.',
        // 'namespace' => 'Permissions',
        'middleware' => ['auth'], //fine grained access done via authorizable trait on controllers
    ],
    function (): void {
        Route::namespace('Permissions')->group(function (): void {
            Route::resource('users', UserController::class, ['as' => 'admin']);
            Route::resource('roles', RoleController::class, ['as' => 'admin']);
            Route::resource('posts', PostController::class, ['as' => 'admin']);
        });
        Route::namespace('Dev')->group(function (): void {
            Route::get('gear', [AssetController::class, 'checkTexturesGear']);
            Route::get('unit', [AssetController::class, 'checkTexturesUnit']);
            Route::get('ship', [AssetController::class, 'checkTexturesShip']);
            Route::get('ability', [AssetController::class, 'checkTexturesAbility']);
        });
    }
);

Route::post('admin/posts/{post}/upload', [UploadController::class, 'storeCkeditor'])->middleware('auth'); //->middleware('must-be-confirmed');

Route::get('testitnow/{param1MayContainSlash}/{param2}/{param3}', function ($param1Slashable, $param2, $param3) {
    $content = 'PATH: '.Request::path().'</br>';
    $content .= "PARAM1: $param1Slashable </br>";
    $content .= "PARAM2: $param2 </br>".PHP_EOL;
    $content .= "PARAM3: $param3 </br>".PHP_EOL;

    return Response::make($content);
})->where('param1MayContainSlash', '(.*(?:%2F:)?.*)');
