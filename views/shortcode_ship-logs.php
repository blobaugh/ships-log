<?php
/*
 * Template for the ship-logs shortcode
 *
 * To create your own simply copy this file to the theme
 *
 * Logs are stored in $posts as a WP_Query result
 */

?>
<div class="shortcode_ship-log">
<?php

if( $posts->have_posts() ) {
	while( $posts->have_posts() ) {
		$posts->the_post();

		?>
		<article>
			<h2><a href="<?php echo get_permalink( get_the_ID() ); ?>" title="<?php esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a></h2>

			<?php 
				if( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
			?>

			<?php the_excerpt(); ?>

		</article>

		<?php
	}
} else {
	_e( 'No ship log entries found.', 'blshiplog' );
}

?>
</div> <!-- End shortcode_ship-log -->
