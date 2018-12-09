<section class="related-projects tags col-md-4">
	<div class="shadow-block rounded">
		<?php if(!empty($projects)): ?>
		<div class="backgrounded-block-title">Casos similares</div>
		<?php $this->load->view('front/block/projects_short') ?>
		<?php else: ?>
		Primer proyecto de esta categoría
		<?php endif ?>
	</div>
	<div class="shadow-block rounded">
		<div class="backgrounded-block-title">Categor&iacute;as</div>
		<?php $this->load->view('front/block/tags') ?>
	</div>
</section>
<section class="project-detail col-md-8">
	<h2 class="project-title"><?php echo $project->GetName() ?></h4>
	<div class="project-photo">
		<?php if($project->GetPhoto() != null): ?>
		<img src="<?php echo Images::PublicUrl($project->GetPhoto()->GetPath()) ?>" 
			title="<?php echo $project->GetName() ?>">
		<?php endif ?>
	</div>
	<div class="project-description media content"><?php echo $project->GetDescription() ?></div>
	<?php if(!empty($images)): ?>
	<div id="project-images-list" class="project-images <?php echo (count($images)>5)?' scroller':'' ?>">
		<div class="list-title">Galería</div>
		<ul class="nav">
			<?php foreach($images as $image): ?>
			<li>
				<a class="box-image" style="padding:0" title="<?php echo $image->GetName() ?>"
					href="<?php echo Images::PublicUrl($image->GetPath()) ?>">
					<img src="<?php echo Images::PublicUrl($image->GetPath()) ?>" width="93" height="72" alt="">
				</a>
			</li>
			<?php endforeach ?>
		</ul>
		<?php if(count($images)>5): ?>
		<div class="buttons">
			<span class="prev"></span>
			<span class="next"></span>
		</div>
		<?php endif ?>
	</div>
	<?php endif ?>
	<?php $project_tags = $project->GetTags() ?>
	<?php if(!empty($project_tags)): ?>
	<div class="related-tags">
	<div class="list-title">Categor&iacute;as relacionadas</div>		
	<ul>
		<?php foreach($project->GetTags() as $rt): ?>
		<li>
			<a href="<?php echo Tools::Href($rt->GetPath()->GetUrl()) ?>" class="shadow-block rounded">
			<?php echo $rt->GetName() ?>
			</a>
		</li>
		<?php endforeach ?>
	</ul>
	</div>
	<?php endif ?>
</section>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo Tools::PublicUrl('css/vendor/colorbox.css') ?>" />
<script src="<?php echo Tools::PublicUrl('js/vendor/jquery.colorbox-min.js') ?>"></script>
<?php if(!empty($images) && (count($images)>5)): ?>
<script src="<?php echo Tools::PublicUrl('js/vendor/jquery.serialScroll.min.js') ?>"></script>
<?php endif ?>
<script src="<?php echo Tools::PublicUrl('js/projects.js') ?>"></script>