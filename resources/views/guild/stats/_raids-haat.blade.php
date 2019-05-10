<div class="card mb-2">
<img class="card-img-top" src="{{ asset('images/assets/tex.guild_raids_aat.jpg') }}" alt="Heroic Tank">
<h5 class="card-header">{{ __('Heroic Tank') }} ({{ __('challenging') }}, {{ __('solo') }})</h5>
<div class="card-body">
<p>{{ __('app.stats.tank_intro') }} {!! __('app.stats.tiers', ['count' => '2']) !!} {!! __('app.stats.short_name', ['name' => 'HAAT, HTank']) !!}</p>
<p>{!! __('app.stats.requirements', ['name' => 'HAAT', 'rarity' => $team['rarity'] ?? '', 'level' => $team['level'] ?? '', 'gear' => $team['gear'] ?? '']) !!}</p>
<p>{!! __('app.stats.solo_prepared', ['name' => 'HAAT', 'count' => '<span class="badge badge-pill badge-primary">'. count($eventStats[$key][0] ?? []) .'</span>*)']) !!}
    {!! __('app.stats.solo_info', ['max' => '48.346.357', 'footnote' => '***)']) !!}
    {!! __('app.stats.solo_soon', ['name' => 'HAAT', 'count' => '<span class="badge badge-pill badge-primary">'. count($eventStats[$key][1] ?? []) .'</span>**)']) !!}
    {{ __('app.stats.tank_info') }}
</p>
<p></p>
<p><em>* {{ implode(', ', $eventStats[$key][0] ?? []) }}</em>
<br /><em>** {{ implode(', ', $eventStats[$key][1] ?? []) }}</em>
<br /><em>*** {{ __('app.stats.equal_damage') }}</em></p>
</div>
<div class="card-footer">
<div class="progress">
  <!-- <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> -->
  <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[$key][0] ?? []) / count($members ?? []) * 100, 1) }} %</div>
  <div class="progress-bar bg-warning text-dark" role="progressbar" style="width: {{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }}%" aria-valuenow="{{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }}" aria-valuemin="0" aria-valuemax="100">{{ round(count($eventStats[$key][1] ?? []) / count($members ?? []) * 100, 1) }} %</div>
</div>
</div>
</div>
