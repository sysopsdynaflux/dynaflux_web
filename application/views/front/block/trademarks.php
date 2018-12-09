<ul class="trademark-list">
	<?php foreach($trademarks as $trademark): ?>
	<li class="trademark-item">
		<img src="<?php echo Images::PublicUrl($trademark->GetLogo()->GetPath()) ?>" 
			title="<?php echo $trademark->GetName() ?>">
	</li>
	<?php endforeach ?>
</ul>