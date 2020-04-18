<nav>
  <ul id="subpage">
    <?php foreach($page->children()->visible() as $subpage): ?>
      <li>
        <a href="<?php echo $subpage->url() ?>">
          <?php if($subpage->cover()->isNotEmpty()):?>
          <?php $image = $subpage->cover()->toFile();?>
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
    <?php endforeach ?>
  </ul>
</nav>
