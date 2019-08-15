{{-- @include('layouts.img._gear-icon', ['gi_small' => true]) --}}
@if ($mi_mod ?? null)
@php
$mi_slot = $mi_mod['slot'] ?? '';
$mi_tier = $mi_mod['tier'] ?? '';
$mi_tier_name = array('','E','D','C','B','A')[$mi_tier] ?? '';
$mi_set = $mi_mod['set'] ?? '';
$mi_level = $mi_mod['level'] ?? '';
$mi_pips = $mi_mod['pips'] ?? '';
$mi_name = $mi_mod['nameKey'] ?? '';
$mi_max_level = 15 == $mi_level;
$mi_small = true;
@endphp

<div class="
  statmod
  pc-statmod
  @if($mi_small)statmod-small @endif
  pc-statmod-slot{{ $mi_slot }}
  statmod-t{{ $mi_tier }}
  @if ($mi_max_level)statmod--max-level @endif
">
    <div class="statmod-summary">
            <div class="statmod-title">{{ $mi_name }}</div>
            <div class="statmod-preview"><span class="statmod-pips"><span class="statmod-pip"></span><span
                    class="statmod-pip"></span><span class="statmod-pip"></span><span class="statmod-pip"></span><span
                    class="statmod-pip"></span></span>
            <div class="
        statmod-base
        @if ($mi_small)statmod-base--size-small @endif
        statmod-base--tier-{{ $mi_tier }}
        statmod-base--slot-{{ $mi_slot }}
        statmod-base--set-{{ $mi_set }}
      ">
                <div class="
          statmod-base-inner
          statmod-base-inner--shapekey-{{ $mi_pips }}-{{ $mi_slot }}-{{ $mi_tier }}
          statmod-base-inner--iconkey-{{ $mi_set }}-{{ $mi_tier }}
        ">
                    <div class="statmod-base-icon"></div>
                    <div class="statmod-base-shape"></div>
                </div>
            </div><span class="statmod-level">{{ $mi_level }}-{{ $mi_tier_name }}</span>
        </div>
    </div>
    <div class="statmod-full"
        data-classes="statmod statmod-t{{ $mi_tier }}  @if ($mi_max_level)statmod--max-level @endif">
        <div class="statmod-details">
            <div class="statmod-stats statmod-stats-1">
                <div class="statmod-stat"><span
                        class="statmod-stat-value">{{ $mi_mod['primaryStat']['value'] ?? '' }}</span> <span
                        class="statmod-stat-label">{{ $unitStatKeys[$mi_mod['primaryStat']['unitStat'] ?? '']['name'] ?? '' }}</span>
                </div>
            </div>
            <div class="statmod-stats statmod-stats-2">
                @foreach($mi_mod['secondaryStat'] ?? [] as $secstat)
                <div class="statmod-stat ">
                    <span class="statmod-stat-value">{{ $secstat['value'] ?? '' }}</span> <span
                        class="statmod-stat-label">{{ $unitStatKeys[$secstat['unitStat'] ?? '']['name'] ?? '' }}</span>
                    <span class="statmod-stat-roll"> ({{ $secstat['roll'] ?? '' }})</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@endif

    <div class="statmod-full" data-classes="statmod statmod-t5 statmod--max-level">
        <div class="statmod-title">Mk V-A Offense Transmitter</div>
        <div class="statmod-preview"><span class="statmod-pips"><span class="statmod-pip"></span><span
                    class="statmod-pip"></span><span class="statmod-pip"></span><span class="statmod-pip"></span><span
                    class="statmod-pip"></span></span>
            <div class="
        statmod-base
        statmod-base--tier-5
        statmod-base--slot-1
        statmod-base--set-2
      ">
                <div class="
          statmod-base-inner
          statmod-base-inner--shapekey-5-1-5
          statmod-base-inner--iconkey-2-5
        ">
                    <div class="statmod-base-icon"></div>
                    <div class="statmod-base-shape"></div>
                </div>
            </div><span class="statmod-level">15-A</span>
        </div>
        <div class="statmod-details">
            <div class="statmod-stats statmod-stats-1">
                <div class="statmod-stats-heading">Primary Stats</div>
                <div class="statmod-stat"><span class="statmod-stat-value">+5.88%</span><span
                        class="statmod-stat-label">Offense</span></div>
            </div>
            <div class="statmod-stats statmod-stats-2">
                <div class="statmod-stats-heading">Secondary Stats</div>
                <div class="statmod-stat "><span class="statmod-stat-value">+1.66%</span><span
                        class="statmod-stat-label">Critical Chance</span><span class="statmod-stat-roll"> (1)</span>
                </div>
                <div class="statmod-stat "><span class="statmod-stat-value">+2.52%</span><span
                        class="statmod-stat-label">Health</span><span class="statmod-stat-roll"> (3)</span></div>
                <div class="statmod-stat "><span class="statmod-stat-value">+4.03%</span><span
                        class="statmod-stat-label">Protection</span><span class="statmod-stat-roll"> (2)</span></div>
                <div class="statmod-stat "><span class="statmod-stat-value">+63</span><span
                        class="statmod-stat-label">Offense</span><span class="statmod-stat-roll"> (2)</span></div>
            </div>
        </div>
    </div>
</div>
