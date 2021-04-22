<div class="footer-links">
  <ul class="languages">
    <?php foreach($kirby->languages() as $language): ?>
      <li><a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>" <?php e($kirby->language() == $language, ' class="active"') ?>>
        <?= html($language->code()) ?>
      </a></li> 
    <?php endforeach ?>
  </ul>
  <ul class="all">    
    <?php $p = page('notes') ?><li><a href="<?=$p->url()?>"><?=$p->title()?></a></li>
    <?php $p = page('links') ?><li><a href="<?=$p->url()?>"><?=$p->title()?></a></li>
    <?php $p = page('interviews') ?><li><a href="<?=$p->url()?>"><?=$p->title()?></a></li>
    <?php $p = page('tweets') ?><li><a href="<?=$p->url()?>">Tweets</a></li>
    <?php $p = page('timeline') ?><li><a href="<?=$p->url()?>"><?=$p->title()?></a></li>
    <?php $p = page('about') ?><li><a href="<?=$p->url()?>"><?=$p->title()?></a></li>
  </ul>
</div>