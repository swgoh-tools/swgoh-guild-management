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
    'disclaimer_community' => 'Empfehlungen von Spielern für Spieler. Unverbindlich!',
    'color_disclaimer' => 'Farbliche Markierungen nur zur groben Einordnung.',
    'created_by' => 'Erstellt von :name',
    'comments' => 'Kommentar|Kommentare',
    'replies' => 'Antwort|Antworten',
    'modified_by' => 'Geändert von :name',
    'last_modified_by' => 'Zuletzt geändert von :name',
    'report_any_issues' => 'Auffälligkeiten gern melden.',
    'you_registered_on' => 'Du hast Dich auf der Seite :url registriert.',
    'introduction' => [
        'guilds' => 'Gildenseiten sind öffentlich. Eine Registrierung ist nicht erforderlich, um sich als Gildenmitglied oder Interessent zu informieren.',
        'guilds-test' => 'Es existiert eine Test-Gilde, die es Anführern und Offizieren ermöglicht, sich mit der Inhaltsbearbeitung vertraut zu machen ohne die eigenen offiziellen Gildenseiten in Mitleidenschaft zu ziehen.',
        'threads'    => 'Es gibt einen globalen (gildenunabhängigen) Forumsbereich. Beiträge sind öffentlich. Jeder registierte Benutzer hat die Möglichkeit Fragen zu stellen und zu beantworten.',
        'pages'  => 'Registrierte Benutzer mit zusätzlichen Berechtigungen (Anführer, Offiziere) haben die Möglicheit, Gildenseiten anzulegen, zu bearbeiten und zu löschen.',
        'tools'   => 'Es werden Werkzeuge zur Analyse der Charaktere und Trupp-Entwicklung der Gildenmitglieder bereitgestellt. Genutzt werden großartige Datenschnittstellen wie swgoh.gg und swgoh.help. Gildenspezifische Datenabfragen erfordern eine korrekte Benutzer/Gilden-Konfiguration. Für Hilfe an einen Admin wenden.',
    ],
    'howto' => [
        'click_head' => 'Beim Klick auf den Spaltenkopf einer Tabelle wird diese sortierbar und durchsuchbar.',
        'new_tab' => 'Die Links öffenen standardmäßig im gleichen Fenster. Wer einen neuen Tab öffen möchte, kann die Standardfunktionen des Browsers nutzen.
            Z.B. Klick mit der mittleren Maustaste/Mausrad, Klick mit der linken Maustaste bei gedrückter STRG-Taste, Rechtsklick + in neuem Tab öffnen.',
    ],
    'events' => [
        'title' => 'Events',
        'intro' => 'Liste wichtiger Events, die zur Zeit im Spiel aktiv sind.',
        'description' => 'Mache Events sind nur einmal spielbar. D. h. diese sind nicht mehr sichtbar, sobald sie erfolgreich abgeschlossen wurden.',
        'legend' => 'Siehe <a href="https://swgohevents.com">swgohevents.com</a> für eine Kalkulation zukünftiger Termine.',
    ],
    'roster' => [
        'intro' => 'Übersicht aller Toons, die die Mitglieder der Gilde :guild besitzen.',
        'description' => 'Das Laden der Seite kann etwas dauern, da alle Charaktere sofort geladen werden. Die Zahl hinter den Bezeichnungen gibt an, wieviele Gildenmitglieder den Charakter besitzen.',
    ],
    'sync' => [
        'intro' => 'In der folgenden Liste sind die Datenquellen für diese Seite gelistet. Der Status ist jeweils das Ergebnis der letzten Aktualisierung.',
        'description' => 'Gildendaten werden täglich automatisiert abgerufen. Auch registrierte Benutzer können grundsätzlich eine Aktualisierung für die verschiedenen Daten anstoßen.
        Um Missbrauch und eine unnötige Belastung der Quellserver zu vermeiden, sind verschiedene Abklingzeiten hinterlegt.
        Bspw. werden die meisten Daten nur neu angefordert, wenn der bestehende Datenbestand älter als 1 Tag ist.',
        'legend' => 'Gelegentlich werden bei der Synchronisation Fehler auftreten.
        Dies kann etwa daraus resultieren, dass der angefragte Server nicht verfügbar ist.
        Auch kommt es vor, dass auf der Gegenseite die Struktur der Daten geändert wird, was zu Fehlern bei der Verarbeitung führt und Anpassungen auf dieser Seite erfordert.',
    ],
    'stats' => [
        'equal_damage' => 'Bei gleicher Punktausbeute entscheidet das Spiel per Zufallsgenerator, wer auf welcher Platzierung landet und die dazugehörige Beute/Belohnung erhält.',
        'requirements' => 'Der Richtwert für die Stärke benötigter Charaktere liegt beim :name bei <strong>:rarity Sternen</strong>,
            <strong>Stufe/Level :level</strong> und <strong>Ausrüstung der Stufe :gear</strong>.',
        'tiers' => 'Hat <strong>:count</strong> Schwierigkeitsstufen.',
        'short_name' => 'Gängige Abkürzungen: <strong>:name</strong>.',
        'rancor_intro' => 'Der älteste Raid im Spiel.',
        'tank_intro' => 'Der zweite Raid des Spiels.',
        'sith_intro' => 'Der dritte und neueste Raid des Spiels.',
        'auto_solo_prepared' => 'Laut den vorliegenden Daten haben definitiv :count Gildenmitglieder ein Team, um den :name <strong>auto-solo</strong> zu spielen.',
        'solo_prepared' => 'Laut den vorliegenden Daten haben :count Gildenmitglieder ein Team, mit dem es möglich sein könnte, den :name <strong>solo</strong> zu spielen.',
        'auto_solo_info' => 'Das heißt mit einem <em>einzigen</em> Team im <em>Auto-Play-Modus</em> alle 4 Phasen besiegen und die maximale Punkteausbeute von <strong>:max</strong> Schaden mitzunehmen:footnote.',
        'solo_info' => 'Das heißt mit einem <em>einzigen</em> Team <em>manuell</em> alle 4 Phasen besiegen und die maximale Punkteausbeute von <strong>:max</strong> Schaden mitzunehmen:footnote.',
        'auto_solo_soon' => 'Weitere :count Gildenmitglieder sind vermutlich bereits oder demnächst solo-fähig.',
        'solo_soon' => 'Weitere :count Gildenmitglieder haben mindestens ein bekanntes Solo-Team im fortgeschrittenen Zustand.',
        'rancor_info' => 'Da der Raid so alt ist, gibt es unzählige unterschiedliche Teams, mit denen sich der Rancor solo besiegen lässt.',
        'tank_info' => 'Ein auto-solo ist mit aktuellen Teams im HAAT nicht möglich. Sololäufe erfordern gute Kenntnis von Team und Gegner sowie gutes (manuelles) Timing.',
        'sith_info' => 'Ein Solo des Raids ist nicht möglich.
            Selbst das Solo einer einzelnen Phase ist nicht möglich.
            Es ist die Zusammenarbeit der gesamten Gilde notwendig.
            Ziel sollte es sein, dass jeder Spieler pro Phase jeweils 4-6% Schaden macht.
            <em>Jeder</em> hat im Idealfall also mindestens <strong>4 verschiedene Teams</strong> mit unterschiedlichen Charakteren parat.',
        'sith_progress_count_info' => 'Während oben der prozentuale Schadensanteil an der jeweiligen Phase abgetragen ist wird im Folgenden dargestellt, wie viele Spieler aus der Gilde jeweils "einsatzbereit" sind.',
        'sith_prepared' => 'Laut den vorliegenden Daten steuern :count Gildenmitglieder:footnote insgesamt ca. :damage Schaden bei.',
        'sith_soon' => 'Weitere :count Gildenmitglieder:footnote haben mindestens ein passendes Team im fortgeschrittenen Zustand für ca. :damage Schaden.',
        'sith_health' => 'Geschätzte Lebenspunkte des Bosses: <strong>:health</strong>.',
        'sith_undefined' => 'Zu dieser Phase gibt es keine zusätzlichen Team-Vorschläge.',
    ],
    'squads' => [
        'title' => 'Vordefinierte Teams',
        'intro' => 'Die Spielergemeinschaft hat eine Liste von Teams zusammengetragen, die sich für verschiedene Situationen besonders gut eignen.',
        'description' => 'Der <strong>Mehrwehrt</strong> auf dieser Seite besteht in der Spalte "Link". Besteht eine Teamempfehlung aus 1-5 Charakteren, kann damit direkt zur Teamsuche mit dem <strong>Status der gesamten Gilde</strong> gesprungen werden.',
        'legend' => 'Will ein Spieler nur seine eigenen Teams analysieren, ist die Darstellung auf <a href="https://swgoh.help">swgoh.help</a> zu empfehlen.',
        'used_for_calculation' => 'Anzahl der vorhandenen Toons, Ausrüstungsstufe, Level und Sterne werden berücksichtigt.',
        'field_order' => 'Reihenfolge der Angabe bei den Toons',
        'direct_link_info' => 'Direkter Link. Kann zum Weitergeben und Verweis auf genau diese Team-Zusammenstellung dieser Gilde genutzt werden.',
    ],
    'zetas' => [
        'title' => 'Zeta Ratings',
        'intro' => 'Liste mit Zeta Empfehlungen.',
        'description' => 'Die Liste enthält alle Zeta-Fähigkeiten mit Bewertungen. Die Bewertungen wurden von einer Gruppe von leidenschaftlichen SWGoH-Spielern erstellt und werden regelmäßig aktualisiert.',
        'legend' => 'Werte zwischen 1 (sehr gut) und 10 (sehr schlecht). 0 = noch nicht bewertet.',
    ],
    'user' => [
        'no_activities' => 'Zu diesem Benutzer wurden noch keine Aktivitäten erfasst.',
        'reply_favorited_by' => ':name hat eine Antwort als Favorit markiert.',
    ],
    'check' => [
        'unit_is_leader' => 'Die Einheit im Leader-Slot ist ein Anführer (:skill).',
        'unit_is_leader_fail' => 'Die Einheit im Leader-Slot ist kein Anführer. Oops!?',
        'level_is_max' => ' Die Einheit ist maximal gelevelt (:level/:max).',
        'level_is_max_fail' => 'Die Einheit ist nicht auf dem maximalen Level (:level/:max).',
        'gear_is_max_ship' => ' Ausrüstung :gear? Das ist eigentlich nicht möglich. Admin benachrichtigen.',
        'gear_is_max_ship_one' => 'Ausrüstung bei Schiffen ist immer gleich (1).',
        'gear_is_max' => 'Die Einheit hat sämtliche bekannte Ausrüstung (:max). Cool!',
        'gear_is_max_near' => 'Die Einheit hat sehr gute Ausrüstung (:gear), aber nicht die Bestmögliche (:max).',
        'gear_is_max_fail' => 'Der Einheit fehlt noch Einiges an Ausrüstung (:gear).',
        'rarity_is_max' => 'Die Einheit ist vollständig freigeschaltet (:rarity Sterne).',
        'rarity_is_max_fail' => 'Die Einheit ist noch nicht fertig gefarmt (:rarity/:max Sterne).',
        'mod_count_is_max' => 'Die Einheit ist mit allen :max Mods ausgestattet.',
        'mod_count_is_max_fail' => 'Der Einheit fehlen :missing Mods. Unbedingt vervollständigen.',
        'mod_pips_is_max' => 'Ein :pips-pip-Mod. Sehr beeindruckend!',
        'mod_pips_is_max_near' => ':pips-pip-Mod gefunden. Slicing auf :max wäre möglich.',
        'mod_pips_is_max_ship_fail' => ':pips-pip-Mod gefunden. Für die Flotte zählen nur Level und Pips eines Mods. Nicht seine Eigenschaften.',
        'mod_pips_is_max_fail' => ':pips-pip-Mod gefunden. Wirklich arenatauglich?',
        'mod_level_is_max' => 'Der Mod hat die maximale Stufe (:max).',
        'mod_level_is_max_fail' => ' Der Mod ist nur Stufe :level. Sofort auf Max (:max) bringen oder tauschen.',
        'skill_is_max' => 'Fähigkeit <em>:name</em> ist auf Max (:skill).',
        'skill_is_max_fail' => 'Fähigkeit <em>:name</em> ist auf Stufe :skill/:max.',
        'skill_is_max_contract' => 'Vertrag <em>:name</em> ist auf Max (:skill).',
        'skill_is_max_hardware' => 'Verstärkung <em>:name</em> ist auf Max (:skill).',
        'skill_is_max_hardware_ignore' => 'Fähigkeit <em>:name</em> ist eine Verstärkungs-Fähigkeit und daher hier irrelevant. Stufe :skill.',
        'skill_is_max_leader_ignore' => 'Fähigkeit <em>:name</em> ist eine Leader-Fähigkeit und daher hier irrelevant. Stufe :skill.',
        'zeta_ranking' => 'Zeta-Bewertung: :zeta (1:gut bis 10:schlecht, siehe <a href=":route">Zetaliste</a> für Details)',
        'zeta_missing' => 'Zeta fehlt noch.',
        'omega_missing' => 'Omega fehlt noch.',
        'urgent' => 'Sofort prüfen.',
    ],

];
