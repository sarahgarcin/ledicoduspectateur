<?php
  snippet('header'); 
  snippet('logo'); 
  snippet('menu'); 
?>

<?php $cur_let = null; ?>
<main class="in">
  <div class="row">
    <div class="left-sidebar medium-2 columns hide-for-small-only">
      <div class="inoff-button">
        <div class="in active has-tip" data-tooltip aria-haspopup="true" title="Corpus de définitions retenu dans la cours d'honneur (À utiliser sans modération!)">In</div>
        <div class="off has-tip" data-tooltip aria-haspopup="true" title="Corpus de définitions non retenu actuellement (À utiliser avec modération!)">Off</div>
      </div>
      <div class="sources-button">
        <div class="sources active has-tip" data-tooltip aria-haspopup="true" title="Lieu, public, biblio, date de la collecte (Universitaire courrez-y!)">Avec sources</div>
        <div class="sans-sources has-tip" data-tooltip aria-haspopup="true" title="Ni lieu, ni public, ni biblio, ni date de la collecte (Universitaire s'abstenir!)">Sans sources</div>
      </div>
      <div class="abc">
        <div class="abc-button">abc</div>
        <ul>
          <li><a href="#A" title="A">a</a></li>
          <li><a href="#B" title="B">b</a></li>
          <li><a href="#C" title="C">c</a></li>
          <li><a href="#D" title="D">d</a></li>
          <li><a href="#E" title="E">e</a></li>
          <li><a href="#F" title="F">f</a></li>
          <li><a href="#G" title="G">g</a></li>
          <li><a href="#H" title="H">h</a></li>
          <li><a href="#I" title="I">i</a></li>
          <li><a href="#J" title="J">j</a></li>
          <li><a href="#K" title="K">k</a></li>
          <li><a href="#L" title="L">l</a></li>
          <li><a href="#M" title="M">m</a></li>
          <li><a href="#N" title="N">n</a></li>
          <li><a href="#O" title="O">o</a></li>
          <li><a href="#P" title="P">p</a></li>
          <li><a href="#Q" title="Q">q</a></li>
          <li><a href="#R" title="R">r</a></li>
          <li><a href="#S" title="S">s</a></li>
          <li><a href="#T" title="T">t</a></li>
          <li><a href="#U" title="U">u</a></li>
          <li><a href="#V" title="V">v</a></li>
          <li><a href="#W" title="W">w</a></li>
          <li><a href="#X" title="X">x</a></li>
          <li><a href="#Y" title="Y">y</a></li>
          <li><a href="#Z" title="Z">z</a></li>
        </ul>
      </div>
    </div>
    <div class="small-12 medium-8 medium-push-2 columns end">
      <ul class="row">
        <?php foreach ($page->children()->sortBy('title', 'asc') as $subpage):
          $first_let = mb_substr($subpage->title(),0,1, "utf-8");
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
          <li class="definition definition-item small-12 medium-4 large-4 columns end" data-target="<?php echo $subpage->url()?>" data-inoff="<?php echo $subpage->inoff()?>">
            <div class="inner-definition">
              <h2><?php echo $subpage->title()->html() ?></h2>
              <?php if($image = $subpage->image()): ?>
                <img src="<?php echo $image->url() ?>" alt="<?php echo $image->filename() ?>">
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

<?php function toASCII( $str )
{
    return strtr(utf8_decode($str), 
        utf8_decode(
        'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
        'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
}
?>
