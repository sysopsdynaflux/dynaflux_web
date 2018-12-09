<section class='accordion col-md-4' id="menu-<?php echo $topActive ?>">
    <div class="nice-block system-menu rounded">
        <div class="backgrounded-block-title">Otros Sistemas</div>
    	<ul class="" id="<?php echo $topActive ?>">
            <?php foreach($systems as $key => $system): ?>
            <li<?php if($key+1==count($systems)): ?> class="list-last-item"<?php endif ?>>
                <a href="<?php echo Tools::Href($system->GetPath()->GetUrl()) ?>">
                    <div class="system-image">
                        <img src="<?php echo Images::PublicUrl($system->GetImage()->GetPath()) ?>" 
                        alt="" height="70" width="100" align="left"></div>
                    <div class="system-title"><?php echo $system->GetTitle() ?></div>
                </a>        
            </li>
            <?php endforeach ?>
        </ul>
    </div>
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
                        <a target="__blank" href="<?php echo Tools::FileUrl($brochure->GetPath()) ?>">
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
                        <a target="__blank" href="<?php echo Tools::FileUrl($manual->GetPath()) ?>">
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