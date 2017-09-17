<?php
if(!kirby()->request()->ajax()) {
    snippet('header');
    snippet('menu');
}

?>

<div class="definition-wrapper">
  <h1>Spectateur-<?php echo $page->title()->html() ?></h1>
  <?php if($page->ressourcesmedia()->isNotEmpty()): ?>
     <img src="<?php echo $page->ressourcesmedia()->toFile()->url() ?>" alt="<?php echo $page->ressourcesmedia()->toFile()->filename() ?>">
  <?php endif ?>
  <?php echo $page->text()->kirbytext() ?>
  <?php if($page->sources()->isNotEmpty()):?>
    <div class="sources">
       <?php echo $page->sources()->kirbytext() ?>
    </div>
  <?php endif; ?>
  <div class="close-button hide-for-small-only">
    <span>x</span>
  </div>
</div>


<?php
if(!kirby()->request()->ajax()) {
    snippet('footer') ;
}
?>