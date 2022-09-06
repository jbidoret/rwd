<?php

function excerpt_paragraph($html, $max_char = 100, $trail='...', $link='' ){
    $matches= array();
    if ( preg_match( '/<p>[^>]+<\/p>/', $html, $matches) ){
        $p = strip_tags($matches[0]);
    } else {
        $p = strip_tags($html);
    }
    $p = short_str($p, $max_char );
    $p = rtrim($p, ',.;: aA' );
    if (ctype_space($p) || $p=='' || strlen($p)<10) { return ''; }
    if($link){
      $link = " <a href='" . $link . "' class='readmore'>" . t("Read more") . "</a>";
    }
    return '<p>'.$p.$trail.'</p>';
    // return '<p>'.$p.$trail.$link.'</p>';
}

function short_str( $str, $len, $cut = false ){
    if ( strlen( $str ) <= $len ) { return $str; }
    $string = ( $cut ? substr( $str, 0, $len ) : substr( $str, 0, strrpos( substr( $str, 0, $len ), ' ' ) ) );
    return $string;
}





class NotePage extends Page {
  
  // creepy : not used
  public function intro(){
    $intro = $this->introduction()->kti();
    $intro .= ' ' . $this->text()->kti();    
    return excerpt_paragraph($intro, 300, '…', $this->url());
  }


}