<?php

@include_once __DIR__ . '/vendor/autoload.php';
use Embed\Embed;

function curlFile($url){
  $process = curl_init($url);
  curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
  $res = curl_exec($process);
  curl_close($process);
  return $res;
}

Kirby::plugin('ag/websites', [
    'options' => array(
        'min_image_width'  => 60,
        'min_image_height' => 60,
        'max_images'       => 10,
        'external_images'  => false,
    ),
    'hooks' => [
      'page.create:after' => function ($page) {
        if ($page->intendedTemplate() == "website" ){
          $url = $page->title();
          if(V::url($url)){
            $embed = new Embed();
            $info = $embed->get( $url );
            $title = $info->title ?? Str::slug($url);
            $imageurl = $info->image ?? null;
            $lang = $info->language ?? "";
            $cover = "";

            if($imageurl){
              // file_put_contents($img, file_get_contents($image));
              // F::write($page->root() .'/'. $image, $image);

              $file = file_get_contents($imageurl); 
              $path = parse_url($imageurl, PHP_URL_PATH);
              $filename = basename($path);              
              $path = $page->root() . '/' . $filename;
              F::write($path, $file);
              $cover = $filename;
            }
            $page->update([
              'link_url' => $url,
              'introduction' => $info->description,
              'lang' => substr($lang, 0, 2),
              'cover' => $cover
            ]);

            $page->changeTitle($title);
            $page->changeStatus('listed');
          }
        }
      },
      'page.update:after' => function ($newPage, $oldPage) {
        if ($newPage->intendedTemplate() == "website" ){
          // $url = $newPage->link_url();
          // if(V::url($url)){
          //   $embed = new Embed();
          //   $info = $embed->get( $url );
          //   $title = $info->title ?? Str::slug($url);
          //   $newPage->update([
          //     'link_url' => $url,
          //     'introduction' => $info->title
          //   ]);
          //   // $newPage->changeTitle($title);
          //   $newPage->changeStatus('listed');
          // }
        }
      }
      
    ]
]);