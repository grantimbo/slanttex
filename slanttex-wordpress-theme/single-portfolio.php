<?php get_header(); ?>
<main class="portfolio-container">
    <header class="portfolio-header trs-four">
        <?php get_template_part('navigation'); ?>
    </header>

    <section class="portfolio-content portfolio-single">
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="project-details">
                    <div class="project-title"><?php the_title(); ?></div>
                    <div class="project-desc"><?php the_excerpt(); ?></div>
                    <div class="project-date"><?php echo get_the_date(); ?></div>
                    <div class="project-stats clear">
                        <div class="stat-info" title="Views"><i class="icon-eye"></i><?php echo do_shortcode('[post_view]'); ?></div>
                        <div class="stat-info" title="Comments"><i class="icon-chat"></i><?php comments_number( '0', '1', '%' ); ?></div>
                        <div class="stat-info">
                            <script>
                                (function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=249975551830481";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                            </script>
                            <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></div>
                        <div class="stat-info">
                        	<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
                        	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                    </div>
                </header>
                <section class="project-content">
                    <?php the_content(); ?>
                </section>
                <footer class="project-footer">

                    <?php
                    
                        $next_post = get_next_post();
                        $prev_post = get_previous_post(); 


                        if (!empty( $next_post )): ?>
                        <a class="next-post post-link" href="<?php echo get_permalink( $next_post->ID ); ?>" title="Next"><i class="icon-chevron-right"></i></a>
                   
                    <?php endif;

                        if (!empty( $prev_post )): ?>
                        <a class="prev-post post-link" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="Previous"><i class="icon-chevron-left"></i></a>
                    
                    <?php endif; ?>

                    <?php /*
					<div class="other-projects">
                         <h3>Other Projects</h3>
                        <?php $args = array( 'numberposts' => '4', 'orderby' => 'rand', 'post_type' => 'portfolio');
                            $recent_posts = wp_get_recent_posts( $args );
                            foreach( $recent_posts as $recent ){
                                echo '<div class="featured-prj"><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   get_the_post_thumbnail($recent["ID"], 'thumbnail') .'</a></div> ';
                            } ?>
                        <div class="clear"></div>
                    </div>
                    */ ?>
                    <?php /* printLikes(get_the_ID()); */ ?>

                    <?php comments_template(); ?>
                </footer>                
            </article>
        <?php endwhile; endif; ?>
    </section><!-- .portfolio-content -->
</main>
<?php get_footer(); ?>

