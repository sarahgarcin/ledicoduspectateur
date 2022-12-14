<?php
snippet('header');
snippet('logo');
snippet('menu');
?>

<?php $cur_let = null; ?>
<main>
  <div class="row">
    <div class="print-menu">
      <p class="print-btn">Imprimer en livret A5</p>
    </div>
    <div class="book">
      <?php foreach ($page->parent()->children()->listed()->sortBy('title', 'asc') as $subpage):?>
        <li class="print-definition" data-def="<?= $subpage->uid() ?>">
          <?php $first_let = $subpage->title()->slug()->upper()->toString()[0];
          if ($cur_let !== $first_let):
            $cur_let = $first_let;?>
            <div id="<?php echo $cur_let?>" class="letter definition">
              <div class="inner-letter">
                <?php echo $cur_let?>
              </div>
            </div>
          <?php endif ?>
            <div class="inner-definition">
              <h2><?= $subpage->title() ?></h2>
              <?= $subpage->text()->kt()?>
              <?php if($subpage->ressourcesmedia()->isNotEmpty()): ?>
                <figure>
                  <img src="<?php echo $subpage->ressourcesmedia()->toFile()->url() ?>" alt="<?php echo $subpage->ressourcesmedia()->toFile()->filename() ?>">
                </figure>
              <?php endif ?>
            </div>
          </li>

      <?php endforeach ?>
    </div>
    <div class="select-print-definition small-12 medium-8 medium-push-2 columns end">
      <ul class="row">
        <?php foreach ($page->parent()->children()->listed()->sortBy('title', 'asc') as $subpage):
          $first_let = $subpage->title()->slug()->upper()->toString()[0];
          if ($cur_let !== $first_let):
            $cur_let = $first_let;?>
            <li id="<?php echo $cur_let?>" class="letter definition">
              <div class="inner-definition">
                <?php echo $cur_let?>
              </div>
            </li>
          <?php endif ?>
          <li class="print-definition small-12 medium-6 columns end">
            <div class="inner-definition">
              <!-- ressourcesmedia -->
              <input class="def-check" type="checkbox" id="<?= $subpage->uid()?>" name="<?= $subpage->uid()?>">
              <label for="<?= $subpage->uid()?>"><?= $subpage->title() ?></label>
            </div>
          </li>

        <?php endforeach ?>
      </ul>
      <div class="loadPage wrapper small-10 medium-10 large-8"></div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
