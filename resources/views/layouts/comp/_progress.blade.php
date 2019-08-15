@php
$prog_min = $prog_min ?? 0;
$prog_max = $prog_max ?? 100;
$prog_now = $prog_now ?? [];
$prog_class = $prog_class ?? [];
$prog_round = $prog_round ?? 0;
@endphp
<div class="progress">
    @foreach ($prog_now as $prog_now_key => $prog_now_value)
    @php
    $prog_now_percent = round($prog_now_value / $prog_max * 100 , $prog_round);
    @endphp
    <div class="progress-bar {{ $prog_class[$prog_now_key] ?? '' }}" role="progressbar"
        style="width: {{ $prog_now_percent }}%" aria-valuenow="{{ $prog_now_value }}" aria-valuemin="{{ $prog_min }}"
        aria-valuemax="{{ $prog_max }}">{{ $prog_now_percent }}</div>
    @endforeach
</div>
