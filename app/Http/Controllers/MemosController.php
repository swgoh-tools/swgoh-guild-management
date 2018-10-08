<?php

namespace App\Http\Controllers;

// use App\Http\Requests\CreateMemoRequest;
use App\Memo;
use App\Page;
use App\Guild;

class MemosController extends Controller
{
    /**
     * Create a new RepliesController instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Fetch all relevant memos.
     *
     * @param int    $guildId
     * @param Page $page
     */
    public function index($guildId, Page $page)
    {
        // return $page->memos()->paginate(20);
        $memos = $page->memos()->get();
        return $memos;
        return response()->json(['data' => $memos], 200);
        // return $page->memos()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guilds = Guild::all();
        // $pages = Page::all();

        return view('admin.memos.create', compact('guilds'));
    }

    /**
     * Persist a new memo.
     *
     * @param  integer           $guildId
     * @param  Page            $page
     * @param  CreateMemoRequest $form
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Guild $guild, Page $page) //, CreateMemoRequest $form)
    {
        // if ($page->locked) {
        //     return response('Page is locked', 422);
        // }
        
        $memo = $page->addMemo([
            'body' => request('body'),
            'title' => request('title'),
            'user_id' => auth()->id()
        ])->load('creator');

        if (request()->wantsJson()) {
            return response($memo, 201);
        }
    
        return back()
            ->with('flash', 'Eintrag gespeichert!');
    }

    /**
     * Persist a new memo.
     *
     * @param  integer           $guildId
     * @param  Page            $page
     * @param  CreateMemoRequest $form
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeAdmin() //CreateMemoRequest $form)
    {
        $guild = Guild::find(request('guild_id'));
        $page = Page::find(request('page_id'));
        return $this->store($page->guild, $page); //, $form);
    }

    /**
     * Update an existing memo.
     *
     * @param Memo $memo
     */
    public function update(Guild $guild = null, Page $page = null, Memo $memo)
    {
        $this->authorize('edit memos', auth()->user());
        // $this->authorize('update', $memo);
        // die('test');
        // dd(request());
        $memo->update(request()->validate([
                'body' => 'required|spamfree',
                'title' => 'required|spamfree',
                'page_id' => 'exists:pages,id'
            ]));
        $memo->update(['user_id_current' => auth()->id()]);
            
        if (request()->wantsJson()) {
            return response($memo, 201);
        }
    
        return back()
            ->with('flash', 'Eintrag aktualisiert!');
    }

    /**
     * Delete the given memo.
     *
     * @param  Memo $memo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Guild $guild = null, Page $page = null, Memo $memo)
    {
        // $this->authorize('edit', $memo);
        $this->authorize('edit memos', auth()->user());

        $memo->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Memo deleted'], 204);
        }

        return back()
            ->with('flash', 'Eintrag gelöscht!');
    }

    /**
     * Delete the given memo.
     *
     * @param  Memo $memo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLock(Guild $guild = null, Page $page = null, Memo $memo)
    {
        // $this->authorize('edit', $memo);
        $this->authorize('edit memos', auth()->user());

        

        if ($memo->dolock()) {
            if (request()->expectsJson()) {
                return response($memo->lock()->first(), 201);
            }
            return back()
            ->with('flash', 'Memo erfolgreich zum Bearbeiten gesperrt!');
        }

        if (request()->expectsJson()) {
            return response($memo->lock()->first(), 423); // 423 Locked, 409 Conflict
        }
        return back()
        ->with('flash', 'Bearbeitungssperre fehlgeschlagen!');
    }

    /**
     * Delete the given memo.
     *
     * @param  Memo $memo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function releaseLock(Guild $guild = null, Page $page = null, Memo $memo)
    {
        // $this->authorize('edit', $memo);
        // $this->authorize('edit memos', auth()->user());

        if ($memo->unlock()) {
            if (request()->expectsJson()) {
                return response([], 204);
            }
            return back()
            ->with('flash', 'Memo erfolgreich zum Bearbeiten gesperrt!');
        }

        if (request()->expectsJson()) {
            return response(['status' => 'Memo still locked'], 423); // 423 Locked, 409 Conflict
        }
        return back()
        ->with('flash', 'Löschen der Sperre fehlgeschlagen!');

    }
}
