<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General App Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during general app actions and are
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'description' => 'SWGoH info page by guild :name. Guild rules, game info and data reports to analyse toons and squad progress.',
    'disclaimer' => 'Not affiliated with EA, Capital Games, Disney, Lucasfilm or the like.',
    'disclaimer_community' => 'Recommendations for players by players. No warranties!',
    'color_disclaimer' => 'Colour codes represent a quick assessment only.',
    'created_by' => 'Created by :name',
    'comments' => 'comment|comments',
    'replies' => 'reply|replies',
    'modified_by' => 'Modified by :name',
    'last_modified_by' => 'Last modified by :name',
    'report_any_issues' => 'Please report any issues.',
    'you_registered_on' => 'You registered on page :url.',
    'introduction' => [
        'guilds' => 'Guild pages are public. Registration is not required for guild members or interested parties to get yourself informed.',
        'guilds-test' => 'There is a Test Guild that allows leaders and officers to familiarize with content creation without messing up own official guild pages.',
        'threads'    => 'There is a global (unrelated to guild pages) forum section. Posts are public. It allows any registered user to ask or answer questions.',
        'pages'  => 'Registered users who received additional permissions (leader or officer) are able to create, modify and delete guild-specific pages.',
        'tools'   => 'There are tools to analyse the roster and squad states of guild members. It makes use of great game data interfaces provided by the like of swgoh.gg or swgoh.help. It is WIP. Guild specific syncs require proper user/guild setup. Call admin for assistance.',
    ],
    'howto' => [
        'click_head' => 'Click on a table head to make the table sortable and searchable.',
        'new_tab' => 'Links open within the same window by default. To open a link within a new tab please refer to your browser\'s functionality.
            E.g. click the middle mouse button/scroll wheel, left mouse click holding the ctrl key, right mouse click (menu) + open in new tab.',
    ],
    'events' => [
        'title' => 'Events',
        'intro' => 'List of important events currently active in-game.',
        'description' => 'List of all events that are currently available. Some are one-time-events, that means you won\'t see them anymore if you already completed the event.',
        'legend' => 'See <a href="https://swgohevents.com">swgohevents.com</a> to get projections of future events.',
    ],
    'sync' => [
        'intro' => 'The following list contains the data sources of this webpage. State shows the result of the most recent sync request.',
        'description' => 'Guild data are automatically synced once per day. Manual sync request by users may be possible but should not be needed.
        To prevent misuse and unnecessary impact on source servers there are thresholds and cooldowns defined.
        E.g. most requests will only be processed if the existing data is more than 1 day old.',
        'legend' => 'There will be sync issues from time to time.
        This might happen if source servers are not available. Other reasons are changes to data structures done on the source server.
        This may lead to processing errors and requires changes to the code of this webpage.',
    ],
    'squads' => [
        'title' => 'Wellkown Squads',
        'intro' => 'Community list of team compositions that work especially well in certain situations.',
        'description' => 'The <strong>value added</strong> by this side comes from the column "Link". As long as a team composition mentions no more than 5 toons, the link leads directly to the team search for the <strong>status of the whole guild</strong>.',
        'legend' => 'A player who only wants to analyse his own team progress might as well use the presentation over at <a href="https://swgoh.help">swgoh.help</a>.',
        'used_for_calculation' => 'Takes into account the unit count, gear level, unit level and stars.',
        'field_order' => 'Order of values used in the table.',
        'direct_link_info' => 'Direct link. Can be used to share this exact team composition for this guild.',
    ],
    'stats' => [
        'equal_damage' => 'If multiple players account for the same amount of damage ranking is set by RNG.',
        'requirements' => 'The character strength needed to complete :name is estimated at <strong>:rarity stars</strong>,
            <strong>level :level</strong> and <strong>gear :gear</strong>.',
        'tiers' => 'Has <strong>:count</strong> tiers.',
        'short_name' => 'Common abbreviations: <strong>:name</strong>.',
        'rancor_intro' => 'Oldest raid of the game.',
        'tank_intro' => 'Second raid of the game.',
        'sith_intro' => 'Third and newest raid of the game.',
        'auto_solo_prepared' => 'According to guild data available there are :count guild members with a team that is capable of <strong>auto soloing</strong> :name.',
        'solo_prepared' => 'According to guild data available there are :count guild members with a team that might be able to <strong>solo</strong> :name.',
        'auto_solo_info' => 'That means using <em>one single</em> team in <em>auto play mode</em> to complete all 4 phases and get the maximum <strong>:max</strong> damage points:footnote.',
        'solo_info' => 'That means using <em>one single</em> team to <em>manually</em> complete all 4 phases and get the maximum <strong>:max</strong> damage points:footnote.',
        'auto_solo_soon' => 'Another :count guild members likely are or soon will be capable of auto soloing.',
        'solo_soon' => 'Another :count guild members have at least one known solo team in advanced condition.',
        'rancor_info' => 'Due to the maturity of this raid there are uncountable different team compositions viable for rancor solo runs.',
        'tank_info' => 'Auto soloing HAAT is not yet possible with current teams. Solo runs require decent knowledge of team and opponent as well as good (manual) timing.',
        'sith_info' => 'Solo runs on HSTR are not possible. Even soloing a single phase is not possible. This raid requires the whole guild working together.
            Every player should aim at doing about 4-6% damage per phase.
            That means <em>every</em> player ideally has at least <strong>4 raid teams</strong> with different characters (no roster refresh) available.',
        'sith_progress_count_info' => 'Progress bars above show the percentage of damage contributed by players per phase.
            Progress bars below show how many players of the guild are raid-ready.',
        'sith_prepared' => 'According to guild data available there are :count guild members:footnote with viable teams for contributing about :damage damage.',
        'sith_soon' => 'Another :count guild members:footnote have at least one known team in advanced condition for contributing about :damage damage.',
        'sith_health' => 'Estimated boss health: <strong>:health</strong>.',
        'sith_undefined' => 'There are no specific team proposals for this phase.',
    ],
    'roster' => [
        'intro' => 'List of all toons owned by memberes of guild :guild.',
        'description' => 'Please be patient. Page loading may take some time due to loading all toons. The number behind headers shows by how many guild members a character is owned.',
    ],
    'targeting' => [
        'title' => 'AI Targeting Rules',
        'intro' => 'List of rules defined for AI targeting.',
        'description' => 'This list contains all abilities (characters and ships) that have targeting rules for the AI associated with them.',
        'legend' => 'Ability types: L = Leader, B = Basic, U = Unique, S = Special, RI = Reinforcement',
    ],
    'zetas' => [
        'title' => 'Zeta Ratings',
        'intro' => 'List of zeta recommendations.',
        'description' => 'This list contains all zetas with ratings. Ratings were created by a group of passionate players and are updated regularly.',
        'legend' => 'Range from 1 (best) to 10 (worst). 0 = not rated yet.',
    ],
    'user' => [
        'no_activities' => 'There is no activity for this user yet.',
        'reply_favorited_by' => ':name favorited a reply.',
    ],
    'check' => [
        'unit_is_leader' => 'The unit in the leader slot is a leader (:skill).',
        'unit_is_leader_fail' => 'The unit in the leader slot is not a leader. Oops!?',
        'level_is_max' => ' The unit is at max level (:level/:max).',
        'level_is_max_fail' => 'The unit\'s level is not maxed out (:level/:max).',
        'gear_is_max_ship' => ' Gear at :gear? That\'s not supposed to happen. Contact admin.',
        'gear_is_max_ship_one' => 'Gear level for ships is always the same (1).',
        'gear_is_max' => 'The unit has all known gear pieces (:max). Nice!',
        'gear_is_max_near' => 'The unit is geared well (:gear) but not at its best yet (:max).',
        'gear_is_max_fail' => 'The unit still lacks a lot of gear (:gear).',
        'rarity_is_max' => 'The unit is fully unlocked (:rarity stars).',
        'rarity_is_max_fail' => 'The unit is not yet farmed/unlocked to its full potential (:rarity/:max stars).',
        'mod_count_is_max' => 'The unit is equipped with all :max mods.',
        'mod_count_is_max_fail' => 'The unit is missing :missing mods. Fill the missing slots immediately.',
        'mod_pips_is_max' => 'A :pips-pip-mod. Very impressive!',
        'mod_pips_is_max_near' => ':pips-pip-mod found. Slicing to :max would be possible.',
        'mod_pips_is_max_ship_fail' => ':pips-pip-mod found. Check for replacement. For ships only mod level and mod pips count. Mod stats are not relevant.',
        'mod_pips_is_max_fail' => ':pips-pip-mod found. Please double check if this is really an arena mod!',
        'mod_level_is_max' => 'The mod is leveled to max (:max).',
        'mod_level_is_max_fail' => ' The mod only has a level of :level. Max out to (:max) immediately or replace it.',
        'skill_is_max' => 'Ability <em>:name</em> is maxed out (:skill).',
        'skill_is_max_fail' => 'Ability <em>:name</em> is at tier :skill/:max.',
        'skill_is_max_contract' => 'Contract <em>:name</em> is maxed out (:skill).',
        'skill_is_max_hardware' => 'Reinforcement <em>:name</em> is maxed out (:skill).',
        'skill_is_max_hardware_ignore' => 'Ability <em>:name</em> is a reinforcement ability and therefore not relevant. Tier :skill.',
        'skill_is_max_leader_ignore' => 'Ability <em>:name</em> is a leader ability and therefore not relevant. Tier :skill.',
        'zeta_ranking' => 'Zeta Rank: :zeta (1:good to 10:bad, see <a href=":route">Zeta Ranking</a> for details)',
        'zeta_missing' => 'Zeta missing.',
        'omega_missing' => 'Omega missing.',
        'urgent' => 'Check immediately.',
    ],
];
