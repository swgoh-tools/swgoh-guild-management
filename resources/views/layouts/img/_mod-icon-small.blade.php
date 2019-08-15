{{-- @include('layouts.img._gear-icon', ['gi_small' => true]) --}}
@if ($mi_mod ?? null)
@php
$mi_slot = $mi_mod['slot'] ?? '';
$mi_tier = $mi_mod['tier'] ?? '';
$mi_tier_name = array('','E','D','C','B','A')[$mi_tier] ?? '';
$mi_set = $mi_mod['set'] ?? '';
$mi_level = $mi_mod['level'] ?? '';
$mi_pips = (int) ($mi_mod['pips'] ?? 0);
$mi_name = $mi_mod['nameKey'] ?? '';
$mi_max_level = 15 == $mi_level;
$mi_small = true;
$mi_max_pips = 6;
@endphp

<div class="pc-statmods pc-statmods--small">
    {{-- <div class="collection-char-sets">
        <div class="collection-char-sets-values">
            <div class="collection-char-set collection-char-set2 collection-char-set-max" data-toggle="tooltip"
                data-title="Set Bonus: 15% Offense" data-container="body" data-original-title="" title=""></div>
            <div class="collection-char-set collection-char-set5 collection-char-set-max" data-toggle="tooltip"
                data-title="Set Bonus: 8% Critical Chance" data-container="body" data-original-title="" title=""></div>
        </div>
    </div> --}}
    {{-- <div class="pc-statmod-list"> --}}
        {{-- <div class="pc-statmod-list-sets">
            <div class="pc-statmod-list-set pc-statmod-list-set-1 pc-statmod-list-set-1-max"></div>
            <div class="pc-statmod-list-line pc-statmod-list-line-1 pc-statmod-list-line-1-max"></div>
            <div class="pc-statmod-list-line pc-statmod-list-line-4 pc-statmod-list-line-4-max"></div>
            <div class="pc-statmod-list-line pc-statmod-list-line-5 pc-statmod-list-line-5-max"></div>
            <div class="pc-statmod-list-line pc-statmod-list-line-6 pc-statmod-list-line-6-max"></div>
            <div class="pc-statmod-list-set pc-statmod-list-set-2 pc-statmod-list-set-2-max"></div>
            <div class="pc-statmod-list-line pc-statmod-list-line-2 pc-statmod-list-line-2-max"></div>
            <div class="pc-statmod-list-line pc-statmod-list-line-3 pc-statmod-list-line-3-max"></div>
        </div> --}}
        <div class="
  statmod
  pc-statmod
  @if($mi_small)statmod-small @endif
  pc-statmod-slot{{ $mi_slot }}
  statmod-t{{ $mi_tier }}
  @if ($mi_max_level)statmod--max-level @endif
">
            <div class="statmod-summary">
                <div class="statmod-preview"><span class="statmod-pips">@for ($i = 1; $i <= $mi_max_pips; $i++)
                    <span class="statmod-pip @if($mi_pips < $i)bg-danger @else bg-success @endif"></span>
                @endfor</span>
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
                            @if($mi_set)<div class="statmod-base-icon"></div>@endif
                            <div class="statmod-base-shape"></div>
                        </div>
                    </div><span class="statmod-level">{{ $mi_level }}-{{ $mi_tier_name }}</span>
                </div>
            </div>
            <div class="statmod-full"
                data-classes="statmod statmod-t{{ $mi_tier }}  @if ($mi_max_level)statmod--max-level @endif">
                <div class="statmod-title">{{ $mi_name }}</div>
                <div class="statmod-preview"><span class="statmod-pips"><span class="statmod-pip"></span><span
                            class="statmod-pip"></span><span class="statmod-pip"></span><span
                            class="statmod-pip"></span><span class="statmod-pip"></span></span>
                    <div class="
        statmod-base
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
    {{-- </div> --}}
</div>
@endif
