<?php $items= $items->shuffle() ?>
<?php foreach($items as $link): 
  $cover = $link->cover()->isNotEmpty() ? $link->cover()->toFile()->crop(450, 252)->url() : false;
  if(!$cover){
    $first = $link->images()->first();
    if($first){
      $cover = $first->crop(450, 252)->url();
    }
  }
  ?>

  <article class="website">
    <a href="<?= $link->link_url() ?>">
      <?php if($cover): ?>
        <figure  class="website-figure" data-src="<?= $cover?>">
            <img src="<?= $cover?>" alt="<?= $link->title() ?>" loading="lazy">
        </figure>
      <?php endif ?>

      <header>
        <h3><a href="<?= $link->link_url() ?>">
          <?= $link->title() ?>
          <?php e($link->lang()->isNotEmpty(), "<span class='lang'>[" . $link->lang()->html() . ']</span>') ?>
          </a>
        </h3>
      </header>

    </a>
      <div id="<?= $link->slug() ?>-details" class="website-details details">
        <?php if($link->introduction()->isNotEmpty() ): ?>
          <div class="introduction"><?= $link->introduction()->excerpt(150)->kt() ?></div>
        <?php endif ?>
        <?php if($link->author()->isNotEmpty() ): ?>
          <p class="authors">— <?php foreach($link->author()->split() as $author) :?> <span><?= $author ?></span><?php endforeach ?></p>
        <?php endif ?>
    <?php if($link->text()->isNotEmpty() || $link->introduction()->length() > 150): ?>
        <a href="<?= $link->url() ?>" class="button">
          <?= t('More info: show') ?>
        </a>
    <?php endif ?>
      </div>

  </article>
<?php endforeach ?>
