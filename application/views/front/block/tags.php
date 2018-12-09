<ul class="tags-block">
	<?php foreach($tags as $key=>$tag): ?>
	<?php if($key+1==count($tags)): ?>
    <li class="last-item">
    <?php else: ?>
    <li>
    <?php endif ?>
		<a href="<?php echo Tools::Href($tag->GetPath()->GetUrl()) ?>">
			<div class="tag-title"><?php echo $tag->GetName() ?></div>
		</a>		
	</li>
	<?php endforeach ?>
</ul>