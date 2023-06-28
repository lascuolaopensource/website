<?php

@include_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/CookieMethods.php';

const DEFAULT_CONTENT = [
    'title' => '<strong>Configurazione dei cookies</strong>',
    'text' => 'In questo sito utilizziamo i cookies per migliorare la tua esperienza di navigazione e offrirti un servizio migliore. Per maggiori dettagli leggi la (link: privacy-policy text: privacy policy)',
    'essentialText' => 'Essenziali',
    'denyAll' => 'Rifiuta tutti',
    'acceptAll' => 'Accetta tutti',
    'save' => 'Salva la configurazione',
];

Kirby::plugin('michnhokn/cookie-banner', [
    'snippets' => [
        'cookie-modal' => __DIR__ . '/snippets/cookie-modal.php',
        'cookie-modal-option' => __DIR__ . '/snippets/cookie-modal-option.php',
    ],
    'translations' => [
        'de' => [
            'michnhokn.cookie-banner' => DEFAULT_CONTENT
        ],
        'it' => [
            'michnhokn.cookie-banner.title' => 'Configurazione dei cookies',
            'michnhokn.cookie-banner.text' => 'In questo sito utilizziamo i cookies per migliorare la tua esperienza di navigazione e offrirti un servizio migliore.<br><br>→ (link: privacy-policy text: Privacy Policy)',
            'michnhokn.cookie-banner.essentialText' => 'Essenziali',
            'michnhokn.cookie-banner.denyAll' => 'Rifiuta tutti',
            'michnhokn.cookie-banner.acceptAll' => 'Accetta tutti',
            'michnhokn.cookie-banner.save' => 'Salva configurazione',
        ],
        'en' => [
            'michnhokn.cookie-banner.title' => 'Cookie settings',
            'michnhokn.cookie-banner.text' => 'We use cookies to provide you with the best possible experience. They also allow us to analyze user behavior in order to constantly improve the website for you.<br><br>→ (link: privacy-policy text: Privacy Policy)',
            'michnhokn.cookie-banner.essentialText' => 'Essential',
            'michnhokn.cookie-banner.denyAll' => 'Reject All',
            'michnhokn.cookie-banner.acceptAll' => 'Accept All',
            'michnhokn.cookie-banner.save' => 'Save settings',
        ]
    ],
    'options' => [
        'features' => [],
        'content' => DEFAULT_CONTENT
    ]
]);
