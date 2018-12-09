<ul class="news-block">
	<?php foreach($newsList as $key=>$newsItem): ?>
	<?php if($key+1==count($newsList)): ?>
    <li class="last-item">
    <?php else: ?>
    <li>
    <?php endif ?>
		<a href="<?php echo Tools::Href($newsItem->GetPath()->GetUrl()) ?>">
			<div class="news-image">
				<?php if($newsItem->GetPhoto() != null): ?>
				<img src="<?php echo Images::PublicUrl($newsItem->GetPhoto()->GetPath()) ?>" 
					title="<?php echo $newsItem->GetTitle() ?>"
					height="70" width="100">
				<?php else: ?>
				<img title="<?php echo $newsItem->GetTitle() ?>" height="70" width="100">
				<?php endif ?>
			</div>
			<div class="news-title"><?php echo $newsItem->GetTitle() ?></div>
			<div class="news-date"><?php echo Tools::NewsDateFormat($newsItem->GetDate()) ?></div>
		</a>
	</li>
	<?php endforeach ?>
</ul>