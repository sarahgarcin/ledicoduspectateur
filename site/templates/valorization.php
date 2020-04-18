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
        <nav>
          <ul id="subpage">
            <?php foreach($articles as $article): ?>
              <?php if ($subpage = $article->relatedpage()->toPage()): ?>
                <li>
                  <!-- <a href="<?php echo $subpage->uri() ?>"> -->
                  <a href="<?= url($page->uid() . '/' . $subpage->uri() )?>">
                    <?php if($subpage->cover()->isNotEmpty()) $image = $subpage->cover()->toFile();?>
                    <?php if($article->cover()->isNotEmpty()) $image = $article->cover()->toFile();?>
                    <?php if($image):?>
                      <div class="cover-wrapper">
                        <?php echo $image->crop(300,200)?>
                      </div>
                    <?php endif; ?>
                    <div class="submenu-text-wrapper">
                      <?php if($subpage->years()->isNotEmpty()):?>
                        <h3 class="dates-sousmenu">
                          <?php echo $subpage->years()->html() ?>
                        </h3>
                      <?php endif; ?>
                      <h2><?php echo $subpage->title()->html() ?></h2>
                    </div>
                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach ?>
          </ul>
        </nav>
      <?php endif ?>
    </div>

    <?php if($linkeddefinitions):?>
      <div class="def-labo" id="mini-dico">
        <h1>Le mini-dico du spectateur: <?php echo $page->title()->html() ?></h1>
        <ul class="row">
          <?php foreach($linkeddefinitions as $linkeddefinition): ?>
            <?php $def =  $pages->find('definitions')->children()->find($linkeddefinition);?>
            <?php $first_let = mb_substr($def->title(),0,1, "utf-8");
            if($first_let == "À") $first_let = "A";
            if($first_let == "É") $first_let = "E";
            if($first_let == "È") $first_let = "E";
            if ($cur_let !== $first_let):
              $cur_let = $first_let;?>
              <li id="<?php echo $cur_let?>" class="letter definition small-12 medium-4 large-4 xlarge-3 columns end">
                <div class="inner-definition">
                  <?php echo $cur_let?>
                </div>

              </li>
            <?php endif ?>
            <!-- afficher les citations ou non sur les définitions -->
            <?php $displayDef = "oui"; ?>
            <?php if($page->displayQuotes() == "non"):
              $displayDef = "non";
            endif; ?>
            <!-- fin affichage de citations -->
            <li class="definition definition-item small-12 medium-4 large-4 xlarge-3 columns end" data-target="<?php echo $def->url()?>" data-inoff="<?php echo $def->inoff()?>">
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
        <div class="loadPage wrapper small-10 medium-10 large-8" data-quotes="<?php echo $displayDef?>"></div>
      </div>
    <?php endif; ?>

  </div>

</main>
<?php snippet('footer') ?>
