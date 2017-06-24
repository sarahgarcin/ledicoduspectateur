<?php if(!kirby()->request()->ajax()):
  snippet('header'); 
  snippet('logo'); 
  snippet('menu'); 
endif ?>

<main>
  <div class="small-10 small-push-1 medium-6 medium-push-3">
    <ul class="row">
      <?php foreach ($page->children() as $subpage) { ?>
      <li class="definition small-12 medium-4 large-4 columns end" data-target="<?php echo $subpage->url()?>">
        <h2><?php echo html($subpage->title()) ?></h2>
        <?php if($image = $subpage->image()): ?>
          <img src="<?php echo $image->url() ?>" alt="">
        <?php else: ?>
          <p><?php echo html($subpage->text()->excerpt(115)) ?></p>
        <?php  endif ?>
      </li>
      <div class="loadPage"></div>
      <?php } ?>
    </ul>
  </div>
</main>


<?php snippet('footer') ?>
