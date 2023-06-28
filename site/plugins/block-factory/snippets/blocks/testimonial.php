<?php if($block->quote()->isNotEmpty()): ?>
  <blockquote class="testimonial">
    <p class="quote-text">
      <?= $block->quote() ?>
    </p>
    <footer>
        <figure class="flex items-center">
          <?php if($image = $block->image()->toFile()): ?>
            <div class="testimonial-image">
              <img src="<?= $image->crop(50, 50)->url() ?>" alt="<?= $image->alt() ?>">
            </div>
          <?php endif ?>
          <figcaption>
            <?= implode(', ', array_filter([$block->name()->value(), $block->company()->value()])) ?>
          </figcaption>
        </figure>
    </footer>
  </blockquote>
<?php endif; ?>

