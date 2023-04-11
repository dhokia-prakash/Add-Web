<?php
/*
Template Name: Full-width page layout
Template Post Type: resource
*/
?>
<?php get_header();?>

        <div class="categories">
	<span> Resource Type filter</span>
            <ul>
            <?php 
           
            $categories = get_terms( 'resource_type' );

            foreach($categories as $cat) : ?>
                <li class="js-filter-item"><a data-type="<?= $cat->term_id; ?>" href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a></li>
            <?php endforeach; ?>
            </ul>
	<span> Resource Topic filter</span>
            <ul>
            <?php 
           
            $categories = get_terms( 'resource_topic' );

            foreach($categories as $cat) : ?>
                <li class="js-filter-item"><a data-topic="<?= $cat->term_id; ?>" href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>


	<div class="js-filter">
	<?php
	$loop = new WP_Query( array( 'post_type' => 'resource', 'posts_per_page' => 9 ) );

	while ( $loop->have_posts() ) : $loop->the_post(); 
	 $terms = get_the_terms( $post->ID, 'resource_type' );
 	
	?>

	<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
	
	<div class="entry-content">
	<?php the_content(); ?>
	<?php
	foreach ( $terms as $term ) {
            echo $term->name;
        } 
	?>
	</div>
	<?php endwhile; ?>
	</div>
<?php get_footer();?>
