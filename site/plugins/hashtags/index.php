<?php

Kirby::plugin('rwd/hashtags', [
  'tags' => [
    'hashtag' => [
      'attr' => [
        'class',
        'text',
      ],
      'html' => function($tag) {      
        $hashtag  = $tag->value();
        $site = site();
        $lang = $site->language()->code();
        $text = $tag->text ?? $hashtag;
        $url = url($site->url(), ['params' => ['tag' => urlencode($hashtag)]]);
        return '<a class="taglink" href="' . $url  . '">#' . $text  . '</a>';
      }
    ]
  ]    
]);