@php
    $mi_image = $mi_material['iconKey'] ?? '';
    $mi_alt = $mi_material['id'] ?? $mi_alt ?? '';
    if (!$mi_image) {
        switch ($mi_alt) {
            case 'GRIND':
                $mi_image = 'tex.goldcreditbar';
                break;

            case 'SHIP_GRIND':
                $mi_image = 'tex.icon_ship_currency_LG';
                break;
        }
    }
@endphp
<img class="mat-icon-img" style="max-height:32px;" src="{{ asset('images/assets/'.$mi_image) }}.png" alt="{{ $mi_alt }}">
