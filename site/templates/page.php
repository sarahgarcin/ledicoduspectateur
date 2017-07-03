<?php
if(!kirby()->request()->ajax()) {
    snippet('header');
    snippet('menu');
}

?>

<div class="definition-wrapper">
  <h1><?php echo $page->title()->html() ?></h1>
  <?php if ($image = $page->image()): ?>
    <img src="<?php echo $image->url() ?>" alt="<?php echo $image->filename() ?>">
  <?php endif ?>
  <?php echo $page->text()->kirbytext() ?>
  <?php if($page->sources()->isNotEmpty()):?>
    <div class="sources">
       <?php echo $page->sources()->kirbytext() ?>
    </div>
  <?php endif; ?>
  <div class="close-button">
    <span>x</span>
  </div>
</div>


<?php
if(!kirby()->request()->ajax()) {
    snippet('footer') ;
}
?>