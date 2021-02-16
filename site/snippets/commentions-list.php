<div class="commentions-list">

  <?php foreach ($reactions as $type => $group) : ?>
    <h2><?= $group->label() ?></h2>

    <ul class="commentions-list-reactions commentions-list-reactions-<?= $type ?>">
      <?php foreach ($group->items() as $comment) : ?>

        <li>
          <a href="<?= $comment->source() ?>"><?= $comment->name()->html() ?></a>
        </li>

      <?php endforeach ?>
    </ul>
  <?php endforeach ?>

  <?php if ($comments->count() > 0) : ?>
    <h2><?= t('commentions.snippet.list.comments') ?> <span>⍩</span> </h2>

    <ul>
        <?php foreach ($comments as $comment) : ?>

        <li class="commentions-list-item commentions-list-item-<?= $comment->type() ?><?= r($comment->isAuthenticated(), ' commentions-list-item-authenticated') ?>">
          <h4>
            <?= $comment->sourceFormatted() ?>
            <span class="commentions-list-date">
              <?= $comment->dateFormatted() ?>
            </span>
          </h4>

          

          <?php if ($comment->text()->isNotEmpty()): ?>
            <div class="commentions-list-message">
              <?= $comment->text() ?>
            </div>
          <?php endif ?>
          </li>

        <?php endforeach ?>
    </ul>
  <?php endif ?>

</div>
