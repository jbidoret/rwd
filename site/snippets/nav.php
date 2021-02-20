<nav id="nav">    
  <ul class="themes">
    <li><?= t('RWD might be') ?></li>
    <?php foreach($themes as $theme): ?>
      <li <?php e($theme->isOpen(), ' class="active"') ?>><a href="<?= $theme->url() ?>"><?= $theme->title()->lower() ?></a></li>
    <?php endforeach ?>
  </ul>
  <?php snippet("links") ?>
</nav>