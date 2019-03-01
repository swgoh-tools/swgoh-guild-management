@extends('layouts.app')




@section('content')
<div class="container">
        @include('player.home._nav')
    <div class="row justify-content-center">
        <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
        @include('player.home._start')
    </div>
</div>
@endsection
