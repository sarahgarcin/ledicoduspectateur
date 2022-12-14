<?php
snippet('header');
snippet('logo');
snippet('menu');
?>

<?php $cur_let = null; ?>
<main class="in">
  <div class="row">
    <div class="left-sidebar medium-2 columns hide-for-small-only">
      <div class="abc">
        <div class="abc-button">abc</div>
        <ul>
          <?php foreach (range('A', 'Z') as $letter): ?>
          <li><a href="#<?= $letter ?>" title="<?= $letter ?>"><?= str::lower($letter) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="inoff-button">
        <div class="in active has-tip" data-tooltip aria-haspopup="true" title="Corpus de définitions retenu dans la cours d'honneur (À utiliser sans modération!)">In</div>
        <div class="off has-tip" data-tooltip aria-haspopup="true" title="Corpus de définitions non retenu actuellement (À utiliser avec modération!)">Off</div>
      </div>
      <div class="sources-button">
        <div class="sources active has-tip tip-right" data-tooltip aria-haspopup="true" title="Lieu, public, biblio, date de la collecte (Universitaire courrez-y!)">Avec les sources</div>
        <div class="sans-sources has-tip tip-right" data-tooltip aria-haspopup="true" title="Ni lieu, ni public, ni biblio, ni date de la collecte (Universitaire s'abstenir!)">Sans les sources</div>
      </div>
    </div>
    <div class="small-12 medium-8 medium-push-2 columns end">
      <ul class="row">
        <?php foreach ($page->children()->listed()->sortBy('title', 'asc') as $subpage):
          $first_let = $subpage->title()->slug()->upper()->toString()[0];
          if ($cur_let !== $first_let):
            $cur_let = $first_let;?>
            <li id="<?php echo $cur_let?>" class="letter definition small-12 medium-4 large-4 columns end">
              <div class="inner-definition">
                <?php echo $cur_let?>
              </div>
            </li>
          <?php endif ?>
          <li class="definition definition-item small-12 medium-4 large-4 columns end" data-target="<?php echo $subpage->url()?>" data-inoff="<?php echo $subpage->inoff()?>">
            <div class="inner-definition">
              <!-- ressourcesmedia -->
              <h2><?php echo $subpage->title()->html() ?></h2>
              <?php if($subpage->ressourcesmedia()->isNotEmpty()): ?>
                <img src="<?php echo $subpage->ressourcesmedia()->toFile()->url() ?>" alt="<?php echo $subpage->ressourcesmedia()->toFile()->filename() ?>">
              <?php else: ?>
                <p><?php echo $subpage->text()->excerpt(110) ?></p>
              <?php  endif ?>
            </div>
          </li>

        <?php endforeach ?>
      </ul>
      <div class="loadPage wrapper small-10 medium-10 large-8"></div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
