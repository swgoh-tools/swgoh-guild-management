@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
            <div class="d-flex">
            <!-- <form class="bd-search d-flex align-items-center"> -->
                <!--
                <span class="algolia-autocomplete" style="position: relative; display: inline-block; direction: ltr;">
                <input class="form-control ds-input" id="search-input" placeholder="Search..." autocomplete="off" data-siteurl="https://getbootstrap.com" data-docs-version="4.1" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" style="position: relative; vertical-align: top;" dir="auto" type="search">
                    <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre>
                    <span class="ds-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;" role="listbox" id="algolia-autocomplete-listbox-0">
                    <div class="ds-dataset-1"></div>
                    </span>
                </span>
                -->
                <h1 class="mr-auto">Guildeninfos</h1>
                <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
                        <title>Menu</title>
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                    </svg>
                </button>
            <!-- </form> -->
            </div>

<nav class="collapse bd-links" id="bd-docs-nav">
            <div class="nav flex-column nav-pills" id="sw-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="sw-home-tab" data-toggle="pill" href="#sw-home" role="tab" aria-controls="sw-home" aria-selected="true">
                    Allgemeines</a>
                <a class="nav-link" id="sw-rules-tab" data-toggle="pill" href="#sw-rules" role="tab" aria-controls="sw-rules" aria-selected="false">
                    Gilden-Regeln</a>
                <a class="nav-link" id="sw-raid-tab" data-toggle="pill" href="#sw-raid" role="tab" aria-controls="sw-raid" aria-selected="false">
                    Raid Zeiten</a>
                <a class="nav-link" id="sw-haat-tab" data-toggle="pill" href="#sw-haat" role="tab" aria-controls="sw-haat" aria-selected="false">
                    HAAT Squads</a>
                <a class="nav-link" id="sw-abbrev-tab" data-toggle="pill" href="#sw-abbrev" role="tab" aria-controls="sw-abbrev" aria-selected="false">
                    Abkürzungen</a>
                <a class="nav-link" id="sw-farming-tab" data-toggle="pill" href="#sw-farming" role="tab" aria-controls="sw-farming" aria-selected="false">
                    Character Farming</a>
                <a class="nav-link" id="sw-tw-tab" data-toggle="pill" href="#sw-tw" role="tab" aria-controls="sw-tw" aria-selected="false">
                    Territorialkrieg (TW)</a>
            </div>
</nav>
        </div>

<!--
        <div class="d-none d-xl-block col-xl-2 bd-toc">
            <ul class="section-nav">
            <li class="toc-entry toc-h2"><a href="#containers">Containers</a></li>
            <li class="toc-entry toc-h2"><a href="#responsive-breakpoints">Responsive breakpoints</a></li>
            <li class="toc-entry toc-h2"><a href="#z-index">Z-index</a></li>
            </ul>
        </div>
-->

        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">

            <div class="tab-content" id="sw-tabContent">
                <div class="tab-pane fade show active" id="sw-home" role="tabpanel" aria-labelledby="sw-home-tab">
                    <h2>Allgemeines</h2>
                    <p>
                        Spielhilfen und weitere Informationen zum <a href="https://www.ea.com/de-de/games/starwars/galaxy-of-heroes">StarWars Galaxy of Heroes</a>.
                    </p>
                    <h3>swgoh.gg</h3>
                    <p>
                        Unsere Gildenübersicht (enthält automatisch alle, Teammitglieder, die bei swgoh.gg registriert sind):
                    </p>
                    <ul><li><a href="https://swgoh.gg/g/17401/macht-wachter/">https://swgoh.gg/g/17401/macht-wachter/</a></li></ul>
                    <p>
                        Es lohnt sich aus vielen Gründen. Z.B. Übersicht, wer welches Zeta oder welchen Char besitzt:
                    </p>
                    <ul>
                        <li><a href="https://swgoh.gg/g/17401/macht-wachter/zetas/">https://swgoh.gg/g/17401/macht-wachter/zetas/</a></li> 
                        <li><a href="https://swgoh.gg/g/17401/macht-wachter/unit-search/#WICKET">https://swgoh.gg/g/17401/macht-wachter/unit-search/#WICKET</a></li> 
                    </ul>
                    <p>
                        Zum anderen gibt es weitere Tools, die diese Daten nutzen, um bspw. zu errechnen, welche Raids die Guilde meistern kann. Prüfung HAAT-Tauglichkeit etc...
                    </p>
                    <h3>swgohevents.com</h3>
                    <p>
                        Die Seite präsentiert nicht nur alle offiziell veröffentlichten Event-Termine, sondern errechnet auch für alle übrigen Events das voraussichtliche nächste Stattfinden.
                    </p>
                    <ul>
                        <li><a href="https://swgohevents.com">https://swgohevents.com</a></li>
                    </ul>
                    <h3>Mod Advisor auf crouchingrancor.com</h3>
                    <p>
                        Die Seite lädt nach Eingabe des eigenen Ally Codes alle Mods, die man im Einsatz hat.
                    </p>
                    <p>
                        Besonders hilfreich ist, dass alle Attribute eine Wertung zwischen 0 und 1000 erhalten durch einen Vergleich mit den Mods aller anderen Spielder in der Datenbank.
                        Dadurch ist sofort klar, wie gut ein Mod ist. 0 bedeutet, dass der Wert der schlechteste aller in der Datenbank vorhanden Werte ist.
                        Bei einer 1000: Glückwunsch! Der eigene Wert ist besser als alle bisher bekannten Werte anderer Spieler. 
                    </p>
                    <ul>
                        <li><a href="http://apps.crouchingrancor.com">http://apps.crouchingrancor.com</a></li>
                    </ul>
                    <h3>Weitere Fanseiten</h3>
                    <dl>
                        <dt>jediassociation</dt>
                        <dd><a href="https://jediassociation.jimdo.com">https://jediassociation.jimdo.com</a></dd>
                        <dd>Mod Guide</dd>
                    </dl>
                </div>
                <div class="tab-pane fade" id="sw-raid" role="tabpanel" aria-labelledby="sw-raid-tab">
                    <h2>Raid Zeiten</h2>
                    <p>
                        Angegeben wird die Zeit ab der Schaden gemacht werden darf, gestartet wird der Raid 1 Tag früher:
                    </p>
                    <dl><dt>Rancor</dt><dd>Zeit 21:15, Tag je nach Raid Tickets</dd><dd>Zeit 21:30 (Solos)</dd></dl>
                    <dl><dt>AAT</dt><dd>Zeit 20:15, Tag je nach Raid Tickets</dd></dl>
                    <dl><dt>Sith</dt><dd>Sofort nach Start (keine Anmeldephase)</dd></dl>
                </div>
                <div class="tab-pane fade" id="sw-haat" role="tabpanel" aria-labelledby="sw-haat-tab">
                    <h2>HAAT Squads</h2>
                    <p>Liste von swgohindepth.com, die Seite ist seit Anfang 2018 nicht mehr erreichbar.</p>
                    <p>Letzte bekannte Fassung (12/2017):</p>
                    <img src="haat.jpg" class="img-fluid rounded mx-auto d-block" alt="HAAT Squads">
                    <p>Referenzen:
                        <a href="https://twitter.com/swgohindepth/status/869153859305963520">twitter</a>
                        <a href="https://www.reddit.com/r/SWGalaxyOfHeroes/comments/6771pn/morningstars_constantly_updated_comprehensive/">reddit</a>
                        <a href="https://web.archive.org/web/20171025211426/http://swgohindepth.com/2017/05/29/heroic-raid-team-planning-guide-by-morningstar-013">web.archive.org</a>
                    </p>
                </div>
                <div class="tab-pane fade" id="sw-abbrev" role="tabpanel" aria-labelledby="sw-abbrev-tab">
                    <h2>Abkürzungen</h2>
                    <p>Referenz:
                        <a href="https://forums.galaxy-of-heroes.starwars.ea.com/discussion/154048/guide-to-the-acronyms-and-terms-of-star-wars-galaxy-of-heroes-swgoh">EA Forum</a>
                    </p>
                    <ul>
                        <li><b> 5s	-	</b> CT-5555 "Fives"</li>
                        <li><b> AA	-	</b> Admiral Ackbar</li>
                        <li><b> AAT	-	</b> Tank Raid</li>
                        <li><b> AB	-	</b> Ability Block</li>
                        <li><b> Alt	-	</b> A player's secondary account, as opposed to a primary or main account</li>
                        <li><b> AoE	-	</b> Area of Attack- An attack that does damage to multiple enemies</li>
                        <li><b> ATF	-	</b> Ahsoka Tano (Fulcrum)</li>
                        <li><b> AV	-	</b> Asajj Ventress</li>
                        <li><b> BB	-	</b> Buff Block(same as buff immunity)</li>
                        <li><b> BF	-	</b> Boba Fett</li>
                        <li><b> BI	-	</b> Buff Immunity (same as buff block)</li>
                        <li><b> CC	-	</b> Chief Chirpa</li>
                        <li><b> CC	-	</b> Critical Chance</li>
                        <li><b> CD	-	</b> Critical Damage</li>
                        <li><b> CG	-	</b> Capital Games, the developer of Star Wars Galaxy of Heros</li>
                        <li><b> Chaze	-	</b> Baze Malbus and Chirrut Imwe used together on the same team</li>
                        <li><b> Chewy	-	</b> Clone Wars Chewbacca</li>
                        <li><b> Chirpatine	-	</b> A Heroic Tank Raid Team using Chief Chirpa Lead, Emperor Palpatine, and typically three taunting tank characters used in P3.</li>
                        <li><b> Cholo	-	</b> Captain Han Solo</li>
                        <li><b> CHS	-	</b> Captain Han Solo</li>
                        <li><b> CLS	-	</b> Commander Luke Skywalker</li>
                        <li><b> CM	-	</b> Combat Mision in a territory battle (TB)</li>
                        <li><b> CN	-	</b> Chief Nebit</li>
                        <li><b> CS	-	</b> Clone Sergeant - Phase I</li>
                        <li><b> CUP	-	</b> Coruscant Underworld Police</li>
                        <li><b> D	-	</b> Defense</li>
                        <li><b> Devs	-	</b> The game developers</li>
                        <li><b> DK	-	</b> Director Krennic</li>
                        <li><b> DN	-	</b> Darth Nihilus</li>
                        <li><b> Dots	-	</b> Debuff that inflicts damage over time</li>
                        <li><b> DPS	-	</b> Damage per second, generally refering to characters that inflict high damage</li>
                        <li><b> Drennic	-	</b> Death Trooper and Director Krennic used in the same team</li>
                        <li><b> DSTB	-	</b> Dark Side Territory Battle</li>
                        <li><b> DT	-	</b> Death Trooper (sometimes now also used for Darth Treya)</li>
                        <li><b> EE	-	</b> Ewok Elder</li>
                        <li><b> EK	-	</b> Eeth Koth</li>
                        <li><b> Emp	-	</b> Emperor Palpatine</li>
                        <li><b> EP	-	</b> Emperor Palpatine</li>
                        <li><b> ES	-	</b> Ewok Scout</li>
                        <li><b> EzPz	-	</b> Emperor Palpatine with both zetas</li>
                        <li><b> FL	-	</b> Farmboy Luke Skywalker</li>
                        <li><b> FOE	-	</b> First Order Executioner</li>
                        <li><b> FOO	-	</b> First Order Officer</li>
                        <li><b> FOSFTP	-	</b> First Order SF Tie Pilot</li>
                        <li><b> FOST	-	</b> First Order Stormtrooper</li>
                        <li><b> FOTP	-	</b> First Order Tie Pilot</li>
                        <li><b> FOX	-	</b> First Order Executioner</li>
                        <li><b> FS	-	</b> Foresight</li>
                        <li><b> FTP	-	</b> A player who plays for free without making purchases (Free to play)</li>
                        <li><b> GAT	-	</b> Grand Admiral Thrawn</li>
                        <li><b> GG	-	</b> General Grievous</li>
                        <li><b> GK	-	</b> General Kenobi</li>
                        <li><b> GMT	-	</b> Grand Moff Tarkin</li>
                        <li><b> GMY	-	</b> Grand Master Yoda</li>
                        <li><b> GS	-	</b> Geonosian Soldier</li>
                        <li><b> GS	-	</b> Geonosian Spy</li>
                        <li><b> GvG	-	</b> Events pitting one guild against another guild, currently Territory War is the only GvG event</li>
                        <li><b> GW	-	</b> Galactic War</li>
                        <li><b> HAAT	-	</b> Heroic Level Tank Raid</li>
                        <li><b> HB	-	</b> Heal Block</li>
                        <li><b> Hoda	-	</b> Hermit Yoda</li>
                        <li><b> Hots	-	</b> Buff that grants healing over time</li>
                        <li><b> HP	-	</b> Health/Protection</li>
                        <li><b> HRSc	-	</b> Hoth Rebel Scout</li>
                        <li><b> HRSo	-	</b> Hoth Rebel Soilder</li>
                        <li><b> HSith	-	</b> Heroic Sith Triumvirate Raid</li>
                        <li><b> HSTR	-	</b> Heroic Sith Triumvirate Raid</li>
                        <li><b> Hoda	-	</b> Hermit Yoda</li>
                        <li><b> Hyoda	-	</b> Hermit Yoda</li>
                        <li><b> IGD	-	</b> Ima-Gun Di</li>
                        <li><b> IPD	-	</b> Imperial Probe Droid</li>
                        <li><b> ISC	-	</b> Imperial Super Commando</li>
                        <li><b> JC	-	</b> Jedi Consular</li>
                        <li><b> JE	-	</b> Jawa Engineer</li>
                        <li><b> JKA	-	</b> Jedi Knight Anakin</li>
                        <li><b> JKG	-	</b> Jedi Knight Guardian</li>
                        <li><b> JS	-	</b> Jawa Scavenger</li>
                        <li><b> JTR	-	</b> Rey (Jedi Training)</li>
                        <li><b> Krooper	-	</b> Death Trooper and Director Krennic used in the same team</li>
                        <li><b> KRU	-	</b> Kylo Ren (Unmasked)</li>
                        <li><b> Leia	-	</b> Typically refers to Princess Leia, as opposed to other versions</li>
                        <li><b> LSTB	-	</b> Light Side Territory Battle</li>
                        <li><b> Lumi	-	</b> Luminara Unduli</li>
                        <li><b> Main	-	</b> A player's primary account, when the player has more than one account</li>
                        <li><b> ME	-	</b> Mob Enforcer</li>
                        <li><b> META	-	</b> Most Effective Team Available</li>
                        <li><b> Mods	-	</b> In forums, can refer to mods pieces for characters or forum moderators</li>
                        <li><b> MT	-	</b> Mother Talzin</li>
                        <li><b> NAAT	-	</b> Non Heroic Tank Raid</li>
                        <li><b> NS	-	</b> Nightsister</li>
                        <li><b> O	-	</b> Offense</li>
                        <li><b> OB	-	</b> Old Ben</li>
                        <li><b> OD	-	</b> Old Daka</li>
                        <li><b> OG Han	-	</b> Han Solo (his shard are a reward for beating the heric level of the Pit Raid)</li>
                        <li><b> Omega	-	</b> A gold colored ability material used to take a character's abilities up to level 7 or 8,</li>
                        <li><b> OP	-	</b> On forums, when replying to a person on a thread is original poster, but when talking about a toon means over powered.</li>
                        <li><b> P1 (or other numbers)	-	</b> Phase 1, Phase 2, etc.</li>
                        <li><b> Palp	-	</b> Emperor Palpatine</li>
                        <li><b> Phoenix	-	</b> Members of the Phoenix squad (Hera Syndulla, Ezra Bridger, Sabine Wren, Kanan Jarrus, Chopper, and Garazeb "Zeb" Orrelios)</li>
                        <li><b> Pig	-	</b> Gamorrean Guard</li>
                        <li><b> Pot	-	</b> Potency</li>
                        <li><b> Princess Zody	-	</b> Cody zeta, Princess Leia, and clones used as a team in tank raids</li>
                        <li><b> Prot	-	</b> Protection</li>
                        <li><b> PTP	-	</b> A player who has purchased items in game (Pay to play). This can be further broken down into dolphins, whales and krackens, depending on the amount spent.</li>
                        <li><b> PvP	-	</b> Player versus Player. SWGOH does not have a true PvP mode, as the AI controls one side. Usually refers to Squad Arena.</li>
                        <li><b> QGJ	-	</b> Qui-Gon Jinn</li>
                        <li><b> R2Z2	-	</b> R2D2 with double zeta</li>
                        <li><b> Raid Han	-	</b> Han Solo (his shards are a reward for beating the heric level of the Pit Raid)</li>
                        <li><b> RaT	-	</b> Range Trooper</li>
                        <li><b> RG	-	</b> Royal Guard</li>
                        <li><b> RNG	-	</b> Random Number Generator (Your "luck" for effects or events)</li>
                        <li><b> ROLO	-	</b> Rebel Officer Leia Organa</li>
                        <li><b> RP	-	</b> Resistance Pilot</li>
                        <li><b> RT	-	</b> Resistance Trooper</li>
                        <li><b> SA	-	</b> Can either refer to Sith Assassin or Squad Arena</li>
                        <li><b> Sass	-	</b> Sith Assasin</li>
                        <li><b> Sassy	-	</b> Sith Assassin</li>
                        <li><b> Scav Rey	-	</b> Rey (Scavenger)</li>
                        <li><b> Shard	-	</b> Can refer to either a piece of a character/ship, or the people you play against in squad arena or fleet arena)</li>
                        <li><b> Shore	-	</b> Shoretrooper</li>
                        <li><b> SiT	-	</b> Sith Trooper</li>
                        <li><b> Snips	-	</b> Ahsoka Tano</li>
                        <li><b> Snow	-	</b> Snowtrooper</li>
                        <li><b> Snolo	-	</b> Captain Han Solo</li>
                        <li><b> Snowlo	-	</b> Captain Han Solo</li>
                        <li><b> SM	-	</b> Special Mission in a territory battle (TB)</li>
                        <li><b> SRP	-	</b> Scarif Rebel Pathfinder</li>
                        <li><b> ST	-	</b> Stormtrooper</li>
                        <li><b> STH	-	</b> Stormtrooper Han</li>
                        <li><b> STHan	-	</b> Stormtrooper Han</li>
                        <li><b> STR	-	</b> Sith Triumvirate Raid</li>
                        <li><b> T	-	</b> Tenacity</li>
                        <li><b> TB	-	</b> Territory Battle</li>
                        <li><b> TFP	-	</b> Tie Fighter Pilot</li>
                        <li><b> TLDR	-	</b> Too long, didn't read, used when someone wants to reply but not read the entire post</li>
                        <li><b> TM	-	</b> Turn Meter</li>
                        <li><b> TMR	-	</b> Tme Meter Reduction</li>
                        <li><b> Toon	-	</b> In game characters</li>
                        <li><b> TS	-	</b> Tuskan Shaman</li>
                        <li><b> TW	-	</b> Territory War</li>
                        <li><b> Vets	-	</b> Veteran Smuggler Han Solo and Veteran Smuggler Chewbacca</li>
                        <li><b> VHS	-	</b> Veteran Smuggler Han Solo</li>
                        <li><b> VM	-	</b> Visas Marr</li>
                        <li><b> Wai	-	</b> Working as Intended</li>
                        <li><b> Wiggs	-	</b> Wedge Antilles and Biggs Darklighter used together on the same team</li>
                        <li><b> Yoda	-	</b> Typically Grand Master Yoda</li>
                        <li><b> Yolo	-	</b> Young Han Solo</li>
                        <li><b> Zader	-	</b> Darth Vader with a zeta Inspiring Through Fear</li>
                        <li><b> Zariss	-	</b> Barriss Offee with a zeta on Swift Recovery</li>
                        <li><b> Zaul	-	</b> Darth Maul with a zeta on Dancing Shadows</li>
                        <li><b> Zavage	-	</b> Savage Opress with a zeta on Brute</li>
                        <li><b> zDN	-	</b> Darth Nihilus with a zeta (he has 2, can be either)</li>
                        <li><b> Zeers	-	</b> General Veers with a zeta on Aggresssive Tactician</li>
                        <li><b> Zentress	-	</b> Asajj Ventress with a zeta (she has 2, can be either)</li>
                        <li><b> Zeta	-	</b> Zeta material used to raise select character abilities to level 8. These are some of the most powerful abilities in the game</li>
                        <li><b> zFinn	-	</b> Finn with zeta on Balanced Tactics</li>
                        <li><b> Zidious	-	</b> Darth Sidious with a zeta on Sadistic Glee</li>
                        <li><b> Zinn	-	</b> Finn with zeta on Balanced Tactics</li>
                        <li><b> Zoba	-	</b> Boba Fett with a zeta on Bounty Hunter's Resolve</li>
                        <li><b> Zoda	-	</b> Grand Master Yoda with a zeta (typically on Battle Meditation)</li>
                        <li><b> Zody	-	</b> CC-2224 "Cody" with a zeta on Ghost Compay Commander</li>
                        <li><b> Zolo	-	</b> Han Solo with a zeta on Shoots First</li>
                        <li><b> Zombie	-	</b> Nightsister Zombie</li>
                        <li><b> Zooku	-	</b> Count Dooku with a zeta on Flawless Riposte</li>
                        <li><b> ZQGJ	-	</b> Qui-Gon Jinn with a zeta on Agility Training</li>
                        <li><b> Zylo	-	</b> Kylo Ren with a zeta on Outrage</li>
                        <li><b> zZeb	-	</b> Garazeb "Zeb" Orrelios with a zeta on Staggering Sweep</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="sw-farming" role="tabpanel" aria-labelledby="sw-farming-tab">
                    <h2>Character Farming</h2>
                    <p>Referenzen:
                        <a href="#">???</a>
                    </p>
                    <p>Liste von ???.</p>
                    <p>Letzte bekannte Fassung (???):</p>
                    <img src="farming.jpg" class="img-fluid rounded mx-auto d-block" alt="Farming Guide">
                </div>
                <div class="tab-pane fade" id="sw-rules" role="tabpanel" aria-labelledby="sw-rules-tab">
                    <h2>REGELWERK</h2>
                    <p>by Doni, Februar 2018</p>
                    <ul>
                        <li>Teilnahme an Territorialkriegen und Territorialschlachten PFLICHT.</li>
                        <li>Urlaub, kein Problem, aber nur mit Ankündigung! (Ohne Ankündigung wird nach 48Std Abwesenheit entlassen.)</li>
                        <li>RAIDregeln müssen eingehalten werden. (siehe unten)</li>
                        <li>Stetiges Vorrankommen PFLICHT. (momentan geschätztes Ziel,  200K pro Monat ohne Geld Erreichbar)</li>
                        <li>Befehle sollten dringend eingehalten werden.  (Mehrfaches Ignorieren, führt zu Entlassung)</li>
                        <li>
                            GILDENAKTIVITÄTEN sind PFLICHT!
                            (Jeder muss 600/600 Tickets am Tag machen.)
                            (jeweilige AKTIVITÄT kann im Spiel eingesehen werden.)(weitere Erklärungen dazu finden sich unten)
                        </li>
                    </ul>
                    <p>
                        Wichtigster Punkt!  Das Ganze dient nicht dazu euch zu versklaven, sondern um unsere Gemeinschaft vorran zu bringen! Der Spaß am Spiel soll trotz allem erhalten bleiben! Wir erwarten nicht mehr von euch,  als wir selbst geben können! 
                        Bitte unterstützt uns dabei!
                    </p>

                    <h2>Achtung Regel für RancorRAID heroic und AAT!</h2>

                    <ul>
                        <li>künftig wird ein RAID 24 Std. vor Beginn gestartet!</li>
                        <li>heißt zum Beispiel: RAIDbeginn Dienstag 21Uhr. dann haben alle Zeit bis Mittwoch 21Uhr sich mit exakt 0 Punkten anzumelden.</li>
                        <li>(Wer in diesem Zeitraum Punkte macht, setzt 1mal aus und meldet sich bei den nächsten RAIDs mit 0 Punkten an! (Es kann scheinbar mal vorkommen,  dass man Schaden macht. 1mal unter 10K habt ihr frei.)</li>
                        <li>Bei Wiederholung,  wird der jenige der Gilde verwiesen!)</li>
                        <li>Ab Mittwoch 21Uhr darf dann Schaden gemacht werden. </li>
                        <li>Erste Schadensabgabe nicht vor 21.15Uhr!</li>
                        <li>Wer den RAID am Stück schafft, darf nicht vor 21.30Uhr abgeben! </li>
                        <li>Gilt momentan nur für Rancor und AAT</li>
                    </ul>
                    <p>
                        RAIDs finden statt:
                    </p>
                    <ul>
                        <li>H-Rancor: Mittwoch und Sonntag! Start 24 Std vorher.  (Bei überschüssiger Gildenwährung mit Ankündigung auch an anderen Tagen)</li>
                        <li>AAT: immer wenn die Gildenwährung es zulässt. ( aber nicht mit 5M Vorsprung beenden! lasst den anderen auch noch was)</li>
                        <li>Sith-T: immer wenn die Gildenwährung es zulässt.</li>
                    </ul>
                    <p>
                        Diese Regeln gelten ab sofort!
                    </p>
                    <p>
                        Bei Zuwiederhandlung müssen die Konsequenzen gezogen werden!
                    </p>

                    <p>
                        ps.: Das ist keine Strafe,  es dient dem Vorankommen der Gilde!
                    </p>

                    <p>
                        pps.: Bei Fragen, an die Offis wenden!  Danke
                    </p>

                    <h2>Unsere Offis sind</h2>
                    <ul>
                        <li>♤Doni</li>
                        <li>♧Mr Maddin</li>
                        <li>◇Will Macht</li>
                    </ul>

                    <h2>GILDENAKTIVITÄTEN</h2>
                    <p>
                        gehen immer von 18.30Uhr bis zum nächsten Tag um 18.30Uhr. Plant euer Spiel so, dass ihr möglichst viele Punkte macht! 
                    </p>

                    <p>
                        Auflistung: 
                    </p>

                    <ul>
                        <li>Montag-Dienstag:         Kämpfe der Hellen Seite.</li>
                        <li>Dienstag-Mittwoch:      Galaktischer Krieg (36 Kämpfe möglich!)</li>
                        <li>Mittwoch-Donnerstag: Harte Kämpfe.</li>
                        <li>Donnerstag-Freitag:     Herrausforderungen normal und Flotte (20 Punkte möglich!)</li>
                        <li>Freitag-Samstag:          Kämpfe der Dunklen Seite.</li>
                        <li>Samstag-Sonntag:         Arenakämpfe (10 Punkte möglich!)</li>
                        <li>Sonntag-Montag:          Cantina-Kämpfe </li>
                    </ul>


                    <h2>Territorial Krieg:</h2>

                    <p>
                        Es gilt Chars die momentan nicht hochgelevelt werden, unter 6K Macht zu halten!  
                    </p>
                    <p>
                        (bedeutet: alle Chars die über 6K Macht verfügen,  zählen im TK. Daher sollten wir schwache Chars möglichst aus dem Krieg raushalten! also unter 6K)
                    </p>
                    <p>
                        Update Jan 2018
                        </p>
                    <p>
                        Es waren 6 Leute dabei die sich zum Territorialkrieg nicht angemeldet haben! Unentschuldigt! 
                        <br>Ab jetzt gilt,  wer zweimal unentschuldigt bei so einem Event fehlt,  geht! 
                        <br>Desweiteren, waren 3 Leute zwar angemeldet aber haben nicht einen Punkt gemacht. Das heißt weder in der Deff noch in der Off. 
                        <br>Das wird überhaupt nicht toleriert. Kommt Das wieder vor,  geht derjenige ebenfalls. 
                        </p>
                    <p>
                        Somit ist die Teilnahme am Territorialkrieg Pflicht!  
                        </p>
                    <p>
                        Wer nicht mal fähig ist seine Truppen wenigstens zu stationieren, den interessiert die Gilde nicht.  Und der muss hier auch keinen Platz besetzen. 
                        </p>
                    <p>
                        Wir haben uns beraten und das im Sinne der Gilde so entschieden. 
                        <br>Ich denke das ist nur fair. 
                        </p>
                    <p>
                        Weiter machen
                    </p>
                </div>
                <div class="tab-pane fade" id="sw-tw" role="tabpanel" aria-labelledby="sw-tw-tab">
                <h2>Territory Wars Hinweise</h2>
                <p>by Mr Maddin, Dez 2017</p>

                <p>
                    Allgemein:
                </p>
                <ul>
                    <li>Es gibt 3 Phasen: Anmelden, Verteidigung und Angriff</li>
                    <li>Alle Charaktere mit Macht über 6000 können zum Einsatz kommen, empfehlenswert sind aber Chars ab 9000 Macht, Chars die knapp über 6000 sind also schnell hochleveln</li>
                    <li>Zur Verteilung der Truppen Unbedingt auf Gildenbefehle achten, die in bräunlichen Kästen in den einzelnen Territorien stehen</li>
                    <li>Die beiden Felder ganz oben links sind für Flotten vorgesehen, hier bitte jeder mindestens eine Flotte stationieren</li>
                </ul>

                <p>
                    Die einzelnen Phasen im Detail:
                </p>

                <ol>
                    <li>Anmelden
                        <br>Unbedingt machen! Ab dem Moment der Anmeldung werden eure Charaktere eingefroren, das heißt Verbesserungen, die ihr dann noch macht zählen für den weiteren Verlauf der Territory Wars nicht. Wer eine Verbesserung in der Anmeldephase noch mit einbringen will kann sich abmelden und wieder neu anmelden.
                    </li>
                    <li>Verteidigen
                        <br>Hier werden Trupps stationiert, die unsere Territorien verteidigen. Wichtig: Die Charaktere, die hier stationiert werden, stehen später für den Angriff nicht zur Verfügung, das heißt nicht alles gleich verheizen. Ausnahme: Wer wenig Zeit oder Lust auf das Event hat, stationiert alles was geht und braucht sich danach um nichts mehr kümmern. Zur Verteilung der Truppen (wo starke und schwache hinsollen) auf Befehle achten!
                    </li>
                    <li>Angriff
                        <br>Ein gegnerisches Territorium wird eingenommen, wenn alle dort stationierten Trupps besiegt sind. Das Ziel ist, möglichst viele Territorien zu erobern. Wichtig: Einmal eingesetzte Charaktere stehen im Angriff nicht nochmal zur Verfügung, auch wenn sie im Kampf nicht besiegt wurden. Das heißt, versucht die gegnerischen Trupps mit euren schlechtestmöglichen Trupps zu schlagen. Wo angegriffen werden soll, wird durch die Gildenbefehle vorgegeben, diese unbedingt befolgen. Es gibt Extrapunkte wenn man ein gegnerisches Team zum ersten Mal besiegt
                    </li>
                </ol>
                </div>
            </div>

        </main>
    </div>
</div>

@endsection