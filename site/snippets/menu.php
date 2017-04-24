<div class="row">
	<header>
	  <?php if($image = $site->image()): ?>
	  	<div class="image-wrapper small-3 small-push-9 medium-push-1">
	  		<a href= "home">
	    	<img src="<?php echo $image->url() ?>" alt="<?php echo html($image->title()) ?>">
	    	</a>
	  	</div>
	  <?php endif ?>
	</header>

	
	<nav class="medium-3 large-4 small-push-1 medium-push-9 ">
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

