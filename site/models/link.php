<?php

class LinkPage extends Page {
  
  public function niceURL(){
    
    if ($this->link_url()->isNotEmpty()) {
      $niceURL = str_replace('http://', '', $this->link_url());
      $niceURL = str_replace('https://', '', $niceURL);
      $niceURL = str_replace('www.', '', $niceURL);
      $niceURL = trim($niceURL, '/');
      return $niceURL;
    } else{
      return "";
    }
    
  }

}