<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>
<?php $cur_let = null; ?>
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
    <?php foreach($page->parent()->linkeddefinition()->split(',') as $linkeddefinition): ?>  
      <?php $def =  $pages->find('definitions')->children()->find($linkeddefinition);?>
      <?php $first_let = mb_substr($def->title(),0,1, "utf-8");
      if($first_let == "À") $first_let = "A";
      if($first_let == "É") $first_let = "E";
      if($first_let == "È") $first_let = "E";
      if ($cur_let !== $first_let):
        $cur_let = $first_let;?>
        <div id="<?php echo $cur_let?>" class="letter definition">
          <div class="inner-definition">
            <?php echo $cur_let?>
          </div> 
        </div>
      <?php endif ?>
      <div class="definition definition-item small-12">
        <div class="inner-definition">
          <h2><?php echo $def->title()->html()?></h2>
            <?php if($image = $def->image()): ?>
              <img src="<?php echo $image->url() ?>" alt="<?php echo $image->filename() ?>">
            <?php endif ?>
            <?php echo $def->text()->kirbytext() ?>
        </div>
      </div>       
    <?php endforeach ?>
  </div>

  <div class="page pause">
    <div class="image-wrapper">
      <?php $pause = $page->logosFin()->toFile();?>
      <img src="<?php echo $pause->url() ?>" alt="<?php echo $pause->title()?>">
    </div>
  </div>

  <div class="credits">
    <h2>Contexte et Crédits</h2>
    <?php echo $page->parent()->credits()->kirbytext() ?>
    <div class="colophon">
      <?php echo $page->colophon()->kirbytext() ?>
    </div>
  </div>

  <div class="page backcover">
    <div class="image-wrapper">
      <?php $pause = $page->imageFin()->toFile();?>
      <img src="<?php echo $pause->url() ?>" alt="<?php echo $pause->title()?>">
    </div>
  </div>
</main>


<?php snippet('footer') ?>
