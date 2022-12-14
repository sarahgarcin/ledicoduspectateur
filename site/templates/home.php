<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php $logo = $site->logo()->toFile();?>


	<main>
		<div class="logo-wrapper-home small-10 small-push-1 medium-8 medium-push-2 large-6 large-push-3">
			<img src="<?php echo $logo->url() ?>" alt="<?php echo $logo->title()?>">
		</div>
		<div class="citation-wrapper wrapper small-10 small-push-1 medium-6 large-4">
			<div class="citation-inner">
				<?php echo $page->text()->kt() ?>
			</div>
			<div class="close-button">
				<span>x</span>
			</div>
		</div>
		<?php if($page->actualite()->isNotEmpty()):?>
			<div class="citation-wrapper wrapper small-10 small-push-1 medium-6 large-4">
				<div class="citation-inner">
					<?php echo $page->actualite()->kt() ?>
				</div>
				<div class="close-button">
					<span>x</span>
				</div>
			</div> 
		<?php endif;?>
		<?php if($page->publication()->isNotEmpty()):?>
			<div class="citation-wrapper wrapper small-10 small-push-1 medium-6 large-4">
				<div class="citation-inner">
					<?php 
						$publication = $page->publication()->toPage();
						$pubImage = $publication->images()->last();
					?>
					<h2><?= $publication->title() ?></h2>
					<?= $publication->text()->short(60)->kt() ?>
					<?= $pubImage ?>
					<p><a href="<?= $publication->url() ?>" title="<?= $publication->title() ?>">Plus d'infos</a>
					</p>
				</div>
				<div class="close-button">
					<span>x</span>
				</div>
			</div> 
		<?php endif;?>

	</main>


<?php snippet('footer') ?>