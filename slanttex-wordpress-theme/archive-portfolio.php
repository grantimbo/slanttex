<?php get_header(); ?>
<header class="portfolio-header trs-four">
	<?php get_template_part('navigation'); ?>
</header>

<div class="wrap">
	<header class="portfolio-subhead">
		<h1 class="clear">Featured <span>Artworks<b>!</b></span></h1>
	</header>
	<?php get_template_part('loop'); ?>
	<?php get_template_part('pagination'); ?>
</div>
<?php get_footer(); ?>