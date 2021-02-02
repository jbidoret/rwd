<?php snippet('header') ?>

  <nav>
    <ul class="themes">
    <?= t('RWD might be') ?>
    <?php foreach($themes->not($page) as $theme): ?>
      <li><a href="<?= $theme->url() ?>"><?= $theme->title()->lower() ?></a></li>
    <?php endforeach ?>
    </ul>
    <?php snippet("links") ?>
    <div class="marquee">
      <span>
        Work in progress… <li><a href="https://github.com/jbidoret/rwd/commits/master">Changelog</a></li>
      </span>
    </div>
  </nav>

<?php snippet('footer') ?>
