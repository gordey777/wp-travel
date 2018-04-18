<?php get_header(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>


  <?php if( have_rows('main_slider', $front__id) ): ?>
    <div id="main-slider" class="owl-carousel">
      <?php while ( have_rows('main_slider', $front__id) ) : the_row(); ?>

        <?php //color & bg-color
        if ( get_sub_field('color_title')) {
          $color_title = 'color: '. get_sub_field('color_title').';';
        }
        if ( get_sub_field('color_title_bg')) {
          $color_title_bg = 'background-color: '. get_sub_field('color_title_bg').';';
        }
        if ( get_sub_field('color_days')) {
          $color_days = 'color: '. get_sub_field('color_days').';';
        }
        if ( get_sub_field('color_days_bg')) {
          $color_days_bg = 'background-color: '. get_sub_field('color_days_bg').';';
        }
        if ( get_sub_field('color_price')) {
          $color_price= 'color: '. get_sub_field('color_price').';';
        }
        if ( get_sub_field('color_price_bg')) {
          $color_price_bg = 'background-color: '. get_sub_field('color_price_bg').';';
        }
        if ( get_sub_field('color_button')) {
          $color_button = 'color: '. get_sub_field('color_button').';';
        }
        if ( get_sub_field('color_button_bg')) {
          $color_button_bg = 'background: '. get_sub_field('color_button_bg').';';
        }
        ?>

        <?php $bg_image = get_sub_field('img'); ?>
        <div class="slide item" style="background-image: url(<?php if ( !empty($bg_image)) { echo $bg_image['url'];} ?>);">
        <div class="container">
          <div class="row">
            <div class="slider-cont-wrap col-xs-10 col-xs-offset-1">
              <div class="slider-cont">
                <?php if ( get_sub_field('title')) { ?>
                  <div class="title-wrap"><h2 style="<?php echo $color_title; ?><?php echo $color_title_bg; ?>"><?php the_sub_field('title'); ?></h2></div>
                <?php } ?>
                <?php if ( get_sub_field('days')) { ?>
                  <p class="time" style="<?php echo $color_days; ?><?php echo $color_days_bg; ?>"><?php the_sub_field('days'); ?></p>
                <?php } ?>
                <?php if ( get_sub_field('price')) { ?>
                  <p class="price" style="<?php echo $color_price; ?><?php echo $color_price_bg; ?>"><?php the_sub_field('price'); ?></p>
                <?php } ?>
              </div>
              <?php if ( get_sub_field('link')) { ?>
                <a href="<?php the_sub_field('link'); ?>" class="slide-link btn"  style="<?php echo $color_button; ?><?php echo $color_button_bg; ?>"><?php the_sub_field('btn_text'); ?></a>
              <?php } ?>
            </div>
          </div>
          </div>
        </div><!-- .slide -->
      <?php  endwhile; ?>
    </div>
  <?php endif; ?>


  <?php if( get_field('page_search_form_active') && get_field('page_search_form_position') ): ?>
    <?php get_template_part('tours-searchform'); ?>
  <?php endif; ?>



  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1"><h1 class="page-title inner-title"><?php the_title(); ?></h1><?php edit_post_link(); ?></div>

        </div><!-- /.row -->
      </div><!-- /.container -->
      <?php if(get_field('content_wrapper')){ ?>
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
      <?php } ?>

        <?php the_content(); ?>

      <?php if(get_field('content_wrapper')){ ?>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container -->
      <?php } ?>

    </article>
  <?php endwhile; endif; ?>



  <?php $tour_sliders = get_field('page_tours_slider'); ?>

  <?php  if( !empty($tour_sliders) ): ?>




  <section class="tours-sliders">
    <div class="container">
    <?php foreach( $tour_sliders as $slider__id): ?>


      <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
          <div class="tours-title">
            <h2><?php echo get_the_title($slider__id); ?></h2>
            <a href="<?php the_field('more_tours_link', $slider__id); ?>" class="more-tours btn red-btn"><?php the_field('more_tours_link_text', $slider__id); ?></a>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1">
          <div class="tours-slider owl-carousel">
            <?php $slider_obj = get_field('tours_slider', $slider__id); ?>

            <?php $slider_args = array(
              'numberposts' => 4,
              'orderby'     => 'date',
              'order'       => 'DESC',
              'include'     => $slider_obj,
              'post_type'   => 'post',

            );
            $slider_posts = get_posts( $slider_args ); ?>
            <?php foreach( $slider_posts as $post): ?>
              <?php setup_postdata($post); ?>
                <?php $thumb_link = ''; ?>
                <?php if ( has_post_thumbnail()) { ?>
                  <?php $thumb_link = get_the_post_thumbnail_url( 'medium'); ?>
                <?php } else { ?>
                  <?php $thumb_link =  catchFirstImage(); ?>
                <?php } ?>


                <div id="tour-<?php the_ID(); ?>" <?php post_class('tour item'); ?>>
                  <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php the_post_thumbnail_url( 'medium'); //echo $thumb_link; ?>');">
                    <a href="<?php the_permalink(); ?>"><span><?php the_field('more_btn_title', $front__id);?></span></a>
                  </div>
                  <div class="tours-cont">
                    <h3><?php the_title(); ?></h3>
                    <div class="tours-subcont">
                      <div class="tour-tags">
                        <?php  if( $categories = get_the_category( ) ) :

                              $catLangth = count($categories);
                              $i = 1;

                           foreach ( $categories as $cat ) :
                                $i++;
                                if($i >= $catLangth || $catLangth == 1){
                                  $sep = '';
                                }else{
                                  $sep = ', ';
                                }
                               $cat__ID = $cat->cat_ID;
                               $field_term = 'category_' . $cat__ID;
                               $cat__type = get_field('cat_type', $field_term);
                               if($cat__type === 'country') {
                                 echo $cat->name . $sep;
                               }
                           endforeach;
                         endif; ?>
                      </div>
                      <div class="tour-price">
                        <span class="price"><?php echo number_format(get_field('tour_price', $slide_product),0,'',' '); ?></span>
                        <span class="currency"><?php if(get_field('tour_price', $slide_product)) the_field('tour_currency', $front__id); ?></span>
                      </div>
                      <div class="tour-time"><?php the_field('tour_days'); ?> <?php the_field('tour_days_after'); ?></div>
                    </div>
                  </div>
                </div><!-- .item -->
          <?php endforeach; ?>

          <?php wp_reset_postdata(); ?>

            <?php if( have_rows('last_tours_slide', $slider__id) ): ?>
                <?php while ( have_rows('last_tours_slide', $slider__id) ) : the_row(); ?>
                  <?php $image = get_sub_field('img'); ?>
                  <div class="tour item last-slide">
                    <div class="img-wrap">
                      <?php if ( !empty($image)) { ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('tile'); ?>">
                      <?php } ?>
                    </div>
                    <div class="content">
                      <h3><?php the_sub_field('tile'); ?></h3>
                      <a href="<?php the_sub_field('link'); ?>" class="btn gray-btn"><?php the_sub_field('button_label'); ?> <i class="fa fa-chevron-right"></i></a>
                    </div>
                  </div><!-- .item -->
                <?php  endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
      </div><!-- /.row -->

    <?php endforeach; ?>
    </div><!-- /.container -->
  </section>
  <?php endif; ?>



  <?php if( get_field('page_search_form_active') && !get_field('page_search_form_position') ): ?>
    <?php get_template_part('tours-searchform'); ?>
  <?php endif; ?>

  <?php get_template_part('cont-form'); ?>





<?php get_footer(); ?>
