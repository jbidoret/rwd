<?php

Kirby::plugin('rwd/helpers', [
    
    'pageMethods' => [
        'getTemplateName' => function(){
            $str =  $this->blueprint()->title();
            return $str;            
        }
    ],

    'fieldMethods' => [
        'initials' => function($field, $name){
            $words = explode(' ', $name);
            if (count($words) >= 2) {
                $initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
            } else {
              preg_match_all('#([A-Z]+)#', $name, $capitals);
              if (count($capitals[1]) >= 2) {
                $initials = substr(implode('', $capitals[1]), 0, 2);
              } else {
                $initials = strtoupper(substr($name, 0, 2));
              }
            }
            $initials_html = '<span class="initials" title="' . $name . '">' . $initials . ' – </span>'; 
            $first_p_pos = strpos( $field, 'p>' );
            $new_text = substr_replace( $field, $initials_html, $first_p_pos + 2, 0 );
            return $new_text;
        },
        'niceURL' => function($field){
          $url = $field->value();
          if (V::url($url)) {
            $niceURL = str_replace('http://', '', $url);
            $niceURL = str_replace('https://', '', $niceURL);
            $niceURL = str_replace('www.', '', $niceURL);
            $niceURL = trim($niceURL, '/');
          } 
          return $field;          
        }
    ],
    
    'templates' => [
      'notes'   => kirby()->root('templates') . '/list.php',
      'links'   => kirby()->root('templates') . '/list.php',
      'interviews'   => kirby()->root('templates') . '/list.php',
      'websites'   => kirby()->root('templates') . '/list.php',
      'tags'   => kirby()->root('templates') . '/list.php',
    ],
]);