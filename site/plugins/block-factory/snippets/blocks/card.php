<?php
$crop = $block->crop()->toBool();
$zoom = $block->zoom()->toBool();
$cardType = $block->cardType()->value();
$item     = $cardType === 'page' ? $block->page()->toPage() : null;
$link     = $item ? $item->url() : ($cardType === 'manual' ? $block->link()->value() : null);
$image    = $cardType === 'page' && $item ? $item->cover() : $block->image()->toFile();
$text     = $cardType === 'manual' ? $block->seo_text() : ($item ? $item->seo_text() : '');
$headline = $cardType === 'manual' ? $block->seo_title() : ($item ? $item->seo_title() : '');
$counter = 0;
?>
<?php if($block->isNotEmpty()): ?>
  <?php if(!empty($link)): ?>
    <a class="card <?php if($zoom == true): ?>zoom<?php endif; ?>" title="<?= $link ?>" href="<?= $link ?>">
  <?php endif; ?>

  <?php if($cardType == "page" && $item->isNotEmpty()): ?>

        <?php if($item->thumb_switch() == "cover"): ?>
            <?php snippet('card_cover_with_tags',[
                'item' => $item,
                'crop' => $crop,
                'cardType' => $cardType, 
                'counter' => $counter,
                'string' => generateRandomString(),
            ]); ?>
        <?php elseif($item->thumb_switch() == "video"): ?>
            <?php snippet('card_video_with_tags',[
                'item' => $item,
                'random_string' => generateRandomString(),
                'cardType' => $cardType, 
            ]); ?>
        <?php endif; ?>

      <?php else: ?>
        <?php if($image): ?>
          <img data-src="<?= $image->url() ?>" src="<?= $image->url() ?>" alt="<?= $image->url() ?>">
        <?php endif ?>

        <?php snippet('card_manual',[
                'headline' => $headline,
                'text' => $cardType, 
            ]); ?>
      <?php endif; ?>

  <?php if(!empty($link)): ?>
  </a>
  <?php endif; ?>
<?php endif; ?>
