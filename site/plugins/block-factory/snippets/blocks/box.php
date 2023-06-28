<?php if($block->text()->isNotEmpty()): ?>
  <div class="box box-<?= $block->boxType() ?>">
    <?= $block->text() ?>
  </div>
<?php endif; ?>