<div class="aboutus col-md-8">
	<div class="shadow-block rounded" style="padding:10px 12px">
		<section class="about-tabs">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" style="margin-top:5px; margin-bottom:2px">
				<li class="active">
					<a href="#mision" data-toggle="tab">¿Quienes Somos?</a>
				</li>
				<li>
					<a href="#areas" data-toggle="tab">Nuestras &Aacute;reas</a>
				</li>
			</ul>
		</section>
		<section class="about-detail">
			<div class="tab-content">		
				<!-- Mision y Vision -->
				<div class="tab-pane active" id="mision">
					<div class="about-us">
						<?php echo $misionVision->GetContent() ?>
					</div>
				</div>
				<!-- Areas -->
				<div class="tab-pane" id="areas">			
					<div class="about-us">
						<ul class="media-list">
							<?php foreach($departments as $i => $department): ?>
							<?php if($i+1==count($departments)): ?>
						    <li class="person media last-item">
						    <?php else: ?>
						    <li class="person media">
						    <?php endif ?>
								<?php if(($i+1)%2>0): ?>
								<div class="person-image pull-left">
								<?php else: ?>
								<div class="person-image pull-right">
								<?php endif ?>
									<img class="media-object" src="<?php echo Images::PublicUrl($department->GetImage()->GetPath()) ?>" alt="" width="180" height="130">
								</div>
								<div class="media-body">
									<h4 class="media-heading name"><?php echo $department->GetTitle() ?></h4>
									<!--div class="charge">charge</div-->
									<div class="description"><?php echo $department->GetContent() ?></div>
								</div>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="col-md-4">
	<div class="info-block shadow-block rounded block-padding">
		<?php $this->load->view('front/block/trademarks') ?>
		<p>Nuestras Marcas</p>
	</div>
	<br>
	<!--div class="info-block shadow-block rounded block-padding">		
		<div class="chemco-block">
			<div class="chemco-block-icon"><img src="<?php echo Tools::WebImageUrl('chemco_icon.jpg') ?>"></div>
			<div class="chemco-block-icon"><img src="<?php echo Tools::WebImageUrl('bussiness_icon.jpeg') ?>"></div>
			<div class="chemco-block-icon"><img src="<?php echo Tools::WebImageUrl('dynaflux_icon.png') ?>"></div>
		</div>
		<p>Representantes exclusivos de Chemco Systems a nivel nacional</p>
	</div-->
	<br>
	<div class="info-block shadow-block rounded block-padding">
		<div class="sap-icon"><img src="<?php echo Tools::WebImageUrl('sapbo_logo.jpg') ?>"></div>
		<p>Nuestros procesos estan automatizados con SAP</p>
	</div>
	<br>
</div>