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
            "info": true,
            "order": [[8, "asc"]]
            });
        }
    });
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <main class="col-12 col-lg-9" role="main">
            <h1 class="mr-auto">{{ __('app.events.title') }}</h1>
            <p class="text-left">{{ __('app.events.intro') }}</p>
            <p class="text-left">{{ __('app.events.description') }}</p>
            <p class="text-left">{!! __('app.events.legend') !!}</p>
            <!-- <p class="text-left">{{ __('app.datatables.click_head') }}</p> -->
                    <table class="table table-hover my-data-table">
                        <!-- table-striped table-dark  -->

                            @forelse ($list ?? [] as $key => $value)
                            @if ($loop->first)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('app.data_keys.nameKey') }}</th>
                                    <th>{{ __('app.data_keys.descKey') }}</th>
                                    <th>{{ __('app.data_keys.summaryKey') }}</th>
                                    <th>{{ __('app.data_keys.gameEventType') }}</th>
                                    <th>{{ __('app.data_keys.gameEventStatus') }}</th>
                                    <th>{{ __('app.data_keys.squadType') }}</th>
                                    <th>{{ __('app.data_keys.startTime') }}</th>
                                    <th>{{ __('app.data_keys.endTime') }}</th>
                                    <!-- <th>{{ __('app.data_keys.displayStartTime') }}</th> -->
                                    <!-- <th>{{ __('app.data_keys.displayEndTime') }}</th> -->
                                    <th>{{ __('app.data_keys.timeLimited') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @endif
                                @forelse ($value['instanceList'] as $info_key => $info)
                            <tr>
                                <td>{{ $key }}.{{ $info_key }}</td>
                                <td>{{ preg_replace(['/\[[^\]]*\]/', '/\\\\n/'], ['', ' '], $value['nameKey']) }}</td>
                                <td>{{ preg_replace(['/\[[^\]]*\]/', '/\\\\n/'], ['', ' '], $value['descKey']) }}</td>
                                <td>{{ preg_replace(['/\[[^\]]*\]/', '/\\\\n/'], ['', ' '], $value['summaryKey']) }}</td>
                                <td>{{ $value['gameEventType'] }}</td>
                                <td>{{ $value['gameEventStatus'] }}</td>
                                <td>{{ $value['squadType'] }}</td>
                                <td><span class="text-hide">{{ $info['startTime'] }}</span>{{ date('D, d M Y', intval(substr($info['startTime'], 0, 10))) }}</td>
                                <td><span class="text-hide">{{ $info['endTime'] }}</span>{{ date('D, d M Y', intval(substr($info['endTime'], 0, 10))) }}</td>
                                <!-- <td>{{ date('D, d M Y', intval(substr($info['displayStartTime'], 0, 10))) }}</td> -->
                                <!-- <td>{{ date('D, d M Y', intval(substr($info['displayEndTime'], 0, 10))) }}</td> -->
                                <td>{{ $info['timeLimited'] }}</td>
                            </tr>
                                    @empty
                    <!-- no entries -->
                                @endforelse
                            @empty
                    <!-- no entries -->
                            @endforelse
                        </tbody>
                    </table>
        </main>
    </div>
</div>

@endsection
