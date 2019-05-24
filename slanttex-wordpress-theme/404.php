<?php get_header(); ?>

	<main role="main">
		<article class="lost-page">
			<h1><?php _e( 'Lost Bruh?', 'html5blank' ); ?></h1>
			<h2>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Go Home', 'html5blank' ); ?></a>
			</h2>
			<p>or</p>
			<h2>Try a search.</h2>
			<?php get_template_part('searchform'); ?>
		</article>
		<!-- /article -->
	</main>

<?php get_footer(); ?>
