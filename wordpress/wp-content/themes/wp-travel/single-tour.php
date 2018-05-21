<?php
/*
Template Name: Tour Page
Template Post Type: post, page
*/
get_header(); ?>

<?php $front__id = (int)(get_option( 'page_on_front' )); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <?php //edit_post_link(); ?>

  <article  id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
    <div class="page-title-wrap" style="background-image: url('<?php the_post_thumbnail_url( 'large'); ?>')" >
      <div class="container">
        <div class="page-title">
          <p class="h1"><?php the_title(); ?></p>
          <div class="subtitle">
            <div class="days"><?php the_field('tour_days'); ?> <?php the_field('tour_days_after'); ?></div>
            <div class="prise">
                        <span class="price"><?php echo number_format(get_field('tour_price', $slide_product),0,'',' '); ?></span>
                        <span class="currency"><?php if(get_field('tour_price', $slide_product)) the_field('tour_currency', $front__id); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container page-tabs">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1"><?php the_field('tab_desc_title'); ?></a></li>
            <li><a data-toggle="tab" href="#tab-2"><?php the_field('tab_include_title'); ?></a></li>
          </ul>
          <div class="tab-content-wrap">
            <div class="tab-content">
              <div id="tab-1" class="tab-pane fade in active col-md-10 col-md-offset-1">

                  <?php the_content(); ?>

              </div>

              <div id="tab-2" class="tab-pane fade col-md-10 col-md-offset-1">

                  <?php the_field('tab_include_cont'); ?>

              </div>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
    <?php $bg_map = get_field('map-holder'); ?>



    <?php if( have_rows('tour_locations') ): ?>
      <div class="container-fluid title-map">
        <div class="acf-map" data-icon="<?php echo get_template_directory_uri(); ?>/img/map-flag.png">
          <?php while ( have_rows('tour_locations') ) : the_row();

            $location = get_sub_field('location');

            ?>
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
              <p class="h4"><?php the_sub_field('title'); ?></p>
              <p class="address"><?php echo $location['address']; ?></p>
              <p><?php the_sub_field('description'); ?></p>
            </div>
        <?php endwhile; ?>
        </div>
      </div><!-- /.container -->
    <?php endif; ?>

    <div id="green_info">
      <div class="container green__alert">
        <div class="row">
          <div class="col-md-12">
            <?php the_field('tour_warnig'); ?>
            <div id="close_green__info" class="">&times;</div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div>
  </article>


  <?php if( have_rows('program_item') ): ?>
    <section class="tour-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="h3 tours-title"><?php the_field('program_title'); ?></p>
          </div>
        </div>
        <div class="row programs__wrapp">
          <div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-1 col-xs-12">

            <?php $i = 0; ?>
            <?php while ( have_rows('program_item') ) : the_row(); ?>
              <?php $i++; ?>


              <?php if( get_sub_field('program_day') ): ?>
                <div id="tour-<?php echo $i; ?>" class="tour-day">
                  <div class="row">
                    <div class="col-md-12 col-md-offset-0 col-sm-11 col-sm-offset-1">
                      <p class="h2 days-title"><?php the_sub_field('title'); ?></p>
                    </div>
                  </div>

                  <?php while ( have_rows('program_day') ) : the_row(); ?>
                    <p class="h3"><?php the_sub_field('day_title'); ?></p>

                    <?php if( get_sub_field('guide_langs') ): ?>
                      <div class="tours-langs">
                        <span><?php the_sub_field('guide_title'); ?></span>
                        <ul class="">
                          <?php while ( have_rows('guide_langs') ) : the_row(); ?>
                            <?php $flag_image = get_sub_field('flag'); ?>
                            <li>
                              <?php if ( !empty($flag_image)) { ?>
                                <img src="<?php echo $flag_image['url']; ?>" alt="<?php the_sub_field('title'); ?>">
                              <?php } ?>
                            </li>
                          <?php endwhile; ?>
                        </ul>
                      </div>
                    <?php endif; ?>

                    <?php $hotels_slider = get_sub_field('hotels_slider');?>
                    <?php if( $hotels_slider ):  ?>
                      <div class="hotels-slider-wrap">
                        <p class="h3"><?php the_sub_field('hotels_title'); ?></p>
                        <div class="row">
                          <div class="col-md-11 col-md-offset-0 col-sm-10 col-sm-offset-1">
                            <div class="hotels-slider owl-carousel">
                              <?php foreach( $hotels_slider as $post): ?>
                                <?php setup_postdata($post); ?>

                                <?php $thumb_link = ''; ?>
                                <?php if ( has_post_thumbnail()) { ?>
                                  <?php $thumb_link = get_the_post_thumbnail_url( 'medium'); ?>
                                <?php } else { ?>
                                  <?php $thumb_link =  catchFirstImage(); ?>
                                <?php } ?>

                                <div class="item">
                                  <div class="img-wrap ratio" style="background-image: url('<?php the_post_thumbnail_url( 'medium'); ?>'); " data-hkoef="0.85">
                                    <a href="#modalHotel" data-toggle="modal" class="hotel_btn tour_link" data-link="<?php the_permalink(); ?>" data-pageid="<?php the_ID(); ?>">
                                    <!-- <a class="tour_link" href="<?php the_permalink(); ?>"> --><span><?php the_field('more_btn_title', $front__id);?></span></a>
                                  </div>
                                  <div class="hotel-title"><?php the_title(); ?></div>
                                </div>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <?php if( get_sub_field('places_cont') ): ?>
                      <div class="showplace-wrap">
                        <?php while ( have_rows('places_cont') ) : the_row(); ?>
                          <div class="showplace">
                            <?php the_sub_field('place_cont'); ?>
                          </div>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>

                    <?php $places = get_sub_field('places');?>
                      <?php if( $places ):  ?>
                      <div class="showplace-wrap">
                        <?php foreach( $places as $post): ?>
                          <?php setup_postdata($post); ?>
                          <div class="showplace">
                            <p class="h3"><?php the_title(); ?></p>
                            <div class="img-wrap">
                              <?php if ( has_post_thumbnail()) { ?>
                                <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                              <?php } else { ?>
                                <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                              <?php } ?>
                            </div>
                            <div class="showplace-cont"><?php the_content(); ?></div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <?php wp_reset_postdata(); ?>
                    <?php endif; ?>



                  <?php endwhile; ?>
                </div><!-- .tour-day -->
              <?php endif; ?>
            <?php endwhile; ?>
          </div>

          <div class="col-sm-3 col-sm-offset-1 col-xs-12  side-nav___wrap">

            <div class="fixed_nav side-nav" id="sideScrollspy">
              <div id="sidebar_btn" class="fa fa-arrow-left"></div>
              <ul class="scroll-side-nav nav nav-pills nav-stacked">
                <?php $j = 0; ?>
                <?php $menu_class = 'active'; ?>
                <?php while ( have_rows('program_item') ) : the_row(); ?>
                  <?php $j++; ?>
                  <?php if($j > 1){ ?>
                    <?php $menu_class = ''; ?>
                  <?php } ?>

                  <li class="<?php echo $menu_class; ?>">
                    <a href="#tour-<?php echo $j; ?>"><?php the_sub_field('title'); ?></a>
                  </li>
                <?php endwhile; ?>
              </ul>

              <div class="side-form">
                <?php the_field('side_menu_content'); ?>
              </div>
            </div>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
  <?php endif; ?>

  <?php endwhile; endif; ?>

  <?php get_template_part('cont-form'); ?>


  <?php $tour_sliders = get_field('tours_sliders_list'); ?>
  <?php  if( !empty($tour_sliders) ): ?>

  <div id="exclusive_tours">
    <p class="h3"><?php the_field('exclusive_link_text', $front__id); ?></p>
  </div>

  <section class="tours-sliders">
    <div class="container">
    <?php foreach( $tour_sliders as $slider__id): ?>


      <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
          <div class="tours-title">
            <p class="h2"><?php echo get_the_title($slider__id); ?></p>
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
                    <p class="h3"><?php the_title(); ?></p>
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
                      <p class="h3"><?php the_sub_field('tile'); ?></p>
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



<?php get_footer(); ?>
