<?php 

Kirby::plugin('ff3300/seo', [

    'blueprints' => [
        'tabs/seo' => __DIR__ . '/blueprints/tabs/seo.yml'
    ],
    'snippets' => [
        'seo' => __DIR__ . '/snippets/seo.php'  
    ]
]);