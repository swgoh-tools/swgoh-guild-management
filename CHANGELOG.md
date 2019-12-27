# swgoh-guild-management changes

## 1.5.2-dev (xxx)

-   [Player] update toon categories
-   [Global] add kit reveals to news feeds
-   [GUI] update sprites with textures of recent chars and ships

## 1.5.1 (2019-11-09)

-   [Player] add toon list grouped by categories (species, faction, profession) for players
-   [Player] add relic and zeta count to unit portraits
-   [GUI] show pending and failed background jobs on sync page
-   [GUI] add textures for relics and gear including glowing G13

## 1.5.0 (2019-10-12)

-   [GLOBAL] add feed reader for official game announcements
-   [LANG] fix broken language identification
-   [SYS] add line bot to send new feed entries as chat message
-   [SYS] add crawler for players

## 1.4.4-dev (2019-09)

-   [GUILD] add player stats and charts for mod secondaries
-   [GUILD] add additional reports for ability material
-   [GUILD] fix copy link for ship search
-   [Player] fix random sorting of units in toon page navigation
-   [LANG] add translation to player toons page
-   [GUI] add textures for material and credits
-   [SYS] auto transform all data lists from API calls to associative arrays

## 1.4.4-dev (2019-08)

-   [Player] add sortable list of all toons of a player with abilities and mods
-   [Player] add gear check (breakdown of required components) for toons
-   [Player] add gear stats
-   [Player] add salvage stats
-   [GUI] create and use local sprite sheets for pages with heavy use of textures

## 1.4.3 (2019-07-26)

-   [SYS] fix regression from v1.4.0 (broken content creation due to laravel-mix v4 changes)

## 1.4.2 (2019-07-21)

-   [LANG] activate Italian API syncs
-   [GUILD] fix guild selection session storage
-   [MISC] add Discord widget to contact page
-   [LANG] add missing strings to multilanguage files

## 1.4.1 (2019-07-03)

-   [GUILD] Split stats tables to prevent overflow with new championship data
-   [Player] Fix G13 recognition in player team checks
-   [SYS] Optimize sync file storage

## 1.4.0 (2019-06-09)

-   [SYS] update php framework and dependencies
-   [SYS] fix duplicate database calls on view composer callbacks
-   [LANG] additional language selectors

## 1.3.3 (2019-05-10)

-   [GUILD] separate menu item for custom guild pages
-   [GUILD] new hstr readiness reports

## 1.3.1 (2019-03-04)

-   [MISC] rework user registration
-   [GUILD] auto guild creation

## 1.3.0 (2019-03-02)

-   [SYS] implement job queuing (background sync)
-   [MISC] add textures
-   [GUILD] implement guild reports

## 1.2.0 (2018-11-19)

-   [SYS] use swgoh.help api 5.x
-   [Player] prepare individual player pages

## 1.1.1 (2018-10-21)

First public release

-   [LANG] Improved Multilanguage
-   [GLOBAL] Additional Data Reports (zetas, events)
-   [SYS] Update swgoh.help api calls to v4
-   [MISC] Bugfixes
