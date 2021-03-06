<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Page;
use App\User;
use App\Guild;
use App\Channel;
use App\Helper\SyncHelper;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function info()
    {
        return view('pages.info');
    }

    public function home()
    {
        return view('home');
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
        $this->authorize('create', Page::class);
        $guilds = Guild::with(['permUsers' => function ($query): void {
            $query->where('user_id', auth()->id());
        }])
        // ->where('user_id', auth()->id())
        // ->orWhereNotNull('permUsers.role_id')
        ->get();
//         foreach ($guilds as $key => $value) {
//             if (!auth()->user()->can('create', [Page::class, $value->id])){

//             }
//         }
        $filtered = $guilds->filter(function ($value, $key) {
            return auth()->user()->can('create', [Page::class, $value->id]);
        });

        // $filtered->all();
        return view('admin.pages.create', ['guilds' => $filtered]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Rules\Recaptcha $recaptcha
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'title' => 'required|spamfree',
            'guild_id' => 'required|exists:guilds,id',
        ]);

        $this->authorize('create', [Page::class, request('guild_id')]);

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
            'body' => 'required',
        ]));

        return $page;
    }

    /**
     * Delete the given page.
     *
     * @param        $channel
     * @param Thread $page
     *
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
    public function createChannel()
    {
        return view('admin.channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Rules\Recaptcha $recaptcha
     *
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

    protected function roster(Guild $guild, $list, $filter, $updated, $chunk, $title, $route_name)
    {
        $skillKeys = SyncHelper::getSkillKeys();
        $unitKeys = SyncHelper::getUnitKeys();

        $units = array_chunk($list->all(), 42, true);

        $pagination = [];
        foreach ($units as $chunk_key => $chunk_array) {
            end($chunk_array);
            $pagination[$chunk_key]['last'] = current($chunk_array)['name'] ?? key($chunk_array); //since php 7.3.0: array_key_last()
            reset($chunk_array);
            $pagination[$chunk_key]['first'] = current($chunk_array)['name'] ?? key($chunk_array); //since php 7.3.0: array_key_first()
        }

        return view('guild.roster', [
            'title' => $title,
            'route_name' => 'guild.' . $route_name,
            'units' => $units[$chunk] ?? $units[0] ?? [],
            'updated' => $updated,
            'filter' => $filter,
            'pagination' => $pagination,
            'skillKeys' => $skillKeys ?? [],
            'unitKeys' => $unitKeys ?? [],
            ]);
    }

    public function rosterShips(Guild $guild, $chunk = 0)
    {
        $list = SyncHelper::getRoster($guild, 2);
        $updated = SyncHelper::getRoster($guild, 2, true);

        $filter = [
            // 'pid',
            'allyCode',
            'player',
            // 'id',
            // 'defId',
            // 'nameKey',
            'rarity',
            'level',
            // 'xp',
            // 'gear',
            // 'equipped',
            // 'combatType',
            'skills',
            // 'mods',
            'crew',
            'gp',
                 ];

        return $this->roster($guild, $list, $filter, $updated, $chunk, 'Ships', 'ships');
    }

    public function rosterToons(Guild $guild, $chunk = 0)
    {
        ini_set('zlib.output_compression', 'On');

        $list = SyncHelper::getRoster($guild, 1);
        $updated = SyncHelper::getRoster($guild, 1, true);

        $filter = [
            // 'pid',
            'allyCode',
            'player',
            // 'id',
            // 'defId',
            // 'nameKey',
            'rarity',
            'level',
            // 'xp',
            'gear',
            'equipped',
            // 'combatType',
            'skills',
            // 'mods',
            // 'crew',
            'gp',
                 ];

        return $this->roster($guild, $list, $filter, $updated, $chunk, 'Toons', 'toons');
    }

    public function squadspost()
    {
        return redirect()->back()->withInput();
    }

    public function squadsToons(Request $request, Guild $guild)
    {
        return $this->squads($request, $guild, 1, 'guild.team.toons');
    }

    public function squadsShips(Request $request, Guild $guild)
    {
        return $this->squads($request, $guild, 2, 'guild.team.ships');
    }

    protected function squads(Request $request, Guild $guild, $combat_type, $route)
    {
        $unitKeys = SyncHelper::getUnitKeys();
        $units = SyncHelper::getRoster($guild, $combat_type);
        $updated = SyncHelper::getRoster($guild, $combat_type, true);

        if ($units) {
            try {
                foreach ($units as $unit_key => $unit) {
                    foreach ($unit['players'] as $player_key => $player) {
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

        if ($request->input('t')) {
            $char_list = explode(',', $request->input('t'));
        } else {
            $char_list = [
                $request->input('t1'),
                $request->input('t2'),
                $request->input('t3'),
                $request->input('t4'),
                $request->input('t5'),
            ];
        }

        if (2 == $combat_type) {
            $type = 'ship';
        } else {
            $type = 'toon';
        }
        $sort = 'gp';
        $result = [];

        foreach ($char_list as $key => $char) {
            if (empty($char)) {
                unset($char_list[$key]);
            }
        }

        if (!empty($char_list)) {
            $char_list = array_flip(array_flip($char_list)); // remove duplicates
            foreach ($player_data as $player_id => $player_units) {
                $result[$player_id]['id'] = $player_id;
                $squad_count = 0;
                $sort_sum = 0;
                foreach ($char_list as $char) {
                    $result[$player_id]['units'][$char] = '';
                    if (\array_key_exists($char, $player_units)) {
                        $result[$player_id]['units'][$char] = $player_units[$char];
                        ++$squad_count;
                        $sort_sum += $player_units[$char][$sort];
                    }
                }
                $result[$player_id]['squad_count'] = $squad_count;
                $result[$player_id]['sort_sum'] = $sort_sum;
            }

            usort($result, [$this, 'cmpSortSumDesc']);
        }

        return view('guild.squads', [
            'unitKeys' => $unitKeys ?? [],
            'route' => $route,
            'units' => $units,
            'updated' => $updated,
            'result' => $result,
            'char_list' => $char_list,
            'roster' => $roster,
            'type' => $type,
            ]); //$request->all()
    }

    protected function cmpSortSumDesc($a, $b)
    {
        return $this->cmp($a, $b, 'sort_sum', true);
    }

    protected function cmpUnitKeyAsc($a, $b)
    {
        return $this->cmp($a, $b, 'unit_key', false);
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
