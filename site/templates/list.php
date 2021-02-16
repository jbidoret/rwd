<?php snippet('header') ?>

  <main>
    <h1><?= $page->title()->html() ?></h1>
    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="list-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php 
    $children = $page->children()->listed()->sortBy('date', 'desc');
    $page_type = $page->intendedTemplate();
    if($children->count()) :?>
      <input class="action-checkbox" type="checkbox" name="no-details" id="no-details">
      <label class="action" for="no-details">
        <span><?= t('Hide details: hide') ?></span> <span><?= t('Hide details: show') ?></span> <?= t('Hide details: details') ?>
      </label>


      <section class="<?= $page_type ?> list">
        <h2><?= $page->title() ?></h2>
        <?php snippet("list." . $page_type, ['items'=>$children]) ?>
      </section>
    <?php endif ?>

  </main>

  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
