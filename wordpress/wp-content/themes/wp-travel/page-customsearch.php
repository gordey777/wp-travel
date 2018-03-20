<?php get_header(); ?>

  <?php

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

);  ?>

   <?php   /*if( $categories = get_categories( $args ) ) :
   $regionList = '';
   foreach ( $categories as $cat ) :
       $cat__ID = $cat->cat_ID;
       $field_term = 'category_' . $cat__ID;
       $cat__type = get_field('cat_type', $field_term);
       if($cat__type === 'region') {
         $regionList = $regionList . $cat->name . ',';
       }
   endforeach;
 endif;

 if( $categories = get_categories( $args ) ) :
   $countryList = '';
   foreach ( $categories as $cat ) :
       $cat__ID = $cat->cat_ID;
       $field_term = 'category_' . $cat__ID;
       $cat__type = get_field('cat_type', $field_term);
       if($cat__type === 'country') {
         $countryList = $regionList . $cat->name . ',';
       }
   endforeach;
 endif;

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


  */

?>


  <section class="section-search-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Туры в кению</h1>
            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
              <div class="form-wrap">

                <div class="input-wrapp big">
                  <div class="select-title">Регионы</div>

                    <?php if( $categories = get_categories( $args ) ) : ?>
                        <select class="multisel" id="regionfilter" name="regionfilter[]" multiple="multiple" data-placeholder="Выберите...">

                          <?php foreach ( $categories as $cat ) :
                              $cat__ID = $cat->cat_ID;
                              $field_term = 'category_' . $cat__ID;
                              $cat__type = get_field('cat_type', $field_term);
                              if($cat__type === 'region') {
                                  echo '<option value="' . $cat->name . '">' . $cat->name . '</option>';
                              } ?>
                          <?php endforeach; ?>
                        </select>
                      <?php endif; ?>

                </div>

                <div class="input-wrapp big">
                  <div class="select-title">Страны</div>

                    <?php if( $categories = get_categories( $args ) ) : ?>
                        <select class="multisel" id="countryfilter" name="countryfilter[]" multiple="multiple" data-placeholder="Выберите...">

                          <?php foreach ( $categories as $cat ) :
                              $cat__ID = $cat->cat_ID;
                              $field_term = 'category_' . $cat__ID;
                              $cat__type = get_field('cat_type', $field_term);
                              if($cat__type === 'country') {
                                  echo '<option value="' . $cat->name . '">' . $cat->name . '</option>';
                              } ?>
                          <?php endforeach; ?>
                        </select>
                      <?php endif; ?>

                </div>

                <div class="input-wrapp med-s">
                  <div class="select-title">Когда</div>
                  <label class="custom-select" for=" ">
                    <select name=" " id=" ">

                      <option value="01">Январь</option>
                      <option value="02">Февраль</option>
                      <option value="03">Март</option>
                      <option value="04">Апрель</option>
                    </select>
                  </label>
                </div>

                <div class="input-wrapp med">
                  <div class="select-title">Цель путешествия</div>

                    <?php if( $categories = get_categories( $args ) ) : ?>
                        <select class="multisel" id="tourtypefilter" name="tourtypefilter[]" multiple="multiple" data-placeholder="Выберите...">

                          <?php foreach ( $categories as $cat ) :
                              $cat__ID = $cat->cat_ID;
                              $field_term = 'category_' . $cat__ID;
                              $cat__type = get_field('cat_type', $field_term);
                              if($cat__type === 'tour_type') {
                                  echo '<option value="' . $cat->term_id . '">' . $cat->name . '</option>';
                              } ?>
                          <?php endforeach; ?>
                        </select>
                      <?php endif; ?>

                </div>


                <div class="input-wrapp med-s">
                  <label for="input-direction">Количество ночей</label>
                  <input type="text" name="price_min" placeholder="Min" />
                  <input type="text" name="price_max" placeholder="Max" />
                  <!-- <input type="text" class="select__js" id="input-days" placeholder="Например “Мальдивы”" data-list="Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве" data-select="Ганна, Замбия"> -->
                </div>

                <div class="input-wrapp small">
                  <div class="select-title">Валюта</div>
                  <label class="custom-select" for=" ">
                    <select name="currency-filter" id="currency-filter">
                      <option value="1">$</option>
                      <option value="60">₽</option>
                      <option value="1.1">€</option>
                    </select>
                  </label>
                </div>

                <div class="input-wrapp btn-wrap">
                  <button class="btn form-search" type="submit" >Поиск <i class="fa fa-search"></i></button>
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

        <div id="nothing_find" style="display: none;">
          <h2>По Вашему запросу ничего не найдено, попробуйте изменить критерии поиска</h2>
        </div>
        <div  id="response" class="row searh-resolt-wrap">

          <?php

          $tours_args = array(
            //'meta_key'      => 'tour_price',
            //'orderby'     => 'meta_value',
            'order'       => 'DESC',
            'posts_per_page' => -1,
            //'meta_value' => 'single-tour.php',
          );
          $tours_args['meta_key'] =  'tour_price';
          $tours_args['orderby'] =  'meta_value';


          $query = new WP_Query( $tours_args );

          if( $query->have_posts() ) :

            while( $query->have_posts() ): $query->the_post();
              if(get_page_template_slug() === 'single-tour.php'){
                get_template_part('search-loop');
              }
            endwhile;
            wp_reset_postdata();

          endif;?>


        </div><!-- /.row -->
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>








<?php get_footer(); ?>
