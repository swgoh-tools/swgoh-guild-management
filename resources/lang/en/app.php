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
    'created_by' => 'Created by :name',
    'comments' => 'comment|comments',
    'replies' => 'reply|replies',
    'modified_by' => 'Modified by :name',
    'last_modified_by' => 'Last modified by :name',
    'you_registered_on' => 'You registered on page :url.',
    'introduction' => [
        'guilds' => 'Guild pages are public. Registration is not required for guild members or interested parties to get yourself informed.',
        'guilds-test' => 'There is a Test Guild that allows leaders and officers to familiarize with content creation without messing up own official guild pages.',
        'threads'    => 'There is a global (unrelated to guild pages) forum section. Posts are public. It allows any registered user to ask or answer questions.',
        'pages'  => 'Registered users who received additional permissions (leader or officer) are able to create, modify and delete guild-specific pages.',
        'tools'   => 'There are tools to analyse the roster and squad states of guild members. It makes use of great game data interfaces provided by the like of swgoh.gg or swgoh.help. It is WIP. Guild specific syncs require proper user/guild setup. Call admin for assistance.',
    ],
    'datatables' => [
        'click_head' => 'Click on a table head to make the table sortable and searchable.',
    ],
    'events' => [
        'title' => 'Events',
        'intro' => 'List of events currently active in-game.',
        'description' => 'List of all events that are currently available. Some are one-time-events, that means you won\'t see them anymore if you already completed the event.',
        'legend' => 'See <a href="https://swgohevents.com">swgohevents.com</a> to get projections of future events.',
    ],
    'roster' => [
        'intro' => 'List of all toons owned by memberes of guild :guild.',
        'description' => 'Please be patient. Page loading may take some time due to loading all toons. The number behind headers shows by how many guild members a character is owned.',
    ],
    'zetas' => [
        'title' => 'Zeta Ratings',
        'intro' => 'List of zeta recommendations.',
        'description' => 'This list contains all zetas with ratings. Ratings were created by a group of passionate players and are updated regularly.',
        'legend' => 'Range from 1 (best) to 10 (worst). 0 = not rated yet.',
    ],
    'data_keys' => [
        'updated' => 'Updated',
        'player' => 'Player',
        'allyCode'    => 'Allycode',
        'type'  => 'Type',
        'gp'  => 'GP',
        'starLevel'   => 'Stars',
        'level'   => 'Level',
        'gearLevel'   => 'Gear Level',
        'gear'   => 'Gear',
        'zetas'   => 'Zetas',
        'mods'   => 'Mods',
        'rarity'   => 'Stars',
        'name'   => 'Name',
        'note'   => 'Note',
        'url'   => 'URL',
        'team'   => 'Team',
        'pid'   => 'Player ID',
        'skills' => 'Abilities',
        'equipped' => 'Equipped',
        'crew' => 'Crew',
        'xp' => 'XP',
        'toon' => 'Toon',
        'pvp' => 'PVP',
        'tw' => 'TW',
        'tb' => 'TB',
        'pit' => 'PIT',
        'tank' => 'Tank',
        'sith' => 'Sith',
        'versa' => '=Synopsis',
        'nameKey' => 'Name',
        'descKey' => 'Description',
        'summaryKey' => 'Summary',
        'gameEventType' => 'Event Type',
        'gameEventStatus' => 'Event Status',
        'squadType' => 'Squads?',
        'startTime' => 'Start',
        'endTime' => 'End',
        'displayStartTime' => 'Start (Display)',
        'displayEndTime' => 'End (Display)',
        'timeLimited' => 'time limited?',
    ],

];
