<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>
            <section>

                <?php
                    $args = array( 'post_type' => 'post', 'numberposts'=>'999');
                    $quote_posts = get_posts( $args ); // returns an array of posts
                    ?>
                    
                        <?php foreach ( $quote_posts as $post ) : setup_postdata( $post ); ?>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    
                 <?php endforeach; wp_reset_postdata(); ?>

                
            </section>    
            <br>
            <section>
            <?php
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC'
                ) );
                
                foreach( $categories as $category ):?>
                <a href='<?php echo get_category_link( $category->term_id ) ?>'><?php echo $category->name;?></a>
                <?php endforeach; ?>
            </section>
            <br>
            <section>
                <?php
                $tags = get_tags();
                foreach ( $tags as $tag ):?>
                <a href='<?php echo get_tag_link( $tag->term_id ) ?>'><?php echo $tag->name;?></a>
                <?php endforeach; ?>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
