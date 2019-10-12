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

@foreach($info['roster'] ?? [] as $key => $unit)
    @include('layouts._item', ['inc' => 'player.home._unit', 'title' => $unit['nameKey'] ?? $key])
@endforeach

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
        @stack('sidebar-items')
    </div>
</nav>
@endsection

@section('content')
            @include('player.home._nav')
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
            <div class="tab-content" id="toonTabsContent">
                @stack('content-items')
            </div>
@endsection
