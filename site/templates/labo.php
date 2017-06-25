<?php
  snippet('header'); 
  snippet('logo'); 
  snippet('menu'); 
?>
<?php $cur_let = null; ?>
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
      <?php if($page->linkeddefinition()->isNotEmpty()):?>
        <div class="def-labo">
          <h1>Le mini-dico du spectateur: <?php echo $page->title()->html() ?></h1>
          <ul class="row"> 
            <?php foreach($page->linkeddefinition()->split(',') as $linkeddefinition): ?>  
              <?php $def =  $pages->find('definitions')->children()->find($linkeddefinition);?>
              <?php $first_let = mb_substr($def->title(),0,1, "utf-8");
              if($first_let == "À") $first_let = "A";
              if($first_let == "É") $first_let = "E";
              if($first_let == "È") $first_let = "E";
              if ($cur_let !== $first_let):
                $cur_let = $first_let;?>
                <li id="<?php echo $cur_let?>" class="letter definition small-12 medium-4 large-4 columns end">
                  <div class="inner-definition">
                    <?php echo $cur_let?>
                  </div> 
                  
                </li>
              <?php endif ?>
              <li class="definition small-12 medium-4 large-4 columns end" data-target="<?php echo $def->url()?>" data-inoff="<?php echo $def->inoff()?>">
                <div class="inner-definition">
                  <h2><?php echo $def->title()->html()?></h2>
                  <?php if($image = $def->image()): ?>
                    <img src="<?php echo $image->url() ?>" alt="<?php echo $image->filename() ?>">
                  <?php else: ?>
                    <p><?php echo $def->text()->excerpt(110) ?></p>
                  <?php  endif ?>
                </div>
              </li>  
              <div class="loadPage wrapper small-6"></div>      
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif; ?>
      <?php if($page->credits()->isNotEmpty()):?>
        <div class="credit-labo text-wrapper">
          <h1>Crédits</h1>
          <?php echo $page->credits()->kirbytext() ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>