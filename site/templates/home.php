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

      <section class="contribute">
        <a href="#contribute" class="button">+</a>
      </section>
    </main>
    <?php snippet('nav') ?>  
  <?php else: ?>
    <nav>
      <ul class="themes">
      <?= t('RWD might be') ?>
      <?php foreach($themes->not($page) as $theme): ?>
        <li><a href="<?= $theme->url() ?>"><?= $theme->title()->lower() ?></a></li>
      <?php endforeach ?>
      </ul>
      <?php snippet("links") ?>
    </nav>
  <?php endif ?>

<?php snippet('footer') ?>
