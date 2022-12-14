<nav class="menu small-12 medium-12">
  <a href="#" id="menu-icon" class="show-for-small-only">Menu</a>
  <ul class="menu-first">
    <?php foreach($pages->listed() as $menuItem): ?>
    <li>
      <a <?= r($menuItem->isOpen(), 'active') ?> href="<?php echo $menuItem->url() ?>" title="<?php echo $menuItem->title() ?>">
        <?php echo $menuItem->title()->html() ?>
      </a>
      <?php if($menuItem->uid() != 'definitions' && $menuItem->hasVisibleChildren() &&  $menuItem->uid() != 'labos' && $menuItem->hasVisibleChildren()):?>
        <ul class="submenu" >
          <?php foreach($menuItem->children()->listed() as $subpage): ?>
          <li>
            <a href="<?php echo $subpage->url() ?>" title="<?php echo $subpage->title() ?>">
              <?php echo $subpage->title()->html() ?>
              <?php if($subpage->years()->isNotEmpty()):?>
                <span class="dates-sousmenu"><?php echo $subpage->years()->html() ?></span>
              <?php endif ?>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
      
    </li>
    <?php endforeach ?>
  </ul>
</nav>
