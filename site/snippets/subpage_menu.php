<nav>
  <ul id="subpage">
    <?php foreach($page->children()->visible() as $subpage): ?>
    <?php if($subpage->cover()->isNotEmpty()):?>
      <li>
        <a href="<?php echo $subpage->url() ?>">
          <?php $image = $subpage->cover()->toFile();?>
          <div class="cover-wrapper">
            <?php echo $image->crop(300,200)?>
          </div>
          <div class="submenu-text-wrapper">
            <?php if($subpage->years()->isNotEmpty()):?>
              <span class="dates-sousmenu">
                <?php echo html($subpage->years()) ?>
              </span>
              <br>
            <?php endif; ?>
            <?php echo html($subpage->title()) ?>
          </div>
        </a>
      </li>
    <?php else:?>
      <li>
        <a href="<?php echo $subpage->url() ?>">
          <div class="submenu-text-wrapper">
            <?php if($subpage->years()->isNotEmpty()):?>
              <span class="dates-sousmenu">
                <?php echo html($subpage->years()) ?>
              </span>
              <br>
            <?php endif; ?>
            <?php echo html($subpage->title()) ?>
          </div>
          
        </a>
      </li> 
    <?php endif;?>
    <?php endforeach ?>
  </ul>
</nav>