
  <footer>
    <p>
      Toutes les contribution, réactions ou simples commentaires sont bienvenus. En attendant que le site se dote d’un outil dédié, sollicitez <a href="https://twitter.com/julienbidoret/">@julienbidoret</a> sur Twitter, contribuez au <i>channel</i> sur <a href="https://www.are.na/julien-bidoret/rwd-a88kvhwm9dk">Are.na</a> ou soumettez une <a href="https://github.com/jbidoret/rwd/pulls"><i>pull request</i></a>.
      Ce site est publié par <a href="https://accentgrave.net/">Julien Bidoret</a>, enseignant à l’<a href="https://esad-pyrenees.fr">École supérieure d’art et de design des Pyrénées</a> et développé grâce à <a href="https://getkirby.com">Kirby</a>.
    </p>
    <p>
      <a href="<?= site()->url() ?>/feed">Abonnez-vous au flux RSS</a>
    </p>
  </footer>

  <!-- scripts -->
  <?php
    if ( option('environment') == 'local' ) :
      foreach ( option('basic-devkit.assets.scripts', array()) as $style):
        echo js($style.'?version='.md5(uniqid(rand(), true)));
      endforeach;
    else:
      echo js('assets/production/all.min.js');
    endif
  ?>

</body>
</html>
