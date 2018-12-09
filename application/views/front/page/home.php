<div class="col-md-12">
<section class="information-blocks clearfix nice-block">
	<?php $this->load->view('front/block/top_info') ?>
</section>
</div>
<div class="col-md-8" style="padding-right:5px">
<section class="slider shadow-block">
	<?php $this->load->view('front/block/slider') ?>
</section>
<section class="featured-products nice-block">
	<h2><?php echo $this->lang->line('ProductsBlockTitle') ?></h2>
	<?php $this->load->view('front/block/products', array('products'=>$oustandingProducts)) ?>
	<p><a href="<?php echo Tools::Href($equipment_path->GetUrl()) ?>">Ver mas equipos</a> »</p>
	<!--p><a href="<?php echo Tools::Href($systems_path->GetUrl()) ?>">Ver mas sistemas</a> »</p-->
</section>
</div>
<div class="col-md-4">
<section class="projects-finished nice-block">
	<h2><?php echo $this->lang->line('ProjectsBlockTitle') ?></h2>
	<?php $this->load->view('front/block/projects_short', array('projects'=>$completedProjects)) ?>
	<p><a href="<?php echo Tools::Href($projects_path->GetUrl()) ?>">Ver mas casos de éxito</a> »</p>
</section>
<!--section class="latest-news nice-block">
	<h2><?php echo $this->lang->line('NewsBlockTitle') ?></h2>
	<?php $this->load->view('front/block/news') ?>
	<p><a href="<?php echo Tools::Href($news_path->GetUrl()) ?>">Ver mas noticias</a> »</p>
</section-->
<section class="downloads nice-block">
	<h2>Brochures</h2>
	<?php $this->load->view('front/block/brochures') ?>
</section>
</div>
<link href="<?php echo Tools::PublicUrl('css/vendor/jquery.bxslider.css') ?>" rel="stylesheet" />
<script src="<?php echo Tools::PublicUrl('js/vendor/jquery.bxslider.min.js') ?>"></script>
<script src="<?php echo Tools::PublicUrl('js/home.js') ?>"></script>