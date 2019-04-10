<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helper\SyncClient;
use Illuminate\Http\Request;

class ListController extends Controller
{

    public function squads()
    {
        $list = SyncClient::getSquadList();
        $unitKeys = SyncClient::getUnitKeys();
        $skillKeys = SyncClient::getSkillKeys();

        return view('guild.list.squads', [
            'unitKeys' =>$unitKeys ?? [],
            'skillKeys' =>$skillKeys ?? [],
            'list' => $list ?? [],
            ]);
    }

    public function events()
    {
        $list = SyncClient::getEventList();

        return view('guild.list.events', [
            'list' => $list ?: [],
            ]);
    }

    public function targeting()
    {
        $unitKeys = SyncClient::getUnitKeys(true);
        $skillKeys = SyncClient::getSkillKeys(true);
// dd($unitKeys->get(221));
// dd($skillKeys);
        $filter = [
            // 'baseId',
            // 'nameKey',
            // 'descKey',
            'forceAlignment',
            // 'categoryIdList',
            'combatType',
        ];
        $pattern = [
            '/\\\\n/',
            '/\[c\]\[(.{6})\]([^\[]*)\[-\]\[\/c\]/',
        ];
        $replacement = [
            '<br />',
            '<span style="color:#$1">$2</span>',
        ];

        return view('guild.list.targeting', [
            'unitKeys' =>$unitKeys,
            'skillKeys' =>$skillKeys,
            'filter' => $filter,
            'pattern' => $pattern,
            'replacement' => $replacement,
            ]);
    }

    public function zetas()
    {
        $list = SyncClient::getZetaList();

        return view('guild.list.zetas', [
            'list' => $list ?: [],
            ]);
    }

}
