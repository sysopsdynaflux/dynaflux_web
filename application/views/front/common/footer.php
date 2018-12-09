			</div>
			<footer class="row">
				
				<section class="shadow"></section>

				<?php if($prefooter): ?>
				<section class="prefooter col-md-12">
					<div class="col-md-3 shadow-right">
						<div class="bottom-menu">
							<div class="title">Productos</div>
							<ul class="nav">
								<?php foreach($oustandingProducts as $product): ?>
								<li>
									<a href="<?php echo Tools::Href($product->GetPath()->GetUrl()) ?>"
										title="<?php echo $product->GetTitle() ?>">
										<?php echo $product->GetTitle() ?>
									</a>
								</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
					<div class="col-md-3 shadow-edges">
						<div class="bottom-menu">
							<div class="title">Casos de éxito</div>
							<ul class="nav">
								<?php foreach($completedProjects as $project): ?>
								<li>
									<a href="<?php echo Tools::Href($project->GetPath()->GetUrl()) ?>"
										title="<?php echo $project->GetName() ?>">
										<?php echo $project->GetName() ?>
									</a>
								</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
					<!--div class="col-md-3 shadow-edges">
						<div class="bottom-menu">
							<div class="title">Novedades</div>
							<ul class="nav">
								<?php foreach($newsList as $news): ?>
								<li>
									<a href="<?php echo Tools::Href($news->GetPath()->GetUrl()) ?>"
										title="<?php echo $news->GetTitle() ?>">
										<?php echo $news->GetTitle() ?>
									</a>
								</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div-->
					<div class="col-md-3 shadow-edges">
						<div class="bottom-menu">
							<div class="title">Brochures</div>
							<ul class="nav">
								<?php foreach($downloads as $download): ?>
								<li>
									<a href="<?php echo Tools::FileUrl($download->GetFile()->GetPath()) ?>"
										title="<?php echo $download->GetTitle() ?>" target="_blank">
										<?php echo $download->GetTitle() ?>
									</a>
								</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
					<!-- Fill -->
					<div class="col-md-3 shadow-left"><div class="bottom-menu"></div></div>
				</section>
				<?php endif ?>

				<section class="footer">
					<div class="col-md-12">
						<div class="social">
							<ul class='nav navbar-nav'>
								<li class='facebook'>
									<a target="_blank" href="https://www.facebook.com/dynaflux.fluidos" title='facebook'>
										<img src="<?php echo Tools::WebImageUrl('square-facebook-128.png') ?>" width="25" height="25">
									</a>
								</li>
								<!--li class='twitter'><a href="#" title='twitter'></a></li-->
								<li class='youtube'>
									<a target="_blank" href="https://www.youtube.com/channel/UCugx0NxmTqEFimj82-m254w" title='youtube'>
										<img src="<?php echo Tools::WebImageUrl('youtube.png') ?>" width="25" height="25">
									</a>
								</li>
							</ul>
						</div>
						<div class="footer-bottom">
							<p>
								<a href="<?php echo Tools::Href('') ?>">Inicio</a>&nbsp;&nbsp;|&nbsp;
								<a href="<?php echo Tools::Href('sitemap') ?>">Sitemap</a>&nbsp;&nbsp;|&nbsp;
								<a href="<?php echo Tools::Href($termsPath->GetUrl()) ?>">Terminos y Condiciones</a>
							</p>
							<p style="margin-bottom:0">©2015 DYNAFLUX S.A Todos los derechos reservados</p>
						</div>
					</div>
				</section>				
			</footer>
		</section>
	</body>
</html>	