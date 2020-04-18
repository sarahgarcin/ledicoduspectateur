<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>
<main>

  <div class="small-12 medium-8 medium-push-2 large-6 large-push-3">

    <div class="text-wrapper">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
      <?php if($articles):?>
        <hr>
        <?php snippet('relatedsubpage_menu') ?>
      <?php endif ?>
    </div>

  </div>

</main>
<?php snippet('footer') ?>
