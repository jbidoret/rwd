<?php foreach($items as $draft): ?>
  <article>
    <header>
      <h3><a href="<?= $draft->url() ?>"><?= $draft->title() ?></a></h3>
      <a class="button comment-button " href="<?= $draft->url() ?>#comments" title="<?= t('Add a comment') ?>"><span class="link-to-comments">⍩</span></a>
    </header>
    
    <div class="details">
    <?= $draft->intro() ?>
    </div>
  </article>
<?php endforeach ?>