<?php snippet('header') ?>

  <main class="article" id="main">

    <article>
      <header class="article-header">
        <h1 class="article-title"><?= $page->title()->html() ?></h1>
        <p class="article-meta">
          <?php if($page->author()->isNotEmpty()): ?>        
            <span class="article-author">
              <p class="authors"><?php foreach($page->author()->split() as $author) :?> <span><?= $author ?></span><?php endforeach ?></p>
            </span>
          <?php endif ?>
          <?php 
            $date = $page->date()->toDate("d/m/Y");
            $modified = $page->modified("d/m/Y");
            ?>
          <span class="date"><?= $date ?></span>
          <?php if($date != $modified): ?>
            <span class="modified" title="<?= t("Last update") ?>">~ <?= $page->modified('d/m/Y') ?></span>
          <?php endif ?>
          <?php foreach($page->themes()->toPages() as $t): ?>
            <a href="<?= $t->url() ?>">#<?= $t->title()->lower()->html() ?></a>
          <?php endforeach ?>
        </p>
      </header>

      <?php
        $cover = $page->cover()->isNotEmpty() ? $page->cover()->toFile()->crop(900, 500)->url() : false;
        if(!$cover){
          $first = $page->images()->first();
          if($first){
            $cover = $first->crop(900, 500)->url();
          }
        }      
      if($cover): ?>
        <figure  class="website-figure" data-src="<?= $cover?>">
        <a href="<?= $page->link_url() ?>"><img src="<?= $cover?>" alt="<?= $page->title() ?>" loading="lazy"></a>
        </figure>
      <?php endif ?>

      <?php if($page->introduction()->isNotEmpty()): ?>
        <div class="article-introduction">
          <?= $page->introduction()->kirbytext() ?>
        </div>
      <?php endif ?>
      <?php if($page->link_url()->isNotEmpty()) :?>
        <p class="link-url">
          <a href="<?= $page->link_url() ?>"><?= $page->link_url()->niceURL() ?></a>
        </p>
      <?php endif ?>
      <?php if($page->text()->isNotEmpty()): ?>
        <div class="article-text">
          <?= $page->text()->ft() ?>
        </div>
      <?php endif ?>
    </article>

    <?php snippet('comments') ?>
  </main>
  
  <?php snippet('nav') ?>  

  <footer id="credits" class="footer">
    <p class="small">
    Ce site est publié par <a href="https://accentgrave.net/">Julien Bidoret</a>, enseignant à l’<a href="https://esad-pyrenees.fr">École supérieure d’art et de design des Pyrénées</a> et développé grâce à <a href="https://getkirby.com">Kirby</a>.
    </p>
  </footer>

<?php snippet('footer') ?>
