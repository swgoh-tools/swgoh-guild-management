<?php

return array(
  'ability_mats' =>
  array(
    'title' => 'Ability Material Costs',
    'intro' => 'Breakdown of material needed to craft abilities (skills).',
    'description' => '',
    'description_tiers' => 'Additional columns showing the quantity of material needed per <strong>ability (skill) tier</strong>.',
    'description_stars' => 'Additional columns clustering the quantity of material needed according to <strong>star requirement (rarity)</strong> of a unit.',
    'description_gear' => 'Additional columns clustering the quantity of material needed according to <strong>gear requirement</strong> of a unit.',
    'description_relics' => 'Additional columns clustering the quantity of material needed according to <strong>relics requirement</strong> of a unit. NOTE: Most likely to become relevant in near future. Looking at you, relic abilities. Nothing to see here right now.',
    'description_levels' => 'Additional columns clustering the quantity of material needed according to <strong>level requirement</strong> of a unit. NOTE: Because of the high number of levels (85) the tables won\'t look that pretty. Sorry for that!',
    'description_recipes' => 'The following tables show the \'ingredients\' that have been defined as <strong>upgrade cost to the next level</strong> for each type of ability. NOTE: T1 stands for the costs to upgrade an ability from tier 1 to tier 2. The upgrade cost to tier 8 can be either omega (T7) or zeta (T7zeta). Never both. And never something else.',
    'legend' => '',
  ),
  'guild' =>
  array(
    'title' => 'Guild (:name)',
    'intro' => 'SWGoH info page by guild :name.',
    'description' => 'Guild rules, game info and data reports to analyse toons and squad progress.',
    'legend' => 'Guild pages are public. Registration is not required for guild members or interested parties to get yourself informed.',
  ),
  'news' =>
  array(
    'title' => 'News Feed',
    'intro' => 'News are collected from the official forums.',
    'description' => 'There are several Discord bots out there that will notify you if you don\'t like watching webpages for changes yourself. I could not find a Line.me bot to do that so I created one for my guild. Unfortunately Line.me bots are extremely limited for developers from the US and EU therefore I cannot share the bot on this page. If you are interested, contact me.',
    'legend' => '',
  ),
  'events' =>
  array(
    'title' => 'Events',
    'intro' => 'List of important events currently active in-game.',
    'description' => 'List of all events that are currently available. Some are one-time-events, that means you won\'t see them anymore if you already completed the event.',
    'legend' => 'See <a href="https://swgohevents.com">swgohevents.com</a> to get projections of future events.',
  ),
  'player' =>
  array(
    'title' => 'Player (:name)',
    'intro' => 'SWGoH info page of player :name.',
    'description' => 'Game info and data reports to analyse toons and squad progress.',
    'legend' => 'Player and guild pages are public.',
  ),
  'tableList' =>
  array(
    'title' => 'Table List',
    'intro' => 'Raw printout of swgoh.help\'s TableList.',
    'description' => 'This report includes a collection of various game configurations. E.g. role mastery definitions (relics), GAC promotion thresholds, galactic power calculations, etc.',
    'legend' => '',
  ),
  'guild_stats_players' =>
  array(
    'title' => 'Player Stats',
    'intro' => 'Statistics on player progression.',
    'description' => 'Reports on units (chars and ships mixed as of now) and mod properties.',
    'legend' => '',
  ),
  'sync' =>
  array(
    'intro' => 'The following list contains the data sources of this webpage. State shows the result of the most recent sync request.',
    'description' => 'Guild data are automatically synced once per day. Manual sync request by users may be possible but should not be needed.
        To prevent misuse and unnecessary impact on source servers there are thresholds and cooldowns defined.
        E.g. most requests will only be processed if the existing data is more than 1 day old.',
    'legend' => 'There will be sync issues from time to time.
        This might happen if source servers are not available. Other reasons are changes to data structures done on the source server.
        This may lead to processing errors and requires changes to the code of this webpage.',
  ),
  'squads' =>
  array(
    'title' => 'Wellkown Squads',
    'intro' => 'Community list of team compositions that work especially well in certain situations.',
    'description' => 'The <strong>value added</strong> by this side comes from the column "Link". As long as a team composition mentions no more than 5 toons, the link leads directly to the team search for the <strong>status of the whole guild</strong>.',
    'legend' => 'A player who only wants to analyse his own team progress might as well use the presentation over at <a href="https://swgoh.help">swgoh.help</a>.',
    'used_for_calculation' => 'Takes into account the unit count, gear level, unit level and stars.',
    'field_order' => 'Order of values used in the table.',
    'direct_link_info' => 'Direct link. Can be used to share this exact team composition for this guild.',
  ),
  'roster' =>
  array(
    'title' => 'Full Roster',
    'intro' => 'List of all toons owned by memberes of guild :guild.',
    'description' => 'Please be patient. Page loading may take some time due to loading all toons. The number behind headers shows by how many guild members a character is owned.',
  ),
  'threads' =>
  array(
    'title' => 'Forum',
    'intro' => 'Global forum section.',
    'description' => 'Posts are public. Any registered user may create topics and answers.',
  ),
  'targeting' =>
  array(
    'title' => 'AI Targeting Rules',
    'intro' => 'List of rules defined for AI targeting.',
    'description' => 'This list contains all abilities (characters and ships) that have targeting rules for the AI associated with them.',
    'legend' => 'Ability types: L = Leader, B = Basic, U = Unique, S = Special, RI = Reinforcement',
  ),
  'p_toons_category' =>
  array(
    'title' => 'Toons (Categories)',
    'intro' => 'List of toons grouped by most relevant categories (oppinionated).',
    'description' => 'This list groups every unit into one - and only one - category. This is an oppinionated approach since most characters belong to multiple categories (like factions, species, profession, etc.). If you disagree feel free to get in touch via Discord or forums. Reworks or new units easily shake up old/existing synergies. There are a few instances where units have been added to categories without having the appropriate tag. E.g. Shaak Ti is a Jedi leader but only makes sense with clones. Same for Lobot and droids and so on.',
    'legend' => 'Abilities are shown below a unit only if that specific ability has been unlocked. Zeta count and Relic tier are shown as overlay on a units picture. Units with a coloured background have been put in a category for which they have no matching faction tag but fit better due to their synergies.',
  ),
  'zetas' =>
  array(
    'title' => 'Zeta Ratings',
    'intro' => 'List of zeta recommendations.',
    'description' => 'This list contains all zetas with ratings. Ratings were created by a group of passionate players and are updated regularly.',
    'legend' => 'Range from 1 (best) to 10 (worst). 0 = not rated yet.',
  ),
);
