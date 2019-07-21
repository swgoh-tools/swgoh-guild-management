@extends('layouts.app')

@include('layouts.cdn._datatables')
@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('table.my-data-table');
        if (table.length) {
            table.DataTable({
            "paging": false,
            // "ordering": true,
            "info": true,
            // "order": [[10, "asc"]]
            });
        }
    })
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <main class="col-12 col-lg-9" role="main">
            <h1 class="mr-auto">{{ __('pages.targeting.title') }}</h1>
            <p class="text-left">{{ __('pages.targeting.intro') }}</p>
            <p class="text-left">{{ __('pages.targeting.description') }}</p>
            <p class="text-left">{{ __('pages.targeting.legend') }}</p>
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->
                    <table class="table table-hover my-data-table">
                        <!-- table-striped table-dark  -->

                            @forelse ($unitKeys ?? [] as $key => $value)
                                @if ($loop->first)
                                <thead>
                                    <tr>
                                        <th>{{ __('fields.nameKey') }}</th>
                                        @forelse ($value as $info_key => $info)
                                        <!-- excluded from whitelist: main, url -->
                                        @if(in_array($info_key, $filter))
                                            <th>{{ __('fields.' . $info_key) }}</th>
                                        @endif
                                        @empty
                        <!-- no entries -->
                                        @endforelse
                                        <th>{{ __('Ability') }}</th>
                                        <th>{{ __('fields.abilityType') }}</th>
                                        <th>{{ __('fields.preferredAllyTargetingRuleId') }}</th>
                                        <th>{{ __('fields.preferredEnemyTargetingRuleId') }}</th>
                                        <!-- <th>{{ __('fields.cooldownType') }}</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                @endif
                                @forelse ($value['skillReferenceList'] ?? [] as $skill_key => $skill)
@if( !($skillKeys[$skill['skillId']]['aiParams']['preferredAllyTargetingRuleId'] ?? '' ) && !($skillKeys[$skill['skillId']]['aiParams']['preferredEnemyTargetingRuleId'] ?? '' ) )
@continue
@endif
                                    <tr>
                                        <td>{{ $value['nameKey'] ?? $key }} @if($value['descKey'] ?? '')<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="{{ $value['descKey'] ?? '' }}"></i>@endif
                                        @forelse ($value as $info_key => $info)
                                            <!-- excluded from whitelist: main, url -->
                                            @if(!in_array($info_key, $filter))
                                                <!-- skip -->
                                            @elseif(is_array($info))
                                                <td>{{ implode(', ', $info) }}x </td>
                                            @else
                                                <td>{{ $info }}</td>
                                            @endif
                                            @empty
                            <!-- no entries -->
                                        @endforelse
    <td>{{ $skillKeys[$skill['skillId']]['nameKey'] ?? $skill['skillId'] }} @if($skillKeys[$skill['skillId']]['descKey'] ?? '')<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-html="true" title="{{ preg_replace($pattern, $replacement, $skillKeys[$skill['skillId']]['descKey'] ?? '' ) }}"></i>@endif
    <td> @if(false !== strpos($skill['skillId'], 'leaderskill')) L
    @elseif(false !== strpos($skill['skillId'], 'basicskill')) B
    @elseif(false !== strpos($skill['skillId'], 'uniqueskill')) U
    @elseif(false !== strpos($skill['skillId'], 'specialskill')) S
    @elseif(false !== strpos($skill['skillId'], 'hardwareskill')) RI
    @else{{ $skillKeys[$skill['skillId']]['abilityType'] ?? '' }}@endif</td>
    <td>{{ $skillKeys[$skill['skillId']]['aiParams']['preferredAllyTargetingRuleId'] ?? '' }}</td>
    <td>{{ $skillKeys[$skill['skillId']]['aiParams']['preferredEnemyTargetingRuleId'] ?? '' }}</td>
    <!-- <td>{{ $skillKeys[$skill['skillId']]['cooldownType'] ?? '' }}</td> -->
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
