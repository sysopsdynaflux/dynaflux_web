<ul class="projects-block">
    <?php foreach($projects as $key=>$project): ?>
    <?php if($key+1==count($projects)): ?>
    <li class="last-item">
    <?php else: ?>
    <li>
    <?php endif ?>
        <a href="<?php echo Tools::Href($project->GetPath()->GetUrl()) ?>">
        	<div class="project-image">
				<?php if($project->GetPhoto() != null): ?>
				<img src="<?php echo Images::PublicUrl($project->GetPhoto()->GetPath()) ?>" 
					title="<?php echo $project->GetName() ?>"
					height="70" width="100">
				<?php else: ?>
				<img title="<?php echo $project->GetName() ?>" height="70" width="100">
				<?php endif ?>
			</div>
            <div class="project-title"><?php echo $project->GetName() ?></div>
        </a>        
    </li>
    <?php endforeach ?>
</ul>