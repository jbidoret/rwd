<?php 
    $cover = $page->cover()->first()->toFile();
    if (!$cover) {
        $cover = page('home')->metaimage()->toFile();
    }
    if ($cover) {
        $og_cover = $cover->thumb(['width' => 1200, 'height' => 630, 'crop' => true]);
    } 

    // title
    $title = r($page !== $site->homePage(), $page->title()->html() );
    $title .= r($page->subtitle()->isNotEmpty(), " &ndash; " . $page->subtitle()->toString(), "");
    $title .= r($page !== $site->homePage(), " &ndash; ") . $site->title()->html();


    $description = "";
    $description .= r($page->metadescription()->isNotEmpty(), $page->metadescription()->toString(), "");
    $description .= r($page->subtitle()->isNotEmpty(), $page->subtitle()->toString() . " | ", "");
    $description .= Html::encode($page->introduction()->excerpt(150)->toString());
    $description = trim(preg_replace('/[\t\n\r\s]+/', ' ', $description));

    if($description == ""){
        $description = Html::encode(page('home')->metadescription()->toString() . "&nbsp;: " .  $page->title()->lower());
    }
 ?>


    <title><?php echo $title ?></title>

    <link rel="canonical" href="<?= $page->url() ?>">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $site->keywords()->text() ?>">

    <meta name="dc.title" content="<?php echo $title ?>" />
    <meta name="dc.description" content="<?= $description ?>" />
    <meta name="dc.relation" content="<?= $page->url() ?>" />
    <meta name="dc.source" content="<?= $site->url() ?>" />
    <meta name="dc.language" content="<?= $kirby->language() ?>" />

    <meta property="og:url" content="<?= $page->url() ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= r($page !== $site->homePage(), $page->title()->html() . ' | ') . $site->title()->html() ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:site_name" content="<?= $site->title() ?>">
    <meta property="og:locale" content="<?= $kirby->language() ?>">
    <?php if ($og_cover) : ?>
    <meta property="og:image" content="<?= $og_cover->url() ?>">
    <meta property="og:image:width" content="<?= $og_cover->width() ?>">
    <meta property="og:image:height" content="<?= $og_cover->height() ?>">
    <?php endif ?>

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= $page->title() ?>" />
    <meta name="twitter:description" content="<?= $description ?>" />
    <?php if ($og_cover) : ?>
    <meta name="twitter:image" content="<?= $og_cover->url() ?>" />
    <?php endif ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= url('assets/favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url('assets/favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url('assets/favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= url('assets/favicons/site.webmanifest') ?>">
    <link rel="mask-icon" color="#000000" href="<?= url('assets/favicons/safari-pinned-tab.svg') ?>">
    <link rel="shortcut icon" href="<?= url('assets/favicons/favicon.ico') ?>">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-config" content="<?= url('assets/favicons/browserconfig.xml') ?>">
    <meta name="theme-color" content="#000000">

