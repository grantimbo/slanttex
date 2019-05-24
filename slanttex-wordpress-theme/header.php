<!doctype html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' &mdash; '; } ?><?php bloginfo('description'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
    	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
		<script src="http://localhost/library/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<div id="fb-root"></div>

		<?php wp_head(); ?>
		<script>
	        // conditionizr.com
	        // configure environment tests
	        // conditionizr.config({
	        //     assets: '<?php echo get_template_directory_uri(); ?>',
	        //     tests: {}
	        // });

			var themeUrl = "<?php echo bloginfo('template_url');?>";
			var siteUrl = "<?php echo site_url(); ?>";

        </script>
	</head>
	<body <?php body_class(); ?>>