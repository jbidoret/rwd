<?php foreach($items as $link): ?>
  <article>
    <h3><a href="<?= $link->link_url() ?>">
      <?= $link->title() ?><?php e($link->author()->isNotEmpty(), " – " . $link->author()->html()) ?>
      <?php e($link->lang()->isNotEmpty(), "<span class='lang'>[" . $link->lang()->html() . ']</span>') ?>
      </a>
    </h3>
    <div class="details">
    <?= $link->introduction()->kt() ?>
    </div>
    <?php if($link->text()->isNotEmpty()): ?>
      <input class="action-checkbox show-text-checkbox" type="checkbox" name="no-details-<?=$link->slug()?>" id="show-text-<?=$link->slug()?>">
      <label class="action show-text-action" for="show-text-<?=$link->slug()?>">
        <span><?= t('More info: show') ?></span> <span><?= t('More info: hide') ?></span> 
      </label>
      <div class="details-text">
      <?= $link->text()->kt() ?>
      </div>
    <?php endif ?>
  </article>
<?php endforeach ?>
