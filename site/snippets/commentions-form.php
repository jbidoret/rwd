
  <div class="commentions-form">

    <?php if (\sgkirby\Commentions\Commentions::accepted($page, 'comments')) : ?>

      <?php if (option('sgkirby.commentions.hideforms')) : ?>

        <h2 class="expander" id="commentions-form-comment">
          <button aria-expanded="false" class="button">
            <?= t('commentions.snippet.form.ctacomment') ?>
          </button>
        </h2>

      <?php else : ?>

        <h2 id="commentions-form-comment"><?= t('commentions.snippet.form.ctacomment') ?></h2>

      <?php endif; ?>

      <form action="<?= $page->url() ?>" method="post" <?= option('sgkirby.commentions.hideforms') ? 'class="expandertarget" hidden' : '' ?>>

        <?php if (array_key_exists('name', $fields)) : ?>
        <div class="commentions-form-name">
          <label for="name"><?= $fields['name']['label'] ?></label>
          <input type="text" id="name" name="name" <?= $fields['name']['required'] ? 'required' : '' ?>>
        </div>
        <?php endif; ?>

        <?php if (array_key_exists('email', $fields)) : ?>
        <div class="commentions-form-email">
          <label for="email"><?= $fields['email']['label'] ?></label>
          <input type="email" id="email" name="email" <?= $fields['email']['required'] ? 'required' : '' ?>>
        </div>
        <?php endif; ?>

        <div class="commentions-form-honeypot">
          <label for="website"><?= t('commentions.snippet.form.honeypot') ?></label>
          <input type="url" id="website" name="website">
        </div>

        <?php if (array_key_exists('website', $fields)) : ?>
        <div class="commentions-form-website">
          <label for="realwebsite"><?= $fields['website']['label'] ?></label>
          <input type="url" id="realwebsite" name="realwebsite" <?= $fields['website']['required'] ? 'required' : '' ?>>
        </div>
        <?php endif; ?>

        <div class="commentions-form-message">
          <label for="message"><?= $fields['message']['label'] ?></label>
          <textarea id="message" name="message" rows="8" required></textarea>
          <!-- <?php commentions('help') ?> -->
        </div>

        <?php /* "commentions" value enables identifying commentions submissions in route:before hook + creation timestamp is used for spam protection */ ?>
        <input type="hidden" name="commentions" value="<?php e(!$page->isCacheable(), time(), 0) ?>">

        <input type="submit" name="submit"  value="<?= t('commentions.snippet.form.submitcomment') ?>">

      </form>

    <?php endif; ?>

    <?php if (\sgkirby\Commentions\Commentions::accepted($page, 'webmentions')) : ?>

      <?php if (option('sgkirby.commentions.expand')) : ?>

        <h2 class="expander" id="commentions-form-webmention">
          <button aria-expanded="false">
            <span><?= t('commentions.snippet.form.ctawebmention') ?></span>
          </button>
        </h2>

      <?php else : ?>

        <h2 id="commentions-form-webmention"><?= t('commentions.snippet.form.ctawebmention') ?></h2>

      <?php endif; ?>

      <form action="<?= kirby()->urls()->base() . '/' . option('sgkirby.commentions.endpoint') ?>" method="post" <?= option('sgkirby.commentions.expand') ? 'class="expandertarget" hidden' : '' ?>>

        <div class="commentions-form-source">
          <label for="source"><?= t('commentions.snippet.form.responseurl') ?></label>
          <input type="url" id="source" name="source" pattern=".*http.*" required>
        </div>

        <input type="hidden" name="target" value="<?= $page->url() ?>">
        <input type="hidden" name="manualmention" value="true">

        <input type="submit" name="submit" value="<?= t('commentions.snippet.form.submitwebmention') ?>">

      </form>

    <?php endif; ?>

  </div>
