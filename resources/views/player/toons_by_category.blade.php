@extends('layouts.app')

@include('layouts.css._gear')

@section('content')
<div class="container">
    @include('player.home._nav', ['nav_title' => __('pages.p_toons_category.title')])
    <div class="row">
        <div class="col">
            <p class="text-left">{{ __('pages.p_toons_category.intro') }}</p>
            <p class="text-left">{{ __('pages.p_toons_category.description') }}</p>
            <p class="text-left text-muted">{{ __('pages.p_toons_category.legend') }}</p>
            {{-- <p class="text-left">{{ __('app.howto.click_head') }}</p> --}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs justify-content-center" id="categoryTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="dark-tab" data-toggle="tab" href="#dark" role="tab"
                        aria-controls="dark">{{ __('Dark') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="light-tab" data-toggle="tab" href="#light" role="tab"
                        aria-controls="light">{{ __('Light') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mixed-tab" data-toggle="tab" href="#mixed" role="tab"
                        aria-controls="mixed">{{ __('Mixed') }}</a>
                </li>
            </ul>
        </div>
    </div>
    @php
    $char_count = 0;
    $card_colour = 'dark';
    @endphp
    <div class="tab-content" id="categoryTabContent">
        <div class="tab-pane fade" id="mixed" role="tabpanel" aria-labelledby="mixed-tab">
            @foreach($roster ?? [] as $categoryKey => $category)
            @if('profession_sith' == $categoryKey)
        </div>
        <div class="tab-pane fade show active" id="dark" role="tabpanel" aria-labelledby="dark-tab">
            @php
            $card_colour = 'danger';
            @endphp
            @endif
            @if('profession_jedi' == $categoryKey)
        </div>
        <div class="tab-pane fade" id="light" role="tabpanel" aria-labelledby="light-tab">
                @php
                $card_colour = 'info';
                @endphp
                    @endif
        <div class="card border-{{$card_colour}} mb-2">
                <h2 class="card-header text-white bg-{{$card_colour}}">
                    {{ __('enums.' . $categoryKey) }}&nbsp;
                </h2>
                <div class="card-body">


                    {{-- Manually add gp column as second to make sure it is available for sorting with datatables --}}
                    {{-- <td> --}}
                    @foreach($category as $key => $unit)
                    @if ('CHARACTER' != ($unit['combatType'] ?? null))
                    @php
                    continue;
                    @endphp
                    @endif

                    @php
                    $char_count++;
                    @endphp

                    @foreach($unit as $stat_key => $stat)
                    @switch($stat_key)
                    @case('defId')

                    @include('layouts.img._unit-icon-small', ['ui_unit' => $chars[$stat] ?? '', 'ui_stats'
                    => $unit ?? '',
                    'ui_show_stats' => true, 'ui_highlight' => !(!$categoryKey || in_array($categoryKey,
                    $unit['categoryIdList']
                    ??
                    []))])

                    @break

                    @case('mods')

                    {{-- <td> --}}
                    {{-- @for ($i = 0; $i < 6; $i++) @if ($stat[$i] ?? null) @include('layouts.img._mod-icon-small', ['mi_mod'=>
            $stat[$i]])
            @else
            @include('layouts.img._mod-icon-small', ['mi_mod' => ['slot' => $i]])
            @endif
            @endfor --}}
                    {{-- </td> --}}
                    @break



                    @default
                    <!-- {{ $stat_key }} skipped -->
                    @endswitch

                    @endforeach
                    @endforeach
                </div>
            </div>
            {{-- </td> --}}
            {{-- </tr> --}}
            @endforeach
        </div>
    </div>

</div>
@endsection
