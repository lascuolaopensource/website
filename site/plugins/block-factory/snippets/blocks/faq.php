<?php $faqItems = $block->faq()->toBlocks(); ?>
<div class="faq-section">
  <?php if($faqItems->isNotEmpty()): ?>
    <h2><?= $block->heading() ?></h2>
    <?= $faqItems ?>
  <?php endif; ?>
</div>