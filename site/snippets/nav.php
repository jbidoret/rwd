<nav id="nav">    
  <ul class="themes">
    <li><?= t('RWD might be') ?></li>
    <?php foreach($themes as $theme): ?>
      <li <?php e($theme->isOpen(), ' class="active"') ?>><a href="<?= $theme->url() ?>"><?= $theme->title()->lower() ?></a></li>
    <?php endforeach ?>
  </ul>
  <?php snippet("links") ?>
  <ul class="languages">
    <?php foreach($kirby->languages() as $language): ?>
      <li><a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>" <?php e($kirby->language() == $language, ' class="active"') ?>>
        <?= html($language->code()) ?>
      </a></li> 
    <?php endforeach ?>
    </ul>
</nav>