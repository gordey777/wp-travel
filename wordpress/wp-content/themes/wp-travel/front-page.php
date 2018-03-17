<?php /* Template Name: Home Page */ get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php //the_ID(); ?>
    <?php //post_class(); ?>

      <?php //the_title(); ?>
      <?php //the_content(); ?>
      <?php //edit_post_link(); ?>

  <?php endwhile; endif; ?>


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
        <div class="col-md-10 col-md-offset-1">
          <div class="tours-title">
            <h2><?php echo get_the_title($slider__id); ?></h2>
            <a href="" class="more-tours btn red-btn">Смотреть все</a>
            <div class="clearfix"></div>
          </div>

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
                  <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php the_post_thumbnail_url( 'medium'); echo $thumb_link; ?>');">
                    <a href="<?php the_permalink(); ?>"><span>Подробнее</span></a>
                  </div>
                  <div class="tours-cont">
                    <h3><?php the_title(); ?></h3>
                    <div class="tours-subcont">
                      <div class="tour-tags">
                        <?php
                        $posttags = get_the_tags();

                        if ($posttags) {
                          $tag_langth = count($posttags);
                          $i = 0;
                          $sep = ', ';

                          foreach($posttags as $tag) {
                            $i++;
                            if($i >= $tag_langth){
                              $sep = '';
                            }
                            echo $tag->name . $sep;

                          }
                        } ?>
                      </div>
                      <div class="tour-price">230 000 руб.</div>
                      <div class="tour-time">7 дней</div>
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
          <p>ООО Туристическая компания «Вита трэвел» была основана летом 2004 года путем полной сменой собственников, персонала и названия туристического агентства «Спорт-тур». Компания начала продавать туры по массовым направлениям за рубеж, экскурсионные туры по России и путевки на базы отдыха и санатории Челябинской области.</p>
            <p> С февраля 2007 года и по настоящее время компанией руководит <a href="#">Ципордей Алексей Владимирович.</a></p>
            <p> С января 2008 года наша компания начала принимать первые заявки по оформлению виз без тура от жителей Челябинска. Также летом 2008 года начали поступать первые заявки на помощь в оформлении приглашений для иностранных граждан в Россию. Работа по визам и приглашениям велась параллельно стандартной турагентской деятельностью и наращиванию базы постоянных клиентов. Также одной из специализаций нашей компании стала организация индивидуальных туров за рубеж и по России.</p>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>


  <section class="section-form">
    <div class="container dark-cont">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h2>Расскажите нам о вашем идеальном путешествии, а наша команда воплотит его в жизнь</h2>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-5 col-md-offset-1 col-sm-6">
          <h3>Информация о путешествии</h3>
          <div class="input-wrapp">
            <label for="input-direction">Направления</label>
            <input type="text" class="select__js" id="input-direction" placeholder="Например “Мальдивы”" data-list="Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве" data-select="Ганна, Замбия">
          </div>
          <div class="input-wrapp">
            <label for="">Количество людей</label>
            <input type="number">
          </div>
          <div class="input-wrapp">
            <label for="">Когда вы хотите поехать?</label>
            <input type="date">
            <span class="sublabel">(Не обязательно)</span>
          </div>
          <h3>Ваше путешествие</h3>
          <div class="input-wrapp">
            <textarea name="" id="" cols="30" rows="10" placeholder="Расскажите о вашем идеальном путешествии..."></textarea>
          </div>
          <div class="input-wrapp">
            <label>
              <input type="checkbox"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-gift-light.png" alt="">Хочу преподнести в подарок</label>
          </div>
        </div>
        <div class="col-md-5 col-md-offset-1 col-sm-6">
          <h3>Бюджет</h3>
          <div class="input-wrapp">
            <div class="select-title">Валюта</div>
            <label class="custom-select" for=" ">
              <select name="" id="">
                <option value="">$</option>
                <option value="">руб.</option>
              </select>
            </label>
          </div>
          <div class="input-wrapp">
            <div class="select-title">Ваш максимальный бюджет на человека</div>
            <label class="custom-select" for=" ">
              <select name=" " id=" ">
                <option value="1">100500руб.</option>
                <option value="2">руб.</option>
              </select>
            </label>
          </div>
          <h3>Контактная информация</h3>
          <div class="input-wrapp">
            <label for="">Имя</label>
            <input type="text" text="">
          </div>
          <div class="input-wrapp">
            <label for="">Номер телефона</label>
            <input type="text" text="">
          </div>
          <div class="input-wrapp">
            <label for="">E-mail</label>
            <input type="text" text="">
          </div>
          <input type="submit" value="Отправить заявку" class="formsubmit btn red-btn">
        </div>
      </div><!-- /.row -->

    </div><!-- /.container -->
  </section>



<?php get_footer(); ?>
