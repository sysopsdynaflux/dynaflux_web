<!DOCTYPE html>
<html>
	<head> 
	<meta charset="UTF-8">
	<title><?php echo empty($title)?'':$title.' | ' ?>Dynaflux</title>
	<!-- meta name="viewport" content="width=device-width" /-->
	<link rel="shortcut icon" href="<?php echo Tools::WebImageUrl('favicon.png') ?>" type="image/x-icon">
	<!-- link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Titillium+Web:600,700&amp;subset=latin" media="all" /-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Tools::PublicUrl('css/vendor/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Tools::PublicUrl('css/vendor/bootstrap-theme.min.css') ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Tools::PublicUrl('css/global.css') ?>">
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
	<script src="<?php echo Tools::PublicUrl('js/vendor/jquery-1.11.0.min.js') ?>"></script>
	<script src="<?php echo Tools::PublicUrl('js/vendor/bootstrap.min.js') ?>"></script>
	</head>
	<body>
		<section class="container" style="border: 1px solid grey">
			<header class='header row'>
				<section class='header-first col-md-12'>
					<div class="logo"><a href="<?php echo base_url() ?>"><img src="<?php echo Tools::WebImageUrl('logo.png') ?>" alt=""></a></div>
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
				</section>
				<section class='header-second col-md-12'>
					<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							    <ul class="nav navbar-nav">
							    	<li class="<?php echo $currentPath->GetUrl() == '' ? 'active' : '' ?>">
							    		<a href="<?php echo base_url() ?>" style="padding:4px 10px">
							    			<img src="<?php echo Tools::WebImageUrl('home_icon.png') ?>" alt="" height="22" weight="30">
							    		</a>
							    	</li>
							    	<?php foreach($topMenu as $item): ?>
							        <li class="<?php echo $item->GetUrl() == $topActive || $item->GetUrl() == $currentPath->GetUrl() ? 'active' : '' ?>">
							        	<a href="<?php echo Tools::Href($item->GetUrl()) ?>">
							        	<?php echo $item->GetName() ?>
							    	    </a>
							    	</li>
							    	<?php endforeach ?>
							    </ul>
						    </div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</section>
			</header>
			<div class="content row">