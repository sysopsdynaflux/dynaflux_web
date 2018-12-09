<ul class="news-extended">
    <?php foreach($newsList as $key=>$news): ?>
    <?php if($key+1==count($newsList)): ?>
    <li class="last-item">
    <?php else: ?>
    <li>
    <?php endif ?>
    	<div class="news-image">
			<?php if($news->GetPhoto() != null): ?>
			<img src="<?php echo Images::PublicUrl($news->GetPhoto()->GetPath()) ?>" 
				alt="<?php echo $news->GetTitle() ?>"
				height="80" width="100" align="left">
			<?php else: ?>
			<img alt="<?php echo $news->GetTitle() ?>" height="80" width="100" align="left">
			<?php endif ?>
		</div>
        <div class="news-title">
            <a href="<?php echo Tools::Href($news->GetPath()->GetUrl()) ?>">
            <?php echo $news->GetTitle() ?></a>
        </div>
        <div class="news-date"><?php echo Tools::NewsDateFormat($news->GetDate()) ?></div>
        <div class="news-desc"><p><?php echo $news->GetSummary() ?></p></div>        
    </li>
    <?php endforeach ?>
</ul>