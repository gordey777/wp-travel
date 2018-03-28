<?php /* Template Name: Search Page */ get_header(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
  <?php
//categoryec array
  $args = array(
    'type'         => 'post',
    'child_of'     => 0,
    'parent'       => '',

    'orderby'     => 'name',
    'order'       => 'DESC',
    'hide_empty'   => false,
    'hierarchical' => 1,
    'exclude'      => '',
    'include'      => '',
    'number'       => 0,
    'taxonomy'     => 'category',
    'pad_counts'   => false,

  );
//get pre settings
  $fiilter_set = get_field('set_search_filter');
  $months_set = get_field('set_months_filter');
  if(!empty($months_set)){
    foreach($months_set as $key => $var){
      $monthArr[$key] = (int)$var;
    }
  }



//args of pre settings
  $tours_cat = '';
  if($fiilter_set){
    foreach($fiilter_set as $key => $var){
      $field_term = 'category_' . $var;
      $cat__type = get_field('cat_type', $field_term);
      if($cat__type === 'region') {
        $catRegionArray[$key] = $var;
      } else if($cat__type === 'country') {
        $catCountryArray[$key] = $var;
      } else if($cat__type === 'tour_type') {
        $catTourTypeArray[$key] = (int)$var;
      }
    }

    if(($catRegionArray[0] != 0) && ($catCountryArray[0] != 0) ){
      $tours_cat = $catCountryArray;
    } else if(($catRegionArray[0] != 0) && ($catCountryArray[0] == 0) ){
      $tours_cat = $catRegionArray;
    } else if(($catRegionArray[0] == 0) && ($catCountryArray[0] != 0) ){
      $tours_cat =  $catCountryArray;
    }
  }

  $bunners = get_field('search_bunners');

  if($bunners){
    $per_page = -1;
  }else{
    $per_page = -1;
  }
//set args to qury post
  $tours_args = array(
    'cat' => $tours_cat,
    //'meta_key'      => 'tour_price',
    //'orderby'     => 'meta_value',
    'order'       => 'DESC',
    'posts_per_page' => $per_page,
    //'meta_value' => 'single-tour.php',
  );
  $tours_args['meta_key'] =  'tour_price';
  $tours_args['orderby'] =  'meta_value';

//GET FRONT PAGE ID
  $front__id = (int)(get_option( 'page_on_front' ));
//if bunners


 ?>
  <section class="section-search-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><?php the_title(); ?></h1>
            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
              <div class="form-wrap">

                <div class="input-wrapp big" data-placeholder="<?php the_field('ph_reg_filter', $front__id); ?>">
                  <div class="select-title"><?php the_field('title_reg_filter', $front__id); ?></div>

                    <?php if( $categories = get_categories( $args ) ) : ?>
                        <select class="multisel" id="regionfilter" name="regionfilter[]" multiple="multiple">

                          <?php foreach ( $categories as $cat ) :

                              $cat__ID = $cat->cat_ID;
                              if (!empty($fiilter_set) && in_array($cat__ID, $fiilter_set)){
                                $select = 'selected';
                              }else{
                                $select = '';
                              }
                              $field_term = 'category_' . $cat__ID;
                              $cat__type = get_field('cat_type', $field_term);
                              if($cat__type === 'region') {
                                  echo '<option value="' . $cat->name . '" '.$select.'>' . $cat->name . '</option>';
                              } ?>
                          <?php endforeach; ?>
                        </select>
                      <?php endif; ?>

                </div>

                <div class="input-wrapp big" data-placeholder="<?php the_field('ph_country_filter', $front__id); ?>">
                  <div class="select-title"><?php the_field('title_country_filter', $front__id); ?></div>

                    <?php if( $categories = get_categories( $args ) ) : ?>

                        <select class="multisel" id="countryfilter" name="countryfilter[]" multiple="multiple">

                          <?php foreach ( $categories as $cat ) :

                              $cat__ID = $cat->cat_ID;

                              if (!empty($fiilter_set) && in_array($cat__ID, $fiilter_set)){
                                $select = 'selected';
                              }else{
                                $select = '';
                              }
                              $field_term = 'category_' . $cat__ID;
                              $cat__type = get_field('cat_type', $field_term);
                              if($cat__type === 'country') {
                                  echo '<option value="' . $cat->name . '" '.$select.'>' . $cat->name . '</option>';
                              } ?>

                          <?php endforeach; ?>
                        </select>
                      <?php endif; ?>

                </div>

                <div class="input-wrapp med-s" data-placeholder="<?php the_field('ph_month_filter', $front__id); ?>">
                  <div class="select-title"><?php the_field('title_month_filter', $front__id); ?></div>

                    <select class="multisel" id="monthfilter" name="monthfilter[]" multiple="multiple">

                      <?php
                      $i = 1;
                      while ($i <= 12){
                        if (!empty($months_set) && in_array($i, $months_set)){
                          $select = 'selected';
                        }else{
                          $select = '';
                        }
                        $monthPre = strftime("%B", mktime(0, 0, 0, $i, 1, 1999) );
                        $month =  __( $monthPre );
                        echo '<option value="' . $i . '" '.$select.'>' . $month . '</option>';
                        $i++;
                      }
                      ?>

                    </select>
                  <!-- </label> -->
                </div>

                <div class="input-wrapp med" data-placeholder="">
                  <div class="select-title"><?php the_field('title_intent_filter', $front__id); ?></div>

                    <?php if( $categories = get_categories( $args ) ) : ?>
                        <select class="multisel" id="tourtypefilter" name="tourtypefilter[]" multiple="multiple">
                          <?php foreach ( $categories as $cat ) :
                              $cat__ID = $cat->cat_ID;
                              if (!empty($fiilter_set) && in_array($cat__ID, $fiilter_set)){
                                $select = 'selected';
                              }else{
                                $select = '';
                              }
                              $field_term = 'category_' . $cat__ID;
                              $cat__type = get_field('cat_type', $field_term);
                              if($cat__type === 'tour_type') {
                                  echo '<option value="' . $cat->cat_ID . '" '.$select.'>' . $cat->name . '</option>';
                              } ?>
                          <?php endforeach; ?>
                        </select>
                      <?php endif; ?>
                </div>

                <?php if( have_rows('days_filter_settings', $front__id) ): ?>
                  <div class="input-wrapp med-s" data-placeholder="">
                    <div class="select-title"><?php the_field('title_days_filter', $front__id); ?></div>
                      <select name="daysfilter[]" id="daysfilter" class="multisel" multiple="multiple">
                        <?php while ( have_rows('days_filter_settings', $front__id) ) : the_row(); ?>
                          <option value="<?php the_sub_field('day_min'); ?>;<?php the_sub_field('day_max'); ?>"><?php the_sub_field('day_label'); ?></option>
                        <?php  endwhile; ?>
                      </select>
                  </div>
                <?php endif; ?>

                <?php if( have_rows('currency_settings', $front__id) ): ?>
                  <div class="input-wrapp small">
                    <div class="select-title"><?php the_field('title_currency_filter', $front__id); ?></div>
                    <label class="custom-select" for=" ">
                      <select name="currency-filter" id="currency-filter">
                        <?php while ( have_rows('currency_settings', $front__id) ) : the_row(); ?>
                          <option value="<?php the_sub_field('curr_coef'); ?>;<?php the_sub_field('curr_label'); ?>"><?php the_sub_field('curr_name'); ?> <?php the_sub_field('curr_label'); ?></option>
                        <?php  endwhile; ?>
                      </select>
                    </label>
                  </div>
                <?php endif; ?>

                <div class="input-wrapp btn-wrap">
                  <button class="btn form-search" type="submit" ><?php the_field('title_filter_btn', $front__id); ?> <i class="fa fa-search"></i></button>
                </div>

                <input type="hidden" name="action" value="myfilter">
              </div>
          </form>

        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>

  <section class="searh-resolt">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
          <div id="nothing_find" >
            <?php the_field('content_nothing_found', $front__id); ?>
          </div>
          <div  id="response" class="row searh-resolt-wrap">
            <?php

            $query = new WP_Query( $tours_args );

            if( $query->have_posts() ) :
              $j = 0;
              while( $query->have_posts() ): $query->the_post();
                $monthCompare = true;
                if( $monthArr ){ // if set month filter
                  $monthCompare = false;
                  $monthPost = get_field('tour_months_chekbox');
                  if( !empty(array_intersect($monthPost,  $monthArr))){
                      $monthCompare = true;
                    }
                }

                if(get_page_template_slug() === 'single-tour.php' && $monthCompare){
                    if( ($catTourTypeArray[0] != 0) ){
                      if(in_category($catTourTypeArray) ){
                        get_template_part('search-loop');

                      }
                    }else{
                      get_template_part('search-loop');
                    }
                }
                if($j == 2 && $bunners[0]){ echo '<div class="col-md-6 bunner bunner-1">'.$bunners[0]['bunner'].'</div>';}
                if($j == 5 && $bunners[1]){ echo '<div class="col-md-6 bunner bunner-2">'.$bunners[1]['bunner'].'</div>';}
                if($j == 5 && $bunners[2]){ echo '<div class="col-md-6 bunner bunner-3">'.$bunners[2]['bunner'].'</div>';}
                if($j == 9 && $bunners[3]){ echo '<div class="col-md-6 bunner bunner-4">'.$bunners[3]['bunner'].'</div>';}

                $j++;
              endwhile;

              wp_reset_postdata();
            endif;?>
          </div><!-- /.row -->

        </div>

      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>


  <section class="content-section">
    <div class="container">



      <div class="row">
        <div class="col-md-10 col-md-offset-1 content">
          <?php //the_content(); ?>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>


  <?php get_template_part('cont-form'); ?>


  <?php $tour_sliders = get_field('search_tours_sliders'); ?>

  <?php  if( !empty($tour_sliders) ): ?>
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
                        <span class="currency"><?php the_field('tour_currency'); ?></span>
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



<?php get_footer(); ?>
