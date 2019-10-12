@push('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
@endpush


@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
@endpush

{{-- // $chart = new GuildStatsPlayers;
// // $chart->labels(\array_keys($stats_total['rarity']));
// // $chart->dataset('rarity', 'line', \array_values($stats_total['rarity']));
// $chart->labels(['a', 'b', 'c']);
// $chart->dataset('rarity', 'bar', [123, 234, 345]);
// $chart->dataset('rarity', 'bar', [23, 34, 45]);
// $chart->dataset('rarity', 'bar', ['a' => 333, 'b' => 444, 'c' => 111]);
// $chart->options(['scales' => [
//     'xAxes' => [['stacked' => true]],
//     'yAxes' => [['stacked' => true]],
// ]]); --}}
