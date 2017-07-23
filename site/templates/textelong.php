<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>

<main>
  <div class="small-12 medium-8 medium-push-2 large-6 large-push-3">
    <?php snippet('breadcrumbs')?>
    <div class="text-wrapper">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->resume()->kirbytext() ?>

      <div class="more-text">
        <?php echo $page->text()->kirbytext() ?>
      </div>

      <div class="read-more">
        <span>⌄</span>
      </div>


    </div>
    <div class="loadPage wrapper small-10 medium-10 large-8"></div>
  </div>
</main>


<?php snippet('footer') ?>
