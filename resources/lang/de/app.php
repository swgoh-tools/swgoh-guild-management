<?php

return array (
  'description' => 'Gildenmanagement (GMS) für SWGoH. Gildenregeln, Spiel-Infos, Werkzeuge und Datenauswertungen zur Analyse der Charaktere und Trupp-Entwicklung.',
  'disclaimer_community' => 'Empfehlungen von Spielern für Spieler. Unverbindlich!',
  'color_disclaimer' => 'Farbliche Markierungen nur zur groben Einordnung.',
  'created_by' => 'Erstellt von :name',
  'comments' => 'Kommentar|Kommentare',
  'replies' => 'Antwort|Antworten',
  'modified_by' => 'Geändert von :name',
  'last_modified_by' => 'Zuletzt geändert von :name',
  'report_any_issues' => 'Auffälligkeiten gern melden.',
  'you_registered_on' => 'Du hast Dich auf der Seite :url registriert.',
  'info' => 
  array (
    'guilds' => 'Gildenseiten sind öffentlich. Eine Registrierung ist nicht erforderlich, um sich als Gildenmitglied oder Interessent zu informieren.',
    'guilds-test' => 'Es existiert eine Test-Gilde, die es Anführern und Offizieren ermöglicht, sich mit der Inhaltsbearbeitung vertraut zu machen ohne die eigenen offiziellen Gildenseiten in Mitleidenschaft zu ziehen.',
    'threads' => 'Es gibt einen globalen (gildenunabhängigen) Forumsbereich. Beiträge sind öffentlich. Jeder registierte Benutzer hat die Möglichkeit Fragen zu stellen und zu beantworten.',
    'pages' => 'Registrierte Benutzer mit zusätzlichen Berechtigungen (Anführer, Offiziere) haben die Möglicheit, Gildenseiten anzulegen, zu bearbeiten und zu löschen.',
    'tools' => 'Es werden Werkzeuge zur Analyse der Charaktere und Trupp-Entwicklung der Gildenmitglieder bereitgestellt. Genutzt werden großartige Datenschnittstellen wie swgoh.gg und swgoh.help. Gildenspezifische Datenabfragen erfordern eine korrekte Benutzer/Gilden-Konfiguration. Für Hilfe an einen Admin wenden.',
  ),
  'howto' => 
  array (
    'click_head' => 'Beim Klick auf den Spaltenkopf einer Tabelle wird diese sortierbar und durchsuchbar.',
    'new_tab' => 'Die Links öffenen standardmäßig im gleichen Fenster. Wer einen neuen Tab öffen möchte, kann die Standardfunktionen des Browsers nutzen.
            Z.B. Klick mit der mittleren Maustaste/Mausrad, Klick mit der linken Maustaste bei gedrückter STRG-Taste, Rechtsklick + in neuem Tab öffnen.',
    'find_guild' => 'Wo ist meine Gildeseite? <br /> Gildeseiten werden erstellt, sobald sich ein Spieler mit einem zu dieser Gilde gehörenden Allycode auf dieser Website registriert. Dies wird als Hintergrundjob ausgeführt. Gib dem Server daher ein paar Minuten (10 sollten reichen), um das Problem zu beheben. Es gibt keine globale Suche nach bestehenden Gilden (absichtlich). Am besten Lesezeichen für die spätere Verwendung speichern, wenn du einen Link erhalten hast. Das sollte wie folgt aussehen: <code>:url</code>.',
    'find_player' => 'Wo ist meine Spielerseite? <br /> Wenn jemand (Du oder eine andere Person, es spielt keine Rolle) eine Gilde registriert hat, sind Spielerseiten für alle Gildenmitglieder automatisch verfügbar. Alles was Du brauchst, ist der Allycode, um den Link zu erstellen. Er sollte so aussehen: <code>:url</code>. Wenn du deinen Allycode eingibst, wechselt das System automatisch auch zur Gilde dieses Spielers.',
  ),
  'stats' => 
  array (
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
  ),
  'user' => 
  array (
    'no_activities' => 'Zu diesem Benutzer wurden noch keine Aktivitäten erfasst.',
    'reply_favorited_by' => ':name hat eine Antwort als Favorit markiert.',
  ),
  'check' => 
  array (
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
  ),
  'disclaimer' => 'Nicht verbunden mit EA, Capital Games, Disney, Lucasfilm etc.',
  'legend' => 
  array (
    'gear_total' => 'Sämtliche Ausrüstung, die von allen im Spiel verfügbaren Charakteren benötigt wird.',
    'gear_done' => 'Bereits angelegte Ausrüstung.',
    'gear_todo' => 'Sämtliche Ausrüstung, die vom aktuellen Spieler in Zukunft noch benötigt wird..',
    'gear_next' => 'Vorschau der Ausrüstung, die für die nächste (noch) gesperrte Stufe eines Charakters benötigt wird.',
    'gear_now' => 'Ausrüstung, die derzeit von allen Charakteren des ausgewählten Spielers benötigt wird.',
    'gear_tier' => 'Die Mindestausrüstungsstufe auf der dieses Teil vorkommt.',
    'gear_lvl' => 'Minimale Charakterstufe, um dieses Teil anzulegen.',
    'gear_cost' => 'Zusätzliche Herstellungskosten (Credits). Nur zur Verwertung von Einzelteilen verfügbar. Das Anlegen fertiger Ausrüstung ist immer kostenlos.',
  ),
);
