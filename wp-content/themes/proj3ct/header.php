<!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo home_url( '/' ); ?>/wp-content/themes/proj3ct/style.css" media="all">
	<meta charset="utf-8">
	<meta content='initial-scale=1; maximum-scale=1; user-scalable=0;' name='viewport'/>
	<title><?php wp_title(''); ?></title>	
	<?php wp_head(); ?>
</head>
<body>
	<header class="header">
		<a href="" class="logo parent-box-head"><img src="<?php echo get_bloginfo('template_directory');?>/img/proj3ct-logo.png" alt=""><span>PROJ3CT</span></a>
		<nav class="main-menu box-content">
			<ul>
				<li><a href="lien.html" class="active"><span class="main-menu-icon project-user"></span><span>Clients</span></a></li>
				<li><a href="lien.html"><span class="main-menu-icon project-stack"></span><span>Projets</span></a></li>
				<li><a href="lien.html"><span class="main-menu-icon project-note"></span><span>TodoList</span></a></li>
				<li><a href="lien.html"><span class="main-menu-icon project-calendar"></span><span>Planning</span></a></li>
			</ul>
		</nav>
	</header>