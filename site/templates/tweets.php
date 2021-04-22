<?php snippet('header') ?>
  
  <main id="main">
    <h1><?= $page->title()->html() ?></h1>
    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="list-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php 
    $children = $page->children()->listed()->flip();
    $page_type = $page->intendedTemplate();
    if($children->count()) :?>
      <section class="<?= $page_type ?> list">
        <h2>Tweets</h2>
        <?php foreach($children as $tweet): ?>
          <?php
            // $format = 'F d, Y * h:ia';
            // try {
            //   $date = DateTime::createFromFormat($format, $tweet->title());
            //   if ($date) {
            //       $tweetdate = $date->format('d/m/Y – H:i');
            //   } else {
            //     $tweetdate = "";
            //   }
            // } catch (Exception $e) {}
            ?>
          <article>
            <header>
              <h3><a href="<?= $tweet->tweet_url() ?>"><?= $tweet->title() ?></a></h3>      
            </header>    
            <div class="details">
              <?= $tweet->text()->kt() ?>
            </div>
          </article>
        <?php endforeach ?>
      </section>
    <?php endif ?>

  </main>
  
  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
