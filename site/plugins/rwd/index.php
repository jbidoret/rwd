<?php

Kirby::plugin('rwd/helpers', [
    
    'pageMethods' => [
        'getTemplateName' => function(){
            $str =  $this->blueprint()->title();
            return $str;            
        }
    ],
    
    'templates' => [
      'notes'   => kirby()->root('templates') . '/list.php',
      'links'   => kirby()->root('templates') . '/list.php',
      'interviews'   => kirby()->root('templates') . '/list.php',
      'tags'   => kirby()->root('templates') . '/list.php',
    ],
]);