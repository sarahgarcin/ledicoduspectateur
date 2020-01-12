<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php $logo = $site->logo()->toFile();?>


	<main>
		<div class="logo-wrapper-home small-10 small-push-1 medium-8 medium-push-2 large-6 large-push-3">
			<img src="<?php echo $logo->url() ?>" alt="<?php echo $logo->title()?>">
		</div>
		<div class="citation-wrapper wrapper small-10 small-push-1 medium-6 large-4">
			<div class="citation-inner">
				<?php echo $page->text()->kirbytext() ?>
			</div>
			<div class="close-button">
				<span>x</span>
			</div>
		</div> 
	</main>


<?php snippet('footer') ?>