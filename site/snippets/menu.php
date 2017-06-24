<nav class="menu medium-12">
  <div href="#menu" class="buttonmenu">
      <div></div>
      <div></div>
      <div></div>
  </div>
  <ul>
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

