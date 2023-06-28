
<?php
$counter   = 0;
$crop      = $block->crop()->toBool();
$cardType  = $block->cardType()->value();
$direction = $block->direction();
$arrow     = $block->arrow();
$items     = $cardType === 'pages' ? $block->pages() : null;
$id = generateRandomString();
?>

<?php if($block->isNotEmpty()): ?>

    <!-- Slider main container -->
    <div class="swiper <?= $id ?>">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
                <?php foreach( $items->toPages() as $item ): ?>
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <a  href="<?= $item->url() ?>" 
                            class="swiper-anchor"
                            title="<?= $item->titolo()->text() ?>" 
                            target="_self"
                            >
                        <?php if($item->thumb_switch() == "cover"): ?>
                            <?php snippet('slide_cover',[
                                'item' => $item,
                                'crop' => $crop,
                                'cardType' => $cardType, 
                                'counter' => $counter,
                                'string' => generateRandomString(),
                            ]); ?>
                        <?php elseif($item->thumb_switch() == "video"): ?>
                            <?php snippet('slide_video',[
                                'item' => $item,
                                'random_string' => generateRandomString(),
                                'cardType' => $cardType, 
                            ]); ?>
                        <?php endif; ?>
                        </a>
                    </div>
                    <?php $counter++; ?>
                <?php endforeach; ?>
            </div>
            <?php if($arrow == "true"): ?>
                <div class="<?= $id ?>_prev swiper-button-prev"></div>
                <div class="<?= $id ?>_next swiper-button-next"></div>
            <?php else: ?>
            <?php endif; ?>
        </div>

        <script>
            const swiper_<?= $id ?> = new Swiper('.<?= $id ?>', {
                stopOnLastSlide: false,
                autoplay: {
                    delay: 8000,
                },
                // Optional parameters
                direction: '<?= $direction ?>',

                // Navigation arrows
                navigation: {
                nextEl: '.<?= $id ?>_next',
                prevEl: '.<?= $id ?>_prev',
                },

            });
        </script> 

<?php endif; ?>




  