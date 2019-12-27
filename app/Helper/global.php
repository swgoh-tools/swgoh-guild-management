<?php

declare(strict_types=1);

use App\Helper\TimezoneHelper;

if (!function_exists('timezone')) {
    /**
     * Access the timezone helper.
     */
    function timezone()
    {
        return resolve(TimezoneHelper::class);
    }
}

if (!function_exists('stat_format')) {
    /**
     * format unit stat values.
     */
    function stat_format($stat)
    {
        $index = $stat['index'] ?? null;
        $value = $stat['value'] ?? null;
        switch ($index) {
            case 21:
                // dd(rtrim(sprintf('%.20F', $value), '0'));
                $hex = dec2hex(sprintf('%.0F', $value));
                $pattern = '/(.{2})(.{2})(.{4})(.{6})/';
                $leagues = ['Carbonite', 'Bronzium', 'Chromium', 'Aurodium', 'Kyber'];
                $divisions = [
                    11 => 0,
                    10 => 600000,
                    9 => 800000,
                    8 => 1000000,
                    7 => 1300000,
                    6 => 1600000,
                    5 => 2000000,
                    4 => 2500000,
                    3 => 3100000,
                    2 => 3800000,
                    1 => 4500000,
                ];
                preg_match($pattern, $hex, $matches);
                $division = (55 - hexdec($matches[1] ?? null)) / 5 + 1;
                $league = hexdec($matches[2] ?? null) / 20 - 1;
                $unknown = hexdec($matches[3] ?? null);
                $rank = hexdec($matches[4] ?? null);
                $result[] = 'Division ' . $division;
                $result[] = 'League ' . ($leagues[$league] ?? '-');
                $result[] = 'Rank ' . $rank;

                return implode(' / ', $result);
                break;

            default:
                return number_format($value);
                break;
        }
    }
}

if (!function_exists('dec2hex')) {
    /**
     * Input: A decimal number as a String.
     * Output: The equivalent hexadecimal number as a String.
     */
    function dec2hex($number)
    {
        $hexvalues = ['0', '1', '2', '3', '4', '5', '6', '7',
                '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', ];
        $hexval = '';
        while ('0' != $number) {
            $hexval = $hexvalues[bcmod($number, '16')] . $hexval;
            $number = bcdiv($number, '16', 0);
        }

        return $hexval;
    }
}

function custom_sort_by_name_key($a, $b)
{
    return $a['nameKey'] > $b['nameKey'];
}

function custom_sort_by_gp($a, $b)
{
    return $a['gp'] < $b['gp'];
}

function custom_sort_categories($a, $b)
{
    $categories = [
        '', // mixed, neutral
        'profession_scoundrel',
        'profession_smuggler',
        'species_droid',
        'species_human',
        'profession_jedi', // light
        'affiliation_oldrepublic',
        'affiliation_rebels',
        'affiliation_republic',
        'affiliation_501st',
        'profession_clonetrooper',
        'affiliation_resistance',
        'affiliation_phoenix',
        'affiliation_rogue_one',
        'species_ewok',
        'species_jawa',
        'species_wookiee',
        'profession_sith', // dark
        'affiliation_sithempire',
        'affiliation_empire',
        'affiliation_imperialtrooper',
        'affiliation_nightsisters',
        'affiliation_firstorder',
        'affiliation_separatist',
        'species_geonosian',
        'affiliation_separatist_droid',
        'profession_bountyhunter',
        'species_tusken',
    ];
    $categories = array_flip($categories);
    $aa = $categories[$a] ?? 999;
    $bb = $categories[$b] ?? 999;
    if (999 == $aa && 999 == $bb) {
        return $a > $b;
    }

    return $aa > $bb;
}

function print_icon($type)
{
    switch ($type) {
        case 'gear':
            return '<i title="' . __('Gear') . '" class="fa fa-gear"></i>';
            break;

        case 'level':
            return '<i title="' . __('Level') . '" class="fa fa-level-up"></i>';
            break;

        case 'star':
            return '<i title="' . __('Stars') . '" class="fa fa-star"></i>';
            break;

        case 'relic':
            return '<i title="' . __('Relic') . '" class="fa fa-bolt"></i>';
            break;

        case 'tier':
            return '<i title="' . __('Tier') . '" class="fa fa-bars"></i>';
            break;

        default:
            return '';
            break;
    }
}
