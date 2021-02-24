<div class="footer-links">
  <ul class="languages">
    <?php foreach($kirby->languages() as $language): ?>
      <li><a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>" <?php e($kirby->language() == $language, ' class="active"') ?>>
        <?= html($language->code()) ?>
      </a></li> 
    <?php endforeach ?>
  </ul>
  <ul class="all">    
    <li><a href="<?=page('notes')->url()?>"><?= t("Notes") ?></a></li>
    <li><a href="<?=page('links')->url()?>"><?= t("Links") ?></a></li>
    <li><a href="<?=page('interviews')->url()?>"><?= t("Interviews") ?></a></li>
    <li><a href="<?=page('tweets')->url()?>"><?= t("Tweets") ?></a></li>
    <li><a href="<?=page('about')->url()?>"><?= t("About") ?></a></li>
  </ul>
</div>