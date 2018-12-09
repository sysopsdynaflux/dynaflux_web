<?php switch($type){ case 'news': ?>
<section class="filtered-news col-md-9 summary-list">
	<div class="shadow-block block-padding rounded">
		<div class="list-title">
			Filtro: "<?php echo $name ?>"
		</div>
		<div class="list-content">
		<?php $this->load->view('front/block/news_extended',array('newsList'=>$items)) ?>
		</div>
	</div>
</section>
<?php break; case 'project': ?>
<section class="filtered-projects col-md-9 summary-list">
	<!--div class="shadow-block block-padding rounded"-->
		<div class="list-title col-md-12">
			Filtro: "<?php echo $name ?>"
		</div>
		<div class="list-content">
		<?php $this->load->view('front/block/projects_extended',array('projects'=>$items)) ?>
		</div>
	<!--/div-->
</section>
<?php break; } ?>
<section class="tags col-md-3">
	<div class="shadow-block rounded">
		<div class="backgrounded-block-title">Otras Categor&iacute;as</div>
		<?php $this->load->view('front/block/tags') ?>
	</div>
</section>