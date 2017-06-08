<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php snippet('grid') ?>

<div class="row" >
    <div class="small-10 medium-7 small-push-1 medium-push-2 ">
        <?php snippet('breadcrumbs')?>
        <div id="textlabo">
            <h1><?php echo $page->title()->html() ?></h1>
            <?php echo $page->text()->kirbytext() ?>

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



<div class="row">

    <div class="small-push-0  medium-push-1 small-12 medium-8 large-9"  id="labodefinition">
        <?php foreach($page->linkeddefinition()->htmlt()->split(',') as $linkeddefinition): ?>	
        <ul>				 
            <li class="small-11 medium-5 large-3 small-push-1 columns end">	

                <h2><?php echo $pages->find('definitions')->children()->find($linkeddefinition)->title()->html()?></h2>

                <p><?php echo $pages->find('definitions')->children()->find($linkeddefinition)->text()->excerpt(100)?></p>
            </li> 


        </ul>
        <?php endforeach ?>
    </div> 	
</div>

<div class="row">
    <div class="small-10 medium-7 small-push-1 medium-push-2" id="credits">
        <?php echo $page->credits()->kirbytext() ?>
    </div>
</div>


<?php snippet('footer') ?>