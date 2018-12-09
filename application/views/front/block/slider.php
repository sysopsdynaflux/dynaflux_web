<div id="bx-pager">
	<?php foreach($slider as $key => $slideItem): ?>
	<a data-slide-index="<?php echo $key ?>" href="#">
		<?php $shadow_type=($key+1==1)?'separator-right':(($key+1==count($slider))?'separator-left':'separator-edges'); ?>
		<div class="<?php echo $shadow_type ?>"><?php echo $slideItem->GetPagerTitle() ?></div>
	</a>
	<?php endforeach ?>
</div>
<ul class="bxslider">
	<?php foreach($slider as $slideItem): ?>
	<li>
		<a href="<?php echo Tools::Href($slideItem->GetPath()) ?>" 
			title="<?php echo $slideItem->GetSlideTitle() ?>" target="__blank">
			<div class="slide-content">
				<div><?php echo $slideItem->GetSlideTitle() ?></div>
				<p><?php echo $slideItem->GetSummary() ?></p>
			</div>
			<div class="slide-image">
				<img src="<?php echo Images::PublicUrl($slideItem->GetPhoto()->GetPath()) ?>" />
			</div>
		</a>
	</li>
	<?php endforeach ?>
</ul>