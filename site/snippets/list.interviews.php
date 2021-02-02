<?php foreach($items as $interviews): ?>
  <article>
    <h3><a href="<?= $interviews->url() ?>"><?= $interviews->title() ?></a></h3>
    <h4><?= t('Interview with') ?> <?= $interviews->interviewee() ?></h4>
    <div class="details">
    <?= $interviews->introduction() ?>
    </div>
  </article>
<?php endforeach ?>