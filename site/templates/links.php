<?php snippet('header') ?>

  <main>
    <h1><?= $page->title()->html() ?></h1>

    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="list-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php 
    $links = page('links')->children()->listed();
    if($links->count()) :?>
      <input class="action-checkbox" type="checkbox" name="no-details" id="no-details">
      
      <label class="action" for="no-details">
        <span><?= t('Hide details: hide') ?></span> <span><?= t('Hide details: show') ?></span> <?= t('Hide details: details') ?>
      </label>

      <section class="links list">
        <h2><?= t('Links') ?></h2>
        <?php snippet("list.links", ['links'=>$links]) ?>
      </section>
    <?php endif ?>

  </main>

  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
