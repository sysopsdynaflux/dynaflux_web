<div class="contact">
<section class="contact-list col-md-12">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" style="margin-top:0px; margin-bottom:2px">
		<li class="active">
			<a id="mapLink" href="#map" data-toggle="tab" style="margin-left:-1px"><?php echo $this->lang->line('OfficesTabTitle') ?></a>
		</li>
		<li>
			<a id="formLink" href="#contactenos" data-toggle="tab"><?php echo $this->lang->line('ContactTabTitle') ?></a>
		</li>
	</ul>
</section>
<section class="contact-detail col-md-12">
	<div class="contact-content shadow-block">
		<div class="contact-tabs">
			<div class="tab-content">
				<div class="tab-pane" id="contactenos">
					<div class="row">
						<div class="col-md-4" style="width:28%; padding-right:2px">
							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane active" id="contactos">
							  	<ul class="nav" style="height:570px; background:#DBDBDB">
							  		<?php foreach($contacts as $key => $contact): ?>
									<li class="contact-item <?php echo $key+1 ?>">
										<h4 class="nombre-contacto"><?php echo $contact->GetName() ?></h4>
										<div class="cargo-contacto"><?php echo $contact->GetPosition() ?></div>
										<div class="email-contacto"><?php echo $contact->GetEmail() ?></div>
										<div class="telefono-contacto"><?php echo $contact->GetPhone() ?></div>
									</li>
									<?php endforeach ?>
								</ul>
							  </div>
							</div>
						</div>
						<div class="col-md-8" style="width:72%; padding-left:0; margin-left:-2px">
							<script>var contactActive=<?php if($contactActive): ?>true<?php else: ?>false<?php endif ?>;</script>
							<form class="form-horizontal" method="post" action="<?php echo Tools::Href($currentPath->GetUrl()) ?>">
								<fieldset>
								<!-- Form Name -->
								<legend>LLene el Formulario</legend>
								
								<div class="form-fields col-md-8 separator-right">

								<?php if(isset($contact_form_result)): ?>
								<div class="">
									<p class="message bg-<?php echo $contact_form_result['type'] ?>">
										<?php echo $contact_form_result['message'] ?>
									</p>
								</div>
								<?php endif ?>

								<!-- Text input-->
								<div class="form-group input-contact <?php if(form_error('contact')) echo 'has-error' ?>">
									<label class="col-md-3 control-label" for="contact"><?php echo $this->lang->line('FormContactLabel') ?></label>  
									<div class="col-md-7">
										<p class="form-control-static contact-name"></p>
										<input id="contact" name="contact" type="hidden" class="form-control input-md"
											value="<?php echo set_value('contact') ?>">
										<span class="help-block"><?php echo strip_tags(form_error('contact')) ?></span>
									</div>
								</div>

								<!-- Text input-->
								<div class="form-group <?php if(form_error('name')) echo 'has-error' ?>">
									<label class="col-md-3 control-label" for="name"><?php echo $this->lang->line('FormNameLabel') ?></label>
									<div class="col-md-7">
										<input id="name" name="name" type="text" class="form-control input-md"
											value="<?php echo set_value('name') ?>">
										<span class="help-block"><?php echo strip_tags(form_error('name')) ?></span>
									</div>
								</div>

								<!-- Text input-->
								<div class="form-group <?php if(form_error('email')) echo 'has-error' ?>">
								  <label class="col-md-3 control-label" for="email"><?php echo $this->lang->line('FormEmailLabel') ?></label>  
								  <div class="col-md-7">
								  		<input id="email" name="email" type="text" class="form-control input-md"
								  			value="<?php echo set_value('email') ?>">
								  		<span class="help-block"><?php echo strip_tags(form_error('email')) ?></span>
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group <?php if(form_error('subject')) echo 'has-error' ?>">
								  <label class="col-md-3 control-label" for="subject"><?php echo $this->lang->line('FormSubjectLabel') ?></label>  
								  <div class="col-md-7">
								  		<input id="subject" name="subject" type="text" class="form-control input-md"
								  			value="<?php echo set_value('subject') ?>">
								  		<span class="help-block"><?php echo strip_tags(form_error('subject')) ?></span>
								  </div>
								</div>

								<!-- Textarea -->
								<div class="form-group <?php if(form_error('message')) echo 'has-error' ?>">
								  <label class="col-md-3 control-label" for="message"><?php echo $this->lang->line('FormContentLabel') ?></label>
								  <div class="col-md-7">
								  		<textarea class="form-control" id="message" name="message"><?php echo set_value('message') ?></textarea>
								  		<span class="help-block"><?php echo strip_tags(form_error('message')) ?></span>
								  </div>
								</div>

								<!-- Captcha -->
								<div class="form-group <?php if(isset($captchaError)) echo 'has-error' ?>">
									<label class="col-md-3 control-label" for="captcha">Captcha</label>
									<div class="col-md-7">
										<div id="captcha" class="g-recaptcha" data-sitekey="6Lel7AATAAAAAF56QncqPNwtqYA5kyuDUSZWD1zo"></div>
										<span class="help-block"><?php echo isset($captchaError)?$captchaError:'' ?></span>
									</div>
							    </div>	

								<!-- Button -->
								<div class="form-group">
								  <label class="col-md-3 control-label" for="send"></label>
								  <div class="col-md-4">
								    <button id="send" name="send" class="btn btn-primary shadow-block"><?php echo $this->lang->line('FormSendButton') ?></button>
								  </div>
								</div>								

								</div>

								<div class="form-tips col-md-4">
									<div class="shadow-block rounded block-padding">
										Seleccione el contacto al cu&aacute;l le llegar&aacute; el mensaje
									</div>
									<br>
									<div class="shadow-block rounded block-padding">
										Es importante que llene el captcha para confirmar que no es un robot
									</div>
									<br>
									<div class="shadow-block rounded block-padding">
										Le responderemos en un lapso m&aacute;ximo de 24 horas
									</div>
								</div>

								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane active" id="map">
					<div class="row">
						<div class="col-md-4" style="width:28%; padding-right:2px">
							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane active" id="oficinas">
							  	<ul class="nav" style="height:570px; background:#DBDBDB">
									<?php foreach($locations as $key => $location): ?>									
									<li class="office <?php echo $key+1 ?>" data-lat="<?php echo $location->GetLatitude() ?>" data-lon="<?php echo $location->GetLongitude() ?>">
										<h4 class="office-title"><?php echo $location->GetName() ?></h4>
										<ul>											
											<li class="office-address"><?php echo $location->GetAddress() ?></li>
											<li class="office-phone"><?php echo $location->GetPhone() ?></li>
										</ul>
									</li>
									<?php endforeach ?>
								</ul>
							  </div>
							</div>
						</div>
						<div class="col-md-8" style="width:72%; padding-left:0;">
							<div id="map_canvas"></div>
						</div>	
					</div>
				</div>	
			</div>	
		</div>
	</div>
</section>
</div>

<!-- JS -->
<script src="http://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
<script src="<?php echo Tools::PublicUrl('js/classes/MD5.js') ?>"></script>
<script src="<?php echo Tools::PublicUrl('js/classes/MapManager.js') ?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB5KdzEXeNi92AUKTRxvO8NTPaxqS3cXiY&sensor=false"></script>
<script src="<?php echo Tools::PublicUrl('js/contact.js') ?>"></script>