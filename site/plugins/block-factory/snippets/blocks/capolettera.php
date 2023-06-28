<?php $capolettera_id = generateRandomString(); ?>
<?php $multiplier = $block->multiplier()->value() ?>
<?php if($block->text()->isNotEmpty()): ?>
  <div id="<?= $capolettera_id ?>" class="capolettera">
    <?= $block->text() ?>
  </div>
<?php endif; ?> 

<style>
  <?php if($block->color() != ""): ?>
  .layout-grid .row .column .blocks #<?= $capolettera_id ?> p {
    color: <?= $block->color() ?>!important;
  }
  <?php endif; ?>
  <?php if($block->background() != "" OR $block->background() != NULL): ?>
  .layout-grid .row .column .blocks #<?= $capolettera_id ?> {
    background-color: <?= $block->background() ?>!important;
  }
  <?php endif; ?>

@media screen and (min-width: 1280px){

@keyframes capolettera {
    0% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 100, 
      'RGHT' calc(0*<?= $multiplier ?>), 
      'LFTT' calc(0*<?= $multiplier ?>);
    }
    20% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 100, 
      'RGHT' calc(0*<?= $multiplier ?>), 
      'LFTT' calc(0*<?= $multiplier ?>);
    }
    40% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 1, 
      'RGHT' calc(0*<?= $multiplier ?>), 
      'LFTT' calc(2*<?= $multiplier ?>);
    }
    60% {
      font-variation-settings: 
      'TPPP' 1, 
      'BTTT' 100, 
      'RGHT' calc(1*<?= $multiplier ?>), 
      'LFTT' calc(1*<?= $multiplier ?>);
    }
    80% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 1, 
      'RGHT' calc(2*<?= $multiplier ?>), 
      'LFTT' calc(0*<?= $multiplier ?>);
    }
    100% {
      font-variation-settings: 
      'TPPP' 1, 
      'BTTT' 1, 
      'RGHT' calc(0*<?= $multiplier ?>), 
      'LFTT' calc(0*<?= $multiplier ?>);
    }
  }
}

@media screen and (max-width: 1280px){

@keyframes capolettera {
    0% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 100, 
      'RGHT' 10, 
      'LFTT' 10;
    }
    20% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 1, 
      'RGHT' 20, 
      'LFTT' 0;
    }
    40% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 1, 
      'RGHT' 0, 
      'LFTT' 20;
    }
    60% {
      font-variation-settings: 
      'TPPP' 1, 
      'BTTT' 100, 
      'RGHT' 20, 
      'LFTT' 0;
    }
    80% {
      font-variation-settings: 
      'TPPP' 1, 
      'BTTT' 100, 
      'RGHT' 0, 
      'LFTT' 20;
    }
    100% {
      font-variation-settings: 
      'TPPP' 100, 
      'BTTT' 100, 
      'RGHT' 10, 
      'LFTT' 10;
    }
  }
}

</style>