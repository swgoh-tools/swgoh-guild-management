<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\SyncClient;
use App\Channel;
use App\Page;
use App\Guild;
use App\User;

class PagesController extends Controller
{
    public function home(Request $request, Guild $guild = null)
    {
        $sync_status = [];
        if ($request->get('sync')) {
            $client = new SyncClient();
            $sync_status = $client->sync();
        }

        return view('home', ['sync_status' => $sync_status]);
    }

    public function index(Guild $guild, Page $page)
    {
        // return $page->memos()->paginate(20);
        $pages = $guild->pages()->with('memos:id,title,page_id')->get();
        return $pages;
        return response()->json(['data' => $memos], 200);
        // return $page->memos()->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @param  \App\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function show(Guild $guild, Page $page) //, Guild $guild)
    {
        // if (auth()->check()) {
        //     auth()->user()->read($page);
        // }

        // $trending->push($page);

        // $page->increment('visits');
        $memos = $page->memos()->orderby('position', 'asc')->get();

        return view('pages.show', compact('page', 'memos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @param  \App\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function showEdit(Guild $guild, Page $page) //, Guild $guild)
    {
        // if (auth()->check()) {
        //     auth()->user()->read($page);
        // }

        // $trending->push($page);

        // $page->increment('visits');

        return view('pages.edit', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guilds = Guild::all();

        return view('admin.pages.create', compact('guilds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Rules\Recaptcha $recaptcha
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'title' => 'required|spamfree',
            'guild_id' => 'required|exists:guilds,id',
        ]);

        $page = Page::create([
            'user_id' => auth()->id(),
            'guild_id' => request('guild_id'),
            'title' => request('title'),
        ]);

        if (request()->wantsJson()) {
            return response($page, 201);
        }

        return redirect($page->path())
            ->with('flash', 'Your page has been published!');
    }

    /**
     * Update the given page.
     *
     * @param string $channel
     * @param Thread $page
     */
    public function update(Page $page)
    {
        $this->authorize('update', $page);

        $page->update(request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]));

        return $page;
    }

    /**
     * Delete the given page.
     *
     * @param        $channel
     * @param Thread $page
     * @return mixed
     */
    public function destroy(Guild $guild, Page $page)
    {
        $this->authorize('edit memos', auth()->user());

        if ($page->memos()->count() > 0) {
            if (request()->wantsJson()) {
                return response(['Page contains memos. Cannot be deleted.'], 450);
            }
    
            return back()->with('flash', 'Seite kann nicht gelöscht werden, da Inhalte vorhanden!');
        }

        $page->delete();

        if (request()->wantsJson()) {
            return response([], 204);
        }

        return redirect(route('home'))->with('flash', 'Seite gelöscht!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGuild()
    {
        $users = User::all();

        return view('admin.guilds.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Rules\Recaptcha $recaptcha
     * @return \Illuminate\Http\Response
     */
    public function storeGuild()
    {
        request()->validate([
            'name' => 'required|spamfree',
            'code' => 'integer',
            'user_id' => 'required|exists:users,id',
        ]);

        $guild = Guild::create([
            // 'user_id' => auth()->id(),
            'user_id' => request('user_id'),
            'name' => request('name'),
            'code' => request('code'),
        ]);

        if (request()->wantsJson()) {
            return response($guild, 201);
        }

        return redirect($guild->path())
            ->with('flash', 'Your guild has been published!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createChannel()
    {
        return view('admin.channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Rules\Recaptcha $recaptcha
     * @return \Illuminate\Http\Response
     */
    public function storeChannel()
    {
        request()->validate([
            'title' => 'required|spamfree',
        ]);

        $channel = Channel::create([
            'title' => request('title'),
        ]);

        if (request()->wantsJson()) {
            return response($channel, 201);
        }

        return redirect()
            ->back()
            ->with('flash', 'Your channel has been published!');
    }

    public function roster(Request $request)
    {
        $units = SyncClient::getRoster();
        if (! $units) {
            $units = [];
        }

        return view('guild.roster', [
            'title' => 'Gesamtliste',
            // 'sync_status' => $sync_status, 
            'units' => $units
            ]);
    }

    public function squadlist(Request $request)
    {
        $list = SyncClient::getSquadList();
        if (! $list) {
            $list = [];
        }

        return view('guild.squadlist', [
            'title' => 'Vordefinierte Teams',
            // 'sync_status' => $sync_status, 
            'list' => $list
            ]);
    }

    public function squadspost() {
        return redirect()->back()->withInput(); 
    }

    public function squads(Request $request)
    {
        $units = SyncClient::getRoster();
        if ($units) {
            try {
                foreach ($units as $unit_key => $players) {
                    foreach ($players as $player_key => $player) {
                        $roster[$player['allyCode']] = $player['player']; // was id
                        $player_data[$player['allyCode']][$unit_key] = $player; // was id
                    }
                }
            } catch (Exception $e) {
                $units = [];
                $roster = [];
                $player_data = [];
            }
        } else {
            $units = [];
            $roster = [];
            $player_data = [];    
        }

        $char_list = [
            't1' => $request->input('t1'),
            't2' => $request->input('t2'),
            't3' => $request->input('t3'),
            't4' => $request->input('t4'),
            't5' => $request->input('t5'),
        ];
        $select_list = ['t1' => 'Char1', 't2' => 'Char2', 't3' => 'Char3', 't4' => 'Char4', 't5' => 'Char5'];
        $sort = 'gp';
        $caption ='Eigene Zusammenstellung';
        $result = [];

        foreach ($char_list as $key => $char) {
            if (empty($char)) {
                unset($char_list[$key]);
            }
        }
        
        if (!empty($char_list)) {
            $char_list = array_flip(array_flip($char_list)); // remove duplicates
            $caption = implode(',', $char_list);
            foreach ($player_data as $player_id => $player_units) {
                $result[$player_id]['id'] = $player_id;
                $squad_count = 0;
                $sort_sum = 0;
                foreach ($char_list as $char) {
                    $result[$player_id]['units'][$char] = '';
                    if (array_key_exists($char, $player_units)) {
                        $result[$player_id]['units'][$char] = $player_units[$char];
                        $squad_count++;
                        $sort_sum += $player_units[$char][$sort];
                    }
                }
                $result[$player_id]['squad_count'] = $squad_count;
                $result[$player_id]['sort_sum'] = $sort_sum;
            }
            
            usort($result, array($this, "cmp_sort_sum_desc"));
        }

        return view('guild.squads', [
            // 'sync_status' => \Cache::get('sync_status', []), 
            'units' => $units, 
            'result' => $result, 
            'caption' => $caption, 
            'char_list' => $char_list, 
            'roster' => $roster, 
            'select_list' => $select_list
            ]
        ); //$request->all()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function syncView()
    {
        $targets = SyncClient::getTargets();
        $client = new SyncClient();
        $time = $client->isRunning();
        $targets['clear'] = $time ? 'Sync Lock seit ' . date('d.m. H:m:s', $time) : 'Kein Lock File gefunden.';
        return view('admin.sync', compact('targets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Rules\Recaptcha $recaptcha
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {
        request()->validate([
            'sync' => 'required|string|max:20',
        ]);

        $client = new SyncClient();
        if (request('force') && auth()->user()->hasRole('admin')) {
            $client->ignoreThreshold = true;
        }

        if (request('sync') == 'clear') {
            $result = $client->clearLock();
        } else {
            $result = $client->sync(request('sync'));
        }


        if (request()->wantsJson()) {
            return response($result, 201);
        }

        return back()
            ->with('flash', $result['error'] ?? '');
    }


    protected function cmp_sort_sum_desc($a, $b)
    {
        return $this->cmp($a, $b, "sort_sum", true);
    }
    
    protected function cmp_unit_key_asc($a, $b)
    {
        return $this->cmp($a, $b, "unit_key", false);
    }
    
    protected function cmp($a, $b, $sort_field, $desc = false)
    {
        $one = $a[$sort_field];
        $two = $b[$sort_field];
        if (is_numeric($one) && is_numeric($two)) {
            switch (true) {
                case $one > $two:
                    return ($desc) ? -1 : 1;
                    break;
                case $one < $two:
                    return ($desc) ? 1 : -1;
                    break;
                default:
                    return 0;
                    break;
            }
        }
    
        return ($desc) ? strcmp($one, $two) * -1 : strcmp($one, $two);
    }
}
