<?php /* Template Name: Home Page */ get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php //the_ID(); ?>
    <?php //post_class(); ?>

      <?php //the_title(); ?>
      <?php //the_content(); ?>
      <?php //edit_post_link(); ?>

  <?php endwhile; endif; ?>


    <div id="main-slider" class="owl-carousel container">
      <div class="slide item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bec8ac48-6017-4bc8-8e06-56fe8f49cf1d.jpg')">
        <div class="row">
          <div class="slider-cont-wrap col-xs-10 col-xs-offset-1">
          <div class="slider-cont">
            <div class="title-wrap"><h2>Круиз до Антарктиды</h2></div>
            <p class="time">13 дней</p>
            <p class="price">от 200 000 р.</p>
          </div>
          <a href="#" class="slide-link btn">Подробнее</a>
        </div>
        </div>
      </div><!-- .slide -->
      <div class="slide item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bec8ac48-6017-4bc8-8e06-56fe8f49cf1d.jpg')">
        <div class="row">
          <div class="slider-cont-wrap col-xs-10 col-xs-offset-1">
          <div class="slider-cont">
            <div class="title-wrap"><h2>Круиз до Антарктиды</h2></div>
            <p class="time">13 дней</p>
            <p class="price">от 200 000 р.</p>
          </div>
          <a href="#" class="slide-link btn">Подробнее</a>
        </div>
        </div>
      </div><!-- .slide -->
      <div class="slide item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bec8ac48-6017-4bc8-8e06-56fe8f49cf1d.jpg')">
        <div class="row">
          <div class="slider-cont-wrap col-xs-10 col-xs-offset-1">
          <div class="slider-cont">
            <div class="title-wrap"><h2>Круиз до Антарктиды</h2></div>
            <p class="time">13 дней</p>
            <p class="price">от 200 000 р.</p>
          </div>
          <a href="#" class="slide-link btn">Подробнее</a>
        </div>
        </div>
      </div><!-- .slide -->

    </div>



  <section class="search-tags">
    <div class="container">
      <div class="tags-line"> <a href="#" class="tag tag1">На выходные?</a>
        <a href="#" class="tag tag2">С детьми?</a>
        <a href="#" class="tag tag3">Вдвоем или с кампанией?</a></div>
      <div class="tags-line"> <a href="#" class="tag tag4">Увидеть северное сияние или понаблюдать за голубыми китами?</a>
        <a href="#" class="btn tag-search">Удобный поиск<i class="fa fa-search"></i></a>
        <a href="#" class="tag tag5">Полежать на мальдивах или покорить Эверест?</a></div>
      <div class="tags-line"> <a href="#" class="tag tag6">VIP</a>
        <a href="#" class="tag tag7">Романтично?</a></div>
    </div><!-- /.container -->
  </section>

  <section class="tours-sliders">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="tours-title">
            <h2>Эксклюзивные круизы</h2>
            <a href="" class="more-tours btn red-btn">Смотреть все</a>
            <div class="clearfix"></div>
          </div>

          <div class="tours-slider owl-carousel">

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

          </div>
        </div>
      </div><!-- /.row -->

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="tours-title">
            <h2>Эксклюзивные круизы</h2>
            <a href="" class="more-tours btn red-btn">Смотреть все</a>
            <div class="clearfix"></div>
          </div>

          <div class="tours-slider owl-carousel">

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

          </div>
        </div>
      </div><!-- /.row -->

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="tours-title">
            <h2>Эксклюзивные круизы</h2>
            <a href="" class="more-tours btn red-btn">Смотреть все</a>
            <div class="clearfix"></div>
          </div>

          <div class="tours-slider owl-carousel">

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

            <div class="tour item">
              <div class="img-wrap ratio" data-hkoef="0.85" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/tour-slide-1.jpg');">
                <a href="#"><span>Подробнее</span></a>
              </div>
              <div class="tours-cont">
                <h3>Дикая Африка</h3>
                <div class="tours-subcont">
                  <div class="tour-tags">
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                    Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве
                  </div>
                  <div class="tour-price">230 000 руб.</div>
                  <div class="tour-time">7 дней</div>
                </div>
              </div>
            </div><!-- .item -->

          </div>
        </div>
      </div><!-- /.row -->

    </div><!-- /.container -->
  </section>


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
