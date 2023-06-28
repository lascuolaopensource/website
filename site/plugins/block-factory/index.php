<?php
Kirby::plugin('cookbook/block-factory', [
  'blueprints' => [
    'blocks/accordion'   => __DIR__ . '/blueprints/blocks/accordion.yml',
    'blocks/texture'         => __DIR__ . '/blueprints/blocks/texture.yml',
    'blocks/capolettera'         => __DIR__ . '/blueprints/blocks/capolettera.yml',
    'blocks/box'         => __DIR__ . '/blueprints/blocks/box.yml',
    'blocks/card'        => __DIR__ . '/blueprints/blocks/card.yml',
    'blocks/slider'        => __DIR__ . '/blueprints/blocks/slider.yml',
    'blocks/faq'         => __DIR__ . '/blueprints/blocks/faq.yml',
    'blocks/faq2'        => __DIR__ . '/blueprints/blocks/faq2.yml',
    'blocks/testimonial' => __DIR__ . '/blueprints/blocks/testimonial.yml',
  ],
  'snippets' => [
    'blocks/accordion'   => __DIR__ . '/snippets/blocks/accordion.php',
    'blocks/texture'         => __DIR__ . '/snippets/blocks/texture.php',
    'blocks/capolettera'         => __DIR__ . '/snippets/blocks/capolettera.php',
    'blocks/box'         => __DIR__ . '/snippets/blocks/box.php',
    'blocks/card'        => __DIR__ . '/snippets/blocks/card.php',
    'blocks/slider'        => __DIR__ . '/snippets/blocks/slider.php',
    'blocks/faq'         => __DIR__ . '/snippets/blocks/faq.php',
    'blocks/faq2'        => __DIR__ . '/snippets/blocks/faq2.php',
    'blocks/testimonial' => __DIR__ . '/snippets/blocks/testimonial.php',
  ],
  'translations' => [
    'en' => [
      'field.blocks.accordion.name'   => 'Accordion block',
      'field.blocks.texture.name' => 'texture block',
      'field.blocks.capolettera.name' => 'Capolettera block',
      'field.blocks.box.name'         => 'Textbox block',
      'field.blocks.card.name'        => 'Card',
      'field.blocks.slider.name'      => 'Slider',
      'field.blocks.faq.name'         => 'FAQ Section Version 1',
      'field.blocks.faq2.name'        => 'FAQ Section Version 2',
      'field.blocks.testimonial.name' => 'Testimonial',
    ]
  ],
]);