<div class="row" id="content-menu">
    <header class ="medium-12 columns">
        <?php if($image = $site->image()): ?>
        <div class="row" style="position: fixed;">
            <a class="small-12 medium-2 large-2 columns" href= "home">
                <img src="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>">
            </a>
        </div>
        <?php endif ?>
    </header>


    <nav class="small-push-1 medium-3 medium-push-9 large-4">
        <div href="#menu" class="buttonmenu">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul id="menu">
            <?php foreach($pages->visible() as $menu): ?>
            <li>
                <a <?php e($menu->isOpen(), ' class="active"') ?> href="<?php echo $menu->url() ?>" title="<?php echo $menu->title() ?>">
                    <?php echo $menu->title() ?>
                </a>
                <?php if($menu->uid() != 'definitions'):?>
                <ul id="submenu" >
                    <?php foreach($menu->children() as $subpage): ?>
                    <li>
                        <a href="<?php echo $subpage->url() ?>">
                            <?php echo html($subpage->title()) ?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
                <?php endif ?>
            </li>
            <?php endforeach ?>
        </ul>
    </nav>

</div>		

