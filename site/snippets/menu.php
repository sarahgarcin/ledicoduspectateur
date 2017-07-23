<nav class="menu small-12 medium-12">
  <a href="#" id="menu-icon" class="show-for-small-only">Menu</a>
  <ul class="menu-first">
    <?php foreach($pages->visible() as $menu): ?>
    <li>
      <a <?php e($menu->isOpen(), ' class="active"') ?> href="<?php echo $menu->url() ?>" title="<?php echo $menu->title() ?>">
        <?php echo $menu->title()->html() ?>
      </a>
      <?php if($menu->uid() != 'definitions' && $menu->hasChildren()):?>
        <ul class="submenu" >
          <?php foreach($menu->children() as $subpage): ?>
          <li>
            <a href="<?php echo $subpage->url() ?>" title="<?php echo $subpage->title() ?>">
              <?php echo $subpage->title()->html() ?>
            </a>
          </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
</nav>	

