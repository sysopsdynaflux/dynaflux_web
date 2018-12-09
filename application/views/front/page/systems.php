<?php $cols=4 ?>
<section class="systems-overview">
	<?php foreach($systems as $index => $system): ?>
	<?php $clear=(($index+1)%$cols==1)?'style="clear:left"':'' ?>
	<div class="col-md-<?php echo (12/$cols) ?>" <?php echo $clear?>>
		<div class="system nice-block rounded" <?php echo ($index>($cols-1))?'style="margin-top:15px;margin-bottom:10px"':'' ?>>
			<a style="text-align:center;" href="<?php echo Tools::Href($system->GetPath()->GetUrl()) ?>">
				<!--data-target="#modal<?php echo $index ?>" data-toggle="modal"-->
				<div class="image">
					<img src="<?php echo Images::PublicUrl($system->GetImage()->GetPath()) ?>" alt="" height="100">
				</div>
				<div class="name"><?php echo $system->GetTitle() ?></div>
			</a>
			<!--div class="modal fade" id="modal<?php echo $index ?>">
			    <div class="modal-dialog">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title"><?php echo $system->GetTitle() ?></h4>
			      		</div>
				        <div class="modal-body">
				        	<p><?php echo $system->GetDetail() ?></p>
				        </div>
			    	</div><!-- /.modal-content --
			    </div><!-- /.modal-dialog --
			</div><!-- /.modal -->
		</div>
	</div>
	<?php endforeach ?>
</section>