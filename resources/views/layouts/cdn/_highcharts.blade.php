@push('scripts')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js"></script> --}}
<script src="//code.highcharts.com/highcharts.js"></script>
<script src="//code.highcharts.com/modules/item-series.js"></script>
<script src="//code.highcharts.com/modules/exporting.js"></script>
<!-- optional -->
<script src="//code.highcharts.com/modules/offline-exporting.js"></script>
<script src="//code.highcharts.com/modules/export-data.js"></script>
@endpush

{{-- // $chart_high = new HighChart;
// $chart_high->labels(\array_keys($stats_total['rarity']));
// $chart_high->dataset(__('fields.rarity'), 'bar', \array_values($stats_total['rarity']));
// $mau = \array_keys($stats_total['rarity']);
// $muh = \array_values($stats_total['rarity']);
// $test = [];
// foreach ($stats_total['rarity'] as $key => $value) {
//     $test[] = [$key, $value, null, $key];
// }
// $chart_high->dataset('rarity', 'item', $test)->options(['dataLabels' => ['enabled' => true, 'format' => '{point.label}'], 'keys' => ['name', 'y', 'color', 'label']]);
// dd($stats);
// $chars = SyncClient::getRoster($guild, 1);
// $ships = SyncClient::getRoster($guild, 2); --}}
