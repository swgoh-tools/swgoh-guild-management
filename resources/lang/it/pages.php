<?php

return array (
  'guild' => 
  array (
    'title' => 'Gilda (:name)',
    'intro' => 'SWGoH pagina di informazioni per la gilda :name.',
    'description' => '  Regole della gilda, informazioni sui giochi e rapporti sui dati per analizzare i progressi di personaggi e squadre.',
    'legend' => 'Le pagine della gilda sono pubbliche. La registrazione non è richiesta per i membri della gilda o le parti interessate per informarsi.',
  ),
  'events' => 
  array (
    'title' => 'Eventi',
    'intro' => 'Elenco di importanti eventi attualmente presenti nel gioco.',
    'description' => 'Elenco di tutti gli eventi attualmente disponibili. Alcuni sono eventi unici, il che significa che non li vedrai più se hai già completato l\'evento.',
    'legend' => 'Vedi <a href="https://swgohevents.com">swgohevents.com</a> per ottenere proiezioni di eventi futuri.',
  ),
  'sync' => 
  array (
    'intro' => 'Il seguente elenco contiene i dati raccolti da questa pagina Web. Lo stato mostra il risultato della richiesta di sincronizzazione più recente.',
    'description' => 'I dati della gilda vengono automaticamente sincronizzati una volta al giorno. La richiesta di sincronizzazione manuale da parte degli utenti potrebbe essere possibile ma non dovrebbe essere necessaria.
        Per prevenire l\'uso improprio e l\'impatto non necessario sui server di origine, vengono definite soglie e cooldown.
        Es. la maggior parte delle richieste verrà elaborata solo se i dati esistenti hanno più di 1 giorno di vita.',
    'legend' => 'Potrebbero verificarsi dei problemi di sincronizzazione di volta in volta.
        Ciò potrebbe accadere se i server di origine non sono disponibili. Altre ragioni sono le modifiche alle strutture dati eseguite sul server di origine.
        Ciò potrebbe causare errori di elaborazione e richiedere modifiche al codice di questa pagina Web.',
  ),
  'squads' => 
  array (
    'title' => 'Squadre famose',
    'intro' => 'Elenco proveniente dalla comunity di squadre che funzionano particolarmente bene in determinate situazioni.',
    'description' => 'Il <strong> valore aggiunto </strong> di questo lato proviene dalla colonna "Link". Finché una squadra non è composta da 5 personaggi, il link conduce direttamente alla ricerca del team per lo <strong> stato dell\'intera gilda </strong>.',
    'legend' => 'Un giocatore che vuole solo analizzare i progressi della propria squadra potrebbe anche usare il sito di <a href="https://swgoh.help"> swgoh.help </a>.',
    'used_for_calculation' => 'Tiene conto del numero di unità, del livello di equipaggiamento, del livello e delle stelle.',
    'field_order' => 'Ordine dei valori utilizzati nella tabella.',
    'direct_link_info' => 'Collegamento diretto. Può essere usato per condividere questa squadra per la gilda.',
  ),
  'roster' => 
  array (
    'intro' => 'Elenco di tutti i personaggi appartenenti ai membri della gilda :guild.',
    'description' => 'Per favore un attimo di pazienza. Il caricamento della pagina potrebbe richiedere del tempo a causa di tutti i personaggi presenti. Il numero nella testata indica a quanti membri della gilda appartiene un personaggio.',
    'title' => 'Full Roster',
  ),
  'targeting' => 
  array (
    'title' => 'Regole di Targeting AI',
    'intro' => 'Elenco delle regole definite per il targeting AI.',
    'description' => 'Questo elenco contiene tutte le abilità (personaggi e navi) che hanno regole di targeting per l\'intelligenza artificiale ad esse associata.',
    'legend' => 'Abilità tipo: L = Leader, B = Basica, U = Unica, S = Speciale, RI = Rinforzo',
  ),
  'zetas' => 
  array (
    'title' => 'Valutazioni Zeta',
    'intro' => 'Lista di raccomandazione delle zeta.',
    'description' => 'Questa lista contiene tutte le zeta con una valutazione. La valutazione è stata creata da un gruppo di giocatori appassionati e viene aggiornata costantemente.',
    'legend' => 'Intervallo da 1 (migliore) a 10 (peggiore). 0 = non ancora valutato.',
  ),
  'player' => 
  array (
    'description' => 'Informazioni sui giochi e rapporti sui dati per analizzare i progressi di personaggi e squadre.',
    'intro' => 'SWGoH pagina di informazioni del giocatore :name.',
    'title' => 'Giocatore (:name)',
    'legend' => 'Le pagine dei giocatori e delle gilde sono pubbliche.',
  ),
  'threads' => 
  array (
    'title' => 'Forum',
    'intro' => 'Sezione del forum globale.',
    'description' => 'I post sono pubblici. Qualsiasi utente registrato può creare argomenti e risposte.',
  ),
);
