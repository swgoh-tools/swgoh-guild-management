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
                @endif
                <form method="POST" action="{{ route('memos') }}/{{ $memo->id }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="page_id{{ $memo->id }}">Choose a Page:</label>
                                <select name="page_id" id="page_id{{ $memo->id }}" class="form-control" required>
                                    <option value="">Choose One...</option>

                                    @foreach ($pages as $pageoption)
                                        <option value="{{ $pageoption->id }}" {{ old('page_id', $memo->page->id) == $pageoption->id ? 'selected' : '' }}>
                                            {{ $pageoption->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title{{ $memo->id }}">Title:</label>
                                <input type="text" class="form-control" id="title{{ $memo->id }}" name="title"
                                       value="{{ old('title', $memo->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="trix{{ $memo->id }}">Content:</label>
                                <input id="trix{{ $memo->id }}" type="hidden" name="body" value="{{ old('body', $memo->body) }}" required>
                                <trix-editor ref="trix" input="trix{{ $memo->id }}" placeholder="Have something to say?"></trix-editor>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                </div>
                @endforeach
            </div>

        </main>
    </div>
</div>

@endsection

@section ('scripts')
    <script src="{{ asset('js/attachments.js') }}"></script>
@endsection
