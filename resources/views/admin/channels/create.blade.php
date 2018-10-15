@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Create a New Channel') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('channels') }}">
                            @csrf


                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <!-- <div class="form-group">
                                <label for="slug">{{ __('Slug') }}:</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug') }}" required>
                            </div> -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Publish') }}</button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
