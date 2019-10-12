@extends('layouts.2col')

@php
    $lang_prefix = '';
@endphp
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
        {{-- @stack('sidebar-items') --}}
        @foreach ($data_list as $item_key => $item)
        <li class="nav-item">
            <a class="nav-link" href="#{{$item_key}}">{{ __($lang_prefix.$item_key) }}</a>
        </li>
        @endforeach
    </div>
</nav>
@endsection

@section('content')
<div class="container-fluid" role="main">

    {{-- <div class="row justify-content-center">
                <div class="col">
                @include('layouts.comp._nav', ['comp_nav' => [
                    [route('ability_mats'), __('Dashboard')],
                    [route('ability_mats') . '/tiers', __('fields.tiers')],
                    [route('ability_mats') . '/stars', __('fields.stars')],
                    [route('ability_mats') . '/gear', __('fields.gear')],
                    [route('ability_mats') . '/levels', __('fields.levels')],
                    [route('ability_mats') . '/relics', __('fields.relics')],
                ]])
            </div>
        </div> --}}

    <div class="row justify-content-center">
        <div class="col">
            <h1 class="mr-auto">{{ __('pages.'.$data_key.'.title') }}</h1>
            <p class="text-left">{!! __('pages.'.$data_key.'.intro') !!}</p>
            <p class="text-left">{!! __('pages.'.$data_key.'.description') !!}</p>
            <p class="text-left">{!! __('pages.'.$data_key.'.legend') !!}</p>
        </div>
    </div>

    @foreach ($data_list as $item_key => $item)
    <div class="row justify-content-center">
        <div class="col mt-4">
            <span class="anchor" id="{{$item_key}}"></span>
            <h2 class="alert alert-dark">{{ __($lang_prefix.$item_key) }}</h2>
            {{-- @if(count($item) >1)
            <ul class="nav nav-tabs justify-content-center" id="{{$item_key}}Tab" role="tablist">
                @foreach ($item['rowList'] as $field_key => $field)
                @php
                $nav_tab_key = $item_key . $field_key;
                @endphp
                <li class="nav-item">
                    <a class="nav-link @if ($loop->first)active @endif" id="{{$nav_tab_key}}-tab" data-toggle="tab"
                        href="#{{$nav_tab_key}}" role="tab" aria-controls="{{$nav_tab_key}}">{{ __($field_key) }}</a>
                </li>
                @endforeach
            </ul>
            @endif --}}

            <div class="tab-content" id="{{$item_key}}TabContent">

                @foreach ($item as $field_key => $field)
                @if('rowList' <> $field_key)
                {{-- <div>skip {{ $field_key }}</div> --}}
                @continue
                @else
                {{-- <div>process {{ $field_key }}</div> --}}
                @endif
                @php
                $nav_tab_key = $item_key . $field_key;
                @endphp
                {{-- <div class="tab-pane fade @if ($loop->first)show active @endif" id="{{$nav_tab_key}}" role="tabpanel"
                    aria-labelledby="{{$nav_tab_key}}-tab"> --}}
                    {{-- <h3 class="mr-auto">{{ __($item_key) }} - {{ __($field_key) }}</h3> --}}
                    @if(!is_array($field))
                    {{ $field }}
                    @else
                    <table class="table table-hover my-data-table">
                        <!-- table-striped table-dark  -->
                        {{-- <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>sadf</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> --}}
                                @foreach ($field as $material_key => $material)
                                @if ($loop->first)
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        @if(!is_array($material))
                                        <th>{{$material}}</th>
                                        @else
                                        @foreach ($material as $info_key => $info)
                                        <!-- excluded from whitelist: main, url -->
                                        @if(true || in_array($info_key, ['name', 'note', 'team']))
                                    <th>{{ __($info_key) }}</th>
                                        @endif
                                        @endforeach
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @endif

                                    <tr>
                                        <td>{{$material_key}}</td>
                                        @foreach ($material as $column => $column_value)
                                        <td class="text-right">@if(is_numeric($column_value ?? 'no')) {{ number_format($column_value) }} @else {{ $column_value }} @endif</td>
                                        @endforeach
                                    </tr>

                                    @if ($loop->last)
                                </tbody>
                                @endif


                                {{-- <td>{{$material_key}}</td>
                                @if(!is_array($material))
                                <td>{{$material}}</td>
                                @else
                                <td>
                                @foreach ($material as $detail_key => $detail)
                                {{$detail_key}}: {{$detail}}
                                @endforeach
                                </td>
                                @endif --}}
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    @endif
                {{-- </div> --}}
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
