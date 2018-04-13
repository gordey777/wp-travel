<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
  <?php

  if( $categories = get_the_category( ) ) :

    foreach ( $categories as $key=>$cat ) :
      $cat__ID = $cat->cat_ID;
      $field_term = 'category_' . $cat__ID;
      $cat__type = get_field('cat_type', $field_term);

      if($cat__type === 'country') {
        $countryCats[$key] = $cat->name;
      }
      if($cat__type === 'tour_type') {
        $tourTupeCats[$key] = $cat->name;
      }
    endforeach;

    $countryList = implode(', ', $countryCats);
    $tourTupeList = implode(', ', $tourTupeCats);


    // foreach ( $categories as $cat ) :country
    //   $j++;
    //   if($j >= $catLangth || $catLangth == 1){
    //     $sep = '';
    //   }else{
    //     $sep = ', ';
    //   }
    //   $cat__ID = $cat->cat_ID;
    //   $field_term = 'category_' . $cat__ID;
    //   $cat__type = get_field('cat_type', $field_term);

    //   if($cat__type === 'tour_type') {
    //    $tourTupeList = $tourTupeList . $cat->name . $sep;
    //   }
    // endforeach;
  endif; ?>

      <div class="col-md-6 looper-wrap">
        <div id="post-<?php the_ID(); ?>" <?php post_class('looper'); ?>>
          <div class="img-wrap ratio" data-hkoef="0.48" style="background-image: url(' <?php if ( has_post_thumbnail()) {  echo the_post_thumbnail_url('medium');  } else {  echo catchFirstImage(); ?><?php } ?>');">
            <a class="tour_link" href="<?php the_permalink(); ?>"><span><?php the_field('more_btn_title', $front__id);?></span></a>
            <div class="tags"><?php echo $countryList;?></div>
            <div class="fav_wrap"><?php wpfp_link();?></div>
          </div>
          <div class="looper-cont-wrap">
            <div class="looper-cont">
              <h3><?php the_title(); ?> </h3>
              <div class="looper-price" data-price="<?php the_field('tour_price'); ?>"><span class="price"><?php echo number_format(get_field('tour_price', $slide_product),0,'',' '); ?></span> <span class="currency"><?php the_field('tour_currency', $front__id); ?></span></div>
            </div>
            <div class="looper-subcont">
              <div class="looper-time"><span><?php the_field('tour_days'); ?> <?php the_field('tour_days_after'); ?></span></div>
              <div class="looper-group"><span><?php the_field('tour_group'); ?></span></div>
              <div class="looper-intent"><span><?php echo $tourTupeList ; echo $results;?></span></div>
            </div>
          </div>
        </div><!-- .looper -->
      </div><!-- .looper-wrap -->


