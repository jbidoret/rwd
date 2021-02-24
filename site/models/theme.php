<?php

class ThemePage extends Page {

  public function links(){
    $theme = $this;
    $elements = site()->index()->children()->filter(function($child) use ($theme){
      return $child->themes()->toPages()->has($theme);
    });
    
    return $elements->count();
  }
  

}