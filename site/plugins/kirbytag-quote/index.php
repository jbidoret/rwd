<?php
/*
 * kirby 3 kirbytag - quote
 *
 * Forked from https://github.com/jbeyerstedt/kirby-kirbytag-quote
 * license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License
 */

Kirby::plugin('accentgrave/quote', [
  'options' => [
    'default_style' => 'none'
  ],
  'tags' => [
    'quote' => [
      'attr' => [
        'author',
        'class',
        'url',
        'urltext'
      ],
      'html' => function($tag) {
        $html = '';

        $has_url = $tag->url != '';
        $url = trim($tag->url ?? "");

        $class = $tag->class;
        $class .= ' ' . option('accentgrave.quote.blockquote_classname', '');        
        $html .= '<blockquote class="' . $class . '" ' . e($has_url, 'cite="' . $url .'"'). '>';

        $html .= '<p>' . kirbytextinline($tag->value) . '</p>';

        if ($tag->author != '') {
          
          $link = r($has_url, ', <a href="'. $url .'">' . r($tag->urltext != "", $tag->urltext, "source") . '</a>', '');           
          $html .= '<footer><span class="author">' . $tag->author . '</span>' . $link . '</footer>';          
        }

        $html .= '</blockquote>';
        return $html;
      }
    ]
  ]
]);
