@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
            <div class="d-flex">
                <h1 class="mr-auto">{{ $page->title }}</h1>
                <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
                        <title>Menu</title>
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                    </svg>
                </button>
            </div>

            <nav class="collapse bd-links" id="bd-docs-nav">
                <div class="nav flex-column nav-pills" id="sw-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($page->memos as $memo)
                    @if ($loop->first)
                    <a class="nav-link active" id="sw-{{ $memo->slug }}-tab" data-toggle="pill" href="#sw-{{ $memo->slug }}" role="tab" aria-controls="sw-{{ $memo->slug }}" aria-selected="true">
                    {{ $memo->title }}</a>
                    @else
                    <a class="nav-link" id="sw-{{ $memo->slug }}-tab" data-toggle="pill" href="#sw-{{ $memo->slug }}" role="tab" aria-controls="sw-{{ $memo->slug }}" aria-selected="false">
                    {{ $memo->title }}</a>
                    @endif
                    @endforeach
                </div>
            </nav>
        </div>

        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">

            <memo-edit></memo-edit>

            <div class="tab-content" id="sw-tabContent">
                @foreach ($page->memos as $memo)
                @if ($loop->first)
                <div class="tab-pane fade show active" id="sw-{{ $memo->slug }}" role="tabpanel" aria-labelledby="sw-{{ $memo->slug }}-tab">
                @else
                <div class="tab-pane fade" id="sw-{{ $memo->slug }}" role="tabpanel" aria-labelledby="sw-{{ $memo->slug }}-tab">
                {{ $memo->title }}</a>
                @endif
                <h2>{{ $memo->title }}</h2>
                {!! $memo->body !!}
                </div>
                @endforeach
            </div>

        </main>
    </div>
</div>

@endsection