<?php if($page->tags()->isNotEmpty()): ?>
  <ul class="tags">
    <?php foreach ($page->tags()->split() as $tag): ?>
    <li>
      <a href="<?= url($site->url() , ['params' => ['tag' => urlencode($tag)]]) ?>">#<?= $tag ?></a>
    </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>