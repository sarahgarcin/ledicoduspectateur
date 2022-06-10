<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>
<main>
  <div class="small-12 medium-8 medium-push-2 large-6 large-push-3">
    <?php snippet('breadcrumbs')?>
    <div class="text-wrapper">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
      <?php if($page->hasChildren()):?>
        <hr>
        <?php snippet('subpage_menu') ?>
      <?php endif ?>
    </div>
    <!-- afficher les citations ou non sur les définitions -->
    <?php $displayDef = "oui"; ?>
    <?php if($page->displayQuotes() == "non"):
      $displayDef = "non";
    endif; ?>
    <!-- fin affichage de citations -->
    <div class="loadPage wrapper small-10 medium-10 large-8" data-quotes="<?php echo $displayDef?>"></div>
  </div>

</main>


<?php snippet('footer') ?>
