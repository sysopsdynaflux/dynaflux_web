<?php $cols=3 ?>
<section class="services">
	<?php foreach($services as $index => $service): ?>
	<?php $clear=(($index+1)%$cols==1)?'style="clear:left"':'' ?>
	<div class="col-md-<?php echo (12/$cols) ?>" <?php echo $clear?>>
		<div class="service nice-block rounded" <?php echo ($index>($cols-1))?'style="margin-top:15px;margin-bottom:10px"':'' ?>>
			<!--a class="collapsed" data-target="#modal<?php echo $index ?>" data-toggle="modal" href=""-->
				<div class="image">
					<img src="<?php echo Images::PublicUrl($service->GetIcon()->GetPath()) ?>" alt="" height="100"> 
				</div>
				<div class="name"><?php echo $service->GetName() ?></div>
				<p><?php echo $service->GetDescription() ?></p>
			<!--/a-->
			<!--div class="modal fade" id="modal<?php echo $index ?>">
			    <div class="modal-dialog">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title"><?php echo $service->GetName() ?></h4>
			      		</div>
				        <div class="modal-body">
				        	<p><?php echo $service->GetDescription() ?></p>
				        </div>
			    	</div><!-- /.modal-content --
			    </div><!-- /.modal-dialog --
			</div><!-- /.modal -->
		</div>
	</div>
	<?php endforeach ?>
</section>