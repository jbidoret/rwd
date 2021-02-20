<?php foreach($items as $link): 
  $cover = $link->cover()->isNotEmpty() ? $link->cover()->toFile()->crop(200, 112)->url() : false;
  ?>

  <article>

    <header>
      <h3><a href="<?= $link->link_url() ?>">
        <?= $link->title() ?><?php e($link->author()->isNotEmpty(), " – " . $link->author()->html()) ?>
        <?php e($link->lang()->isNotEmpty(), "<span class='lang'>[" . $link->lang()->html() . ']</span>') ?>
        </a>
      </h3>
    </header>

    <div class="details">
      <?php if($cover): ?>
        <figure  class="details-figure" data-src="<?= $cover?>">
          <a href="<?= $link->link_url() ?>">
            <img src="<?= $cover?>" alt="Capture: <?= $link->title() ?>">
          </a>
        </figure>
      <?php endif ?>
      <?= $link->introduction()->kt() ?>
    </div>
        
    <?php if($link->text()->isNotEmpty() || $link->commentions()->count() > 0): ?>
      <a href="<?= $link->url() ?>" class="button">
        <?= t('More info: show') ?>
        <?php if($link->commentions()->count() > 0) :?>
          <span class="link-to-comments">
            –  <?= $link->commentions()->count() ?> 
            <?php e($link->commentions()->count() > 1, 'contributions', 'contribution') ?>
          </span>
        <?php endif ?>
      </a>  
    <?php else :?>
      <a href="<?= $link->url() ?>#contribute" class="button" title="<?= t('commentions.snippet.form.ctacomment') ?>">
        ⍨
      </a>
    <?php endif ?>

  </article>
<?php endforeach ?>
