<section class="related-news col-md-3">
	<div class="shadow-block rounded">
	<?php if(!empty($newsList)): ?>
	<div class="backgrounded-block-title">Tambien te puede interesar...</div>
	<?php $this->load->view('front/block/news') ?>
	<?php else: ?>
	Primera participación de esta categoría
	<?php endif ?>
	</div>
</section>
<section class="news-detail col-md-6">
	<h2 class="news-title"><?php echo $news->GetTitle() ?></h4>
	<div class="news-photo">
		<?php if($news->GetPhoto() != null): ?>
		<img src="<?php echo Images::PublicUrl($news->GetPhoto()->GetPath()) ?>" 
			title="<?php echo $news->GetName() ?>">
		<?php endif ?>
	</div>
	<div class="news-content media content"><?php echo $news->GetContent() ?></div>
	<?php if(!empty($images)): ?>
	<div id="news-images-list" class="news-images<?php echo (count($images)>5)?' scroller':'' ?>">
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
	<?php if(!empty($news->GetTags())): ?>
	<div class="related-tags">
	<div class="list-title">Categor&iacute;as relacionadas</div>
	<ul>
		<?php foreach($news->GetTags() as $rt): ?>
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
<section class="tags col-md-3">
	<div class="shadow-block rounded">
		<div class="backgrounded-block-title">Categor&iacute;as</div>
		<?php $this->load->view('front/block/tags') ?>
	</div>
</section>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo Tools::PublicUrl('css/vendor/colorbox.css') ?>" />
<script src="<?php echo Tools::PublicUrl('js/vendor/jquery.colorbox-min.js') ?>"></script>
<?php if(!empty($images) && (count($images)>5)): ?>
<script src="<?php echo Tools::PublicUrl('js/vendor/jquery.serialScroll.min.js') ?>"></script>
<?php endif ?>
<script src="<?php echo Tools::PublicUrl('js/news.js') ?>"></script>