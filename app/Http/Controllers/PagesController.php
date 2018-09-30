<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\SyncClient;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        $sync_status = [];
        if ($request->sync) {
            $client = new SyncClient();
            $sync_status = $client->sync();
        }

        return view('home', ['sync_status' => $sync_status]);
    }

    public function roster(Request $request)
    {
        $datapath = storage_path() . '/app/public/data';
        if (! file_exists($datapath)) {
            mkdir($datapath, 0770, false);
        }
        $datafile = $datapath . '/swgoh.help/guild/758735237/units.json';
        $units = [];
        try {
            $data = file_get_contents($datafile);
            $units = json_decode($data, true);
            $units = $units['roster'];
            // ksort($units); // way too slow!
        } catch (Exception $e) {
            //
        }

        $sync_status = [];
        if ($request->sync) {
            $client = new SyncClient();
            $sync_status = $client->sync();
        }

        return view('guild.roster', ['sync_status' => $sync_status, 'units' => $units]);
    }

    public function squadspost() {
        return redirect()->back()->withInput(); 
    }

    public function squads(Request $request)
    {
        $datapath = storage_path() . '/app/public/data';
        if (! file_exists($datapath)) {
            mkdir($datapath, 0770, false);
        }
        $datafile = $datapath . '/swgoh.help/guild/758735237/units.json';
        $units = [];
        $roster = [];
        $player_data = [];
        try {
            $data = file_get_contents($datafile);
            $units = json_decode($data, true);
            $units = $units['roster'];
            // ksort($units); // way too slow!
            foreach ($units as $unit_key => $players) {
                foreach ($players as $player_key => $player) {
                    $roster[$player['allyCode']] = $player['player']; // was id
                    $player_data[$player['allyCode']][$unit_key] = $player; // was id
                }
            }
        } catch (Exception $e) {
            //
        }

        $sync_status = [];
        if ($request->sync) {
            $client = new SyncClient();
            $sync_status = $client->sync();
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
            
            usort($result, array($this, "desc"));
        }

        return view('guild.squads', [
            'sync_status' => $sync_status, 
            'units' => $units, 
            'result' => $result, 
            'caption' => $caption, 
            'char_list' => $char_list, 
            'roster' => $roster, 
            'select_list' => $select_list
            ]
        ); //$request->all()
    }

    protected function desc($a, $b)
    {
        return $this->cmp($a, $b, true);
    }
    
    protected function cmp($a, $b, $desc = false)
    {
        $one = $a["sort_sum"];
        $two = $b["sort_sum"];
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
