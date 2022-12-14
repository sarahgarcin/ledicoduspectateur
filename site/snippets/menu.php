<nav class="menu menu-principal small-12 medium-12">
  <a href="#" id="menu-icon" class="show-for-small-only">Menu</a>
  <ul class="menu-first">
    <?php foreach($pages->listed()->limit(3) as $menuItem): ?>
    <li>
      <a <?= r($menuItem->isOpen(), 'active') ?> href="<?php echo $menuItem->url() ?>" title="<?php echo $menuItem->title() ?>">
        <?php echo $menuItem->title()->html() ?>
      </a>      
    </li>
    <?php endforeach ?>
  </ul>
</nav>
<style>
  nav.menu-secondaire{
    height: 100vh; 
    position: fixed; 
    z-index: 9000;
    background: #00FF9A;
    padding: 3em 3em 2em 1.5em;
    font-weight: bold;
    left:-325px;
    transition: all 0.5s ease;
  }

  nav.menu-secondaire.active{
    left:0px;
  }

  .menu-secondaire li{
    margin-bottom: 0.5em;
  }
  .menu-secondaire a{
    font-size: 1.65rem;
    line-height: 1.2;
  }
  .menu-secondaire-btn{
    position: absolute;
    top: 0em; 
    right: -50px;
    font-size: 1.5em;
    cursor: pointer;
    background: #00FF9A;
    padding: 10px 5px; 
    width: 55px;
    text-align:center;
    display: block;
  }
</style>
<nav class="menu-secondaire">
  <ul>
    <?php $nbOfItems = $pages->listed()->count();?>
    <?php foreach($pages->listed()->slice(3, $nbOfItems) as $menuItem): ?>
    <li>
      <a <?= r($menuItem->isOpen(), 'active') ?> href="<?php echo $menuItem->url() ?>" title="<?php echo $menuItem->title() ?>">
        <?php echo $menuItem->title()->html() ?>
      </a>      
    </li>
    <?php endforeach ?>
  </ul>
  <span class="menu-secondaire-btn">+</span>
</nav>

