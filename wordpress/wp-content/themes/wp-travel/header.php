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

<!-- wrapper -->
<div class="wrapper">
  <header>

    <div class="container top-line">

<div class="top-nav-wrapp">
        <nav class="lang-nav">
          <?php langtNav(); ?>
          <ul class="">
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-uk.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-fr.png" alt=""></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-sp.png" alt=""></a></li>
          </ul>
        </nav>

        <nav class="nav-top-left col-sm-6">
          <?php wpeTopLeftNav(); ?>
          <ul class="">
            <li><a href="#">Турагенствам</a></li>
            <li><a href="#">Корпоративным клиентам</a></li>
            <li><a href="#">Франшиза</a></li>
          </ul>
        </nav>
        <nav class="nav-top-right col-sm-6">
          <?php wpeTopRightNav(); ?>
          <ul class="">
            <li><a href="#">Отзывы онас</a></li>
            <li><a href="#">Вакансии</a></li>
            <li><a href="#">О компании</a></li>
            <li><a href="#">Как оплатить</a></li>
            <li><a href="#">Контакты</a></li>
          </ul>
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

          <div class="logo-title">EXCLUSIVE</div>

        </div><!-- /header--logo -->
        <div class="slogan">Департамент индивидуальных путешествий</div>

        <div class="phones">
          <div class="main-tel"><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a></div>
          <i class="tel-btn fa fa-chevron-down"></i>
          <div class="sub-phones-wrap">
            <ul class="sub-phones">
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
          </ul>
            <ul class="sub-phones">
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/img/flag-ru.png" alt="" class="tel-flag"><a href="#">+7 (999) 999-00-00</a><span class="tel-city">Москва</span><a href="" class="tel-link">www</a></li>
          </ul>
          </div>

        </div>

      </div><!-- /.row -->
    </div><!-- /.container -->


    <nav class="header--nav">
      <ul class="headnav container dark-cont">
        <li class="has-children tours-list">
          <a href="#">menu</a>
            <ul class="sub-menu">
            <li class="has-children active">
              <a href="#">menu</a>
              <ul class="sub-menu">
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="#">menu</a>
              <ul class="sub-menu">
                <li><a href="#">Menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>
                <li><a href="#">menu</a></li>

              </ul>
            </li>

            <li><a href="#">menu</a></li>
            <li><a href="#">menu</a></li>
            <li><a href="#">menu</a></li>
          </ul>
        </li>
        <?php wpeHeadNav(); ?>
      </ul><!-- /.container -->
    </nav><!-- /header--nav -->
  </header><!-- /header -->
