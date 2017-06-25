<?php
  snippet('header'); 
  snippet('logo'); 
  snippet('menu'); 
?>

<main>
  <div class="row">
    <div class="left-sidebar medium-2 columns">

    </div>
    <div class="small-10 medium-8 medium-push-2 columns end">
      <?php snippet('breadcrumbs')?>
      <div class="textlabo text-wrapper">
        <h1><?php echo $page->title()->html() ?></h1>
        <?php echo $page->text()->kirbytext() ?>
      </div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>