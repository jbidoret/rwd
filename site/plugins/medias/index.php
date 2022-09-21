<?php

Kirby::plugin('rwd/medias', [
  'tags' => [
    'media' => [
      'attr' => [
        'alt',
        'caption',
        'class',
      ],
      'html' => function ($tag) {
        if ($tag->file = $tag->file($tag->value)) {
          $tag->media_type = $tag->file->media_type()->value();
          $tag->src = $tag->media_type == 'youtube' ? $tag->file->yt_url() : $tag->file->url();

          if ($tag->file->media_type() == 'youtube') {
            $media_label = 'Vidéo';
          } elseif  ($tag->file->media_type() == 'image') {
            $media_label = 'Image';
          } else {
            $media_label = 'WTF';
          }
          
          $tag->alt = $tag->alt ?? $tag->file->alt()->or(' ')->value();
          $tag->caption = $tag->caption ?? $tag->file->caption()->value();
          $tag->source = $tag->source ?? $tag->file->source()->value();
          $tag->id = str::Slug($tag->file->name());
          
          $html = '<a href="' . $tag->src . '" class="media-link" data-type="' . $tag->media_type . '" data-id="' . $tag->id . '" data-alt="' . $tag->alt . '"  data-source="' . $tag->source . '">' . $media_label . '</a>';
          $html .= '<span class="media-caption">' . kirbytextinline($tag->caption) . '</span>';
          

          return $html;
            
        }
      }
    ]
  ]
]);