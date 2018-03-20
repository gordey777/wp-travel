<?php /* Template Name: Home Page */ get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php //the_ID(); ?>
    <?php //post_class(); ?>

      <?php //the_title(); ?>

      <?php //edit_post_link(); ?>




  <?php if( have_rows('main_slider') ): ?>
    <div id="main-slider" class="owl-carousel container">
      <?php while ( have_rows('main_slider') ) : the_row(); ?>
        <?php $bg_image = get_sub_field('img'); ?>
        <div class="slide item" style="background: url(<?php if ( !empty($bg_image)) { echo $bg_image['url'];} ?>);">
          <div class="row">
            <div class="slider-cont-wrap col-xs-10 col-xs-offset-1">
              <div class="slider-cont">
                <?php if ( get_sub_field('title')) { ?>
                  <div class="title-wrap"><h2><?php the_sub_field('title'); ?></h2></div>
                <?php } ?>
                <?php if ( get_sub_field('days')) { ?>
                  <p class="time"><?php the_sub_field('days'); ?></p>
                <?php } ?>
                <?php if ( get_sub_field('price')) { ?>
                  <p class="price"><?php the_sub_field('price'); ?></p>
                <?php } ?>
              </div>
              <?php if ( get_sub_field('link')) { ?>
                <a href="<?php the_sub_field('link'); ?>" class="slide-link btn"><?php the_sub_field('btn_text'); ?></a>
              <?php } ?>
            </div>
          </div>
        </div><!-- .slide -->
      <?php  endwhile; ?>
    </div>
  <?php endif; ?>

<?php $front_tags = get_field('front_tags'); ?>
<?php $front_tags_search = get_field('front_tags_search'); ?>
<?php if($front_tags) { ?>
  <section class="search-tags">
    <div class="container">
      <div class="tags-line">
        <a href="<?php echo $front_tags[0]['link']; ?>" class="tag tag1"><?php echo $front_tags[0]['title']; ?></a>
        <a href="<?php echo $front_tags[1]['link']; ?>" class="tag tag2"><?php echo $front_tags[1]['title']; ?></a>
        <a href="<?php echo $front_tags[2]['link']; ?>" class="tag tag3"><?php echo $front_tags[2]['title']; ?></a>
      </div>
      <div class="tags-line">
        <a href="<?php echo $front_tags[3]['link']; ?>" class="tag tag4"><?php echo $front_tags[3]['title']; ?></a>
        <a href="<?php echo $front_tags_search[0]['link']; ?>" class="btn tag-search"><?php echo $front_tags_search[0]['title']; ?><i class="fa fa-search"></i></a>
        <a href="<?php echo $front_tags[4]['link']; ?>" class="tag tag5"><?php echo $front_tags[4]['title']; ?></a>
      </div>
      <div class="tags-line">
        <a href="<?php echo $front_tags[5]['link']; ?>" class="tag tag6"><?php echo $front_tags[5]['title']; ?></a>
        <a href="<?php echo $front_tags[6]['link']; ?>" class="tag tag7"><?php echo $front_tags[6]['title']; ?></a>
      </div>
    </div><!-- /.container -->
  </section>
<?php } ?>

  <?php $tour_sliders = get_field('tour_sliders'); ?>

  <?php  if( $tour_sliders ): ?>
  <section class="tours-sliders">
    <div class="container">
    <?php foreach( $tour_sliders as $slider__id): ?>


      <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
          <div class="tours-title">
            <h2><?php echo get_the_title($slider__id); ?></h2>
            <a href="" class="more-tours btn red-btn">Смотреть все</a>
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
                    <a href="<?php the_permalink(); ?>"><span>Подробнее</span></a>
                  </div>
                  <div class="tours-cont">
                    <h3><?php the_title(); ?></h3>
                    <div class="tours-subcont">
                      <div class="tour-tags">
                        <?php  if( $categories = get_the_category( ) ) :

                              $catLangth = count($categories);
                              $i = 0;
                              $sep = ', ';

                           foreach ( $categories as $cat ) :
                                $i++;
                                if($i >= $catLangth || $i == 1){
                                  $sep = '';
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
                      <div class="tour-price"><?php the_field('tour_price'); ?> <span class="currency">$</span></div>
                      <div class="tour-time"><?php the_field('tour_days'); ?> <?php the_field('tour_days_after'); ?></div>
                    </div>
                  </div>
                </div><!-- .item -->
          <?php endforeach; ?>


          <?php wp_reset_postdata(); ?>


              <?php if( have_rows('prods_delivery', $lending__id) ): ?>

                  <?php while ( have_rows('prods_delivery', $lending__id) ) : the_row(); ?>
                    <?php $image = get_sub_field('icon'); ?>
                      <?php if ( !empty($image)) { ?>
                        <img src="<?php echo $image['url']; ?>" alt="" />
                      <?php } ?>
                    <?php the_sub_field('delivery_title'); ?>
                  <?php  endwhile; ?>


                <div class="tour item">
                  <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                    <a href="#"><span>Подробнее</span></a>
                  </div>
                  <div class="tours-cont">
                    <h3>Дикая Африка</h3>
                    <div class="tours-subcont">
                      <div class="tour-tags">
                        <?php $posttags = get_the_tags();
                        if ($posttags) {
                          foreach($posttags as $tag) {
                          echo $tag->name . ', ';
                          }
                        } ?>
                      </div>
                      <div class="tour-price">230 000 руб.</div>
                      <div class="tour-time">7 дней</div>
                    </div>
                  </div>
                </div><!-- .item -->



              <?php endif; ?>

          </div>
        </div>
      </div><!-- /.row -->

    <?php endforeach; ?>
    </div><!-- /.container -->
  </section>
  <?php endif; ?>





  <section class="content-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 content">
          <?php the_content(); ?>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>







<?php if (get_field('home_cont_form')) { ?>
  <section class="section-form">
    <div class="container dark-cont">
      <div class="row">
                <?php $form__code = get_field('home_cont_form'); ?>
                <?php echo do_shortcode($form__code); ?>

      </div><!-- /.row -->

    </div><!-- /.container -->
  </section>
<?php } ?>



  <?php endwhile; endif; ?>


<?php get_footer(); ?>
