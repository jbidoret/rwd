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
    <?php snippet('nav') ?>  
  <?php else: ?>
    <nav id="nav">   
      <p class="intro"><br>
        <?= t('RWD might be') ?>
        <?php 
          $i = 1;
          foreach($themes as $theme): ?>
            <a href="<?= $theme->url() ?>"><?= $theme->title()->lower() ?></a><?php e($i != $themes->count(), ', ', '.') ?>
        <?php $i++; endforeach ?>
      </p>
      <?php snippet("links") ?>
    </nav>
  <?php endif ?>

<?php snippet('footer') ?>
