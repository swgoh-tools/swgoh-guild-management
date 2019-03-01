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
            "order": [[10, "asc"]]
            });
        }
    });
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <main class="col-12 col-lg-9" role="main">
            <h1 class="mr-auto">{{ __('app.zetas.title') }}</h1>
            <p class="text-left">{{ __('app.zetas.intro') }}</p>
            <p class="text-left">{{ __('app.zetas.description') }}</p>
            <p class="text-left">{{ __('app.zetas.legend') }}</p>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
                    <table class="table table-hover my-data-table">
                        <!-- table-striped table-dark  -->

                            @forelse ($list ?? [] as $key => $value)
                            @if ($loop->first)
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @forelse ($value as $info_key => $info)
                                    <!-- excluded from whitelist: main, url -->
                                    @if(true || in_array($info_key, ['name', 'note', 'team']))
                                        <th>{{ __('fields.' . $info_key) }}</th>
                                    @endif
                                    @empty
                    <!-- no entries -->
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                            @endif
                            <tr>
                                <td>{{ $key }}</td>
                                @forelse ($value as $info_key => $info)
                                    <!-- excluded from whitelist: main, url -->
                                    @if(false && !in_array($info_key, ['name', 'note', 'team']))
                                        <!-- skip -->
                                    @elseif(is_array($info))
                                        <td>{{ implode(', ', $info) }}x </td>
                                    @else
                                        <td>{{ $info }}</td>
                                    @endif
                                    @empty
                    <!-- no entries -->
                                @endforelse
                            </tr>
                            @empty
                    <!-- no entries -->
                            @endforelse
                        </tbody>
                    </table>
        </main>
    </div>
</div>

@endsection
