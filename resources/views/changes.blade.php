@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Changes') }}</div>

                <div class="card-body">
                        {{ $changes }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
