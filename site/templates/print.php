<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>
<main>
  <div class="page cover">
    <h1><?php echo $page->title()->html()?></h1>
    <div class="logo-wrapper">
      <?php $logo = $site->logo()->toFile();?>
      <img src="<?php echo $logo->url() ?>" alt="<?php echo $logo->title()?>">
    </div>
  </div>

  <div class="page edito">
    <h2>Édito</h2>
    <?php echo $page->edito()->kirbytext();?>
  </div>

  <div class="page garde">
    <div class="logo-wrapper">
      <?php $logo = $site->logo()->toFile();?>
      <img src="<?php echo $logo->url() ?>" alt="<?php echo $logo->title()?>">
    </div>
    <?php echo $page->garde()->kirbytext()?>
  </div>

  <div class="texte">
    <?php echo $page->parent()->text()->kirbytext() ?>
  </div>

  <div class="mini-dico">
  </div>
</main>


<?php snippet('footer') ?>
