@include('layouts.comp._nav', [
    'comp_nav' => [
        [route('player.home', $info['allyCode']),  __('Player') .' '. __('Dashboard') ],
        'R',
        [route('player.stats', $info['allyCode']),  __('Team Check') ],
        [route('player.stats.full', $info['allyCode']),  __('Team Check') .' ('. __('detailed') .')' ],
        'E',
        [route('player.gear', $info['allyCode']),  __('Gear Check') ],
        [route('player.stats.gear', $info['allyCode']),  __('Gear Stats') ],
        [route('player.stats.salvage', $info['allyCode']),  __('Salvage Stats') ],
        'R',
        [route('player.toons_by_category', $info['allyCode']),  __('Toons') .' ('. __('Categories') .')' ],
        [route('player.toons', $info['allyCode']),  __('Toons') .' ('. __('Big Data!') .')' ],
        [route('player.roster', $info['allyCode']),  __('Roster') ],

    ]
])
    <h1 class="text-center">{{ $info['name'] }}@if($nav_title ?? false) - {{$nav_title}}@endif</h1>
