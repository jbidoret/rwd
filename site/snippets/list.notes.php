<?php foreach($items as $note): ?>
  <article>
    <h3><a href="<?= $note->url() ?>"><?= $note->title() ?></a></h3>
    <div class="details">
    <?= $note->intro() ?>
    </div>
  </article>
<?php endforeach ?>