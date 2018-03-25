
  <div class="col-md-6 looper-wrap">
    <div id="post-<?php the_ID(); ?>" <?php post_class('looper'); ?>>
      <div class="img-wrap ratio" data-hkoef="0.48" style="background-image: url(' <?php if ( has_post_thumbnail()) {  echo the_post_thumbnail_url('medium');  } else {  echo catchFirstImage(); ?><?php } ?>');">
        <a class="tour_link" href="<?php the_permalink(); ?>"><span>Подробнее</span></a>
      </div>
      <div class="looper-cont-wrap">
        <div class="looper-cont">
          <h3><?php the_title(); ?> </h3>
          <div class="looper-desc">
            <?php wpeExcerpt('wpeExcerpt20'); ?>
          </div>
        </div>

      </div>
    </div><!-- .looper -->
  </div><!-- .looper-wrap -->


