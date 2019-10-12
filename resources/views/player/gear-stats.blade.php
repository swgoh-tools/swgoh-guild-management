@extends('layouts.app')

@include('layouts.css._gear')
@include('layouts.cdn._datatables')

@push('scripts')
<script>
    var asInitVals = new Array();
    $(document).ready(function () {
        var table = $('table.player-gear-stats-table');
        if (table.length) {
            var oTable = table.DataTable({
            "paging": false,
            "ordering": true,
            "info": true,
            "order": [[6, "desc"]],
            "oLanguage": {
            "sSearch": "Search all columns:"
            }
            });

            $("tfoot input").keyup( function () {
        /* Filter on the column (the index) of this element */
        // oTable.fnFilter( this.value, $("tfoot input").index(this) );
        oTable.column( $("tfoot input").index(this) ).search(this.value).draw();
    } );

        /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
     * the footer
     */
     $("tfoot input").each( function (i) {
        asInitVals[i] = this.value;
    } );

    $("tfoot input").focus( function () {
        if ( this.className == "search_init" )
        {
            this.className = "";
            this.value = "";
        }
    } );

    $("tfoot input").blur( function (i) {
        if ( this.value == "" )
        {
            this.className = "search_init";
            this.value = asInitVals[$("tfoot input").index(this)];
        }
    } );

        }
    });
</script>
@endpush


@section('content')
@include('player.home._nav')
<!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->


<div class="card mb-2">
    <h5 class="card-header">{{ __('Gear Stats') }}</h5>
    <div class="card-body">
        <table>
            <tfoot>
                <tr>
                    <th><input type="text" name="search_id" value="Search {{ __('Id') }}" class="search_init"></th>
                    <th><input type="text" name="search_name" value="Search {{ __('Name') }}" class="search_init"></th>
                    <th><input type="text" name="search_mark" value="Search {{ __('Mark') }}" class="search_init"></th>
                    <th><input type="text" name="search_tier" value="Search {{ __('Tier') }}" class="search_init"></th>
                    <th><input type="text" name="search_required_level" value="Search {{ __('Lvl') }}+"
                            class="search_init"></th>
                    <th><input type="text" name="search_cost" value="Search {{ __('Cost') }}" class="search_init"></th>
                </tr>
            </tfoot>
        </table>

        <p>
            <strong>{{ __('total') }}</strong> <em>{{ __('app.legend.gear_total') }}</em>
            <strong>{{ __('done') }}</strong> <em>{{ __('app.legend.gear_done') }}</em>
            <strong>{{ __('todo') }}</strong> <em>{{ __('app.legend.gear_todo') }}</em>
            <strong>{{ __('now') }}</strong> <em>{{ __('app.legend.gear_now') }}</em>
            <strong>{{ __('next') }}</strong> <em>{{ __('app.legend.gear_next') }}</em>
            <strong>{{ __('Tier') }}</strong> <em>{{ __('app.legend.gear_tier') }}</em>
            <strong>{{ __('Lvl') }}</strong> <em>{{ __('app.legend.gear_lvl') }}</em>
            <strong>{{ __('Cost') }}</strong> <em>{{ __('app.legend.gear_cost') }}</em>
        </p>

        <table class="table table-sm table-hover table-responsive player-gear-stats-table">
            <thead>
                <tr>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Mark') }}</th>
                    <th>{{ __('Tier') }}</th>
                    <th>{{ __('Lvl') }}+</th>
                    <th>{{ __('Cost') }}</th>
                    @foreach($columns as $column)
                    <th>{{ __($column) }}</th>
                    @endforeach
                    <th>{{ __('Progress') }}</th>
                    <th>{{ __('Ingredients') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gear_stats as $stat_key => $stat)
                <tr>
                    @if (isset($gear[$stat_key]))
                    <td>@include('layouts.img._gear-icon-small', ['gi_gear' => $gear[$stat_key]])</td>
                    <td>{{ $gear[$stat_key]['name'] }} <a
                            href="{{ route('player.gear', $player) }}?g={{ $stat_key }}"> <i
                                class="fa fa-binoculars"></i></a></td>
                    <td>{{ $gear[$stat_key]['mark'] }}</td>
                    <td>{{ $gear[$stat_key]['tier'] }}</td>
                    <td>{{ $gear[$stat_key]['required_level'] }}</td>
                    <td>{{ $gear[$stat_key]['cost'] }}</td>
                    @else
                    <td></td>
                    <td>{{ $stat_key }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif

                    @foreach($columns as $column)
                    @if (isset($stat[$column]))
                    <td @switch($column) @case('done') class="btn-outline-success"
                        {{-- class="btn-success disabled" --}} @break @case('now') class="btn-outline-primary"
                        {{-- class="btn-info disabled" --}} @break @case('next') class="btn-outline-secondary"
                        {{-- class="btn-warning disabled" --}} @break @case('todo') class="btn-outline-danger"
                        {{-- class="btn-danger disabled" --}} @break @case('total') class="btn-outline-dark" @break
                        @endswitch>{{$stat[$column][0]}}</td>
                    @else
                    <td>-</td>
                    @endif
                    @endforeach

                    <td>@include('layouts.comp._progress', ['prog_max' => $stat['total'][0] ?? 0, 'prog_now' =>
                        [$stat['done'][0] ?? 0 , $stat['now'][0] ?? 0 , $stat['next'][0] ?? 0], 'prog_class' =>
                        ['bg-success', 'bg-info', 'bg-warning']])</td>

                    @if (isset($gear[$stat_key]))
                    <td>
                        @foreach($gear[$stat_key]['mat_list'] ?? [] as $mat_id => $mat_amount)
                        @if ($mat_id == $stat_key && $mat_amount == 1)
                        -
                        @else
                        @include('layouts.img._gear-icon-micro', ['gi_gear' => $gear[$mat_id], 'gi_amount' =>
                        $mat_amount . 'x'])
                        @endif
                        @endforeach
                    </td>
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
