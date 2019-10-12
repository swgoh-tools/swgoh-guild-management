@extends('layouts.2col')

{{-- @include('layouts.cdn._datatables')
@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('table.my-data-table');
        if (table.length) {
            table.DataTable({
            "paging": false,
            "ordering": true,
            "info": true,
            "order": [[10, "asc"]]
            });
        }
    });
</script>
@endpush --}}

@section('sidebar')
<div class="d-flex">
    <!-- <h1 class="mr-auto">Guildeninfos</h1> -->
    <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse"
        data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false"
        aria-label="Toggle docs navigation">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
            <title>{{ __('Menu') }}</title>
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10"
                d="M4 7h22M4 15h22M4 23h22"></path>
        </svg>
    </button>
</div>

<nav class="collapse bd-links" id="bd-docs-nav">
    <div class="nav flex-column nav-pills" id="sw-tab" role="tablist" aria-orientation="vertical">
        @stack('sidebar-items')
        @foreach ($stats_materials as $mats_by_recipe_type_key => $mats_by_recipe_type)
        <li class="nav-item">
            <a class="nav-link" href="#{{$mats_by_recipe_type_key}}">{{ __('enums.'.$mats_by_recipe_type_key) }}</a>
        </li>
        @endforeach
    </div>
</nav>
@endsection

@section('content')
<div class="container-fluid" role="main">

        <div class="row justify-content-center">
                <div class="col">
                @include('layouts.comp._nav', ['comp_nav' => [
                    [route('ability_mats'), __('Dashboard')],
                    [route('ability_mats') . '/tiers', __('fields.tiers')],
                    [route('ability_mats') . '/stars', __('fields.stars')],
                    [route('ability_mats') . '/gear', __('fields.gear')],
                    [route('ability_mats') . '/levels', __('fields.levels')],
                    [route('ability_mats') . '/relics', __('fields.relics')],
                    [route('ability_mats') . '/recipes', __('fields.recipes') . ' ('.__('Base Data').')'],
                ]])
            </div>
        </div>

        <div class="row justify-content-center">
        <div class="col">
            <h1 class="mr-auto">{{ __('pages.ability_mats.title') }}@if($request_type) - {{ __('fields.'.$request_type) }}@endif</h1>
            <p class="text-left">{!! __('pages.ability_mats.intro') !!}</p>
            <p class="text-left">{!! __('pages.ability_mats.description') !!}</p>
            <p class="text-left">{!! __('pages.ability_mats.legend') !!}</p>
            @if($request_type)<p class="text-left text-muted">{!! __('pages.ability_mats.description_'.$request_type) !!}</p>@endif
        </div>
    </div>

    @foreach ($stats_materials as $mats_by_recipe_type_key => $mats_by_recipe_type)
    <div class="row justify-content-center">
        <div class="col mt-4">
            <span class="anchor" id="{{$mats_by_recipe_type_key}}"></span>
            <h2 class="alert alert-dark">{{ __('enums.'.$mats_by_recipe_type_key) }}</h2>
            @if(count($mats_by_recipe_type) >1)
            <ul class="nav nav-tabs justify-content-center" id="{{$mats_by_recipe_type_key}}Tab" role="tablist">
                @foreach ($mats_by_recipe_type as $mats_by_skill_type_key => $mats_by_skill_type)
                @php
                $nav_tab_key = $mats_by_recipe_type_key . $mats_by_skill_type_key;
                @endphp
                <li class="nav-item">
                    <a class="nav-link @if ($loop->first)active @endif" id="{{$nav_tab_key}}-tab" data-toggle="tab"
                        href="#{{$nav_tab_key}}" role="tab"
                        aria-controls="{{$nav_tab_key}}">{{ __($mats_by_skill_type_key) }}</a>
                </li>
                @endforeach
            </ul>
            @endif

            <div class="tab-content" id="{{$mats_by_recipe_type_key}}TabContent">

                @foreach ($mats_by_recipe_type as $mats_by_skill_type_key => $mats_by_skill_type)
                @php
                $nav_tab_key = $mats_by_recipe_type_key . $mats_by_skill_type_key;
                if ($stats_materials_columns[$mats_by_recipe_type_key][$mats_by_skill_type_key] ?? false) {
                    ksort($stats_materials_columns[$mats_by_recipe_type_key][$mats_by_skill_type_key]);
                }
                @endphp
                <div class="tab-pane fade @if ($loop->first)show active @endif" id="{{$nav_tab_key}}" role="tabpanel"
                    aria-labelledby="{{$nav_tab_key}}-tab">
                    {{-- <h3 class="mr-auto">{{ __($mats_by_recipe_type_key) }} - {{ __($mats_by_skill_type_key) }}</h3> --}}
                    <table class="table table-hover my-data-table">
                        <!-- table-striped table-dark  -->
                        @foreach ($mats_by_skill_type as $material_key => $material)
                        @if ($loop->first)
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                @if (count($stats_materials_columns[$mats_by_recipe_type_key][$mats_by_skill_type_key] ?? []) <= 3)
                                <th>{{ __('fields.nameKey') }}</th>
                                <th>{{ __('fields.descKey') }}</th>
                                @endif
                                <th>{{ __('fields.count') }}</th>
                                <th>{{ __('fields.quantity') }}</th>
                                @foreach ($stats_materials_columns[$mats_by_recipe_type_key][$mats_by_skill_type_key] ?? [] as $info_key => $info)
                                <!-- excluded from whitelist: main, url -->
                                @if(true || in_array($info_key, ['name', 'note', 'team']))
                            <th>{{ __($info_key) }}@if($type_icon) {!! $type_icon !!}@endif</th>
                                @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @endif

                            <tr>
                                <td>@include('layouts.img._mat-icon', ['mi_material' => $materials[$material_key] ?? '',
                                    'mi_alt' => $material_key])</td>
                                @if (count($stats_materials_columns[$mats_by_recipe_type_key][$mats_by_skill_type_key] ?? []) <= 3)
                                <td>{{$materials[$material_key]['nameKey'] ?? '-'}}</td>
                                <td>{{$materials[$material_key]['descKey'] ?? '-'}}</td>
                                @endif
                                <td class="text-right">@if(is_numeric($material['count'] ?? 'no')) {{ number_format($material['count']) }} @else {{ $material['count'] ?? '' }} @endif</td>
                                <td class="text-right">@if(is_numeric($material['quantity'] ?? 'no')) {{ number_format($material['quantity']) }} @else {{ $material['quantity'] ?? '' }} @endif</td>
                                @foreach ($stats_materials_columns[$mats_by_recipe_type_key][$mats_by_skill_type_key] ?? []  as $column => $column_value)
                                <td class="text-right">@if(is_numeric($material[$column] ?? 'no')) {{ number_format($material[$column]) }} @else {{ $material[$column] ?? '' }} @endif</td>
                                @endforeach
                            </tr>

                            @if ($loop->last)
                        </tbody>
                        @endif

                        @endforeach
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- <div class="row">
        <div class="col">
            <table class="table table-hover my-data-table">
                <!-- table-striped table-dark  -->
                @foreach ($stats_recipes as $material_key => $material)
                @if ($loop->first)
                <thead>
                    <tr>
                        <th>#</th>
                        @foreach ($material as $temp)
                        @forelse ($temp as $info_key => $info)
                        <!-- excluded from whitelist: main, url -->
                        @if(true || in_array($info_key, ['name', 'note', 'team']))
                        <th>{{ __('fields.' . $info_key) }}</th>
@endif
@empty
<!-- no entries -->
@endforelse
@endforeach
</tr>
</thead>
<tbody>
    @endif

    <tr>
        <td>{{ $material_key }}</td>
        @foreach ($material as $temp)
        @foreach ($temp as $entry)
        <td class="text-right">{{number_format($entry)}}</td>
        @endforeach
        @endforeach
    </tr>

    @if ($loop->last)
</tbody>
@endif

@endforeach
</table>
</div>
</div> --}}
</div>

@endsection
