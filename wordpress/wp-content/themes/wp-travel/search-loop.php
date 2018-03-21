
  <?php   // if(is_page_template('single-tour.php')){

   if( $categories = get_the_category( ) ) :
    $countryList = '';
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
         $countryList = $countryList . $cat->name . $sep;
       }
    endforeach;
  endif; ?>




      <div class="col-md-6 ">
        <div id="post-<?php the_ID(); ?>" <?php post_class('looper'); ?>>
          <div class="img-wrap ratio" data-hkoef="0.48" style="background-image: url(' <?php if ( has_post_thumbnail()) {  echo the_post_thumbnail_url('medium');  } else {  echo catchFirstImage(); ?><?php } ?>');">
            <a href="<?php the_permalink(); ?>"><span>Подробнее</span></a>
            <div class="tags"><?php echo $countryList;?></div>
            <div class="to-favorite"><i class="fa"></i></div>
          </div>
          <div class="looper-cont-wrap">
            <div class="looper-cont">
              <h3><?php the_title(); ?></h3>
              <div class="looper-price" data-price="<?php the_field('tour_price'); ?>"><span class="price"><?php echo number_format(get_field('tour_price', $slide_product),0,'',' '); ?></span> <span class="currency"><?php the_field('tour_currency'); ?></span></div>
            </div>
            <div class="looper-subcont">
              <div class="looper-time"><?php the_field('tour_days'); ?> <?php the_field('tour_days_after'); ?></div>
              <div class="looper-group"><?php the_field('tour_group'); ?></div>
              <div class="looper-intent"><?php the_field('tour_months'); ?></div>
            </div>
          </div>
        </div>
      </div><!-- .looper -->
      <?php// } ?>

