<?php get_header(); ?>

  <?php

$args = array(
  'type'         => 'post',
  'child_of'     => 0,
  'parent'       => '',
  'orderby'      => 'name',
  'order'        => 'ASC',
  'hide_empty'   => false,
  'hierarchical' => 1,
  'exclude'      => '',
  'include'      => '',
  'number'       => 0,
  'taxonomy'     => 'category',
  'pad_counts'   => false,

);  ?>

   <?php   if( $categories = get_categories( $args ) ) :
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

?>


  <section class="section-search-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Туры в кению</h1>
            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
              <div class="form-wrap">
                <div class="input-wrapp">
                  <label for="input-direction">Регионы</label>

                 <!--  <input type="hidden" id="regionfilter" name="regionfilter"> -->


                  <input type="text" class="select__js" id="regionfilter" name="regionfilter" placeholder="Например “Мальдивы”" data-list="<?php echo $regionList ;?>" data-select>
                </div>

                <div class="input-wrapp">
                  <label for="input-direction">Страны</label>
                  <input type="hidden" id="countryfilter" name="countryfilter"">

                  <input type="text" class="select__js" id="input-country" placeholder="Например “Мальдивы”" data-list="<?php echo $$countryList ;?>" data-select="Ганна, Замбия">
                </div>

                <div class="input-wrapp">
                  <div class="select-title">Когда</div>
                  <label class="custom-select" for=" ">
                    <select name=" " id=" ">
                      <option value="1">месяц</option>
                      <option value="2">руб.</option>
                    </select>
                  </label>
                </div>

                <div class="input-wrapp">
                  <div class="select-title">Цель путешествия</div>
                  <label class="custom-select" for=" ">
                    <select name=" " id=" ">
                      <option value="1">Сафари</option>
                      <option value="2">Рыбалка</option>
                    </select>
                  </label>
                </div>


                <div class="input-wrapp">
                  <label for="input-direction">Количество ночей</label>
                  <input type="text" class="select__js" id="input-days" placeholder="Например “Мальдивы”" data-list="Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве" data-select="Ганна, Замбия">
                </div>

                <div class="input-wrapp">
                  <div class="select-title">Валюта</div>
                  <label class="custom-select" for=" ">
                    <select name=" " id=" ">
                      <option value="1">USD</option>
                      <option value="2">руб.</option>
                    </select>
                  </label>
                </div>
                <div class="input-wrapp wrap-wrapp">
                  <button class="btn form-search" type="submit" >Поиск <i class="fa fa-search"></i></button>
                </div>
              </div>






  <?php
    if( $categories = get_categories( $args ) ) : // to make it simple I use default categories
      echo '<select id="tourtypefilter" name="tourtypefilter"><option >Select category...</option>';
      foreach ( $categories as $cat ) :
          $cat__ID = $cat->cat_ID;
          $field_term = 'category_' . $cat__ID;
          $cat__type = get_field('cat_type', $field_term);
if($cat__type === 'tour_type') {
        echo '<option value="' . $cat->term_id . '">' . $cat->name . '</option>'; // ID of the category as the value of an option
}

      endforeach;
      echo '</select>';
    endif;
  ?>



  <input type="text" name="price_min" placeholder="Min price" />
  <input type="text" name="price_max" placeholder="Max price" />
  <label>
    <input type="radio" name="date" value="ASC" /> Date: Ascending
  </label>
  <label>
    <input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
  </label>
  <label>
    <input type="checkbox" name="featured_image" /> Only posts with featured image
  </label>
  <button>Отправить</button>
  <input type="hidden" name="action" value="myfilter">
</form>



        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>

<section class="searh-resolt">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
    <div  id="response" class="row searh-resolt-wrap">


  <?php
  $tours_args['meta_value'] =  'single-tour.php';

  $query = new WP_Query( $tours_args );

  if( $query->have_posts() ) :
    while( $query->have_posts() ): $query->the_post();

      echo '<h2>' . $query->post->post_title . '</h2>';

    endwhile;
    wp_reset_postdata();

  endif;?>





      <div class="col-md-6 ">
        <div class="looper">
          <div class="img-wrap ratio" data-hkoef="0.48" style="background-image: url('');">
            <a href="#"><span>Подробнее</span></a>
            <div class="tags">Габон, Гамбия, Гана, Гвинея, Гвинея-Бисау, Джибути, Замбия, Зимбабве</div>
            <div class="to-favorite"><i class="fa"></i></div>
          </div>
          <div class="looper-cont-wrap">
            <div class="looper-cont">
              <h3>Дикая Африка</h3>
              <div class="looper-price">230 000 ₽</div>
            </div>
            <div class="looper-subcont">
              <div class="looper-time">7 дней</div>
              <div class="looper-group">7 дней</div>
              <div class="looper-intent">7 дней</div>
            </div>
          </div>
        </div>
      </div><!-- .looper -->


    </div><!-- /.row -->
    </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
</section>












<script>

jQuery(function($){
  $( '#regionfilter' ).change(function(event) {

    var po_select = $(this).val();
    var data = {
       'action': 'regionfilter_ajax',
       'data': po_select
    };

    var filter = $('#filter');
    $.ajax({

      url:filter.attr('action'),
      data: data,
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
        $('#countryfilter').text('Processing...'); // changing the button label
      },
      success:function(data){
        $('#countryfilter').html(data); // insert data
      }
    });
    return false;


  });


});

/*jQuery(function($){
  $( '#countryfilter' ).on( 'change', function() {


    var po_select = $(this).val();
    var data = {
       'action': 'countryfilter_ajax',
       'data': po_select
    };

    var filter = $('#filter');
    $.ajax({

      url:filter.attr('action'),
      data: data,
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
        //$('#countryfilter').text('Processing...'); // changing the button label
      },
      success:function(data){
        //$('#countryfilter').html(data); // insert data
      }
    });
    return false;


  });


});*/


jQuery(function($){
  $('#filter').submit(function(){
    var filter = $('#filter'),
    buttontext = filter.find('button').text();
    $.ajax({
      url:filter.attr('action'),
      data:filter.serialize(), // form data
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
        filter.find('button').text('Processing...'); // changing the button label
      },
      success:function(data){
        filter.find('button').text(buttontext); // changing the button label back
        $('#response').html(data); // insert data
      }
    });
    return false;
  });
});
</script>
<?php get_footer(); ?>
