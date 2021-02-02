<?php snippet('header') ?>

  <main class="article">
    <header class="article-header">
      <h1 class="article-title"><?= $page->title()->html() ?></h1>
      <p class="article-meta">
        <?php e($page->author()->isNotEmpty(), $page->author()->html()) ?>
        <?= $page->date()->toDate("d/m/Y") ?>
        <?php foreach($page->themes()->toPages() as $t): ?>
          <a href="<?= $t->url() ?>">#<?= $t->title()->lower()->html() ?></a>
        <?php endforeach ?>
      </p>
    </header>
    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="article-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>
    <?php if($page->text()->isNotEmpty()): ?>
      <div class="article-text">
        <?= $page->text()->kirbytext() ?>
      </div>
    <?php endif ?>
  </main>
  
  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
