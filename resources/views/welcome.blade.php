<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#072a40">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Imperia Corre 2027 — mezza maratona, 10 km competitiva e 10 km non competitiva sulla nuova pista ciclabile affacciata sul mare. Domenica 7 marzo 2027.">
    <title>Imperia Corre 2027 — Mezza Maratona e 10 km sul mare</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-simbolo-imperia-corre.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-simbolo-imperia-corre.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a class="skip-link" href="#contenuto">Vai al contenuto</a>

    <header class="site-header" data-header>
        <a class="brand" href="#top" aria-label="Imperia Corre, torna all'inizio">
            <img class="brand-logo" src="{{ asset('images/logo-completo.png') }}" alt="" width="450" height="117">
        </a>

        <nav class="desktop-nav" aria-label="Navigazione principale">
            <a href="#gare">Le gare</a>
            <a href="#percorso">Il percorso</a>
            <a href="#quote">Quote</a>
            <a href="#gemellaggio">Gemellaggio</a>
            <a href="#programma">Programma</a>
        </nav>

        <a class="button button-small header-cta" href="https://iscrizioni.imperiacorre.it/" target="_blank" rel="noopener">Iscriviti</a>
        <button class="menu-toggle" type="button" aria-label="Apri menu" aria-expanded="false" data-menu-toggle>
            <span></span><span></span>
        </button>
    </header>

    <div class="mobile-menu" data-mobile-menu aria-hidden="true">
        <nav aria-label="Navigazione mobile">
            <a href="#gare">Le gare</a>
            <a href="#percorso">Il percorso</a>
            <a href="#quote">Quote</a>
            <a href="#gemellaggio">Gemellaggio</a>
            <a href="#programma">Programma</a>
            <a href="#faq">FAQ</a>
            <a class="button" href="https://iscrizioni.imperiacorre.it/" target="_blank" rel="noopener">Iscriviti ora</a>
        </nav>
    </div>

    <main id="contenuto">
        <section class="hero" id="top">
            <div class="hero-copy">
                <p class="eyebrow reveal">Domenica 7 marzo 2027 · ore 09:30</p>
                <h1 class="reveal">Corri dove<br><span>il mare respira.</span></h1>
                <p class="hero-intro reveal">Mezza maratona, 10 km competitiva e 10 km non competitiva. Tre modi di vivere la nuova ciclabile sul mare.</p>
                <div class="hero-actions reveal">
                    <a class="button" href="https://iscrizioni.imperiacorre.it/" target="_blank" rel="noopener">Iscriviti ora <span aria-hidden="true">↗</span></a>
                    <a class="text-link" href="#percorso">Esplora il percorso <span aria-hidden="true">↓</span></a>
                </div>
            </div>

            <div class="hero-visual" aria-label="Illustrazione di un runner sul lungomare di Imperia">
                <div class="hero-sun" aria-hidden="true">
                    <img class="hero-symbol" src="{{ asset('images/logo-simbolo-imperia-corre.png') }}" alt="" width="121" height="117" fetchpriority="high">
                </div>
                <div class="distance-badge"><strong>21</strong><span>,097 KM</span></div>
            </div>

            <div class="coastline" aria-hidden="true">
                <svg viewBox="0 0 1600 240" preserveAspectRatio="none">
                    <path d="M0 151c136-44 252-20 366 18 116 39 208 37 318-7 159-64 283-82 432-30 183 64 297 22 484-24v132H0Z" fill="#f9f2df"/>
                    <path d="M0 190c221-52 344 46 535-4 159-42 281-69 446-10 185 66 380-43 619-55" fill="none" stroke="#0f7892" stroke-width="5" opacity=".8"/>
                </svg>
            </div>
        </section>

        <section class="quick-facts" aria-label="Informazioni principali">
            <div><span>01</span><p>Data</p><strong>7 marzo 2027</strong></div>
            <div><span>02</span><p>Gare</p><strong>21 km + 10 km</strong></div>
            <div><span>03</span><p>Partenza</p><strong>Campo di Atletica</strong></div>
            <div><span>04</span><p>Scenario</p><strong>Ciclabile sul mare</strong></div>
        </section>

        <section class="intro-section section" id="evento">
            <div class="section-label reveal"><span>01</span> L'evento</div>
            <div class="intro-grid">
                <h2 class="reveal">Una città.<br>Due anime.<br><em>Infinite emozioni.</em></h2>
                <div class="intro-copy reveal">
                    <p class="lead">Una strada attesa per quasi cinquant'anni è diventata il luogo in cui tutta la città può correre.</p>
                    <p>Il tracciato che per decenni era rimasto incompiuto è stato completamente messo in sicurezza, rinnovato e trasformato in pista ciclabile. Oggi collega il territorio lungo il profilo del mare e offre un percorso veloce, pianeggiante e spettacolare: perfetto per inseguire un personale o vivere la corsa al proprio ritmo.</p>
                    <div class="mini-stats">
                        <div><strong>3</strong><span>formule di gara</span></div>
                        <div><strong>0</strong><span>salite da temere</span></div>
                        <div><strong>1</strong><span>grande festa sul mare</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="races-section section" id="gare">
            <div class="section-label reveal"><span>02</span> Scegli la tua gara</div>
            <div class="races-head">
                <h2 class="reveal">La stessa energia.<br><em>Il tuo traguardo.</em></h2>
                <p class="reveal">Che tu voglia misurarti con il cronometro o goderti il percorso senza pressione, domenica 7 marzo c'è una partenza per te.</p>
            </div>
            <div class="race-cards reveal">
                <article class="race-card featured">
                    <div class="race-top"><span>Gara regina</span><strong>21,097</strong><small>km</small></div>
                    <h3>Mezza Maratona</h3>
                    <p>La sfida completa: dalla ciclabile davanti al Campo di Atletica fino a San Lorenzo e Diano Marina, con arrivo in pista.</p>
                    <ul><li>Competitiva</li><li>Partenza ore 09:30</li><li>Da €25</li></ul>
                    <a href="#quote">Scopri le quote <span>↓</span></a>
                </article>
                <article class="race-card">
                    <div class="race-top"><span>Competitiva</span><strong>10</strong><small>km</small></div>
                    <h3>10 km competitiva</h3>
                    <p>Dieci chilometri nazionali per mettere alla prova ritmo, velocità e determinazione.</p>
                    <ul><li>Competitiva</li><li>Partenza ore 09:30</li><li>Da €15</li></ul>
                    <a href="#quote">Scopri le quote <span>↓</span></a>
                </article>
                <article class="race-card casual">
                    <div class="race-top"><span>Aperta a tutti</span><strong>10</strong><small>km</small></div>
                    <h3>10 km non competitiva</h3>
                    <p>La festa della corsa senza pressione agonistica: vieni a correre o camminare sul mare.</p>
                    <ul><li>Non competitiva</li><li>Partenza ore 09:30</li><li>Da €15</li></ul>
                    <a href="#quote">Scopri le quote <span>↓</span></a>
                </article>
            </div>
        </section>

        <section class="route-section section" id="percorso">
            <div class="route-copy">
                <div class="section-label light reveal"><span>03</span> Il percorso</div>
                <h2 class="reveal">Il tuo passo.<br><em>Il nostro mare.</em></h2>
                <p class="reveal">Si parte sulla ciclabile davanti al Campo di Atletica. Dopo 2,2 km in direzione San Lorenzo al Mare, il primo giro di boa immette nel lungo tratto verso Diano Marina. Da qui, un secondo giro di boa riporta gli atleti sulla stessa ciclabile fino allo spettacolare arrivo in pista.</p>
                <div class="route-points reveal">
                    <div><i></i><span>Partenza</span><strong>Ciclabile davanti al Campo di Atletica</strong></div>
                    <div><i></i><span>Primo tratto</span><strong>2,2 km verso San Lorenzo al Mare</strong></div>
                    <div><i></i><span>Dopo il giro di boa</span><strong>Ciclabile fino a Diano Marina</strong></div>
                    <div><i></i><span>Rientro</span><strong>Giro di boa e arrivo in pista</strong></div>
                </div>
            </div>
            <div class="route-map reveal" aria-label="Schema del percorso da Imperia verso San Lorenzo al Mare e Diano Marina, con arrivo al Campo di Atletica">
                <svg viewBox="0 0 680 640" aria-hidden="true">
                    <path class="map-land" d="M83 30c82 70 126 92 210 102 62 8 86 53 140 77 73 32 104-1 171 53 35 28 51 76 32 120-24 55-78 58-98 119-15 46 5 75-28 109H44V83Z"/>
                    <path class="map-road-shadow" d="M92 159c100 6 111 128 226 131 100 3 142-82 228-37 82 43 41 126-28 139-72 13-143-43-231-3-55 25-87 70-164 66"/>
                    <path class="map-road" pathLength="1" d="M92 159c100 6 111 128 226 131 100 3 142-82 228-37 82 43 41 126-28 139-72 13-143-43-231-3-55 25-87 70-164 66"/>
                    <circle cx="92" cy="159" r="12"/>
                    <circle cx="123" cy="455" r="12"/>
                </svg>
                <span class="map-label label-start">PARTENZA · CICLABILE</span>
                <span class="map-label label-finish">ARRIVO · IN PISTA</span>
                <span class="map-place place-oneglia">DIANO MARINA</span>
                <span class="map-place place-porto">SAN LORENZO AL MARE · 2,2 KM</span>
                <div class="map-note">Andata e ritorno<br><small>sempre sulla pista ciclabile</small></div>
            </div>
        </section>

        <section class="fees-section section" id="quote">
            <div class="section-label reveal"><span>04</span> Quote d'iscrizione</div>
            <div class="fees-head">
                <h2 class="reveal">Prima parti.<br><em>Meno spendi.</em></h2>
                <a class="button reveal" href="https://iscrizioni.imperiacorre.it/" target="_blank" rel="noopener">Vai alle iscrizioni <span>↗</span></a>
            </div>
            <div class="fees-grid reveal">
                <article>
                    <div class="fees-title"><span>21,097 km</span><h3>Mezza Maratona</h3></div>
                    <div class="fee-row active"><span>Entro il 15 novembre 2026</span><strong>€25</strong></div>
                    <div class="fee-row"><span>Entro il 31 gennaio 2027</span><strong>€30</strong></div>
                    <div class="fee-row"><span>Entro il 6 marzo 2027</span><strong>€35</strong></div>
                </article>
                <article>
                    <div class="fees-title"><span>10 km</span><h3>Competitiva e non competitiva</h3></div>
                    <div class="fee-row active"><span>Entro il 15 novembre 2026</span><strong>€15</strong></div>
                    <div class="fee-row"><span>Entro il 31 gennaio 2027</span><strong>€20</strong></div>
                    <div class="fee-row"><span>Dal 1 febbraio al 7 marzo 2027</span><strong>€25</strong></div>
                </article>
            </div>
            <p class="fees-note reveal">Le quote sono valide per iscrizioni completate entro le scadenze indicate. Consulta il regolamento ufficiale per requisiti e modalità di partecipazione.</p>
        </section>

        <section class="twinning-section" id="gemellaggio">
            <div class="twinning-intro reveal">
                <p class="eyebrow">Savona × Imperia</p>
                <h2>Due città.<br>Due gare.<br><em>Un'unica sfida.</em></h2>
                <p>La Savona Half Marathon del 15 novembre 2026 e la Imperia Half Marathon del 7 marzo 2027 si uniscono in una speciale classifica combinata basata sulla somma dei tempi ottenuti nelle due gare.</p>
            </div>
            <div class="twinning-card reveal">
                <div class="twinning-dates">
                    <div><small>15 NOV 2026</small><strong>Savona</strong></div>
                    <span>×</span>
                    <div><small>07 MAR 2027</small><strong>Imperia</strong></div>
                </div>
                <div class="prizes">
                    <h3>Montepremi gemellaggio</h3>
                    <div><span>1° assoluto/a</span><strong>€200</strong></div>
                    <div><span>2° assoluto/a</span><strong>€150</strong></div>
                    <div><span>3° assoluto/a</span><strong>€100</strong></div>
                    <div><span>1° di ogni categoria</span><strong>€50</strong></div>
                </div>
                <div class="twinning-alert">
                    <strong>Come entrare nella classifica combinata</strong>
                    <ol>
                        <li>All'iscrizione alla Savona Half Marathon seleziona l'opzione <b>“Gemellaggio”</b>.</li>
                        <li>All'iscrizione a Imperia scrivi nelle note <b>“ISCRITTO AL GEMELLAGGIO”</b>.</li>
                    </ol>
                    <p>Senza questa indicazione non sarà possibile rientrare nelle classifiche abbinate.</p>
                </div>
            </div>
        </section>

        <section class="program-section section" id="programma">
            <div class="section-label reveal"><span>05</span> Il programma</div>
            <div class="program-head">
                <h2 class="reveal">Tutto pronto.<br><em>Tocca a te.</em></h2>
                <p class="reveal">Ritiro pettorale, deposito borse, docce e premiazioni: ecco gli orari per organizzare il tuo weekend di gara.</p>
            </div>
            <div class="program-list reveal">
                <article>
                    <span class="program-num">01</span>
                    <div><small>Sabato 6 marzo · dalle 14:30</small><h3>Consegna pettorali</h3></div>
                    <p>Ritiro del pettorale presso il Campo di Atletica.</p>
                    <span class="program-arrow">↗</span>
                </article>
                <article>
                    <span class="program-num">02</span>
                    <div><small>Domenica 7 marzo · dalle 08:00</small><h3>Accoglienza atleti</h3></div>
                    <p>Ultima consegna pettorali, deposito borse e preparazione alla partenza.</p>
                    <span class="program-arrow">↗</span>
                </article>
                <article>
                    <span class="program-num">03</span>
                    <div><small>Domenica 7 marzo · ore 09:30</small><h3>Partenza delle gare</h3></div>
                    <p>Sulla ciclabile antistante il Campo di Atletica: mezza maratona, 10 km competitiva e 10 km non competitiva.</p>
                    <span class="program-arrow">↗</span>
                </article>
                <article>
                    <span class="program-num">04</span>
                    <div><small>Domenica 7 marzo · dalle 12:00</small><h3>Premiazioni</h3></div>
                    <p>Cerimonia finale. Per gli atleti sono disponibili servizio docce e deposito borse.</p>
                    <span class="program-arrow">↗</span>
                </article>
            </div>
        </section>

        <section class="gallery-section section" id="gallery">
            <div class="section-label reveal"><span>06</span> Edizione 2026</div>
            <div class="gallery-head">
                <h2 class="reveal">La corsa,<br><em>vissuta davvero.</em></h2>
                <p class="reveal">Volti, partenze e traguardi dell'ultima edizione, insieme agli scorci di mare che rendono unico ogni chilometro corso a Imperia.</p>
            </div>
            <div class="photo-grid">
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/partenza-imperia-corre-2026-2.jpeg') }}" width="1600" height="1200" loading="lazy" decoding="async" alt="Gli atleti in testa alla partenza di Imperia Corre 2026">
                    <figcaption><span>La gara</span> Il primo passo verso il traguardo</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/pista-ciclabile.jpeg') }}" width="1200" height="1600" loading="lazy" decoding="async" alt="La pista ciclabile di Imperia accanto al porto e alle palme">
                    <figcaption><span>Il percorso</span> La ciclabile tra porto e mare</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/torre-di-prarola.jpeg') }}" width="1200" height="1600" loading="lazy" decoding="async" alt="La Torre di Prarola illuminata sul mare di Imperia">
                    <figcaption><span>Imperia</span> Torre di Prarola</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/partecipanti-imperia-corre-2026.jpeg') }}" width="1600" height="1200" loading="lazy" decoding="async" alt="I partecipanti di Imperia Corre 2026 al Campo di Atletica">
                    <figcaption><span>La comunità</span> Insieme al Campo di Atletica</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/porto-imperia.jpg') }}" width="1600" height="1067" loading="lazy" decoding="async" alt="Il porto di Imperia al tramonto">
                    <figcaption><span>Imperia</span> Il porto al tramonto</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/partenza-imperia-corre-2026.jpeg') }}" width="1600" height="1200" loading="lazy" decoding="async" alt="Il gruppo dei runner alla partenza di Imperia Corre 2026">
                    <figcaption><span>La partenza</span> Energia sulla linea del via</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/pista-ciclabile-1.jpeg') }}" width="387" height="516" loading="lazy" decoding="async" alt="La pista ciclabile affacciata direttamente sul mare">
                    <figcaption><span>Il percorso</span> Correre a un passo dal mare</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/partenza-imperia-corre-2026-1.jpeg') }}" width="1600" height="1200" loading="lazy" decoding="async" alt="I runner durante la partenza di Imperia Corre 2026">
                    <figcaption><span>La gara</span> Ritmo, concentrazione, entusiasmo</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/premi-imperia-corre-2026.jpeg') }}" width="1600" height="1200" loading="lazy" decoding="async" alt="Coppe e premi preparati per Imperia Corre 2026">
                    <figcaption><span>Il traguardo</span> I premi dell'edizione 2026</figcaption>
                </figure>
                <figure class="photo-card reveal">
                    <img src="{{ asset('images/vincitori-imperia-corre-2026.jpeg') }}" width="1200" height="1600" loading="lazy" decoding="async" alt="I vincitori sul podio di Imperia Corre 2026">
                    <figcaption><span>I protagonisti</span> I vincitori sul podio</figcaption>
                </figure>
            </div>
        </section>

        <section class="quote-section">
            <div class="quote-track" aria-hidden="true"><span>CORRI · RESPIRA · VIVI · </span><span>CORRI · RESPIRA · VIVI · </span></div>
            <blockquote class="reveal">“Ogni traguardo<br>inizia da un <em>passo.</em>”</blockquote>
        </section>

        <section class="faq-section section" id="faq">
            <div class="section-label reveal"><span>07</span> Domande frequenti</div>
            <div class="faq-grid">
                <h2 class="reveal">Tutto quello<br>che c'è da <em>sapere.</em></h2>
                <div class="accordion reveal">
                    <details>
                        <summary>Quando si svolgerà la gara?<span>+</span></summary>
                        <p>Domenica 7 marzo 2027. Tutte e tre le gare partiranno alle ore 09:30.</p>
                    </details>
                    <details>
                        <summary>Quali gare posso scegliere?<span>+</span></summary>
                        <p>Mezza Maratona competitiva da 21,097 km, 10 km competitiva e 10 km non competitiva aperta a chi vuole vivere il percorso senza la pressione della gara ufficiale.</p>
                    </details>
                    <details>
                        <summary>Come si sviluppa il percorso?<span>+</span></summary>
                        <p>La partenza è sulla ciclabile davanti al Campo di Atletica. Si corre per 2,2 km verso San Lorenzo al Mare, si effettua il giro di boa e si prosegue sulla ciclabile fino a Diano Marina. Dopo il secondo giro di boa si rientra lungo la stessa ciclabile, con arrivo direttamente in pista al Campo di Atletica.</p>
                    </details>
                    <details>
                        <summary>Dove si ritira il pettorale?<span>+</span></summary>
                        <p>Al Campo di Atletica, sabato 6 marzo dalle 14:30 oppure domenica mattina dalle 08:00.</p>
                    </details>
                    <details>
                        <summary>Come partecipo al gemellaggio con Savona?<span>+</span></summary>
                        <p>Seleziona “Gemellaggio” quando ti iscrivi alla Savona Half Marathon e scrivi “ISCRITTO AL GEMELLAGGIO” nelle note dell'iscrizione a Imperia. Senza questa dicitura non entrerai nella classifica combinata.</p>
                    </details>
                    <details>
                        <summary>Quali servizi sono disponibili?<span>+</span></summary>
                        <p>Per gli atleti sono previsti deposito borse e servizio docce. Le premiazioni inizieranno alle ore 12:00.</p>
                    </details>
                </div>
            </div>
        </section>

        <section class="signup-section" id="iscrizioni">
            <div class="signup-graphic" aria-hidden="true">
                <span>IM</span><span>PER</span><span>IA</span>
            </div>
            <div class="signup-card reveal">
                <p class="eyebrow">7 marzo 2027 · Imperia</p>
                <h2>La corsa comincia <em>qui.</em></h2>
                <p>Le iscrizioni sono aperte. Blocca la quota migliore e assicurati un pettorale per correre sul mare di Imperia.</p>
                <a class="button signup-main-button" href="https://iscrizioni.imperiacorre.it/" target="_blank" rel="noopener">Iscriviti alla gara <span>↗</span></a>
            </div>
        </section>
    </main>

    <footer>
        <a class="brand footer-brand" href="#top">
            <img class="brand-logo" src="{{ asset('images/logo-completo.png') }}" alt="Imperia Corre" width="450" height="117" loading="lazy">
        </a>
        <div class="footer-links"><a href="#gare">Gare</a><a href="#percorso">Percorso</a><a href="#quote">Quote</a><a href="#gemellaggio">Gemellaggio</a><a href="#faq">FAQ</a><a href="mailto:info@imperiacorre.it">Contatti</a></div>
        <div class="footer-meta"><span>© {{ date('Y') }} Imperia Corre</span><span>Mezza maratona e 10 km sul mare · 7 marzo 2027</span></div>
    </footer>
</body>
</html>
