
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>



  <?php if( have_rows('questions', $front__id) ): ?>
    <section class="section-contacts">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="row">
              <div class="col-md-12 title-wrapp"><h2><?php the_field('questions_title', $front__id); ?></h2></div>
              <div class="clearfix"></div>
            </div><!-- /.row -->

              <div class="col-md-12">
              <div id="workers-slider" class="owl-carousel ">
              <?php while ( have_rows('questions', $front__id) ) : the_row(); ?>
                <?php $image = get_sub_field('img'); ?>
                    <div class="workers">
                      <div class="img-wrap">
                        <?php if ( !empty($image)) { ?>
                          <img src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('btn_title'); ?>">
                        <?php } ?>
                      </div>
                      <a href="<?php the_sub_field('link'); ?>" class="contact-link"><?php the_sub_field('btn_title'); ?></a>
                    </div>
              <?php  endwhile; ?>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
  <?php endif; ?>





  <?php if( have_rows('advantages', $front__id) ): ?>
    <section class="section-advanteges">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 title-wrapp"><h2><?php the_field('advantages_title', $front__id); ?></h2></div>
          <div class="clearfix"></div>

          <?php while ( have_rows('advantages', $front__id) ) : the_row(); ?>
            <?php $image = get_sub_field('icon'); ?>
            <div class="col-md-2 col-sm-4 col-xs-6 advantage">
              <div class="img-wrap">
                <?php if ( !empty($image)) { ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('btn_title'); ?>">
                <?php } ?>
              </div>
              <div class="desc"><?php the_sub_field('text'); ?></div>
            </div>
          <?php  endwhile; ?>
          <div class="clearfix"></div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
  <?php endif; ?>




</div><!-- /wrapper -->

<footer role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="footer--logo col-md-4 col-sm-4 col-xs-3">
        <img src="<?php if(get_field('logo_footer_img', $front__id)){ echo get_field('logo_footer_img', $front__id)['url'];} else { echo get_template_directory_uri() . '/img/footer-logo.png'; } ?>" alt="" title="">
      </div>

      <div class="footer-contacts col-md-5">
        <?php the_field('footer_contacts', $front__id); ?>
      </div>

      <div class="col-md-3 footer-search-wrapp">
        <h3><?php the_field('footer_search_title', $front__id); ?></h3>
        <form class="footer-search" method="get" action="" role="search">
          <input class="search-input" type="search" name="s" placeholder="">
          <button class="search-submit" type="submit" role="button"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form><!-- /search -->
      </div>

    </div>
  </div>



  <div class="footer_nav_wrap">
    <nav class="container footer--nav">
      <?php wpeFootNav(); ?>
    </nav>

  </div>

</footer><!-- /footer -->

 <a href="#" id="to_top" class="fa fa-angle-up"></a>

<div class="modal" id="favoritesTours" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <div class="container-fluid">

          <div id="favoritslist">
            <?php wpfp_list_favorite_posts(); ?>
          </div>
        </div>

    </div>
  </div>
</div>

  <script>
  var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
  //var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
  var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
  var userid = '<?php echo get_current_user_id(); ?>';
  </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoPe7hiMA8FF0IpEVthypKGicTeL4Zy7o"></script>
    <?php wp_footer(); ?>

    <?php the_field('front_scripts', $front__id);?>

</body>
</html>
