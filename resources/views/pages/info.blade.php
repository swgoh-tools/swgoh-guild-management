@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Guild-Created Content') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>{{ __('app.introduction.guilds') }}</p>
                    <p>{{ __('app.introduction.pages') }}</p>
                </div>
                <div class="card-footer">
                    <p>{{ __('Own content created by this guild so far:') }}</p>
                    <div>@forelse($pages ?? [] as $page) <a class="link-item mr-3" href="{{ $page->path() }}">{{ $page->title }}</a> @empty {{ __('None') }} @endforelse</div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">{{ __('Auto-Created Content') }}</div>

                <div class="card-body">
                    <p>{{ __('app.introduction.tools') }}</p>
                </div>
                <div class="card-footer">
                    <div>{{ __('May the force be with you.') }}</div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
