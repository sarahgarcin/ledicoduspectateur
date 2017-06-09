<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php snippet('grid') ?>



<div class="row">

    <div class="small-10 medium-8 small-push-1 medium-push-1">
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
</div>


<?php snippet('footer') ?>
