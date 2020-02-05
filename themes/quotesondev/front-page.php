<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div id="quotes">
            <?php
                $args = array( 'post_type' => 'post', 'orderby' => 'rand','order' => 'ASC', 'numberposts' => 1);
                $quote_posts = get_posts( $args ); // returns an array of posts
                ?>
                
                    <?php foreach ( $quote_posts as $post ) : setup_postdata( $post ); ?>
                    <p ><a class="front-quotes" href="<?php the_permalink(); ?>"><?php the_content(); ?></a></p>
                    <?php the_title(); ?>
                    
                    <?php
                    $meta_source=get_post_meta(get_the_ID(),'_qod_quote_source',true);
                    $meta_source_url=get_post_meta(get_the_ID(),'_qod_quote_source_url',true);
            
                    if ( $meta_source) {
                       echo "<a href='" .  $meta_source_url ."'>" . $meta_source ."</a>";
                    }; ?>
             <?php endforeach; wp_reset_postdata(); ?>
              </div>      
                    <button id="btn">SHOW ME ANOTHER!</button>





		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
