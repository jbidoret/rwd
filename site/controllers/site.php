<?php

return function ($site, $page, $kirby) {
  
  $themes = page('themes')->children()->listed();

  $links = [];
  $interviews = [];
  $notes = [];

  // add the tag filter
  if($tag = urldecode(param('tag') ?? '')) {
    $notes = page('notes')->children()->listed()->filterBy('tags', $tag, ',')->sortBy('date', 'desc');
    $links = page('links')->children()->listed()->filterBy('tags', $tag, ',')->sortBy('date', 'desc');
    $interviews = page('interviews')->children()->listed()->filterBy('tags', $tag, ',')->sortBy('date', 'desc');    
  } else {
    $tag = null;
  }

  return [
    'themes' => $themes,
    'links' => $links,
    'interviews' => $interviews,
    'notes' => $notes,
    'tag' => $tag
  ];
  
};