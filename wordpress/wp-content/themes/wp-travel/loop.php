<?php if (have_posts()): while (have_posts()) : the_post(); ?>


  <?php  if( $categories = get_the_category( ) ) :
    $countryList = '';
      $catLangth = count($categories);
      $i = 0;
      $sep = ', ';

    foreach ( $categories as $cat ) :
        $i++;
        if($i >= $catLangth){
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
        <div class="looper">
          <div class="img-wrap ratio" data-hkoef="0.48" style="background-image: url('');">
            <a href="#"><span>Подробнее</span></a>
            <div class="tags"><?php echo $countryList;?></div>
            <div class="to-favorite"><i class="fa"></i></div>
          </div>
          <div class="looper-cont-wrap">
            <div class="looper-cont">
              <h3>Дикая Африка</h3>
              <div class="looper-price"><?php the_field('tour_group'); ?> <span class="currency">₽</span></div>
            </div>
            <div class="looper-subcont">
              <div class="looper-time"><?php the_field('tour_days'); ?></div>
              <div class="looper-group"><?php the_field('tour_group'); ?></div>
              <div class="looper-intent"><?php the_field('tour_months'); ?></div>
            </div>
          </div>
        </div>
      </div><!-- .looper -->




  <div id="post-<?php the_ID(); ?>" <?php post_class('looper'); ?>>

    <a rel="nofollow" class="feature-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <?php if ( has_post_thumbnail()) { ?>
        <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
      <?php } else { ?>
        <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
      <?php } ?>
    </a><!-- /post thumbnail -->

    <h2 class="inner-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h2><!-- /post title -->

    <span class="date"><?php the_time('j F Y'); ?> <span><?php the_time('G:i'); ?></span></span>
    <span class="author"><?php _e( 'Published by', 'wpeasy' ); ?> <?php the_author_posts_link(); ?></span>
    <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'wpeasy' ), __( '1 Comment', 'wpeasy' ), __( '% Comments', 'wpeasy' )); ?></span><!-- /post details -->

    <?php wpeExcerpt('wpeExcerpt40'); ?>

  </div><!-- /looper -->
<?php endwhile; endif; ?>
