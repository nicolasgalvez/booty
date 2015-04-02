<?php
/*
Template Name: Angular
*/
?>
<!DOCTYPE html>
<html ng-app>
<head>
	<title>AngularJS Demo Theme</title>
	<?php wp_head(); ?>
</head>
<body>
 
	<header>
		<h1>
			<a href="<?php echo site_url(); ?>">AngularJS Demo Theme</a>
		</h1>
	</header>
 
	<div>
		<input type="text" ng-model="name">
 
		<p>Hello, {{name}}!</p>
	</div>
 
	<footer>
		&copy; <?php echo date( 'Y' ); ?>

	</footer>
 <?php wp_footer(); ?>
</body>
</html>