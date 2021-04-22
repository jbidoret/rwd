<?php snippet('header') ?>

  <main>
    <h1><?= $page->title()->html() ?>&#8239;?</h1>

    <?php if($page->introduction()->isNotEmpty()): ?>
      <section class="hypothese list">
        <h2><?= t( "Hypothesis" ) ?></h2>
        <?= $page->introduction()->kirbytext() ?>
      </section>
    <?php endif ?>

    <?php $types = [ "notes" => $notes, "links" => $links, "interviews" => $interviews, "quotes" => $quotes ]; ?>

    <?php foreach($types as $key => $type):?>
      <?php if($type->count()) :?>
        <section class="<?= $key ?> list">
          <h2><?= t( ucfirst($key) ) ?></h2>
          <?php snippet("list." . $key , ['items'=>$type]) ?>
        </section>
      <?php endif ?>
    <?php endforeach ?>

    <?php snippet('comments') ?>

  </main>

  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
