<?php $importGalleryLibraries = false; $setScroll = false ?>
<div class="projects-extended">
    <?php foreach($projects as $key=>$project): ?>
    <?php $clear=(($key+1)%2==1)?' style="clear:left"':'' ?>
    <div class="col-md-6"<?php echo $clear ?>>
    <?php if($key+1==count($projects)-2): ?>
    <div class="project nice-block rounded last-item">
    <?php else: ?>
    <div class="project nice-block rounded">
    <?php endif ?>
        <?php $project_photo = $project->GetPhoto() ?>
        <?php $project_gallery = $project->GetGallery() ?>

        <?php if(!empty($project_photo)): ?>
        <div class="project-image">
            <img src="<?php echo Images::PublicUrl($project->GetPhoto()->GetPath()) ?>" 
                alt="<?php echo $project->GetName() ?>">
        </div>
        <?php elseif(!empty($project_gallery)): ?>
        <?php $importGalleryLibraries = true ?>
        <div id="project-images-list" class="project-images <?php echo (count($project->GetGallery())>5)?' scroller':'' ?>">
            <!--div class="list-title">Galería</div-->
            <ul class="nav">
                <?php foreach($project->GetGallery() as $image): ?>
                <li>
                    <a class="box-image" style="padding:0" title="<?php echo $image->GetName() ?>"
                        href="<?php echo Images::PublicUrl($image->GetPath()) ?>">
                        <img src="<?php echo Images::PublicUrl($image->GetPath()) ?>" 
                            title="<?php echo $project->GetName() ?>">
                    </a>
                </li>
                <?php endforeach ?>
            </ul>
            <?php if(count($project->GetGallery())>5): ?>
            <?php $setScroll = true ?>
            <div class="buttons">
                <span class="prev"></span>
                <span class="next"></span>
            </div>
            <?php endif ?>
        </div>
        <?php endif ?>
        <div class="project-title">
            <a href="<?php echo Tools::Href($project->GetPath()->GetUrl()) ?>">
                <?php echo $project->GetName() ?>
            </a>
        </div>
        <div class="project-desc"><p><?php echo $project->GetSummary() ?></p></div>
    </div>
    </div>
    <?php endforeach ?>
</div>
<?php if($importGalleryLibraries): ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo Tools::PublicUrl('css/vendor/colorbox.css') ?>" />
<script src="<?php echo Tools::PublicUrl('js/vendor/jquery.colorbox-min.js') ?>"></script>
<?php if($setScroll): ?>
<script src="<?php echo Tools::PublicUrl('js/vendor/jquery.serialScroll.min.js') ?>"></script>
<?php endif ?>
<script src="<?php echo Tools::PublicUrl('js/projects.js') ?>"></script>
<?php endif ?>