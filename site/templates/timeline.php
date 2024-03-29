<?php snippet('header') ?>
  
  <main id="main">
    <h1><?= $page->title()->html() ?></h1>
    <?php if($page->introduction()->isNotEmpty()): ?>
      <div class="list-introduction">
        <?= $page->introduction()->kirbytext() ?>
      </div>
    <?php endif ?>
    
    <?php 
    $grouped_events = $page->children()->listed()->filterBy('date', '!=', '')->sortBy('date', 'desc')->group(function($p) {
        return $p->date()->toDate('Y');
      }
    );
    if($grouped_events->count()) :?>
      <header class="timeline-header">
        <p>Techno.</p>
        <p>Soft.</p>
        <p>Design</p>
        <p>Art</p>
        <p>Contexte</p>
      </header>
      <?php foreach($grouped_events as $year => $events): ?>
        <section class="timeline-year">
          <h2><?= $year ?></h2>
          <div class="timeline-year-content">
            <?php foreach($events as $event) : ?>
              <article class="<?= $event->category()?>">
                <time><?= $event->date()->toDate("m/Y")?></time>
                <header>
                  <?php if($event->hasImages()):?>
                    <figure style="display:none">                
                      <?php foreach($event->images() as $image) :?>
                      <img src="<?= $image->resize(150)->url()?>" alt="<?= $image->alt() ?>">
                      <?php endforeach ?>
                    </figure>
                  <?php endif ?>
                  <h3>
                    <?php if($event->link_url()->isNotEmpty()):?>
                      <a href="<?= $event->link_url() ?>"><?= $event->title() ?></a>
                    <?php else : ?>
                      <?= $event->title() ?>
                    <?php endif ?>
                  </h3>      
                </header>    
                <div class="details">
                  <?php e($event->introduction()->isNotEmpty(), '<div class="introduction">' . $event->introduction()->kt() .'</div>') ?>
                  <?php if($event->text()->isNotEmpty()): ?>
                    <input class="action-checkbox show-text-checkbox" type="checkbox" name="no-details-<?=$event->slug()?>" id="show-text-<?=$event->slug()?>">
                    <label class="action show-text-action" for="show-text-<?=$event->slug()?>">
                      <span><?= t('More info: show') ?></span> <span><?= t('More info: hide') ?></span>
                    </label>
                    <div class="details-text">
                    <?= $event->text()->kt() ?>
                    </div>
                  <?php endif ?>
                </div>
              </article>
            <?php endforeach ?>
          </div>
        </section>
      <?php endforeach ?>
    <?php endif ?>

    <footer id="outro">
      <?= $page->outro()->kt() ?>
    </footer>

  </main>
  
  <?php snippet('nav') ?>  

  <footer id="credits" class="footer">
    <p class="small">
    Ce site est publié par <a href="https://accentgrave.net/">Julien Bidoret</a>, enseignant à l’<a href="https://esad-pyrenees.fr">École supérieure d’art et de design des Pyrénées</a> et développé grâce à <a href="https://getkirby.com">Kirby</a>.
    </p>
  </footer>

<?php snippet('footer') ?>
