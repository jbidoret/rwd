
  <footer id="footer" class="footer">
    <p>
      Toutes les contributions, réactions ou simples commentaires sont bienvenus. Vous pouvez également solliciter <a href="https://twitter.com/rdclwebdesign/">@rdclwebdesign</a> sur Twitter, contribuer au <i>channel</i> sur <a href="https://www.are.na/julien-bidoret/rwd-a88kvhwm9dk">Are.na</a> ou même soumettre une <a href="https://github.com/jbidoret/rwd/pulls"><i>pull request</i></a>.      
    <a href="https://github.com/jbidoret/rwd/commits/master">Changelog</a> – <a href="<?= site()->url() ?>/feed">Abonnez-vous au flux RSS</a>
    </p>
  </footer>

  
  <!-- under construction -->
  <?php if($page->wip()->toBool()) :?><div class="under" title="<?= t('Under construction') ?>"><span></span><em>:)</em><i><?= t('Under construction') ?></i></div><?php endif ?>


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
  
  <script async defer data-domain="radicalweb.design" src="https://stats.radicalweb.design/js/index.js"></script>
    

</body>
</html>
