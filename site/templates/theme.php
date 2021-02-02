<?php snippet('header') ?>

  <main>
    <h1><?= $page->title()->html() ?>&#8239;?</h1>

    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="theme-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php if($notes->count()) :?>
      <section class="notes list">
        <h2><?= t('Notes') ?></h2>
        <?php snippet("list.notes") ?>
      </section>
    <?php endif ?>

    <?php if($links->count()) :?>
      <section class="links list">
        <h2><?= t('Links') ?></h2>
        <?php snippet("list.links") ?>
      </section>
    <?php endif ?>

    <section class="contribute">
      <a href="#contribute" class="button">+</a>
    </section>

  </main>

  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
