<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>
<main>
  <div class="small-10 small-push-1 medium-6 medium-push-3">
      <?php snippet('breadcrumbs')?>
      <div id="texte">

          <h1><?php echo $page->title()->html() ?></h1>

          <?php echo $page->text()->kirbytext() ?>
          <hr>
          <nav>
              <ul id="subpage">
                  <?php foreach($page->children() as $subpage): ?>
                  <li>
                      <a href="<?php echo $subpage->url() ?>">
                          <?php echo html($subpage->title()) ?>
                      </a>
                  </li> 
                  <?php endforeach ?>
              </ul>
          </nav>

          <div class="ressources">
              <?php $filenames = $page->ressourcesmedia()->split(',');
                         if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
                         $files = call_user_func_array(array($page->files(), 'find'), $filenames);

                         // Use the file collection
                         foreach($files as $file){ ?>
              <div>
                  <?php echo thumb($file, array('width' => 500));?>
              </div>

              <?php } ?>	   
          </div>

      </div>
  </div>
</main>


<?php snippet('footer') ?>
