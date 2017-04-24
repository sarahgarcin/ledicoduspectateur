<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php snippet('grid') ?>



<div class="row" >	

	<div class="small-push-0  medium-push-1 small-12 medium-8 large-9" id="pagedefinitions">

		<?php foreach($page->children() as $subpage): ?>	

				<ul >
				  <li class="small-11 medium-5 large-3 small-push-1 columns end" id="tabledef" >
				    <a  href="<?php echo $subpage->url() ?>"> 
				      <h2><?php echo html($subpage->title()) ?></h2>
				      		<?php if($image = $subpage->image()): ?>
									<img src="<?php echo $image->url() ?>" alt="">
									<?php else: ?>
					      <p><?php echo html($subpage->text()->excerpt(115)) ?><p>
					    <?php endif ?>
						 </a>
				  </li>
				</ul>	

		<?php endforeach ?> 
		
	</div>

</div>


<?php snippet('footer') ?>