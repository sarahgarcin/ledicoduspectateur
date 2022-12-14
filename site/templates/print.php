<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>
<?php $cur_let = null; ?>

<button type="button" class="print-button" onClick="window.print()">Imprimer</button>


<main id='flow'>
  <div class="chapter">
    <div class="cover page" data-color="<?php echo $page->coulorCouv() ?>">
      <div class="cover-wrapper">
        <div class="logo-wrapper">
          <?php if($page->couv()->isNotEmpty()):?>
            <?php $logo = $page->couv()->toFile();?>
          <?php else: ?>
            <?php $logo = $site->logo()->toFile();?>
          <?php endif;?>
          <img src="<?php echo $logo->url() ?>" alt="<?php echo $logo->title()?>">
        </div>
        <h1><?php echo $page->title()?></h1>
        <div class="auteur">
          <?php echo $page->garde()->kirbytext()?>
        </div>
      </div>
    </div>
    <div class="page">
    </div>
    <?php if($page->sommaire()->isNotEmpty()):?>
      <div class="sommaire page">
        <h2>Sommaire</h2>
        <?php foreach($page->sommaire()->toStructure() as $el):?>
          <p><span class='num-page'><?php echo $el->numero() ?></span>
           <span class='nom-page'><?php echo $el->title() ?></span>
          </p>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <div class="edito page">
      <?php if($page->titreEdito()->isNotEmpty()):?>
        <h2><?=$page->titreEdito()->text()?></h2>
      <?php else:?>
        <h2>Édito</h2>
      <?php endif; ?>
      <?php echo $page->edito()->kt();?>
      <?php if($logoDebut = $page->logosDebut()->toFile()):?>
        <div class="logo-wrapper">
          <img src="<?php echo $logoDebut->url() ?>" alt="<?php echo $logoDebut->title()?>">
        </div>
      <?php endif;?>
    </div>

  <div class="texte">
    <?php echo $page->parent()->text()->kirbytext() ?>
  </div>

  <?php if( $page->parent()->children()->intendedTemplate() != "print"):?>
    <div class="texte subpages" >
      <?php foreach($page->parent()->children()->listed() as $textChild):?>
          <?php if($textChild->intendedTemplate() != "print"):?>
            <h2 class="print-title-subpage"><?php echo $textChild->title()->html() ?></h2>
            <?php echo $textChild->text()->kirbytext() ?>
            <hr>
          <?php endif?>
      <?php endforeach ?>
    </div>
  <?php endif?>

  <div class="mini-dico">
    <?php foreach($page->parent()->linkeddefinition()->split(',') as $linkeddefinition): ?>  
      <?php $def =  $pages->find('definitions')->children()->find($linkeddefinition);?>
      <?php $first_let = mb_substr($def->title(),0,1, "utf-8");
      if($first_let == "À") $first_let = "A";
      if($first_let == "É") $first_let = "E";
      if($first_let == "È") $first_let = "E";?>
      <div class="definition-container page">
        <div class="left-col">
          <?php if ($cur_let !== $first_let):
            $cur_let = $first_let;?>
            <div id="<?php echo $cur_let?>" class="letter definition">
              <div class="inner-definition">
                <?php echo $cur_let?>
              </div> 
            </div>
          <?php endif ?>
          <?php if($image = $def->image()): ?>
            <div class="definition-image">
              <img src="<?php echo $image->url() ?>" alt="<?php echo $image->filename() ?>">
            </div>
          <?php endif ?>
        </div>
        <!-- afficher les citations ou non sur les définitions -->
        <?php $displayDef = "oui"; ?>
        <?php if($page->displayQuotes() == "non"):
          $displayDef = "non";
        endif; ?>
        <!-- fin affichage de citations -->
        <div class="definition definition-item" data-quotes="<?php echo $displayDef?>">
          <div class="inner-definition">
            <h2><?php echo $def->title()->html()?></h2>
              <div class="definition-text">
                <?php echo $def->text()->kirbytext() ?>
                <div class="sources">
                  <?php echo $def->sources()->kirbytext() ?>
                </div>
              </div>
          </div>
        </div>
      </div>       
    <?php endforeach ?>
  </div>

  <div class="pause page">
    <div class="image-wrapper">
      <?php if($page->imagecredit()->isNotEmpty()):?>
        <?php $pause = $page->imagecredit()->toFile();?>
        <img src="<?php echo $pause->url() ?>" alt="<?php echo $pause->title()?>">
      <?php endif ?>
    </div>
  </div>

  <div class="credits page">
    <?php if($page->titreCredits()->isNotEmpty()):?>
        <h2><?=$page->titreCredits()->text()?></h2>
      <?php else:?>
        <h2>Contexte et Crédits</h2>
      <?php endif; ?>
    <?php echo $page->parent()->credits()->kirbytext() ?>
    <div class="colophon">
      <?php echo $page->colophon()->kirbytext() ?>
    </div>
  </div>

  <div class="logos page">
    <div class="image-wrapper">
      <?php if($page->logosFin()->isNotEmpty()):?>
        <?php $logos = $page->logosFin()->toFile();?>
        <img src="<?php echo $logos->url() ?>" alt="<?php echo $logos->title()?>">
      <?php endif ?>
    </div>
  </div>

  <?php if($page->ajouterDespages()->isNotEmpty()):?>
    <?php for($i=0; $i<$page->ajouterDespages()->int(); $i++):?>
      <div class="page">
        
      </div>
    <?php endfor ?>
  <?php endif; ?>

  <div class="backcover page">
    <div class="image-wrapper">
      <?php if($page->imageFin()->isNotEmpty()):?>
        <?php $pause = $page->imageFin()->toFile();?>
        <img src="<?php echo $pause->url() ?>" alt="<?php echo $pause->title()?>">
      <?php endif ?>
    </div>
  </div>
  </div>
</main>


<?php snippet('footer') ?>
