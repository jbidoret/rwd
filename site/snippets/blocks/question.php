<p class="question">
  <?php e($block->author_initials()->isNotEmpty(), '<span class="initials" title="' . $block->author() . '">' . $block->author_initials() . ' – </span>') ?>
  <?= $block->text()->kti() ?>
</p>