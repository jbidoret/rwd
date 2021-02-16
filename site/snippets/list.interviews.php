<?php foreach($items as $interview): ?>
  <article>
    <h3><a href="<?= $interview->url() ?>"><?= $interview->title() ?></a></h3>
    <h4><?= t('Interview with') ?> <?= $interview->interviewee() ?></h4>
    <div class="details">
      <?= $interview->introduction()->kt() ?>
    </div>
    <?php if($interview->text()->isNotEmpty() || $interview->commentions()->count() > 0): ?>
      <a href="<?= $interview->url() ?>" class="button">
        <?= t('Read more') ?>
        <?php if($interview->commentions()->count() > 0) :?>
          <span class="interview-to-comments">
            –  <?= $interview->commentions()->count() ?> 
            <?php e($interview->commentions()->count() > 1, 'contributions', 'contribution') ?>
          </span>
        <?php endif ?>
      </a>  
    <?php else :?>
      <a href="<?= $interview->url() ?>#contribute" class="button">
        <?= t('commentions.snippet.form.ctacomment') ?>
      </a>
    <?php endif ?>
  </article>
<?php endforeach ?>