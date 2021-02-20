<div class="answer">
  <?php 
    $name = $page->interviewee(); 
    echo $block->text()->kt()->initials($name); 
  ?>
</div>