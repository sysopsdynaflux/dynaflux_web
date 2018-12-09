<ul class="brochures-block">
	<?php foreach($downloads as $key=>$download): ?>
	<?php if($key+1>count($downloads)-2): ?>
    <li> <!--class="last-item"-->
    <?php else: ?>
    <li>
    <?php endif ?>
		<a href="<?php echo Tools::FileUrl($download->GetFile()->GetPath()) ?>"
			title="<?php echo $download->GetTitle() ?>" target="_blank">
			<div class="brochure-image">
				<?php if($download->GetPortrait() != null): ?>
				<img src="<?php echo Images::PublicUrl($download->GetPortrait()->GetPath()) ?>" 
					alt="<?php echo $download->GetTitle() ?>"
					height="93" width="68">
				<?php else: ?>
				<img alt="<?php echo $download->GetTitle() ?>" height="93" width="68">
				<?php endif ?>
			</div>
			<div class="brochure-title"><?php echo $download->GetTitle() ?></div>
		</a>
	</li>
	<?php endforeach ?>
</ul>