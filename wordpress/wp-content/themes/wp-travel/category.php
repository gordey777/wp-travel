<?php get_header(); ?>
  <?php $cat__ID = get_queried_object()->cat_ID; ?>
  <?php $field_term = 'category_' . $cat__ID; ?>
  <?php $front__id = (int)(get_option( 'page_on_front' )); ?>

  <div class="container content-page">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h1 class="page-title inner-title"><?php if( is_category() ) echo get_queried_object()->name; ?></h1>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->

  <section class="searh-resolt">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1">

          <div class="row searh-resolt-wrap">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <?php if(get_page_template_slug() === 'single-tour.php'){
                  get_template_part('search-loop');
                } else{
                  get_template_part('loop');
                } ?>
            <?php endwhile; endif; ?>
          </div><!-- /.row -->
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>

  <section class="section-form">
    <div class="container dark-cont">
                <?php $form__code = get_field('home_cont_form', $front__id); ?>
                <?php echo do_shortcode($form__code); ?>
    </div><!-- /.container -->
  </section>

<?php get_footer(); ?>

