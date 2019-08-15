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
        $memos = $page->memos()->orderBy('position', 'asc')->get();
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
        // dd(request());
        $this->authorize('edit memos', auth()->user());
        $memo->update(request()->validate([
                'body' => 'required|spamfree',
                'title' => 'required|spamfree',
                'page_id' => 'exists:pages,id'
            ]));

        // $memo->update(['user_id_current' => auth()->id()]);
        $memo->editor()->associate(auth()->user());
        $memo->save();

        if (request()->wantsJson()) {
            return response($memo, 201);
        }

        return back()
            ->with('flash', 'Eintrag aktualisiert!');
    }

    /**
     * Update an existing memo.
     *
     * @param Memo $memo
     */
    public function relocate(Guild $guild = null, Page $page = null, Memo $memo)
    {
        // dd(request());
        $this->authorize('edit memos', auth()->user());
        // $this->authorize('update', $memo);
        // die('test');
        request()->validate([
                'before_id' => 'exists:memos,id|nullable',
                'page_id' => 'exists:pages,id|required'
        ]);
        if ($memo->id == request('before_id')) {
            return response(['Old and new Memo are the same!'], 450);
        }
        $new_page = Page::find(request('page_id'));
        if (! $new_page) {
            return response(['New Page not found'], 450);
        }
        $other_memo = Memo::find(request('before_id'));
        if ($other_memo && $other_memo->page_id <> $new_page->id) {
            return response(['Page and Memo (before) do not match!'], 450);
        }
        if ($memo->page_id <> $new_page->id) {
            $memo->timestamps = false;
            $memo->page()->associate($new_page);
            $memo->save();
        }
        $max_position = $new_page->memos()->max('position');

        if (! $other_memo) {
            $memo->timestamps = false;
            $memo->update(['position' => (is_int($max_position) ? $max_position + 1 : null)]);
            return response(['Memo relocated to end of ' . $new_page->title], 200);
        }
        if ($other_memo->position >= 1) {
            //exclude current memo
            $new_neighbors = $new_page->memos()->where(
                [
                ['id', '<>', $memo->id],
                ['position', '>=', $other_memo->position]]
            )->orderBy('position', 'asc')->get();
            $position = $other_memo->position;
        } else {
            //full cleanup on position needed
            $new_neighbors = $new_page->memos()->where('id', '<>', $memo->id)->orderBy('position', 'asc')->get();
            $position = 0;
        }

        $reloc_done = false;
        foreach ($new_neighbors as $current_memo) {
            if (! $reloc_done && $current_memo->id == $other_memo->id) {
                //this is our new position
                $memo->timestamps = false;
                $memo->update(['position' => $position + 1]);
                $position += 1;
                $reloc_done = true;
            }
            if ($current_memo->position >= $position) {
                if ($reloc_done) {
                    //following memos are in order, nothing to do for the rest
                    break;
                }
                $position = $current_memo->position;
            } else {
                $current_memo->timestamps = false;
                $current_memo->update(['position' => $position + 1]);
                $position += 1;
            }
        }

        if ($reloc_done) {
            return response(['Relocation Successfull'], 201);
        }

        return response(['Something went wrong!'], 501);
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
