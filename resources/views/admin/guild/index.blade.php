@extends('admin.layouts.app')

@section('title', 'Guilds')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Guild', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_guilds')
                <a href="{{ route('admin.guilds.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Create</a>
            @endcan
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Name</th>
                <th>Code</th>
                <th>slug</th>
                <th>Created At</th>
                @can('edit_guilds', 'delete_guilds')
                <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    @can('edit_guilds')
                    <td class="text-center">
                        @include('admin.shared._actions', [
                            'entity' => 'guilds',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>

@endsection
