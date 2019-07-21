<?php

return array (
  'guild' => 
  array (
    'title' => 'Gildenseite (:name)',
    'intro' => 'SWGoH-Infoseite der Gilde :name.',
    'description' => 'Gildenregeln, Spiel-Infos und Datenauswertungen zur Analyse der Charaktere und Trupp-Entwicklung.',
    'legend' => 'Gildenseiten sind öffentlich. Eine Registrierung ist nicht erforderlich, um sich als Gildenmitglied oder Interessent zu informieren.',
  ),
  'events' => 
  array (
    'title' => 'Events',
    'intro' => 'Liste wichtiger Events, die zur Zeit im Spiel aktiv sind.',
    'description' => 'Mache Events sind nur einmal spielbar. D. h. diese sind nicht mehr sichtbar, sobald sie erfolgreich abgeschlossen wurden.',
    'legend' => 'Siehe <a href="https://swgohevents.com">swgohevents.com</a> für eine Kalkulation zukünftiger Termine.',
  ),
  'roster' => 
  array (
    'intro' => 'Übersicht aller Toons, die die Mitglieder der Gilde :guild besitzen.',
    'description' => 'Das Laden der Seite kann etwas dauern, da alle Charaktere sofort geladen werden. Die Zahl hinter den Bezeichnungen gibt an, wieviele Gildenmitglieder den Charakter besitzen.',
    'title' => 'Gesamtes Einheitenverzeichnis',
  ),
  'sync' => 
  array (
    'intro' => 'In der folgenden Liste sind die Datenquellen für diese Seite gelistet. Der Status ist jeweils das Ergebnis der letzten Aktualisierung.',
    'description' => 'Gildendaten werden täglich automatisiert abgerufen. Auch registrierte Benutzer können grundsätzlich eine Aktualisierung für die verschiedenen Daten anstoßen.
        Um Missbrauch und eine unnötige Belastung der Quellserver zu vermeiden, sind verschiedene Abklingzeiten hinterlegt.
        Bspw. werden die meisten Daten nur neu angefordert, wenn der bestehende Datenbestand älter als 1 Tag ist.',
    'legend' => 'Gelegentlich werden bei der Synchronisation Fehler auftreten.
        Dies kann etwa daraus resultieren, dass der angefragte Server nicht verfügbar ist.
        Auch kommt es vor, dass auf der Gegenseite die Struktur der Daten geändert wird, was zu Fehlern bei der Verarbeitung führt und Anpassungen auf dieser Seite erfordert.',
  ),
  'squads' => 
  array (
    'title' => 'Vordefinierte Teams',
    'intro' => 'Die Spielergemeinschaft hat eine Liste von Teams zusammengetragen, die sich für verschiedene Situationen besonders gut eignen.',
    'description' => 'Der <strong>Mehrwehrt</strong> auf dieser Seite besteht in der Spalte "Link". Besteht eine Teamempfehlung aus 1-5 Charakteren, kann damit direkt zur Teamsuche mit dem <strong>Status der gesamten Gilde</strong> gesprungen werden.',
    'legend' => 'Will ein Spieler nur seine eigenen Teams analysieren, ist die Darstellung auf <a href="https://swgoh.help">swgoh.help</a> zu empfehlen.',
    'used_for_calculation' => 'Anzahl der vorhandenen Toons, Ausrüstungsstufe, Level und Sterne werden berücksichtigt.',
    'field_order' => 'Reihenfolge der Angabe bei den Toons',
    'direct_link_info' => 'Direkter Link. Kann zum Weitergeben und Verweis auf genau diese Team-Zusammenstellung dieser Gilde genutzt werden.',
  ),
  'targeting' => 
  array (
    'title' => 'Regeln zur KI Zielsuche',
    'intro' => 'Liste der Regeln, die von der KI zur Auswahl von Zielen (befreundet und gegnerisch) verwendet werden.',
    'description' => 'Die Liste enthält sämtliche Fähigkeiten (Chars und Schiffe) denen eine Regel zur Zielauswahl für die KI zugewiesen ist.',
    'legend' => 'Fähigkeitentypen: L = Anführer, B = Basis, U = Einmalig, S = Spezial, RI = Verstärkung',
  ),
  'zetas' => 
  array (
    'title' => 'Zeta Ratings',
    'intro' => 'Liste mit Zeta Empfehlungen.',
    'description' => 'Die Liste enthält alle Zeta-Fähigkeiten mit Bewertungen. Die Bewertungen wurden von einer Gruppe von leidenschaftlichen SWGoH-Spielern erstellt und werden regelmäßig aktualisiert.',
    'legend' => 'Werte zwischen 1 (sehr gut) und 10 (sehr schlecht). 0 = noch nicht bewertet.',
  ),
  'player' => 
  array (
    'description' => 'Spiel-Infos und Datenauswertungen zur Analyse der Charaktere und Trupp-Entwicklung.',
    'intro' => 'SWGoH-Infoseite des Spielers :name.',
    'legend' => 'Spieler- und Gildenseiten sind öffentlich.',
    'title' => 'Spieler (:name)',
  ),
  'threads' => 
  array (
    'description' => 'Beiträge sind öffentlich. Jeder registrierte Benutzer kann Themen erstellen und beantworten.',
    'intro' => 'Globaler Forumsbereich',
    'title' => 'Forum',
  ),
);
