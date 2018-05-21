<?php get_header(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <p class="h1"><?php _e( 'Page not found', 'wpeasy' ); ?></p>
    <p class="h2"><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'wpeasy' ); ?></a></p>

  </article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
