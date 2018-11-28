@extends('layouts.app')

@if(! ($verbose ?? false))
@push('styles')
<style>
.stats-check-ok, .stats-check-ignore {
    display: none !important;
}
</style>
@endpush
@endif

{{--
<i class="fa fa-ban"></i><i class="fa fa-check"></i><i class="fa fa-bolt"></i><i class="fa fa-exclamation"></i><i class="fa fa-question"></i><i class="fa fa-times"></i>
<i class="fa fa-info"></i><i class="fa fa-lock"></i><i class="fa fa-minus"></i><i class="fa fa-plus"></i>
--}}

@section('content')
        @include('player.home._nav')
            <!-- <p class="text-left">{{ __('app.howto.click_head') }}</p> -->

<div class="card mb-2">
    <h5 class="card-header">{{ __('Arena') }} - {{ __('Team Check') }} - Aktueller Rang: {{ $info['arena']['char']['rank'] ?? '-' }}</h5>
    <div class="card-body">
        <table class="table table-hover table-responsive">
        <thead><tr>
        <th>{{ __('Chararacter') }}</th>
        <th>{{ __('Typ') }}</th>
        <th>{{ __('Status') }}</th>
        </tr></thead><tbody>
        @foreach($info['arena']['char']['squad'] ?? [] as $arenaChar)
        <tr>
        <td>{{ $unitKeys[$arenaChar['defId'] ?? '-']['name'] ?? $arenaChar['defId'] ?? '-' }}</td>
        <td>{{ ($arenaChar['squadUnitType'] ?? '') == 'UNITTYPELEADER' ? 'Leader' : '' }}</td>
        <td>
        @foreach($info['roster'] as $rosterToon)
        @if($rosterToon['defId'] == $arenaChar['defId'])

        @include('player.stats._toon')

        @endif
        @endforeach

        </td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>

<div class="card mb-2">
    <h5 class="card-header">{{ __('Fleet Arena') }} - {{ __('Team Check') }} - Aktueller Rang: {{ $info['arena']['ship']['rank'] ?? '-' }}</h5>
    <div class="card-body">
        <table class="table table-hover table-responsive">
        <thead><tr>
        <th>{{ __('Chararacter') }}</th>
        <th>{{ __('Typ') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Crew') }}</th>
        </tr></thead><tbody>
        @foreach($info['arena']['ship']['squad'] ?? [] as $arenaChar)
        <tr>
        <td>{{ $unitKeys[$arenaChar['defId'] ?? '-']['name'] ?? $arenaChar['defId'] ?? '-' }}</td>
        <td>{{ ($arenaChar['squadUnitType'] ?? '') == 'UNITTYPECOMMANDER' ? 'Commander' : '' }}{{ ($arenaChar['squadUnitType'] ?? '') == 'UNITTYPEDEFAULT' ? 'Startformation' : '' }}{{ ($arenaChar['squadUnitType'] ?? '') == 'UNITTYPEREINFORCEMENT' ? 'Verstärkung' : '' }}</td>
        <td>
        @foreach($info['roster'] as $rosterToon)
        @if($rosterToon['defId'] == $arenaChar['defId'])

        @include('player.stats._toon')

        </td>
        <td>
            @foreach($rosterToon['crew'] as $shipCrew)
                @foreach($info['roster'] as $rosterToon)
                    @if($rosterToon['defId'] == $shipCrew['unitId'])
                    <div class="alert-info">{{ $unitKeys[$shipCrew['unitId'] ?? '-']['name'] ?? $shipCrew['unitId'] ?? '-' }}</div>
                    @include('player.stats._toon', ['isFleetCheck' => true])

                    @endif
                @endforeach
        <!-- unitId, slot -->
        <!-- hardwareskill_XWINGRED201 = reinforcement -->
            @endforeach
        @endif
        @endforeach

        </td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>


@endsection
