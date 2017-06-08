<?php snippet('header') ?>
<?php snippet('menu') ?>


<?php $monurl = $page->url();

function debug($val) {
    '<pre>';
    var_dump($val);
    '</pre>';
}
?>

<div class="row" id="content-definitions">
    <ul class="medium-12 medium-push-1 columns">
        <?php foreach ($page->children() as $subpage) { ?>
        <li data-target="<?php $subpage->url()?>" class="small-12 medium-4 large-4 columns end">
            <div>
                <h2><?php echo html($subpage->title()) ?></h2>
                <?php if($image = $subpage->image()): ?>
                <img src="<?php echo $image->url() ?>" alt="">
                <?php else: ?>
                <p><?php echo html($subpage->text()->excerpt(100)) ?><p>
                <?php  endif ?>
            </div>
        </li>
        <?php } ?>
    </ul>
</div>


<?php snippet('footer') ?>
