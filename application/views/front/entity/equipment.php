<?php

function PreOrder($root, $menu, $path)
{
    $level = $root->GetLevel();
    $items = Tools::GetChildItems($root, $menu);

    if(empty($items)) $leaf = true;
    else $leaf = false;

    if($level == 1) $level = !$leaf?"first":"second";
    else if($level == 2) $level = "second";
    else if($level > 2) $level = "third";
    else $level = "third";
?>
<li class="<?php echo $level ?>-level panel">
    <?php if($root->GetType() == "category"): ?>
    <a href="#<?php echo $root->GetId() ?>"
        data-toggle="collapse"
        data-parent="#<?php echo $root->GetId() ?>"
        class="collapsed category" style="margin-top:-1px">
    <?php else: ?>
    <a href="<?php echo Tools::Href($root->GetUrl()) ?>" 
        class="collapsed <?php echo $root->GetUrl()==$path->GetUrl()?'active':'' ?>" 
        style="margin-top:-1px">
    <?php endif ?>
        <?php echo $root->GetName() ?>
    </a>
    <?php
    if(!empty($items)){
    ?>
    <ul class="nav collapse" id="<?php echo $root->GetId() ?>">
    <?php
    foreach($items as $item)
        PreOrder($item, $menu, $path);
    ?>
    </ul>
    <?php } ?>
</li>
<?php
}
?>
<!--div class="equipment-content"-->
<section class='accordion col-md-4' id="menu-<?php echo $topActive ?>">
	<ul class="nav navbar-nav shadow-block rounded" id="<?php echo $topActive ?>">
        <?php $topParents = Tools::GetTopParentsFromMenu($menu) ?>
        <?php foreach($topParents as $parent): ?>
        <?php PreOrder($parent, $menu, $currentPath) ?>
        <?php endforeach ?>
    </ul>

</section>
<section class="equipment col-md-8">
	<h2 class="equipment-title"><?php echo $product->GetTitle() ?></h2>
    <?php if(empty($brochures) && empty($manuals)): ?>
    <div class="media content">
        <?php echo $product->GetDetail() ?>
    </div>
    <?php else: ?>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#resume" data-toggle="tab">Descripci&oacute;n</a></li>
      <li><a href="#brochure" data-toggle="tab">Brochure/Manuales</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="resume">
            <div class="media content">
                <?php echo $product->GetDetail() ?>
            </div>
        </div>
        <div class="tab-pane" id="brochure">
            <?php if(!empty($brochures)): ?>
            <div class="brochure-list file-list">
                <h2 class="title">Brochures</h2>
                <ul>
                    <?php foreach($brochures as $brochure): ?>
                    <li class="brochure">
                        <a target="_blank" href="<?php echo Tools::FileUrl($brochure->GetPath()) ?>">
                            <?php echo $brochure->GetName() ?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
            <?php if(!empty($manuals)): ?>
            <div class="manual-list file-list">
                <h2 class="title">Manuales</h2>
                <ul>
                    <?php foreach($manuals as $manual): ?>
                    <li class="manual">
                        <a target="_blank" href="<?php echo Tools::FileUrl($manual->GetPath()) ?>">
                            <?php echo $manual->GetName() ?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
        </div>
    </div>
    <?php endif ?>
</section>
<!--/div-->
<script src="<?php echo Tools::PublicUrl('js/classes/Menu.js') ?>"></script>
<script src="<?php echo Tools::PublicUrl('js/equipment.js') ?>"></script>