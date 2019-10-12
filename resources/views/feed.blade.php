@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <h1><a href="{{ $permalink }}">{{ $title }}</a></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            @foreach ($items as $item)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                            <h2><a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h2>
                            <p class="text-muted text-small">Posted on {{ $item->get_date('j F Y | g:i a') }} by {{ $item->get_author()->get_name() ?? '-' }}</p>
                        </span>
                    </div>
                </div>

                <div class="card-body activity-body">
                    <p>{!! $item->get_description() !!}</p>
                </div>
                <div class="card-footer">
                        <p class="text-muted text-small">{{ $item->get_id() }}</p>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
