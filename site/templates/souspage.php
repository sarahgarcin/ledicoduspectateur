<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>



<main data-publi="<?php echo $page->publi()?>" data-recharge="<?php if($page->recharge()->isNotEmpty()){echo $page->recharge();}?>">
  <div class="small-12 medium-8 medium-push-2 large-6 large-push-3">
    <?php snippet('breadcrumbs')?>
    <div class="text-wrapper">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
      <div class="publi-content"></div>
      <?php if($page->hasChildren()):?>
        <hr>
        <?php snippet('subpage_menu') ?>
      <?php endif ?>
    </div>
    <div class="loadPage wrapper small-10 medium-10 large-8"></div>
  </div>

</main>

<?php snippet('footer') ?>
