<?php foreach($links as $link): ?>
  <article>
    <a href="<?= $link->link_url() ?>">
    <?= $link->title() ?><?php e($link->author()->isNotEmpty(), " – " . $link->author()->html()) ?>
    <?php e($link->lang()->isNotEmpty(), "<span class='lang'>[" . $link->lang()->html() . ']</span>') ?>
    </a>
    <div class="details">
    <?= $link->introduction()->kt() ?>
    </div>
  </article>
<?php endforeach ?>
