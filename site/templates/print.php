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
          <?php $logo = $site->logo()->toFile();?>
          <img src="<?php echo $logo->url() ?>" alt="<?php echo $logo->title()?>">
        </div>
        <h1><?php echo $page->title()->html()?></h1>
        <div class="auteur">
          <?php echo $page->garde()->kirbytext()?>
        </div>
      </div>
    </div>

    <div class="edito page">
      <h2>Édito</h2>
      <?php echo $page->edito()->kirbytext();?>
      <div class="logo-wrapper">
          <?php $logoDebut = $page->logosDebut()->toFile();?>
          <img src="<?php echo $logoDebut->url() ?>" alt="<?php echo $logoDebut->title()?>">
      </div>
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
        <div class="definition definition-item">
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
      <?php $pause = $page->imagecredit()->toFile();?>
      <img src="<?php echo $pause->url() ?>" alt="<?php echo $pause->title()?>">
    </div>
  </div>

  <div class="credits page">
    <h2>Contexte et Crédits</h2>
    <?php echo $page->parent()->credits()->kirbytext() ?>
    <div class="colophon">
      <?php echo $page->colophon()->kirbytext() ?>
    </div>
  </div>

  <div class="logos page">
    <div class="image-wrapper">
      <?php $logos = $page->logosFin()->toFile();?>
      <img src="<?php echo $logos->url() ?>" alt="<?php echo $logos->title()?>">
    </div>
  </div>

  <div class="backcover page">
    <div class="image-wrapper">
      <?php $pause = $page->imageFin()->toFile();?>
      <img src="<?php echo $pause->url() ?>" alt="<?php echo $pause->title()?>">
    </div>
  </div>
  </div>
</main>
<!-- 
<script src="/assets/js/css-regions-polyfill.min.js"  type="text/javascript"></script>
<script>
    window.paginationConfig = {
        'sectionStartMarker': 'div.section',
        'sectionTitleMarker': 'h1.sectiontitle',
        'chapterStartMarker': 'div.chapter',
        'chapterTitleMarker': 'h1.chaptertitle',
        'flowElement': "document.getElementById('flow')",
        'bulkPagesToAdd': 50,
        'alwaysEven': false,
        'enableFrontmatter': false,
        'pageHeight': 21,
        'pageWidth': 15,
        'innerMargin': 1.5,
        'lengthUnit: ': 'cm',
        'oddAndEvenMargins': false,
        'numberPages':false,
        'autoStart':true,

    };
</script>
<script src="/assets/js/book-polyfill.js" type="text/javascript"></script> -->


<?php snippet('footer') ?>
