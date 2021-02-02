<?php

Kirby::plugin('rwd/hashtags', [
  'tags' => [
    'hashtag' => [
      'attr' => [
        'alt',
        'caption',
        'class',
        'height',
        'imgclass',
        'link',
      ],
      'html' => function($tag) {      
        $hashtag  = $tag->value();
        $site = site();
        $lang = $site->language()->code();
        $url = url($site->url(), ['params' => ['tag' => urlencode($hashtag)]]);
        return '<a class="taglink" href="' . $url  . '">#' . $hashtag  . '</a>';
      }
    ]
  ]    
]);