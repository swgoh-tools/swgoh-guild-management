@php
$comp_nav_centered = $comp_nav_centered ?? true;
$comp_nav_sep_auto = $comp_nav_sep_auto ?? true;
$comp_nav_sep = $comp_nav_separator ?? $comp_nav_sep ?? '|';
$comp_nav_sep_list = $comp_nav_seplist ?? [
'E' => '<i class="fa fa-empire"></i>',
'R' => '<i class="fa fa-resistance"></i>',
];
$comp_nav = $comp_nav ?? [
['#', __('Dummy')],
['#', __('Dummy')],
];
@endphp
@if($comp_nav_centered)<div class="text-center">@endif
    <div class="alert alert-info" role="alert">
        @foreach ($comp_nav as $item)
        @switch(true)
        @case(!$item)
        {{$comp_nav_sep}}
        @break
        @case(is_array($item))
        <a href="{{ $item[0] ?? '#' }}">{{ $item[1] ?? '-' }}</a>
        @break
        @default
        {{ $comp_nav_sep_list[$item] ?? $item }}
        @endswitch
        @if (!$loop->last && $comp_nav_sep_auto)
        {{$comp_nav_sep}}
        @endif
        @endforeach

    </div>
    @if($comp_nav_centered)</div>@endif
