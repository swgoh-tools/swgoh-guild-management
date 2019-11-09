@if ($si_skill)
@php
    $si_tier = $si_skill['tier'] ?? 0;
    $si_tiers = $si_skill['tiers'] ?? 0;
    $si_zeta = $si_skill['isZeta'] ?? false;
    $si_omega = !$si_zeta && (8 == $si_tiers);
    $si_id = $si_skill['id'] ?? '';
    $si_name = $si_skillKeys[$si_skill['id']] ?? $si_skill['nameKey'] ?? '';
    $si_maxed = ($si_tier == $si_tiers) && (0 < $si_tiers);
    $si_url = $si_skill['url'] ?? '';
    $si_image = $si_skill['image'] ?? '';
@endphp
<div class="pc-skill @if($si_maxed)pc-skill--maxed @endif">
        <div class="pc-skill-progress @if($si_maxed)pc-skill-progress--max @elseif($si_tiers - $si_tier == 1) btn-warning @else btn-danger @endif" style="display:inline;">{{ $si_tier }}:{{ $si_tiers }}</div>
        <div class="pc-skill-name ml-1" style="display:inline;">{{ preg_replace('/(?:skill)?_.*$/', '', $si_id) }}</div>
        <div class="pc-skill-ability"><span class="char-ability"><img class="char-ability-img"
                    src="{{ $si_image }}" alt="{{ $si_name }}"
                    title="{{ $si_name }}"></span></div>
        @if ($si_zeta)
        <div class="pc-skill__material mt-2"><img class="pc-skill__material-img"
                src="//swgoh.gg/static/img/assets/tex.skill_zeta.png" data-toggle="tooltip" data-placement="top"
                title="" data-original-title="Zeta"></div>
        @elseif($si_omega)
        <div class="pc-skill__material mt-2"><img class="pc-skill__material-img"
                src="//swgoh.gg/static/img/assets/tex.skill_pentagon_gold.png" data-toggle="tooltip"
                data-placement="top" title="" data-original-title="Omega"></div>
        @endif
    </div>
@endif
