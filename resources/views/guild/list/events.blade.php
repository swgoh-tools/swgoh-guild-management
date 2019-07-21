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
            "order": [[4, "asc"]]
            });
        }
    });
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <main class="col-12 col-lg-9" role="main">
            <h1 class="mr-auto">{{ __('pages.events.title') }}</h1>
            <p class="text-left">{{ __('pages.events.intro') }}</p>
            <p class="text-left">{{ __('pages.events.description') }}</p>
            <p class="text-left">{!! __('pages.events.legend') !!}</p>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
                    <table class="table table-hover my-data-table">
                        <!-- table-striped table-dark  -->

                            @forelse ($list ?? [] as $key => $value)
                            @if ($loop->first)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('fields.nameKey') }}</th>
                                    <!-- <th>{{ __('fields.descKey') }}</th> -->
                                    <th>{{ __('fields.summaryKey') }}</th>
                                    <!-- <th>{{ __('fields.gameEventType') }}</th> -->
                                    <!-- <th>{{ __('fields.gameEventStatus') }}</th> -->
                                    <!-- <th>{{ __('fields.squadType') }}</th> -->
                                    <th>{{ __('fields.startTime') }}</th>
                                    <th>{{ __('fields.endTime') }}</th>
                                    <!-- <th>{{ __('fields.displayStartTime') }}</th> -->
                                    <!-- <th>{{ __('fields.displayEndTime') }}</th> -->
                                    <!-- <th>{{ __('fields.timeLimited') }}</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            @endif
                                @forelse ($value['instanceList'] as $info_key => $info)
                                @if($info['timeLimited'] && !in_array($value['gameEventType'], ['MODS']) && !in_array($value['squadType'], ['SQUADEVENT01', 'SQUADEVENT02', 'SQUADEVENT03', 'SQUADEVENT04', 'SQUADEVENT05', 'SQUADEVENT06', 'SQUADEVENT07', 'SQUADEVENT08', 'SQUADEVENT09']))
                            <tr>
                                <td>{{ $key }}.{{ $info_key }}</td>
                                <td>{{ preg_replace(['/\[[^\]]*\]/', '/\\\\n/'], ['', ' '], $value['nameKey']) }}</td>
                                <td>{{ preg_replace(['/\[[^\]]*\]/', '/\\\\n/'], ['', ' '], $value['descKey']) }}<br />
                                <em>{{ preg_replace(['/\[[^\]]*\]/', '/\\\\n/'], ['', ' '], $value['summaryKey']) }}</em></td>
                                <!-- <td>{{ $value['gameEventType'] }}</td> -->
                                <!-- <td>{{ $value['gameEventStatus'] }}</td> -->
                                <!-- <td>{{ $value['squadType'] }}</td> -->
                                <td><span class="text-hide">{{ $info['startTime'] }}</span>{{ date('D, d M Y', intval(substr($info['startTime'], 0, 10))) }}</td>
                                <td><span class="text-hide">{{ $info['endTime'] }}</span>{{ date('D, d M Y', intval(substr($info['endTime'], 0, 10))) }}</td>
                                <!-- <td>{{ date('D, d M Y', intval(substr($info['displayStartTime'], 0, 10))) }}</td> -->
                                <!-- <td>{{ date('D, d M Y', intval(substr($info['displayEndTime'], 0, 10))) }}</td> -->
                                <!-- <td>{{ $info['timeLimited'] }}</td> -->
                            </tr>
                                @endif
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
