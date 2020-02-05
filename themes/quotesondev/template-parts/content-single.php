<?php
/**
 * Template part for displaying single posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content();
		$meta_source=get_post_meta(get_the_ID(),'_qod_quote_source',true);
		$meta_source_url=get_post_meta(get_the_ID(),'_qod_quote_source_url',true);

		if ( $meta_source) {
		   echo "<a href='" .  $meta_source_url ."'>" . $meta_source ."</a>";
		}; ?>
		
	</div><!-- .entry-content -->
</article><!-- #post-## -->
