<section class="portfolio-content clear">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="portfolio-thumb-container">
		<div class="portfolio-thumb trs-two">
			<a class="post-link" href="<?php the_permalink(); ?>">
				<?php if(has_post_thumbnail()) : the_post_thumbnail('portfolio-thumb'); else :?>
				<img class="trs-four" src="<?php bloginfo('template_url'); ?>/img/no-thumb.png" alt="Thumbnail does not exist">
				<?php endif; ?>
			</a>
			<?php /*<div class="portfolio-stats">
	        	<span class="fol-info">
		        	<div class="info"><?php echo do_shortcode('[post_view]'); ?></div>
		        	<div class="des">Views</div>
	        	</span>
	        	<span class="fol-info">
		        	<div class="info"><?php comments_number( '0', '1', '%' ); ?></div>
		        	<div class="des">Comments</div>
	        	</span>
	        </div> */ ?>
	    </div>
	</div>
	<?php endwhile; else: ?>
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article>
		<!-- /article -->
	<?php endif; ?>
</section>
<!-- /portfolio-content -->