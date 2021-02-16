<?php foreach($items as $note): ?>
  <article>
    <header>
      <h3><a href="<?= $note->url() ?>"><?= $note->title() ?></a></h3>      
    </header>    
    <div class="details">
      <?= $note->intro() ?>
    </div>
    <?php if($note->text()->isNotEmpty() || $note->commentions()->count() > 0): ?>
      <a href="<?= $note->url() ?>" class="button">
        <?= t('Read more') ?>
        <?php if($note->commentions()->count() > 0) :?>
          <span class="note-to-comments">
            –  <?= $note->commentions()->count() ?> 
            <?php e($note->commentions()->count() > 1, 'contributions', 'contribution') ?>
          </span>
        <?php endif ?>
      </a>  
    <?php else :?>
      <a href="<?= $note->url() ?>#contribute" class="button">
        <?= t('commentions.snippet.form.ctacomment') ?>
      </a>
    <?php endif ?>
  </article>
<?php endforeach ?>