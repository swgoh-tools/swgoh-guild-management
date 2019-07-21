<?php

return array (
  'guild' => 
  array (
    'title' => 'Guild (:name)',
    'intro' => 'SWGoH info page by guild :name.',
    'description' => 'Guild rules, game info and data reports to analyse toons and squad progress.',
    'legend' => 'Guild pages are public. Registration is not required for guild members or interested parties to get yourself informed.',
  ),
  'events' => 
  array (
    'title' => 'Events',
    'intro' => 'List of important events currently active in-game.',
    'description' => 'List of all events that are currently available. Some are one-time-events, that means you won\'t see them anymore if you already completed the event.',
    'legend' => 'See <a href="https://swgohevents.com">swgohevents.com</a> to get projections of future events.',
  ),
  'player' => 
  array (
    'title' => 'Player (:name)',
    'intro' => 'SWGoH info page of player :name.',
    'description' => 'Game info and data reports to analyse toons and squad progress.',
    'legend' => 'Player and guild pages are public.',
  ),
  'sync' => 
  array (
    'intro' => 'The following list contains the data sources of this webpage. State shows the result of the most recent sync request.',
    'description' => 'Guild data are automatically synced once per day. Manual sync request by users may be possible but should not be needed.
        To prevent misuse and unnecessary impact on source servers there are thresholds and cooldowns defined.
        E.g. most requests will only be processed if the existing data is more than 1 day old.',
    'legend' => 'There will be sync issues from time to time.
        This might happen if source servers are not available. Other reasons are changes to data structures done on the source server.
        This may lead to processing errors and requires changes to the code of this webpage.',
  ),
  'squads' => 
  array (
    'title' => 'Wellkown Squads',
    'intro' => 'Community list of team compositions that work especially well in certain situations.',
    'description' => 'The <strong>value added</strong> by this side comes from the column "Link". As long as a team composition mentions no more than 5 toons, the link leads directly to the team search for the <strong>status of the whole guild</strong>.',
    'legend' => 'A player who only wants to analyse his own team progress might as well use the presentation over at <a href="https://swgoh.help">swgoh.help</a>.',
    'used_for_calculation' => 'Takes into account the unit count, gear level, unit level and stars.',
    'field_order' => 'Order of values used in the table.',
    'direct_link_info' => 'Direct link. Can be used to share this exact team composition for this guild.',
  ),
  'roster' => 
  array (
    'title' => 'Full Roster',
    'intro' => 'List of all toons owned by memberes of guild :guild.',
    'description' => 'Please be patient. Page loading may take some time due to loading all toons. The number behind headers shows by how many guild members a character is owned.',
  ),
  'threads' => 
  array (
    'title' => 'Forum',
    'intro' => 'Global forum section.',
    'description' => 'Posts are public. Any registered user may create topics and answers.',
  ),
  'targeting' => 
  array (
    'title' => 'AI Targeting Rules',
    'intro' => 'List of rules defined for AI targeting.',
    'description' => 'This list contains all abilities (characters and ships) that have targeting rules for the AI associated with them.',
    'legend' => 'Ability types: L = Leader, B = Basic, U = Unique, S = Special, RI = Reinforcement',
  ),
  'zetas' => 
  array (
    'title' => 'Zeta Ratings',
    'intro' => 'List of zeta recommendations.',
    'description' => 'This list contains all zetas with ratings. Ratings were created by a group of passionate players and are updated regularly.',
    'legend' => 'Range from 1 (best) to 10 (worst). 0 = not rated yet.',
  ),
);
