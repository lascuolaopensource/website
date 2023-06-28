<?php if($block->text_size()->isNotEmpty()): ?>
  <?php $id = generateRandomString(); ?>
  <style>
    .random-letters-container {
      margin: 0;
      display: inline-flex;
      flex-wrap: wrap;
      align-content: flex-start;
      justify-content: space-between;
      <?php if($block->text_size()->isNotEmpty()): ?>font-size: <?= $block->text_size() ?>vw;<?php endif; ?>  
      <?php if($block->background()->isNotEmpty()): ?>background-color: <?= $block->background() ?>;<?php endif; ?>
      <?php if($block->bg_random()->isNotEmpty()): ?><?php endif; ?>
      overflow: hidden;
      line-height: 1em!important;
      <?php if($block->inner_margin()->isNotEmpty()): ?>margin: <?= $block->inner_margin() ?>px;<?php endif; ?>
      max-height: <?= $block->max_height() ?>px;
    }
    .random-letters-container * {
      line-height: 1em!important;
    }
    .random-letters-container span.letter {
      font-family: 'karletto'!important;
      margin-left: 0;
      margin-right: 0;
      line-height: 1em;
      <?php if($block->color()->isNotEmpty()): ?>color: <?= $block->color() ?>!important;<?php endif; ?>
    }
  </style>
  
  <div class="random-letters-container" id="<?= $id ?>"></div>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

  <script>

    function getRandomLetter() {
      const alphabet = "abcdefghilmnopqrstuvzxykjw";
      return alphabet[Math.floor(Math.random() * alphabet.length)];
    }

    function getRandomStyle() {
      const styles = [
        "font-variation-settings: 'TPPP' 100, 'BTTT' 100,  'RGHT' 50, 'LFTT' 0; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 100, 'BTTT' 100,  'RGHT' 0, 'LFTT' 50; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 1, 'BTTT' 1, 'RGHT' 50, 'LFTT' 0; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 1, 'BTTT' 1, 'RGHT' 0, 'LFTT' 50; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 50, 'BTTT' 50,  'RGHT' 0, 'LFTT' 50; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 50, 'BTTT' 50,  'RGHT' 50, 'LFTT' 0; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 100, 'BTTT' 100,  'RGHT' 100, 'LFTT' 0; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 100, 'BTTT' 100,  'RGHT' 0, 'LFTT' 100; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 1, 'BTTT' 1, 'RGHT' 0, 'LFTT' 100; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 1, 'BTTT' 1, 'RGHT' 100, 'LFTT' 0; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 100, 'BTTT' 100,  'RGHT' 0, 'LFTT' 0; color: <?= $block->color() ?>",
        "font-variation-settings: 'TPPP' 1, 'BTTT' 1,  'RGHT' 0, 'LFTT' 0; color: <?= $block->color() ?>",
      ];
      return styles[Math.floor(Math.random() * styles.length)];
    }

    function createLetter(containerId) {
      var letter = document.createElement("span");
      letter.textContent = getRandomLetter();
      letter.style.cssText = getRandomStyle();
      letter.style.left = Math.random() * 100 + "%";
      letter.style.top = Math.random() * 100 + "%";
      document.getElementById(containerId).appendChild(letter);
    }

    var containerId = '<?= $id ?>';

    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;
    var lettersPerRow = Math.floor((windowWidth) / <?= $block->text_size() ?>); 
    var rows = Math.ceil((windowHeight / 100) * <?= $block->text_size() ?>);

    for (let i = 0; i < rows * lettersPerRow; i++) {
      createLetter(containerId);
    }
  </script>

<?php endif; ?>
