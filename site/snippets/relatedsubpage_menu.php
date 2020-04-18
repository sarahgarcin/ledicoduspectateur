<nav>
  <ul id="subpage">
    <?php foreach($articles as $article): ?>
      <?php if ($subpage = $article->relatedpage()->toPage()): ?>
        <?php $subpage->url() ?>
        <li>
          <a href="<?php echo $subpage->url() ?>">
            <?php if($subpage->cover()->isNotEmpty()) $image = $subpage->cover()->toFile();?>
            <?php if($article->cover()->isNotEmpty()) $image = $article->cover()->toFile();?>
            <?php if($image):?>
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
      <?php endif; ?>
    <?php endforeach ?>
  </ul>
</nav>
