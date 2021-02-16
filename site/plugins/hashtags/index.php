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
    ],

    'comment' => [
      'attr' => [
        'class',
        'author',
      ],
      'html' => function($tag) {  
        $html = "<p class='comment'>";
        $comment  = $tag->value();
        if ($tag->author != '') {
          $html .= '<span class="author">' . $tag->author . ': </span>';          
        }
        $html .= kirbytextinline($comment) . '</p>';
        return $html;
      }
    ]
  ]    
]);