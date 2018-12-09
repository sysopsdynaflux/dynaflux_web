<?php $cols=4 ?>
<section class="equipment-overview">
	<?php foreach($equipment as $index => $equip): ?>
	<?php $clear=(($index+1)%$cols==1)?'style="clear:left"':'' ?>
	<div class="col-md-<?php echo (12/$cols) ?>" <?php echo $clear?>>
		<div class="equip nice-block rounded" <?php echo ($index>($cols-1))?'style="margin-top:15px;margin-bottom:10px"':'' ?>>
			<a style="text-align:center;" href="<?php echo Tools::Href($equip->GetPath()->GetUrl()) ?>">
				<div class="image">
					<img src="<?php echo Images::PublicUrl($equip->GetImage()->GetPath()) ?>" alt="" height="100"> 
				</div>
				<div class="name"><?php echo $equip->GetName() ?></div>
			</a>
		</div>
	</div>
	<?php endforeach ?>
</section>