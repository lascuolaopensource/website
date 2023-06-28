<!-- selezione una immagine random tra le immagini disponibili per la SEO -->
<?php 

    if ($page->seo_title()->isNotEmpty()) {
        $seo_title = $page->seo_title()->text();
    }
    else {
        $seo_title = $page->title();
    }

    if($page->seo_text()->isNotEmpty()){
        $seo_text = $page->seo_text()->text();
    }
    else{
        $seo_text = $page->descrizione()->excerpt(200);
    }

    if ($page->seo_images()->isNotEmpty()) {
        $seo_image_array = $page->seo_images()->toFiles()->toArray();
        $seo_image = $seo_image_array[ array_rand( $seo_image_array ) ]['url'];
        $seo_image_id = $seo_image_array[ array_rand( $seo_image_array ) ]['filename'];
    }
    elseif ( $page->hasImages() ) {
        $page_images = $page->images()->toArray();
        $seo_image = $page_images[ array_rand( $page_images ) ]['url'];
        $seo_image_id = $page_images[ array_rand( $page_images ) ]['filename'];
    }
    else {
        $seo_image = "";
    }
    if ($page->seo_org()) {
        $seo_org = $page->seo_org()->text();
    }
    else {
        $seo_org = "";
    }
    if ($site->logo()->isNotEmpty()) {
        $logo = $site->logo()->toFile()->url(); 
    }
    else {
        $logo = "";
    }
    if ($page->seo_url()->isNotEmpty()){
        $seo_url = $page->seo_url();
    }
    else{
        $seo_url = "";
    }

?>

<!-- genera il json per scheme.org -->

<?php if($seo_org !== "" AND $logo !== "" AND $seo_url !== ""): ?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "<?= $seo_org ?>",
    "alternateName": "<?= $seo_org ?>",
    "url": "<?= $page->url() ?>",
    "logo": "<?= $logo ?>",
    "sameAs": [
        "<?= $seo_url ?>"
    ]
  }
</script>

<?php endif; ?>

<!-- Informazioni generali -->
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="<?= $seo_org ?>">

<!-- Definisce la URL canonica per questo contenuto -->
<link rel="canonical"               href="<?= $site->url() ?>">

<!-- Informazioni per Google -->

  <title><?= $seo_title ?></title>
  <meta name="description" content="<?= $seo_text ?>">
  <meta name="author" content="<?= $seo_org ?>">
  <meta property="og:title"           content="<?= $seo_title ?>" />
  <meta name="twitter:title"          content="<?= $seo_title ?>" />
  <meta property="og:description"     content="<?= $seo_text ?>" />
  <meta name="twitter:description"    content="<?= $seo_text ?>" />


<!-- Informazioni per Facebook -->
<meta property="og:url"             content="<?= $site->url() ?>" />
<meta property="og:image"           content="<?= $seo_image ?>" />
<meta property="og:type"            content="article" />

<!-- Informazioni per Twitter -->
<meta name="twitter:card"           content="summary">
<meta name="twitter:site"           content="<?= $site->url() ?>">
<meta name="twitter:image"          content="<?= $seo_image ?>" >
 
