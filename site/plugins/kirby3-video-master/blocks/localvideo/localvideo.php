<!-- Video dgdfgdfgPlayer -->
<?php

// Source
$vidfile = $block->vidfile()->tofile();

// Video Contols
$vidoptions = [
    'class'         => 'videosrc',
    'preload'       => 'metadata',
    'controls'      => $block->controls()->toBool() ? 'true' : null,
    'playsinline'   => $block->playsinline()->toBool() ? 'true' : null,
    'autoplay'      => $block->autoplay()->toBool() ? 'true' : null,
    'muted'         => $block->mute()->toBool() ? 'true' : null,
    'loop'          => $block->loop()->toBool() ? 'true' : null
];

$videsourcetag = Html::tag('source', null, ['src' => $vidfile->url(), 'type' => $vidfile->mime() ]);
$videsourcetag .= Html::tag('a', ['href' => $vidfile->url() ]);
$vidtag = Html::tag('video', [$videsourcetag], $vidoptions);
$player = Html::tag('figure', [$vidtag], ['class' => 'video']);

echo $player;

?>










