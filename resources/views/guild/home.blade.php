@extends('layouts.2col')

@include('layouts.cdn._datatables')
@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('table.guild-home-table');
        if (table.length) {
            table.DataTable({
            "paging": false,
            "ordering": true,
            "info": false,
            "order": [[2, "desc"]]
            });
        }
    });
</script>
@endpush

@include('layouts._item', ['key' => 'guild.home._member-status', 'title' => __('Member Status')])
{{-- @include('layouts._item', ['key' => 'guild.home._member1', 'title' => __('Member Stats 1')]) --}}
{{-- @include('layouts._item', ['key' => 'guild.home._member2', 'title' => __('Member Stats 2')]) --}}
{{-- @foreach(array_chunk($members[0]['stats'] ?? [], 5) as $stats))
    @php($min_iteration = $loop->index * 5 + 1)
    @php($max_iteration = $loop->iteration * 5)
    @include('layouts._item', ['inc' => 'guild.home._member-stats', 'key' => 'guild.home._member-stats-' . $loop->iteration, 'title' => __('Member Stats') . $loop->iteration])
@endforeach --}}
@include('layouts._item', ['inc' => 'guild.home._member-stats', 'key' => 'guild.home._member-stats-1', 'title' => __('Member Stats') . '1', 'min_iteration' => 1, 'max_iteration' => 5])
@include('layouts._item', ['inc' => 'guild.home._member-stats', 'key' => 'guild.home._member-stats-2', 'title' => __('Member Stats') . '2', 'min_iteration' => 6, 'max_iteration' => 12])
@include('layouts._item', ['inc' => 'guild.home._member-stats', 'key' => 'guild.home._member-stats-3', 'title' => __('Member Stats') . 'GAC 1', 'min_iteration' => 13, 'max_iteration' => 17])
@include('layouts._item', ['inc' => 'guild.home._member-stats', 'key' => 'guild.home._member-stats-4', 'title' => __('Member Stats') . 'GAC 2', 'min_iteration' => 18, 'max_iteration' => 99])


@section('sidebar')
<div class="d-flex">
    <!-- <h1 class="mr-auto">Guildeninfos</h1> -->
    <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse"
        data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
            <title>{{ __('Menu') }}</title>
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
        </svg>
    </button>
</div>

<nav class="collapse bd-links" id="bd-docs-nav">
    <div class="nav flex-column nav-pills" id="sw-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="{{ $key ?? 'first' }}-tab" data-toggle="pill" href="#{{ $key ?? 'first' }}" role="tab"
            aria-controls="{{ $key ?? 'first' }}" aria-selected="true">{{ __('Overview') }}</a>
        @stack('sidebar-items')
    </div>
</nav>
@endsection

@section('content')
            <div class="text-center">
            <img height="75px" src="//swgoh.gg/static/img/assets/tex.{{ $info['bannerLogo'] ?? 'default' }}.png" alt="{{ $info['bannerLogo'] ?? '-' }}" />
            <h1 class="mr-auto">{{ $info['name'] ?? '-' }}</h1>
            </div>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
            <div class="tab-content" id="toonTabsContent">
                <div class="tab-pane fade active show" id="{{ $key ?? 'first' }}" role="tabpanel" aria-labelledby="{{ $key ?? 'first' }}-tab">
                @include('guild.home._start')
                </div>
                @stack('content-items')
            </div>
@endsection
