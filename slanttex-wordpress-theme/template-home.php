<?php /* Template Name: Home */ get_header(); ?>

	<nav class="page-nav">
		<a href="<?php echo site_url(); ?>/" data-nav="home"><span class="trs-four">Home</span></a>
		<a href="<?php echo site_url(); ?>/portfolio/" data-nav="folio"><span class="trs-four">Portfolio</span></a>
		<a href="<?php echo site_url(); ?>/contact/" data-nav="contact"><span class="trs-four">Contact</span></a>
	</nav>
	<!-- /page-nav -->


	<main data-page="home" class="welcome-page">
		<section class="welcome-wrap">
			<section class="welcome-scene">
				<div class="cloud"></div>
				<div class="cloud cloud-00"></div>
				<a href="<?php echo site_url(); ?>/category/typography/" class="type typo"></a>
				<a href="<?php echo site_url(); ?>/category/3d/" class="type threedee"></a>
				<a href="<?php echo site_url(); ?>/category/motion-graphics/" class="type motion"></a>
				<a href="<?php echo site_url(); ?>/category/website/" class="type web"></a>
			</section>
			
			<article class="welcome-msg">
				<?php the_content(); ?>
				<button data-nav="folio">artworks</button>
			</article>
		</section>
	</main>
	<!-- /welcome -->


	<main data-page="folio" class="folio-page">
		<header class="portfolio-header trs-four">
			<?php get_template_part('navigation'); ?>
		</header>

		<div class="wrap">
			<header class="portfolio-subhead">
				<h1 class="clear">Featured <span>Artworks<b>!</b></span></h1>
			</header>

			<section class="portfolio-content clear">
				
				<?php 

				//Fix homepage pagination
	            if ( get_query_var('paged') ) {
	                $paged = get_query_var('paged');
	            } else if ( get_query_var('page') ) {
	                $paged = get_query_var('page');
	            } else {
	                $paged = 1;
	            }
	             
	            $args = array( 
	            	'post_type' => 'portfolio',  
	            	'orderby'=> 'menu_order',  
	            	'paged' => $paged
	            ); 

	            $temp = $wp_query; 
	            $wp_query = null; 
	            $wp_query = new WP_Query(); 
	            $wp_query->query( $args ); 

	            if($wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

				<div class="portfolio-thumb-container">

					<div class="portfolio-thumb trs-two">
						<a class="post-link" href="<?php the_permalink(); ?>" data-id="<?php the_ID(); ?>">
							<?php if(has_post_thumbnail()) : the_post_thumbnail('portfolio-thumb'); else :?>
							<img class="trs-four" src="<?php bloginfo('template_url'); ?>/img/no-thumb.png" alt="Thumbnail does not exist">
							<?php endif; ?>
						</a>
						<!-- /porfolio-image -->
				    </div>

				</div>

				<?php endwhile; endif; wp_reset_postdata(); ?>

			</section>
			<!-- /portfolio-content -->

			<?php get_template_part('pagination'); ?>
		</div>
	</main>
	<!-- /portfolio -->


	<main data-page="contact" class="contact-page">
		<div class="contact-wrap">
			<header class="contact-header">
				<h1 class="trs-four">Bump Me<b>!</b><span class="trs-two">Contact</span></h1> 
				<p>Need a something? I surely can help you with that. Feel free to say hello, i am friendly :) Let's exchange emails or bump me on my social profiles. My contact details and social accounts are listed below. Stay awesome bruh!</p>
			</header>
			
			<article class="contact-details">
				<p><span>email /</span> grant.imbo@gmail.com</p>
				<p><span>phone /</span> +63-935-621-6488 (PH)</p>
			</article>

			<div class="social-icons clear">
				<a href="//vimeo.com/grantex" target="_blank" class="trs-four"><i class="icon-vimeo"></i><span class="tooltip trs-four">Grant+Imbo</span></a>
				<a href="//soundcloud.com/grantimbo" target="_blank" class="trs-four"><i class="icon-soundcloud"></i><span class="tooltip trs-four">Grant+Imbo</span></a>
				<a href="//youtube.com/grantimbo" target="_blank" class="trs-four"><i class="icon-youtube"></i><span class="tooltip trs-four">Grant+Imbo</span></a>
				<a href="//codepen.com/grantex" target="_blank" class="trs-four"><i class="icon-codepen"></i><span class="tooltip trs-four">@grantimbo</span></a>
				<a href="//github.com/grantimbo" target="_blank" class="trs-four"><i class="icon-github"></i><span class="tooltip trs-four">@grantimbo</span></a>
				<a href="//plus.google.com/grantimbo" target="_blank" class="trs-four"><i class="icon-googleplus"></i><span class="tooltip trs-four">Grant+Imbo</span></a>
				<a href="//behance.com/grantex" target="_blank" class="trs-four"><i class="icon-pinterest"></i><span class="tooltip trs-four">@grantimbo</span></a>
				<a href="//facebook.com/grantex.studios" target="_blank" class="trs-four"><i class="icon-linkedin"></i><span class="tooltip trs-four">@grantimbo</span></a>
				<a href="//twitter.com/grantimbo" target="_blank" class="trs-four"><i class="icon-twitter"></i><span class="tooltip trs-four">@grantimbo</span></a>
				<a href="//behance.com/grantex" target="_blank" class="trs-four"><i class="icon-behance"></i><span class="tooltip trs-four">@grantex</span></a>
				<a href="//facebook.com/grantex.studios" target="_blank" class="trs-four"><i class="icon-facebook"></i><span class="tooltip trs-four">@grantex.studios</span></a>
			</div>
			<p class="copyright">Handcrafted with Passion by <b>Grant Imbo</b> &copy; <?php echo date('Y'); ?></p>
		</div>
	</main>
	<!-- /services -->
<?php get_footer(); ?>