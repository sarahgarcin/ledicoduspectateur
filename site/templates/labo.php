<?php
  snippet('header'); 
  snippet('logo'); 
  snippet('menu'); 
?>
<?php $cur_let = null; ?>
<main>

  <div class="row">
    <div class="left-sidebar labo-menu medium-2 columns">
      <ul>
        <li>
          <a href="#recit" title="Récit">Récit</a>
        </li>
        <li>
          <a href="#mini-dico" title="Mini-Dico">Mini-Dico</a>
        </li>
        <li>
          <a href="#credits" title="Crédits">Crédits</a>
        </li>
      </ul>
    </div>
    <div class="small-10 medium-8 medium-push-2 columns end">
      <?php snippet('breadcrumbs')?>
      <div class="textlabo text-wrapper" id="recit">
        <div class="etat">
          <?php if($page->etat() == "termine"):?>
            <span>▲ Terminé</span>
          <?php else: ?>
            <span>▶ En cours</span>
          <?php endif; ?>
          
        </div>
        <h1><?php echo $page->title()->html() ?></h1>
        <?php echo $page->text()->kirbytext() ?>
      </div>
      <?php if($page->linkeddefinition()->isNotEmpty()):?>
        <div class="def-labo" id="mini-dico">
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
              <li class="definition definition-item small-12 medium-4 large-4 columns end" data-target="<?php echo $def->url()?>" data-inoff="<?php echo $def->inoff()?>">
                <div class="inner-definition">
                  <h2><?php echo $def->title()->html()?></h2>
                  <?php if($image = $def->image()): ?>
                    <img src="<?php echo $image->url() ?>" alt="<?php echo $image->filename() ?>">
                  <?php else: ?>
                    <p><?php echo $def->text()->excerpt(110) ?></p>
                  <?php  endif ?>
                </div>
              </li>       
            <?php endforeach ?>
          </ul>
          <div class="loadPage wrapper small-10 medium-10 large-8"></div> 
        </div>
      <?php endif; ?>
      <?php if($page->credits()->isNotEmpty()):?>
        <div class="credit-labo text-wrapper" id="credits">
          <h1>Crédits</h1>
          <?php echo $page->credits()->kirbytext() ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>