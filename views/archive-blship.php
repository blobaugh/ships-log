<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<article <?php post_class(); ?>>
<h2><b><a href="<?php the_permalink(); ?>">  <?php the_title(); ?> </a></b></h2>
<?php 

    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); 
    echo '<img src="' . $large_image_url[0] . '" />';
    
?>
<?php the_excerpt(); ?>

</article>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>