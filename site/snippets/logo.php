<header class="small-2 medium-1">
	<?php $logo = $site->logo()->toFile();?>
  <?php if($logo): ?>
	  <div class="logo-wrapper">
	    <a href="<?php echo $site->url() ?>" title="<?php echo $site->title()?>">
	      <img src="<?php echo $logo->url() ?>" alt="<?php echo $logo->title()?>">
	    </a>
	  </div>
  <?php endif ?>
</header>
