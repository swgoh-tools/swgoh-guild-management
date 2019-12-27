<?php

declare(strict_types=1);

namespace App\Helper;

use App\Guild;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SyncHelper
{
    public static function getCodePattern()
    {
        return '/^[1-9]{9}$/';
    }

    public static function getTargets()
    {
        return [
            // 's' => 'Access Token',
            'help.guild.units' => 'swgoh.help Guild Data',
            'help.guild.units.crawl' => 'swgoh.help Guild Crawl',
            'g-players' => '',
            'g-roster' => '',
            'g-units' => '',
            'help.battles' => '',
            'help.events' => '',
            'help.squads' => '',
            'help.zetas' => '',
            'gg.characters' => 'swgoh.gg Toons',
            'gg.ships' => 'swgoh.gg Ships',
            'gg.abilities' => 'swgoh.gg Abilities',
            'gg.guild.units' => 'swgoh.gg Guild Units',
            'gg.gear' => 'swgoh.gg Gear',
            'help.data.abilityList' => '',
            'help.data.battleEnvironmentsList' => '',
            'help.data.battleTargetingRuleList' => '',
            'help.data.categoryList' => '',
            'help.data.challengeList' => '',
            'help.data.challengeStyleList' => '',
            'help.data.effectList' => '',
            'help.data.environmentCollectionList' => '',
            'help.data.equipmentList' => '',
            'help.data.eventSamplingList' => '',
            'help.data.guildExchangeItemList' => '',
            'help.data.guildRaidList' => '',
            'help.data.helpEntryList' => '',
            'help.data.materialList' => '',
            'help.data.playerTitleList' => '',
            'help.data.powerUpBundleList' => '',
            'help.data.raidConfigList' => '',
            'help.data.recipeList' => '',
            'help.data.requirementList' => '',
            'help.data.skillList' => '',
            'help.data.starterGuildList' => '',
            'help.data.statModList' => '',
            'help.data.statModSetList' => '',
            'help.data.statProgressionList' => '',
            'help.data.tableList' => '',
            'help.data.targetingSetList' => '',
            'help.data.territoryBattleDefinitionList' => '',
            'help.data.territoryWarDefinitionList' => '',
            'help.data.unitsList' => '',
            'help.data.unlockAnnouncementDefinitionList' => '',
            'help.data.warDefinitionList' => '',
            'help.data.xpTableList' => '',
        ];
    }

    /**
     * swgoh.gg data.
     */
    public static function getGgChars()
    {
        $filename = 'swgoh.gg/characters/characters.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getGgShips()
    {
        $filename = 'swgoh.gg/ships/ships.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getGgAbilities()
    {
        $filename = 'swgoh.gg/abilities/abilities.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getGgCharsWithKey()
    {
        $chars = self::getGgChars();

        $chars_with_key = [];

        foreach ($chars as $key => $char) {
            $chars_with_key[$char['base_id']] = $char;
        }

        return $chars_with_key;
    }

    public static function getGgGear()
    {
        $filename = 'swgoh.gg/gear/gear.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getGgGearWithKey()
    {
        $gear = self::getGgGear();
        $gear_with_key = [];
        foreach ($gear as $key => $value) {
            $gear_with_key[$value['base_id']] = $value;
        }
        foreach ($gear as $key => $value) {
            $gear_with_key[$value['base_id']]['mat_list'] = self::getGearIngredients($value, $gear_with_key);
        }

        return $gear_with_key;
    }

    public static function getGearIngredients($gear_item, &$gear_list, &$mat_list = [], $amount = 1)
    {
        if ($gear_item['ingredients'] ?? []) {
            foreach ($gear_item['ingredients'] as $mat) {
                self::getGearIngredients($gear_list[$mat['gear']], $gear_list, $mat_list, $amount * $mat['amount']);
            }
        } else {
            $mat_list[$gear_item['base_id']] = $amount + ($mat_list[$gear_item['base_id']] ?? 0);
        }

        return $mat_list;
    }

    /**
     * swgoh.help data.
     */
    public static function getRoster(Guild $guild, $combat_type = 1, $return_modification_timestamp = false)
    {
        $guild_id = self::getGuildId($guild);
        if (!$guild_id) {
            return null;
        }

        // enums
        $combat_type = 2 == $combat_type ? 'SHIP' : 'CHARACTER';

        $filename = "swgoh.help/guild/$guild_id/units.out.$combat_type.json";
        if (Storage::disk('sync')->exists($filename)) {
            if ($return_modification_timestamp) {
                return Storage::disk('sync')->lastModified($filename);
            } else {
                $unitKeys = self::getUnitKeys();

                return collect(json_decode(Storage::disk('sync')->get($filename), true))
                    ->transform(function ($item, $key) use ($unitKeys) {
                        return [
                            'players' => $item,
                            'name' => $unitKeys[$key]['name'] ?? $key,
                            'side' => $unitKeys[$key]['side'] ?? '',
                            'desc' => $unitKeys[$key]['desc'] ?? '',
                            ];
                    })
                    ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
            }
        }
    }

    public static function getPlayer($player_code, $add_modification_timestamp = true)
    {
        if (!$player_code) {
            return null;
        }
        $filename = "swgoh.help/guild/players/units.out.player.$player_code.json";
        if (Storage::disk('sync')->exists($filename)) {
            if ($add_modification_timestamp) {
                return [
                    json_decode(Storage::disk('sync')->get($filename), true),
                    Storage::disk('sync')->lastModified($filename),
                ];
            } else {
                return json_decode(Storage::disk('sync')->get($filename), true);
            }
        }
    }

    public static function getGuildInfo(Guild $guild)
    {
        $guild_id = self::getGuildId($guild);
        if (!$guild_id) {
            return null;
        }
        $filename = "swgoh.help/guild/$guild_id/guild.out.guild.json";
        if (Storage::disk('sync')->exists($filename)) {
            return [
                json_decode(Storage::disk('sync')->get($filename), true),
                Storage::disk('sync')->lastModified($filename),
            ];
        }
    }

    public static function getGuildMembers(Guild $guild, $return_modification_timestamp = false)
    {
        $guild_id = self::getGuildId($guild);
        if (!$guild_id) {
            return null;
        }
        $filename = "swgoh.help/guild/$guild_id/units.out.players.json";
        if (Storage::disk('sync')->exists($filename)) {
            if ($return_modification_timestamp) {
                return Storage::disk('sync')->lastModified($filename);
            } else {
                return collect(json_decode(Storage::disk('sync')->get($filename), true))->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
            }
        }
    }

    public static function getSquadAnchors()
    {
        return [
            'bb8' => 'BB8',
            'c3po' => 'C3POLEGENDARY',
            'chewbacca' => 'CHEWBACCALEGENDARY',
            'chimaera' => 'CAPITALCHIMAERA',
            'cls' => 'COMMANDERLUKESKYWALKER',
            'jtr' => 'REYJEDITRAINING',
            'palpatine' => 'EMPERORPALPATINE',
            'r2d2' => 'R2D2_LEGENDARY',
            'revan' => 'JEDIKNIGHTREVAN',
            'thrawn' => 'GRANDADMIRALTHRAWN',
            'yoda' => 'GRANDMASTERYODA',
            'dr' => 'DARTHREVAN',
            'malak' => 'DARTHMALAK',
            'padme' => 'PADMEAMIDALA',
        ];
    }

    public static function getSquadList()
    {
        $filename = 'swgoh.help/squads/squads.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getZetaList()
    {
        $filename = 'swgoh.help/zetas/zetas.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['zetas'];
        }
    }

    public static function getSkillMap()
    {
        return self::getData('skillList', 'map', false);
    }

    public static function getDataMap($collection)
    {
        /*
         * Api responses do NOT use associative keys as array index.
         * To allow quick lookups for this data, any response should be
         * processed after download and stored as associative array, named "map".
         *
         * Make sure map file generation is configured for the collection you wish to use.
         * See $this->prepareHelpData()
         */
        return self::getData($collection, 'map');
    }

    public static function getData($collection, $type = '', $useLocale = true)
    {
        $suffix = '.out';

        switch ($type) {
            case 'map':
                $suffix .= '.map';
                break;

            case 'special':
                $suffix .= '.special';
                break;
        }

        if ($useLocale) {
            $filename = "swgoh.help/data/$collection/$collection$suffix." . self::getLang() . '.json';
            if (Storage::disk('sync')->exists($filename)) {
                return json_decode(Storage::disk('sync')->get($filename), true);
            }
            $filename = "swgoh.help/data/$collection/$collection$suffix.ENG_US.json";
            if (Storage::disk('sync')->exists($filename)) {
                return json_decode(Storage::disk('sync')->get($filename), true);
            }
        }
        // always check for generic file, used as fallback if locale not found
        $filename = "swgoh.help/data/$collection/$collection$suffix.json";
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getSkillData()
    {
        return self::getData('skillList', 'special');
    }

    public static function getLang($locale = null)
    {
        $api_locales = config('swgoh.API.SWGOH_HELP.LOCALES', []);
        $req_locale = $locale ?? app()->getLocale();

        $lang = $api_locales[$req_locale] ?? config('swgoh.API.SWGOH_HELP.LOCALE');

        // // param NOT case sensitive, so it's just for fun
        // $lang = strtolower($lang);
        return $lang;
    }

    public static function getSkillKeys($full_ability_info = false)
    {
        $skills = self::getDataMap('skillList');
        if (!$skills) {
            return null;
        }

        $file_suffix = '.out.map';
        if ($full_ability_info) {
            $file_suffix = '';
        }
        $filename = "swgoh.help/data/abilityList/abilityList$file_suffix." . self::getLang() . '.json';
        $abilities = null;
        if (Storage::disk('sync')->exists($filename)) {
            $abilities = json_decode(Storage::disk('sync')->get($filename), true);
        } else {
            $filename = "swgoh.help/data/abilityList/abilityList$file_suffix.ENG_US.json";
            if (Storage::disk('sync')->exists($filename)) {
                $abilities = json_decode(Storage::disk('sync')->get($filename), true);
            }
        }
        if ($abilities) {
            if ($full_ability_info) {
                $ab2skill = array_flip($skills);
                foreach ($abilities as $key => $ability) {
                    if (isset($ab2skill[$ability['id']])) {
                        $skills[$ab2skill[$ability['id']]] = $ability;
                    }
                }
            } else {
                foreach ($skills as $skill => $ability) {
                    $skills[$skill] = $abilities[$ability] ?? $ability;
                }
            }
        }

        return $skills;
    }

    public static function getGuildId(Guild $guild)
    {
        if (!$guild) {
            return null;
        }
        if ($guild->refId) {
            return $guild->refId;
        }

        Log::warning('Guild has no refId.', ['name' => $guild->name, 'id' => $guild->id]);

        $user = $guild->user;
        if ($user) {
            Log::info('Trying user.', ['name' => $user->name, 'code' => $user->code]);

            return self::getGuildIdFromPlayer($user->code);
        }

        Log::warning('Guild has no user.', ['name' => $guild->name, 'id' => $guild->id]);

        return null;
    }

    public static function getGuildIdFromPlayer($player_code)
    {
        $player = self::getPlayer($player_code, false);

        return $player['guildRefId'] ?? null;
    }

    public static function getUnitKeys($raw = false)
    {
        $filename = 'swgoh.help/data/unitsList/unitsList.' . self::getLang() . '.json';
        $units = null;
        if (Storage::disk('sync')->exists($filename)) {
            $units = json_decode(Storage::disk('sync')->get($filename), true);
        } else {
            $filename = 'swgoh.help/data/unitsList/unitsList.ENG_US.json';
            if (Storage::disk('sync')->exists($filename)) {
                $units = json_decode(Storage::disk('sync')->get($filename), true);
            }
        }
        $result = [];
        if ($units) {
            if ($raw) {
                return collect($units)->sortBy('nameKey', SORT_NATURAL | SORT_FLAG_CASE);
            }
            foreach ($units as $key => $value) {
                $result[$value['baseId'] ?? 'error']['name'] = $value['nameKey'] ?? '';
                $result[$value['baseId'] ?? 'error']['desc'] = $value['descKey'] ?? '';
                $result[$value['baseId'] ?? 'error']['side'] = $value['forceAlignment'] ?? '';
                $result[$value['baseId'] ?? 'error']['categoryIdList'] = $value['categoryIdList'] ?? '';
                $result[$value['baseId'] ?? 'error']['combatType'] = $value['combatType'] ?? '';
            }
        }

        return $result;
    }

    public static function getUnitStatKeys()
    {
        $result = [
            'UNITSTATACCURACY' => ['name' => '', 'icon' => ''],
            'UNITSTATCRITICALCHANCEPERCENTADDITIVE' => ['name' => '', 'icon' => ''],
            'UNITSTATCRITICALDAMAGE' => ['name' => '', 'icon' => ''],
            'UNITSTATCRITICALNEGATECHANCEPERCENTADDITIVE' => ['name' => '', 'icon' => ''],
            'UNITSTATDEFENSE' => ['name' => '', 'icon' => ''],
            'UNITSTATDEFENSEPERCENTADDITIVE' => ['name' => '', 'icon' => ''],
            'UNITSTATEVASIONNEGATEPERCENTADDITIVE' => ['name' => '', 'icon' => ''],
            'UNITSTATMAXHEALTH' => ['name' => '', 'icon' => ''],
            'UNITSTATMAXHEALTHPERCENTADDITIVE' => ['name' => '', 'icon' => ''],
            'UNITSTATMAXSHIELD' => ['name' => '', 'icon' => ''],
            'UNITSTATMAXSHIELDPERCENTADDITIVE' => ['name' => '', 'icon' => ''],
            'UNITSTATOFFENSE' => ['name' => '', 'icon' => ''],
            'UNITSTATOFFENSEPERCENTADDITIVE' => ['name' => '', 'icon' => ''],
            'UNITSTATRESISTANCE' => ['name' => '', 'icon' => ''],
            'UNITSTATSPEED' => ['name' => '', 'icon' => ''],
        ];
        switch (app()->getLocale()) {
            case 'de':
                $result['UNITSTATACCURACY']['name'] = 'Potency (%)';
                $result['UNITSTATCRITICALCHANCEPERCENTADDITIVE']['name'] = 'CC (%)';
                $result['UNITSTATCRITICALDAMAGE']['name'] = 'CD (%)';
                $result['UNITSTATCRITICALNEGATECHANCEPERCENTADDITIVE']['name'] = 'CA (%)';
                $result['UNITSTATDEFENSE']['name'] = 'Defense';
                $result['UNITSTATDEFENSEPERCENTADDITIVE']['name'] = 'Defense (%)';
                $result['UNITSTATEVASIONNEGATEPERCENTADDITIVE']['name'] = 'Accuracy (%)';
                $result['UNITSTATMAXHEALTH']['name'] = 'Health';
                $result['UNITSTATMAXHEALTHPERCENTADDITIVE']['name'] = 'Health (%)';
                $result['UNITSTATMAXSHIELD']['name'] = 'Protection';
                $result['UNITSTATMAXSHIELDPERCENTADDITIVE']['name'] = 'Protection (%)';
                $result['UNITSTATOFFENSE']['name'] = 'Offense';
                $result['UNITSTATOFFENSEPERCENTADDITIVE']['name'] = 'Offense (%)';
                $result['UNITSTATRESISTANCE']['name'] = 'Tenacity (%)';
                $result['UNITSTATSPEED']['name'] = 'Speed';
                break;

            default:
                $result['UNITSTATACCURACY']['name'] = 'Potency (%)';
                $result['UNITSTATCRITICALCHANCEPERCENTADDITIVE']['name'] = 'CC (%)';
                $result['UNITSTATCRITICALDAMAGE']['name'] = 'CD (%)';
                $result['UNITSTATCRITICALNEGATECHANCEPERCENTADDITIVE']['name'] = 'CA (%)';
                $result['UNITSTATDEFENSE']['name'] = 'Defense';
                $result['UNITSTATDEFENSEPERCENTADDITIVE']['name'] = 'Defense (%)';
                $result['UNITSTATEVASIONNEGATEPERCENTADDITIVE']['name'] = 'Accuracy (%)';
                $result['UNITSTATMAXHEALTH']['name'] = 'Health';
                $result['UNITSTATMAXHEALTHPERCENTADDITIVE']['name'] = 'Health (%)';
                $result['UNITSTATMAXSHIELD']['name'] = 'Protection';
                $result['UNITSTATMAXSHIELDPERCENTADDITIVE']['name'] = 'Protection (%)';
                $result['UNITSTATOFFENSE']['name'] = 'Offense';
                $result['UNITSTATOFFENSEPERCENTADDITIVE']['name'] = 'Offense (%)';
                $result['UNITSTATRESISTANCE']['name'] = 'Tenacity (%)';
                $result['UNITSTATSPEED']['name'] = 'Speed';
                break;
        }

        return $result;
    }

    public static function getEventList()
    {
        $filename = 'swgoh.help/events/events.' . self::getLang() . '.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['events'] ?? null;
        }
        $filename = 'swgoh.help/events/events.ENG_US.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['events'] ?? null;
        }
        $filename = 'swgoh.help/events/events.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['events'] ?? null;
        }

        return null;
    }

    public static function validateAllyCode($allycode)
    {
        if ($allycode && is_numeric($allycode)) {
            if (preg_match(self::getCodePattern(), (string) $allycode)) {
                return $allycode;
            }
        }

        return null;
    }

    public static function validateAllyCodes($allycodes)
    {
        if (!$allycodes) {
            // empty input
            return [];
        }
        if (!\is_array($allycodes)) {
            // save single code as array
            $allycodes = [$allycodes];
        }

        $valid_codes = [];
        foreach ($allycodes as $key => $value) {
            $code = self::validateAllyCode($value);
            if ($code) {
                $valid_codes[] = $code;
            } else {
                Log::warning('Removed invalid Ally Code.', ['key' => $key, 'code' => $value]);
            }
        }

        return $valid_codes;
    }
}
