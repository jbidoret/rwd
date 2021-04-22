<?php snippet('header') ?>

<?php $images = $site->index()->images()->limit(12);?>


  <?php if($tag): ?>
    <main>
      <?php $types = [ "notes" => $notes, "links" => $links, "interviews" => $interviews ]; ?>
      <h1>#<?= $tag ?></h1>
      <?php foreach($types as $key => $type):?>
        <?php if($type->count()) :?>
          <section class="<?= $key ?> list">
            <h2><?= t( ucfirst($key) ) ?></h2>
            <?php snippet("list." . $key , ['items'=>$type]) ?>
          </section>
        <?php endif ?>
      <?php endforeach ?>
    </main>
  <?php endif ?>

  <div id="splash">
    
  </div>

  <canvas id="rwdcanvas" width="100" height="100"></canvas>

<?php snippet('nav') ?>  
<script>
  // Une liste d’images
// ici, les URLs sont absolues, mais elles pourraient être relatives :
// var images = [
//   "img/image1.jpg",
//   "img/image2.jpg",
// ]
var images = [
  <?php foreach ($images as $image) :?>
    "<?= $image->resize(400)->url() ?>",
  <?php endforeach ?>
];

// une liste vide pour stocker les images chargées
var loaded = [];

// pour chaque image
for (image_url of images) {
  var i = document.createElement("img");
  // quand l’image est chargée…
  i.addEventListener('load', function(){
    // nb: “this” représente l’image chargée
    // …on ajoute l’image au body
    document.body.appendChild(this);  
    // …on l’ajoute aussi à la liste des images chargées
    loaded.push(this);
    // Si toutes les images sont chargées, on les positionne et on les affiche…
    if(loaded.length == images.length){
      // …en appelant la fonction displayImages
      displayImages();
    }
  });
  i.src = image_url;  
}

function displayImages(){
  // on mesure la taille de la fenêtre pour limiter la position des images
  var wh = window.innerHeight,
      ww = window.innerWidth;

  // on affiche les images grâce à la class ajoutée au body
  document.body.classList.add('loaded');

  // pour chaque élément
  loaded.forEach(function (image) {
    var size = image.getBoundingClientRect();
    // on affecte un left et un top aléatoire dans les limites de
    // la taille de la fenêtre MOINS la taille de l’image
    var w = Math.floor(size.width),
        h = Math.floor(size.height),
        l = Math.floor(Math.random() * (ww - w)),
        t = Math.floor(Math.random() * (wh - h));
    image.className ="splash";
    image.style = 'left:' + l + 'px; top:' + t + 'px;';
  });
}


</script>
<?= js("assets/js/write.js") ?>
<?php snippet('footer') ?>
