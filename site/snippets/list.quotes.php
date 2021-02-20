<?php foreach($items as $quote): ?>
  <article>
    <blockquote class="details pullquote">
      <?= $quote->text()->kt() ?>
      <?php if($quote->author()->isNotEmpty()): ?>
      <footer>
        <?php if($quote->quote_url()->isNotEmpty()): ?>
          <a href="<?= $quote->quote_url() ?>"><?= $quote->author() ?></a>
        <?php else :?>
          <?= $quote->author() ?>
        <?php endif ?>
      </footer>
      <?php endif ?>
    </blockquote>
    <?php if($quote->commentions()->count() > 0): ?>
      <a href="<?= $quote->url() ?>" class="button">
        <?= t('Read more') ?>
        <?php if($quote->commentions()->count() > 0) :?>
          <span class="quote-to-comments">
            –  <?= $quote->commentions()->count() ?> 
            <?php e($quote->commentions()->count() > 1, 'contributions', 'contribution') ?>
          </span>
        <?php endif ?>
      </a>  
    <?php else :?>      
      <a href="<?= $quote->url() ?>#contribute" class="button" title="<?= t('commentions.snippet.form.ctacomment') ?>">
        ⍨
      </a>
    <?php endif ?>
  </article>
<?php endforeach ?>