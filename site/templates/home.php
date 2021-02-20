<?php snippet('header') ?>

  <?php if($tag): ?>
    <main>
      <?php $types = [ "notes" => $notes, "links" => $links, "interviews" => $interviews ]; ?>
      <h1>#<?= $tag ?></h1>
      <?php foreach($types as $key => $type):?>
        <?php if($type->count()) :?>
          <section class="<?= $key ?> list">
            <h2><?= t( ucfirst($key) ) ?></h2>
            <?php snippet("list." . $key , ['items'=>$type]) ?>
          </section>
        <?php endif ?>
      <?php endforeach ?>
    </main>
  <?php endif ?>

<?php snippet('nav') ?>  
<?php snippet('footer') ?>
