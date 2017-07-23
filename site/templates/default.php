<?php snippet('header') ?>
<?php snippet('logo') ?>
<?php snippet('menu') ?>
<main>
  <div class="small-12 medium-8 medium-push-2 large-6 large-push-3">
    <?php snippet('breadcrumbs')?>
    <div class="text-wrapper">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
      <?php if($page->hasChildren()):?>
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
      <?php endif ?>
    </div>
    <div class="loadPage wrapper small-10 medium-10 large-8"></div>
  </div>

</main>


<?php snippet('footer') ?>
