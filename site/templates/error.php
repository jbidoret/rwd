<?php snippet('header') ?>

  <main class="article">
    <header class="article-header">
      <h1 class="article-title"><?= $page->title()->html() ?></h1>
    </header>
    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="article-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>
  </main>
  
  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
