<?php

Kirby::plugin('rwd/tags', [
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
        return '<a class="taglink" href="/tags/' . $hashtag  . '">#' . $hashtag  . '</a>';
      }
    ]
  ]    
]);