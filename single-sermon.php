<?php

/* Template Name: Single Sermon */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

wp_enqueue_style( 'sermon', get_template_directory_uri() . '/sermon.css', false, '0', 'all');

get_header(); ?>

<div id="content" role="main">

    <?php get_template_part( 'loop-header', get_post_type() ); ?>

    <?php if ( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
	    <div id="post-<?php the_ID(); ?>">
		<div class="post-entry">
		    <?php echo "<h1>" . get_the_title() . "</h1>"; ?>
		    <?php
		    include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
		    if( is_plugin_active('responsivepro-plugin/index.php')){
			responsivepro_plugin_featured_image();
		    }
		    the_content(); ?>

		    <?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
		</div><!-- end of .post-entry -->

		<div class="navigation">
		    <div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
		    <div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
		</div><!-- end of .navigation -->

		<?php responsive_entry_bottom(); ?>
	    </div><!-- end of #post-<?php the_ID(); ?> -->

	<?php
	endwhile;

	get_template_part( 'loop-nav', get_post_type() );

	else :

	get_template_part( 'loop-no-posts', get_post_type() );

	endif;
	?>

</div><!-- end of #content -->

<?php get_footer(); ?>
