<div class="answer">
  <?php 
  $name = $page->interviewee();
  $words = explode(' ', $name);
  if (count($words) >= 2) {
      $initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
  } else {
    preg_match_all('#([A-Z]+)#', $name, $capitals);
    if (count($capitals[1]) >= 2) {
      $initials = substr(implode('', $capitals[1]), 0, 2);
    } else {
      $initials = strtoupper(substr($name, 0, 2));
    }
  }
  $initials_html = '<span class="initials" title="' . $name . '">' . $initials . ' – </span>'; 
  $text = $block->text()->kt();
  
  $first_p_pos = strpos( $text, 'p>' );
  $new_text = substr_replace( $text, $initials_html, $first_p_pos + 2, 0 );

  ?>
  <?= $new_text ?>
</div>