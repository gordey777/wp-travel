<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext" rel="stylesheet">
  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>
</head>




<body <?php body_class(); ?>>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<!-- wrapper -->
<div class="wrapper">
  <header>
    <a id="favorite_open" href="#favoritesTours" data-toggle="modal" class="favorites link"><i class="fa fa-heart"></i><span class="counter"></span></a>
    <div class="container top-line">
      <div id="humburger" class="fa"></div>
      <div class="top-nav-wrapp">

        <nav class="lang-nav">
          <?php //wpeLangNav(); ?>
          <ul class="">
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-uk.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-fr.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-sp.png" alt=""></a></li>
          </ul>
        </nav>

        <nav class="nav-top-left col-sm-7">
          <?php wpeTopLeftNav(); ?>

        </nav>
        <nav class="nav-top-right col-sm-5">
          <?php wpeTopRightNav(); ?>

        </nav>
      </div>

    </div><!-- /.container -->
    <div class="container head-bgi">
      <div class="head-center flex-center">

        <div class="header--logo">

            <?php if ( !is_front_page() && !is_home() ){ ?>
              <a href="<?php echo home_url(); ?>">
            <?php } ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
            <?php if ( !is_front_page() && !is_home() ){ ?>
              </a>
            <?php } ?>

          <div class="logo-title"><?php the_field('logo_title', $front__id); ?></div>

        </div><!-- /header--logo -->
        <div class="slogan"><?php the_field('header_slogan', $front__id); ?></div>

        <div class="phones">

          <div class="main-tel">
            <?php $telFlag = get_field('head_main_tel_flag', $front__id); ?>
            <?php if($telFlag) { ?>
              <img src="<?php echo $telFlag['url']; ?>" alt="" class="tel-flag">
            <?php } ?>
            <a href="tel:<?php the_field('head_main_tel'); ?>"><?php the_field('head_main_tel', $front__id); ?></a>
          </div>

          <?php if( have_rows('head_tel_list', $front__id) ): ?>
            <i class="tel-btn fa fa-chevron-down"></i>
            <div class="sub-phones-wrap">
              <?php while ( have_rows('head_tel_list', $front__id) ) : the_row(); ?>
                <ul class="sub-phones">
                  <?php if( get_sub_field('tel_group') ): ?>
                    <?php while ( have_rows('tel_group') ) : the_row(); ?>
                      <?php $image = get_sub_field('flag'); ?>
                      <li>
                        <?php if ( !empty($image)) { ?>
                          <img src="<?php echo $image['url']; ?>" alt="" class="tel-flag">
                        <?php } ?>
                        <a href="tel:<?php the_sub_field('sub_tel'); ?>" class="tel-num"><?php the_sub_field('sub_tel'); ?></a>
                        <span class="tel-city"><?php the_sub_field('city'); ?></span>
                        <?php if ( get_sub_field('link')) { ?>
                          <a href="<?php the_sub_field('link'); ?>" class="tel-link">www</a>
                        <?php } ?>
                      </li>
                    <?php  endwhile; ?>
                  <?php endif; ?>
                </ul>
              <?php  endwhile; ?>
          </div>
        <?php endif; ?>

        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->


    <nav class="header--nav dark-cont">
      <ul class="headnav container">
        <?php get_template_part('countries-menu'); ?>



        <?php wpeHeadNav(); ?>
      </ul><!-- /.container -->
    </nav><!-- /header--nav -->
  </header><!-- /header -->
