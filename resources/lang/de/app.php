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

    'description' => 'SWGoH-Infoseite der Gilde :name. Gildenregeln, Spiel-Infos und Datenauswertungen zur Analyse der Charaktere und Trupp-Entwicklung.',
    'created_by' => 'Erstellt von :name',
    'comments' => 'Kommentar|Kommentare',
    'replies' => 'Antwort|Antworten',
    'modified_by' => 'Geändert von :name',
    'last_modified_by' => 'Zuletzt geändert von :name',
    'you_registered_on' => 'Du hast Dich auf der Seite :url registriert.',
    'introduction' => [
        'guilds' => 'Gildenseiten sind öffentlich. Eine Registrierung ist nicht erforderlich, um sich als Gildenmitglied oder Interessent zu informieren.',
        'guilds-test' => 'Es existiert eine Test-Gilde, die es Anführern und Offizieren ermöglicht, sich mit der Inhaltsbearbeitung vertraut zu machen ohne die eigenen offiziellen Gildenseiten in Mitleidenschaft zu ziehen.',
        'threads'    => 'Es gibt einen globalen (gildenunabhängigen) Forumsbereich. Beiträge sind öffentlich. Jeder registierte Benutzer hat die Möglichkeit Fragen zu stellen und zu beantworten.',
        'pages'  => 'Registrierte Benutzer mit zusätzlichen Berechtigungen (Anführer, Offiziere) haben die Möglicheit, Gildenseiten anzulegen, zu bearbeiten und zu löschen.',
        'tools'   => 'Es werden Werkzeuge zur Analyse der Charaktere und Trupp-Entwicklung der Gildenmitglieder bereitgestellt. Genutzt werden großartige Datenschnittstellen wie swgoh.gg und swgoh.help. Gildenspezifische Datenabfragen erfordern eine korrekte Benutzer/Gilden-Konfiguration. Für Hilfe an einen Admin wenden.',
    ],
    'datatables' => [
        'click_head' => 'Beim Klick auf den Spaltenkopf einer Tabelle wird diese sortierbar und durchsuchbar.',
    ],
    'events' => [
        'title' => 'Events',
        'intro' => 'Liste aller Events, die zur Zeit im Spiel aktiv sind.',
        'description' => 'Mache Events sind nur einmal spielbar. D. h. diese sind nicht mehr sichtbar, sobald sie erfolgreich abgeschlossen wurden.',
        'legend' => 'Siehe <a href="https://swgohevents.com">swgohevents.com</a> für eine Kalkulation zukünftiger Termine.',
    ],
    'roster' => [
        'intro' => 'Übersicht aller Toons, die die Mitglieder der Gilde :guild besitzen.',
        'description' => 'Das Laden der Seite kann etwas dauern, da alle Charaktere sofort geladen werden. Die Zahl hinter den Bezeichnungen gibt an, wieviele Gildenmitglieder den Charakter besitzen.',
    ],
    'zetas' => [
        'title' => 'Zeta Ratings',
        'intro' => 'Liste mit Zeta Empfehlungen.',
        'description' => 'Die Liste enthält alle Zeta-Fähigkeiten mit Bewertungen. Die Bewertungen wurden von einer Gruppe von leidenschaftlichen SWGoH-Spielern erstellt und werden regelmäßig aktualisiert.',
        'legend' => 'Werte zwischen 1 (sehr gut) und 10 (sehr schlecht). 0 = noch nicht bewertet.',
    ],
    'data_keys' => [
        'updated' => 'Aktualisiert',
        'player' => 'Spieler',
        'allyCode'    => 'Allycode',
        'type'  => 'Typ',
        'gp'  => 'GM',
        'starLevel'   => 'Sterne',
        'level'   => 'Level',
        'gearLevel'   => 'Rüst.level',
        'gear'   => 'Ausrüstung',
        'zetas'   => 'Zetas',
        'mods'   => 'Mods',
        'rarity'   => 'Sterne',
        'name'   => 'Bezeichnung',
        'note'   => 'Bemerkung',
        'url'   => 'URL',
        'team'   => 'Team',
        'pid'   => 'Spieler-ID',
        'skills' => 'Fähigkeiten',
        'equipped' => 'Angelegt',
        'crew' => 'Crew',
        'xp' => 'XP',
        'toon' => 'Charakter',
        'pvp' => 'PVP',
        'tw' => 'TKrieg',
        'tb' => 'TSchlacht',
        'pit' => 'PIT',
        'tank' => 'Tank',
        'sith' => 'Sith',
        'versa' => '=Synopse',
        'nameKey' => 'Name',
        'descKey' => 'Beschreibung',
        'summaryKey' => 'Zusammenfassung',
        'gameEventType' => 'Event Typ',
        'gameEventStatus' => 'Event Status',
        'squadType' => 'Squads?',
        'startTime' => 'Start',
        'endTime' => 'Ende',
        'displayStartTime' => 'Start (Anzeige)',
        'displayEndTime' => 'Ende (Anzeige)',
        'timeLimited' => 'Dauer?',
    ],

];
