@extends('layouts.app')

@section ('head')
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Create a New Page</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pages') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="guild_id">Choose a Guild:</label>
                                <select name="guild_id" id="guild_id" class="form-control" required>
                                    <option value="">Choose One...</option>

                                    @foreach ($guilds as $guild)
                                        <option value="{{ $guild->id }}" {{ old('guild_id') == $guild->id ? 'selected' : '' }}>
                                            {{ $guild->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <!-- <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug') }}" required>
                            </div> -->

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
                </div>
            </div>
        </div>
    </div>
@endsection
