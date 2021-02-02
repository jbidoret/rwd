<?php snippet('header') ?>

  <main>
    <h1><?= $page->title()->html() ?></h1>

    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="list-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php 
    $notes = page('notes')->children()->listed();
    if($notes->count()) :?>
      <input class="action-checkbox" type="checkbox" name="no-details" id="no-details">
      
      <label class="action" for="no-details">
        <span><?= t('Hide details: hide') ?></span> <span><?= t('Hide details: show') ?></span> <?= t('Hide details: details') ?>
      </label>

      <section class="notes list">
        <h2><?= t('Notes') ?></h2>
        <?php snippet("list.notes", ['notes'=>$notes]) ?>
      </section>
    <?php endif ?>

  </main>

  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
