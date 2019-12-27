<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Guild;
use App\Helper\SyncClient;
use App\Helper\SyncHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guilds = Guild::all();

        return view('home', compact('guilds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function syncIndex()
    {
        $targets = SyncHelper::getTargets();
        $client = new SyncClient();
        $time = $client->isRunning();
        $targets['clear'] = $time ? 'Sync Lock seit ' . date('d.m. H:m:s', $time) : 'Kein Lock File gefunden.';

        $pending_jobs = DB::table('jobs')
            ->select(DB::raw('count(*) as amount, queue'))
            ->groupBy('queue')
            ->get();
        $failed_jobs = DB::table('failed_jobs')
            ->select(DB::raw('count(*) as amount, queue'))
            ->groupBy('queue')
            ->get();

        return view('admin.sync', compact('targets', 'pending_jobs', 'failed_jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Rules\Recaptcha $recaptcha
     *
     * @return \Illuminate\Http\Response
     */
    public function syncStore(Request $request)
    {
        request()->validate([
            'sync' => 'required|string|max:50',
        ]);

        $client = new SyncClient();

        $guild = Guild::where('slug', '=', $request->session()->get('guild_slug') ?? '')->first();

        if ($guild) {
            $client->setGuildCode($guild->code);
            $client->setGuildId($guild->refId);
            $client->setPlayerCode($guild->user->code);
        }

        if (request('force') && auth()->user()->hasRole('admin')) {
            $client->ignoreThreshold = true;
        }

        if ('clear' == request('sync')) {
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
}
