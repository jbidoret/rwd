<?php snippet('header') ?>

<?php $images = $site->index()->images()->limit(12);?>


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

  <div id="splash">
    
  </div>

  <canvas id="rwdcanvas" width="100" height="100"></canvas>

<?php snippet('nav') ?>  

<?= js("assets/js/write.js") ?>
<?php snippet('footer') ?>
