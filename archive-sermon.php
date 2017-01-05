<?php

/* Template Name: Sermon Index */

wp_enqueue_style( 'archive-sermon', get_template_directory_uri() . '/archive-sermon.css', false, '0', 'all');

get_header();

?>

<div id="content-archive">
    <?php
    $series=get_terms('series');
    foreach($series as $s) { ?>
	<div class="series">
	    <?php echo '<h1 class="title">' . $s->name . '</h1>';

	    echo '<div class="description">' . $s->description . '</div>';

	    $args=array(
		'post_type' => 'sermon',
		'taxonomy' => $s->taxonomy,
		'term' => $s->slug,
		'ignore_sticky_posts'=>1
	    );
	    $sermons=new WP_Query($args);
	    if ($sermons->have_posts()) {
		while($sermons->have_posts()) {
		    $sermons->the_post() ?>
		<div class="sermon">
		    <?php the_title( '<h3>', '</h3>' );
		    the_content(); ?>
		</div>
	    <?php }
	    } ?>
	</div>
	<hr>
    <?php } ?>
</div>

<?php get_footer(); ?>
