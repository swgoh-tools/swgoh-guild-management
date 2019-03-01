@extends('layouts.app')

@include('layouts.cdn._datatables')
@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('table.my-data-table');
        if (table.length) {
            table.DataTable({
            "paging": false,
            "ordering": true,
            "info": true
            });
        }
    });
</script>
@endpush

@section('content')
<div class="container">
    <h3 class="page-title">@lang('Sanctions')</h3>
	@can('create', App\Sanction::class)
    <p>
        <a href="{{ route('sanction.create', [$guild, $code]) }}" class="btn btn-success">@lang('Add new')</a>
    </p>
	@endcan
    <div class="card">
        <div class="card-header">
            @lang('List') - {{ $guild->name }} - {{ $code }} aka {{ $player->name ?? '?'}}
        </div>

        <div class="card-body table-responsive">
            <table class="table table-sm table-bordered table-striped my-data-table dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('guild')</th>
                        <th>@lang('user')</th>
                        <th>@lang('origin')</th>
                        <th>@lang('severity')</th>
                        <th>@lang('reason')</th>
                        <th>@lang('action')</th>
                        <!-- <th>@lang('note')</th> -->
                        <th>@lang('date')</th>
                        <th>@lang('expired')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>

                <tbody>
                    @if ( $player && $player->sanctions() && $player->sanctions()->count() > 0)
                        @foreach ($player->sanctions()->latest()->get() as $sanction)
                            <tr data-entry-id="{{ $sanction->id }}">
                                <td></td>

                                <td>{{ $sanction->guild->name }}</td>
                                <td>{{ $sanction->user->name }}</td>
                                <td>{{ $origins[$sanction->origin] ?? $sanction->origin }}</td>
                                <td>{{ $severities[$sanction->severity] ?? $sanction->severity }}</td>
                                <td>{{ $sanction->reason }}</td>
                                <td>{{ $actions[$sanction->action] ?? $sanction->action }}</td>
                                <!-- <td>{{ $sanction->note }}</td> -->
                                <td>{{ $sanction->date->diffForHumans() }}</td>
                                <td>{{ $sanction->expired }}</td>
                                <td>
								@can('update', $sanction)
                                    <a href="{{ route('sanction.edit', [$guild, $code, $sanction->id]) }}" class="btn btn-xs btn-info">@lang('Edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['sanction.destroy', $guild, $code, $sanction->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
								@endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('No entries')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
{{--    <script>
        window.route_mass_crud_entries_destroy = '{{ route('sanction.mass_destroy') }}';
    </script>
--}}
</div>
@endsection
