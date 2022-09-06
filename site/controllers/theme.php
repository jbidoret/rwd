<?php

return function ($site, $page, $kirby) {
  
  $theme = $page;
  $themes = page('themes')->children()->listed();
  $notes = page('notes')->children()->listed()->filter(function($child) use ($theme){
    return $child->themes()->toPages()->has($theme);
  })->sortBy('date', 'desc');
  $links = page('links')->children()->listed()->filter(function($child) use($theme){
    return $child->themes()->toPages()->has($theme);
  })->sortBy('date', 'desc');
  $websites = page('websites')->children()->listed()->filter(function($child) use($theme){
    return $child->themes()->toPages()->has($theme);
  })->sortBy('date', 'desc');
  $interviews = page('interviews')->children()->listed()->filter(function($child) use($theme){
    return $child->themes()->toPages()->has($theme);
  })->sortBy('date', 'desc');
  $quotes = page('quotes')->children()->listed()->filter(function($child) use($theme){
    return $child->themes()->toPages()->has($theme);
  })->sortBy('date', 'desc');

  
  return [
    'themes' => $themes,
    'links' => $links,
    'websites' => $websites,
    'interviews' => $interviews,
    'notes' => $notes,
    'quotes' => $quotes
  ];
};