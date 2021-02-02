<?php snippet('header') ?>

  <main>
    <h1><?= $page->title()->html() ?>&#8239;?</h1>

    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="theme-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php $types = [ "notes" => $notes, "links" => $links, "interviews" => $interviews ]; ?>

    <?php foreach($types as $key => $type):?>
      <?php if($type->count()) :?>
        <section class="<?= $key ?> list">
          <h2><?= t( ucfirst($key) ) ?></h2>
          <?php snippet("list." . $key , ['items'=>$type]) ?>
        </section>
      <?php endif ?>
    <?php endforeach ?>

    <section class="contribute">
      <a href="#contribute" class="button">+</a>
    </section>

  </main>

  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
