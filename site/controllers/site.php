<?php

return function ($site, $page, $kirby) {
  
  $themes = page('themes')->children()->listed();
  
  return [
    'themes' => $themes
  ];
};