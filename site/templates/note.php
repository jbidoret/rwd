<?php snippet('header') ?>

  <main class="article" id="main">
    <article>

      <header class="article-header">
        <h1 class="article-title"><?= $page->title()->html() ?></h1>
        <p class="article-meta">          
          <?php if($page->author()->isNotEmpty()):?>
            <span class="article-author">
              <?php if($page->author_url()->isNotEmpty()): ?>        
                <a href="<?= $page->author_url() ?>"><?=$page->author() ?></a>
              <?php else: ?>
                <?=$page->author() ?>
              <?php endif ?>
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

      

      <?php commentions('feedback'); ?>
      
      <?php if($page->introduction()->isNotEmpty()): ?>
        <div class="article-introduction">
          <?= $page->introduction()->kirbytext() ?>
        </div>
      <?php endif ?>
      <?php if($page->link_url()->isNotEmpty()) :?>
        <p class="link-url">
          <a href="<?= $page->link_url() ?>"><?= $page->niceURL() ?></a>
        </p>
      <?php endif ?>
      <?php if($page->text()->isNotEmpty()): ?>
        <div class="article-text">
          <?= $page->text()->ft() ?>
        </div>
      <?php endif ?>
      
      <aside>
        <?php snippet('tags') ?>
      </aside>
    </article>

    <?php snippet('comments') ?>
    
  </main>
  
  <?php snippet('nav') ?>  

<?php snippet('footer') ?>
