<?php

return array (
  'description' => 'Sistema di gestione della gilda (GMS) per SWGoH. Regole della gilda, informazioni sui giochi, strumenti e rapporti sui dati per analizzare i progressi di personaggi e squadre.',
  'disclaimer' => 'Non affiliato con EA, Capital Games, Disney, Lucasfilm o simili.',
  'disclaimer_community' => 'Consigli per i giocatori da parte dei giocatori. Nessuna garanzia!',
  'color_disclaimer' => 'I codici colore rappresentano solo una valutazione rapida.',
  'created_by' => 'Creato da :name',
  'comments' => 'commento|commenti',
  'replies' => 'replica|repliche',
  'modified_by' => 'Modificato da :name',
  'last_modified_by' => 'Ultima modifica di :name',
  'report_any_issues' => 'Si prega di segnalare eventuali problemi.',
  'you_registered_on' => 'Ti sei registrato alla pagina :url.',
  'info' => 
  array (
    'guilds' => 'Le pagine della gilda sono pubbliche. La registrazione non è richiesta per i membri della gilda o le parti interessate per informarsi.',
    'guilds-test' => 'Esiste una Gilda di test che consente a dirigenti e ufficiali di familiarizzare con la creazione di contenuti senza incasinare le proprie pagine di gilda ufficiali.',
    'threads' => 'C\'è una sezione del forum globale (non correlata alle pagine di gilda). I post sono pubblici. Permette a qualsiasi utente registrato di chiedere o rispondere a domande.',
    'pages' => 'Gli utenti registrati che hanno ricevuto ulteriori permessi (leader o ufficiale) sono in grado di creare, modificare ed eliminare pagine specifiche della gilda.',
    'tools' => 'Ci sono strumenti per analizzare gli stati dei personaggi e delle squadre dei membri della gilda. Fa uso di grandi interfacce dati di gioco fornite da simili di swgoh.gg o swgoh.help. È WIP. Le sincronizzazioni specifiche della gilda richiedono una corretta configurazione utente/gilda. Chiama l\'amministratore per assistenza.',
  ),
  'howto' => 
  array (
    'click_head' => 'Fare clic sull\'intestazione della tabella per rendere la tabella ordinabile e ricercabile.',
    'new_tab' => 'I collegamenti si aprono all\'interno della stessa finestra per impostazione predefinita. Per aprire un collegamento in una nuova scheda, fare riferimento alle funzionalità del browser.
            Es. fare clic sul pulsante centrale del mouse/ruota di scorrimento, fare clic con il tasto sinistro del mouse tenendo premuto il tasto Ctrl, fare clic con il pulsante destro del mouse (menu) + aprire in una nuova scheda.',
  ),
  'stats' => 
  array (
    'equal_damage' => 'Se più giocatori hanno la stessa quantità di danno, la classifica viene impostata RNG.',
    'requirements' => 'La forza del personaggio per completare :name è stimata in <strong>:rarity stelle</strong>,
            <strong>livello :level</strong> e <strong>gear :gear</strong>.',
    'tiers' => 'E <strong>:count</strong> tiers.',
    'short_name' => 'Abbreviazioni comuni: <strong>:name</strong>.',
    'rancor_intro' => 'Il più vecchio raid del gioco.',
    'tank_intro' => 'Il secondo raid del gioco.',
    'sith_intro' => 'Terzo e più nuovo raid del gioco.',
    'auto_solo_prepared' => 'In base ai dati disponibili ci sono :count membri della gilda con una squadra in grado di eseguire il <strong>solo in automatico</strong> :name.',
    'solo_prepared' => 'In base ai dati disponibili ci sono :count membri della gilda con una squadra che potrebbe essere in grado di fare il <strong>solo</strong> :name.',
    'auto_solo_info' => 'Ciò significa utilizzare <em> un solo </em> team in <em> modalità automatica </em> per completare tutte le 4 fasi e ottenere il massimo <strong>:max </strong> punteggio:footnote.',
    'solo_info' => 'Ciò significa che l\'utilizzo di <em> un solo </em> team in modalità <em> manuale </em> completa tutte e 4 le fasi e ottiene il massimo <strong>:max </strong> punteggio:footnote.',
    'auto_solo_soon' => 'Altri :count membri della gilda probabilmente sono o saranno in grado di eseguire automaticamente il solo.',
    'solo_soon' => 'Altri :count membri della gilda hanno una squadra per il solo condizioni avanzate.',
    'rancor_info' => 'A causa della maturità di questo raid ci sono diverse squadre valide per fare il Rancor da solista.',
    'tank_info' => 'Il solo in automatico al HAAT non è ancora possibile con i team attuali. Eseguire il solo richiede una conoscenza decente della squadra e dell\'avversario, oltre a un buon tempismo (manuale).',
    'sith_info' => 'Eseguire il solo su HSTR non è possibile. Anche il solo di una singola fase non è possibile. Questo raid richiede che tutta la gilda lavori insieme.
            Ogni giocatore dovrebbe mirare a fare circa il 4-6% di danno per fase.
            Ciò significa che <em> ogni </em> giocatore dovrebbe avere almeno <strong> 4 squadre raid </strong> con personaggi diversi (nessun aggiornamento di squadra è disponibile).',
    'sith_progress_count_info' => 'Le barre di avanzamento sopra mostrano la percentuale di danno apportata dai giocatori per fase.
            Le barre di avanzamento qui sotto mostrano quanti giocatori della gilda sono pronti per il raid.',
    'sith_prepared' => 'In base ai dati disponibili, ci sono :count membri della gilda :footnote con team validi per contribuire a circa :damage danno.',
    'sith_soon' => 'Altri :count memberi della gilda:footnote hanno almeno un team in condizioni avanzate per contrinuire per circa :damage di danno.',
    'sith_health' => 'Vita del boss stimata: <strong>:health</strong>.',
    'sith_undefined' => 'Non ci sono team specifici per questa fase.',
  ),
  'user' => 
  array (
    'no_activities' => 'Non ci sono attività per questo utente.',
    'reply_favorited_by' => ':name Inerito tra i favoriti.',
  ),
  'check' => 
  array (
    'unit_is_leader' => 'L\'unità nello slot leader è un leader (:skill).',
    'unit_is_leader_fail' => 'L\'unità nello slot leader non è un leader. Oops!?',
    'level_is_max' => ' L\'unità è al livello massimo (:level/:max).',
    'level_is_max_fail' => 'Il livello dell\'unità non è al massimo (:level/:max).',
    'gear_is_max_ship' => ' Equipaggiamento a :gear? Non dovrebbe succedere. Contatta l\'amministratore.',
    'gear_is_max_ship_one' => 'Livello di equipaggiamento per le navi è sempre lo stesso (1).',
    'gear_is_max' => 'L\'unità a tutti i pezzi di equipaggiamento conosciuti (:max). Nice!',
    'gear_is_max_near' => 'L\'unità è ben equipaggiata (:gear) ma non al massimo ancora (:max).',
    'gear_is_max_fail' => 'Ll\'unità ha ancora un sacco di equipaggiamento (:gear).',
    'rarity_is_max' => 'L\'unità è completamente sbloccata (:rarity stars).',
    'rarity_is_max_fail' => 'L\'unità non è ancora farmata/sbloccata al suo pieno potenziale (:rarity/:max stars).',
    'mod_count_is_max' => 'L\'unità è dotata di tutte le :max mods.',
    'mod_count_is_max_fail' => 'Manca all\'unità :missing mancanti. Riempi gli spazi mancanti immediatamente.',
    'mod_pips_is_max' => 'Un :pips-pip-mod. Veramente impressionante!',
    'mod_pips_is_max_near' => ':pips-pip-mod trovato. Affettare a:max sarebbe possibile.',
    'mod_pips_is_max_ship_fail' => ':pips-pip-mod trovato. Verifica la sostituzione. Per le navi contano solo i livelli mod e mod pips. Le statistiche Mod non sono rilevanti.',
    'mod_pips_is_max_fail' => ':pips-pip-mod trovato. Per favore controlla se questo è davvero un set mod da arena!',
    'mod_level_is_max' => 'La mod è levellata al massimo (:max).',
    'mod_level_is_max_fail' => ' La mod è solamente di livello :level (:max) rimuovi immediatamente quella mod.',
    'skill_is_max' => 'Ability <em>:name</em> è al massimo (:skill).',
    'skill_is_max_fail' => 'Abilità <em>:name</em> è al massimo :skill/:max.',
    'skill_is_max_contract' => 'Contratto di <em>:name</em> è al massimo (:skill).',
    'skill_is_max_hardware' => 'Rinforzo <em>:name</em> + al massimo (:skill).',
    'skill_is_max_hardware_ignore' => 'Abilità <em>:name</em> è una capacità di rinforzo e quindi non rilevante. Tier :skill.',
    'skill_is_max_leader_ignore' => 'Abilità <em>:name</em> è un\'abilità leader e quindi non rilevante. Livello: abilità.',
    'zeta_ranking' => 'Zeta Rank: :zeta (1:buono da 10:bad, vedi <a href=":route">Zeta Ranking</a> per i dettagli)',
    'zeta_missing' => 'Zeta mancata.',
    'omega_missing' => 'Omega mancante.',
    'urgent' => 'Verifica immediatamente.',
  ),
);
