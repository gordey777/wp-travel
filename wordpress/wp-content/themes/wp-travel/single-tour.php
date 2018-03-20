<?php
/*
Template Name: Tour Page
Template Post Type: post, page
*/
get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <?php //edit_post_link(); ?>

  <article  id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
    <div class="container page-title-wrap" style="background-image: url('<?php the_post_thumbnail_url( 'medium'); ?>')" >
      <div class="page-title">
        <h1><?php the_title(); ?></h1>
        <div class="subtitle">
          <div class="days"><?php the_field('tour_days'); ?> <?php the_field('tour_days_after'); ?></div>
          <div class="prise"><span class="price"><?php the_field('tour_price'); ?></span> <span class="currency">$</span></div>
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
              <div id="tab-1" class="tab-pane fade in active col-md-10 col-md-offset-1 col-xs-6">

                  <?php the_content(); ?>

              </div>

              <div id="tab-2" class="tab-pane fade col-md-10 col-md-offset-1 col-xs-6">

                  <?php the_field('tab_include_cont'); ?>

              </div>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
    <?php $bg_map = get_field('map-holder'); ?>
    <?php if ( $bg_map) { ?>
      <div class="container title-map" style="background: url(<?php echo $bg_map['url']; ?>);"></div><!-- /.container -->
    <?php } ?>
    <div class="container green__alert">
      <div class="row">
        <div class="col-md-12">
          <?php the_field('tour_warnig'); ?>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </article>


  <?php if( have_rows('program_item') ): ?>
    <section class="tour-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="tours-title"><?php the_field('program_title'); ?></h3>
          </div>
          <div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-1 col-xs-8">

            <?php $i = 0; ?>
            <?php while ( have_rows('program_item') ) : the_row(); ?>
              <?php $i++; ?>


              <?php if( get_sub_field('program_day') ): ?>
                <div id="tour-<?php echo $i; ?>" class="tour-day">
                  <h2 class="days-title"><?php the_sub_field('title'); ?></h2>
                  <?php while ( have_rows('program_day') ) : the_row(); ?>
                    <h3><?php the_sub_field('day_title'); ?></h3>

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
                        <h3><?php the_sub_field('hotels_title'); ?></h3>
                        <div class="row">
                          <div class="col-md-11 hotels-slider owl-carousel">
                            <?php foreach( $hotels_slider as $post): ?>
                              <?php setup_postdata($post); ?>

                              <?php $thumb_link = ''; ?>
                              <?php if ( has_post_thumbnail()) { ?>
                                <?php $thumb_link = get_the_post_thumbnail_url( 'medium'); ?>
                              <?php } else { ?>
                                <?php $thumb_link =  catchFirstImage(); ?>
                              <?php } ?>

                              <div class="item">
                                <div class="img-wrap ratio" style="background-image: url('<?php the_post_thumbnail_url( 'medium'); ?>'); " data-hkoef="0.85"></div>
                                <div class="hotel-title"><?php the_title(); ?></div>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </div>
                      <?php wp_reset_postdata(); ?>
                    <?php endif; ?>


                    <?php $places = get_sub_field('places');?>
                      <?php if( $places ):  ?>
                      <div class="showplace-wrap">
                        <?php foreach( $places as $post): ?>
                          <?php setup_postdata($post); ?>
                          <div class="showplace">
                            <h3><?php the_title(); ?></h3>
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

          <div class="col-xs-3 col-xs-offset-1" >
            <div class="fixed_nav side-nav" id="sideScrollspy">
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
                <h2>от 250 000 р/чел</h2>
                <p>Закажите обратный звонок, свяжитесь с оператором в онлайн-чате, или</p>
                <a href="#" class="side-link btn">Оформите заявку онлайн</a>
              </div>
            </div>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
  <?php endif; ?>



  <?php endwhile; endif; ?>


<?php get_footer(); ?>
