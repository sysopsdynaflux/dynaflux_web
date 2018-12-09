<ul class="products">
	<?php foreach($products as $i => $product): ?>
	<?php if(($i+1)%4==2||($i+1)%4==3) $style="padding-left:10px; padding-right:10px"; 
		elseif(($i+1)%4==1) $style="padding-left:0; padding-right:10px"; 
		elseif(($i+1)%4==0) $style="padding-right:0; padding-left:10px"; ?>
	<?php if($i+1>count($products)-4): ?>
    <li class="last-item" style="<?php echo $style ?>">
    <?php else: ?>
    <li style="<?php echo $style ?>">
    <?php endif ?>	
		<a target="__blank" href="<?php echo Tools::Href($product->GetPath()->GetUrl()) ?>" 
			style="color:#5b0507" title="<?php echo $product->GetTitle() ?>">
			<div class="product-image">					
				<?php if($product->GetImage() != null): ?>
				<img src="<?php echo Images::PublicUrl($product->GetImage()->GetPath()) ?>" 
					alt="<?php echo $product->GetTitle() ?>">
				<?php else: ?>
				<img alt="<?php echo $product->GetTitle() ?>">
				<?php endif ?>
			</div>
			<div class="product-title"><?php echo $product->GetTitle() ?></div>
		</a>
	</li>
	<?php endforeach ?>	
</ul>