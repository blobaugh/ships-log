<div class="ship-details">
		<?php if( $thumbnail = get_the_post_thumbnail( $ship->ID, 'thumbnail', array( 'class' => 'alignleft' ) ) ) {
			echo $thumbnail;
		} ?>

	<div class="ship-head">
		<a href="<?php echo get_the_permalink( $ship->ID ); ?>"><?php echo $ship->post_title; ?></a>
		<br/>
		<small>
			<?php echo $ship->YearBuilt . ' ' . $ship->Make . ' ' . $ship->Model; ?>
		</small>
	</div>
	<div class="ship-body">
		<?php echo $ship->post_content; ?>
	</div>

	<div class="ship-foot">
		<small>
			<a href="<?php echo get_the_permalink( $ship->ID ); ?>">Read more about <?php echo $ship->post_title; ?></a>
		</small>
	</div>
</div>
