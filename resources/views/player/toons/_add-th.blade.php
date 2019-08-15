@if ($char_count == 1)
@php
    $th_key = $th_key ??  $stat_key ?? 'unkown';
@endphp
@push('table-headers')
@switch($th_key)
@case('gear')
<th><i class="fa fa-gear" title="{{ __('fields.' . $th_key) }}"></i></th>
@break
@case('rarity')
<th><i class="fa fa-star" title="{{ __('fields.' . $th_key) }}"></i></th>
@break
@case('level')
<th><i class="fa fa-level-up" title="{{ __('fields.' . $th_key) }}"></i></th>
@break
@default
<th>{{ __('fields.' . $th_key) }}</th>

@endswitch
@endpush
@endif
