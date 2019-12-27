<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helper\SyncHelper;
use Illuminate\Support\Facades\Cache;

class ListController extends Controller
{
    public function ability_mats_guild($guild, $type = '')
    {
        return $this->ability_mats($type);
    }

    public function table_list()
    {
        $data_list = SyncHelper::getData('tableList');
        ksort($data_list);

        return view('guild.list.table', [
            'data_key' => 'tableList',
            'data_list' => $data_list ?? [],
            ]);
    }

    public function ability_mats($type = '')
    {
        // validation for $type is done in web.php
        // only specific words are allowed on the route

        // Cache::forget('ability_mats.stats.'.$type); //TODO DEV ONLY
        $calculation = Cache::remember('ability_mats.stats.' . $type, 60 * 60 * 72, function () use ($type) {
            $recipes = SyncHelper::getData('recipeList');
            // recipes have a ingredientsList with array containing id [which is id of a material]
            // and may have a craftRequirement containing an array of requirementItemList
            // id	"ability_mat_A"
            // type	3
            // weight	0
            // minQuantity	700
            // maxQuantity	700
            // rarity	8
            // statMod	null
            // previewPriority	0
            $materials = SyncHelper::getData('materialList');
            // materials contain descriptin, texture, locations, etc
            // and might contain backreferences
            $stats_materials = [];
            $stats_materials_columns = [];
            $stats_skills = [];
            $stats_recipes = [];

            if ('recipes' == $type) {
                foreach ($recipes as $recipe_id => $recipe) {
                    // $recipe_id = $recipe['recipeId'];
                    // $requiredUnitLevel = $recipe['requiredUnitLevel'] ?? '-'; //works
                    // $requiredUnitRarity = $recipe['requiredUnitRarity'] ?? '-'; //always 1
                    // $requiredUnitTier = $recipe['requiredUnitTier'] ?? '-'; //always 1
                    // $requiredUnitRelicTier = $recipe['requiredUnitRelicTier'] ?? '-'; //always 1

                    $recipe_parts = explode('_', str_replace(['HARDWARE_SYSTEMS', 'T7_ZETA'], ['HARDWARESYSTEMS', 'T7zeta'], $recipe_id));

                    $recipe_type = $recipe_parts[0];
                    $recipe_ability_type = $recipe_parts[1] ?? '';
                    $recipe_ability_level = $recipe_parts[2] ?? '';
                    $recipe_ability_special = $recipe_parts[3] ?? '';

                    if (!\in_array($recipe_type, ['SKILLRECIPE', 'SHIPSKILLRECIPE', 'FLEETCOMMANDERSKILLRECIPE'])) {
                        continue;
                    }

                    $drilldown = $recipe_ability_level;
                    $icon = print_icon('tier');

                    foreach ($recipe['ingredientsList'] as $material_key => $material) {
                        $material_id = $material['id'];

                        $stats_materials[$recipe_type][$recipe_ability_type][$material_id]['count'] = 1 + ($stats_materials[$recipe_type][$recipe_ability_type][$material_id]['count'] ?? 0);
                        $stats_materials[$recipe_type][$recipe_ability_type][$material_id]['quantity'] = $material['minQuantity'] + ($stats_materials[$recipe_type][$recipe_ability_type][$material_id]['quantity'] ?? 0);
                        if ($drilldown) {
                            $stats_materials[$recipe_type][$recipe_ability_type][$material_id][$drilldown] = $material['minQuantity'] + ($stats_materials[$recipe_type][$recipe_ability_type][$material_id][$drilldown] ?? 0);
                            $stats_materials_columns[$recipe_type][$recipe_ability_type][$drilldown] = 1;
                        }
                    }
                }
            } else {
                $units = SyncHelper::getData('unitsList');
                // units have a skillReferenceList with array containing skillId
                $skills = SyncHelper::getData('skillList');
                // skills have a tierList with array containing recipeId (and requiredUnitLevel, requiredUnitRarity, requiredUnitTier)
                foreach ($units as $unit_key => $unit) {
                    foreach ($unit['skillReferenceList'] as $skill_key => $skill) {
                        $skill_id = $skill['skillId'];
                        $requiredTier = $skill['requiredTier'] ?? '-'; //works
                    $requiredRarity = $skill['requiredRarity'] ?? '-'; //always 8
                    $requiredRelicTier = $skill['requiredRelicTier'] ?? '-'; //always 1

                    $skill_parts = explode('_', $skill_id);

                        $skill_type = $skill_parts[0];
                        $skill_unit = $skill_parts[1] ?? '';

                        foreach ($skills[$skill['skillId']]['tierList'] as $recipe_key => $recipe) {
                            $recipe_id = $recipe['recipeId'];
                            $requiredUnitLevel = $recipe['requiredUnitLevel'] ?? '-'; //works
                        $requiredUnitRarity = $recipe['requiredUnitRarity'] ?? '-'; //always 1
                        $requiredUnitTier = $recipe['requiredUnitTier'] ?? '-'; //always 1
                        $requiredUnitRelicTier = $recipe['requiredUnitRelicTier'] ?? '-'; //always 1

                        $recipe_parts = explode('_', str_replace('HARDWARE_SYSTEMS', 'HARDWARESYSTEMS', $recipe_id));

                            $recipe_type = $recipe_parts[0];
                            $recipe_ability_type = $recipe_parts[1] ?? '';
                            $recipe_ability_level = $recipe_parts[2] ?? '';
                            $recipe_ability_special = $recipe_parts[3] ?? '';

                            // $stats_materials_columns['TOTAL']['TOTAL']['count'] = 1;
                            // $stats_materials_columns['TOTAL']['TOTAL']['quantity'] = 1;
                            // $stats_materials_columns[$recipe_type][$recipe_ability_type]['count'] = 1;
                            // $stats_materials_columns[$recipe_type][$recipe_ability_type]['quantity'] = 1;

                            $drilldown = '';
                            $icon = '';
                            switch ($type) {
                            case 'tiers':
                                $drilldown = $recipe_ability_level;
                                $icon = print_icon('tier');
                                break;

                                case 'levels':
                                $drilldown = $requiredUnitLevel;
                                $icon = print_icon('level');
                                break;

                                case 'gear':
                                $drilldown = $requiredTier;
                                $icon = print_icon('gear');
                                break;

                                case 'stars':
                                $drilldown = $requiredUnitRarity; // or $requiredRarity API data wrong
                                $icon = print_icon('star');
                                break;

                                case 'relics':
                                $drilldown = $requiredRelicTier; // or $requiredUnitRelicTier API data wrong
                                $icon = print_icon('relic');
                                break;

                            default:
                                $drilldown = '';
                                break;
                        }

                            foreach ($recipes[$recipe['recipeId']]['ingredientsList'] as $material_key => $material) {
                                $material_id = $material['id'];

                                $stats_materials['TOTAL']['TOTAL'][$material_id]['count'] = 1 + ($stats_materials['TOTAL']['TOTAL'][$material_id]['count'] ?? 0);
                                $stats_materials['TOTAL']['TOTAL'][$material_id]['quantity'] = $material['minQuantity'] + ($stats_materials['TOTAL']['TOTAL'][$material_id]['quantity'] ?? 0);
                                if ($drilldown) {
                                    $stats_materials['TOTAL']['TOTAL'][$material_id][$drilldown] = $material['minQuantity'] + ($stats_materials['TOTAL']['TOTAL'][$material_id][$drilldown] ?? 0);
                                    $stats_materials_columns['TOTAL']['TOTAL'][$drilldown] = 1;
                                }

                                $stats_materials[$recipe_type][$recipe_ability_type][$material_id]['count'] = 1 + ($stats_materials[$recipe_type][$recipe_ability_type][$material_id]['count'] ?? 0);
                                $stats_materials[$recipe_type][$recipe_ability_type][$material_id]['quantity'] = $material['minQuantity'] + ($stats_materials[$recipe_type][$recipe_ability_type][$material_id]['quantity'] ?? 0);
                                if ($drilldown) {
                                    $stats_materials[$recipe_type][$recipe_ability_type][$material_id][$drilldown] = $material['minQuantity'] + ($stats_materials[$recipe_type][$recipe_ability_type][$material_id][$drilldown] ?? 0);
                                    $stats_materials_columns[$recipe_type][$recipe_ability_type][$drilldown] = 1;
                                }

                                $stats_skills[$skill_id][$material_id]['count'] = 1 + ($stats_skills[$skill_id][$material_id]['count'] ?? 0);
                                $stats_skills[$skill_id][$material_id]['quantity'] = $material['minQuantity'] + ($stats_skills[$skill_id][$material_id]['quantity'] ?? 0);

                                $stats_recipes[$recipe_id][$material_id]['count'] = 1 + ($stats_recipes[$recipe_id][$material_id]['count'] ?? 0);
                                $stats_recipes[$recipe_id][$material_id]['quantity'] = $material['minQuantity'] + ($stats_recipes[$recipe_id][$material_id]['quantity'] ?? 0);
                            }
                        }
                    }
                }
            }

            return [
            'stats_materials' => $stats_materials,
            'stats_materials_columns' => $stats_materials_columns,
            'stats_skills' => $stats_skills,
            'stats_recipes' => $stats_recipes,
            'materials' => $materials,
            'icon' => $icon,
        ];
        });

        return view('guild.list.ability_mats', [
            'request_type' => $type,
            'type_icon' => $calculation['icon'] ?? '',
            'materials' => $calculation['materials'] ?? [],
            'stats_materials' => $calculation['stats_materials'] ?? [],
            'stats_skills' => $calculation['stats_skills'] ?? [],
            'stats_recipes' => $calculation['stats_recipes'] ?? [],
            'stats_materials_columns' => $calculation['stats_materials_columns'] ?? [],
            ]);
    }

    public function squads()
    {
        $list = SyncHelper::getSquadList();
        $unitKeys = SyncHelper::getUnitKeys();
        $skillKeys = SyncHelper::getSkillKeys();

        return view('guild.list.squads', [
            'unitKeys' => $unitKeys ?? [],
            'skillKeys' => $skillKeys ?? [],
            'list' => $list ?? [],
            ]);
    }

    public function events()
    {
        $list = SyncHelper::getEventList();

        return view('guild.list.events', [
            'list' => $list ?: [],
            ]);
    }

    public function targeting()
    {
        $unitKeys = SyncHelper::getUnitKeys(true);
        $skillKeys = SyncHelper::getSkillKeys(true);
        // dd($unitKeys->get(221));
        // dd($skillKeys);
        $filter = [
            // 'baseId',
            // 'nameKey',
            // 'descKey',
            'forceAlignment',
            // 'categoryIdList',
            'combatType',
        ];
        $pattern = [
            '/\\\\n/',
            '/\[c\]\[(.{6})\]([^\[]*)\[-\]\[\/c\]/',
        ];
        $replacement = [
            '<br />',
            '<span style="color:#$1">$2</span>',
        ];

        return view('guild.list.targeting', [
            'unitKeys' => $unitKeys,
            'skillKeys' => $skillKeys,
            'filter' => $filter,
            'pattern' => $pattern,
            'replacement' => $replacement,
            ]);
    }

    public function zetas()
    {
        $list = SyncHelper::getZetaList();

        return view('guild.list.zetas', [
            'list' => $list ?: [],
            ]);
    }
}
