<?php snippet('header') ?>

  <main class="article" id="main">
    <header class="article-header">
      <h1 class="article-title"><?= $page->title()->html() ?></h1>
      <p class="article-meta">
        <?php if($page->interviewee()->isNotEmpty()):?>
          <span><?= t('Interview with') ?> <?= $page->interviewee() ?></span>
        <?php endif ?>
        <?php 
          $date = $page->date()->toDate("d/m/Y");
          $modified = $page->modified("d/m/Y");
          ?>
        <span class="date"><?= $date ?></span>
        <?php if($date != $modified): ?>
          <span class="modified"><?= t("Last update:") ?> <?= $page->modified('d/m/Y H:i') ?></span>
        <?php endif ?>
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
        <?= $page->text()->toBlocks() ?>
      </div>
    <?php endif ?>
    <?php snippet('tags') ?>
  </main>
  
  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
