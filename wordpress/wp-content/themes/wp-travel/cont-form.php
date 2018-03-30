<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<?php $page__id = get_the_ID(); ?>
  <?php if (get_field('home_cont_form', $front__id)) { ?>
    <section id="contact_form" class="section-form dark-cont">
      <div class="container">
        <div class="select-values-wrap">
          <select hidden name="values" id="select_values">
          <?php
          if( $selCategories = get_the_category( ) ) :
            foreach ( $selCategories as $key=>$cat ){
              $cat__ID = $cat->cat_ID;
              $field_term = 'category_' . $cat__ID;
              $cat__type = get_field('cat_type', $field_term);
              if($cat__type === 'region' || $cat__type === 'country' || $cat__type === 'tour_type') {
                $selectedCats[$key] = $cat->name;
              }
            }
          endif;

        //categoryec array
          $args = array(
            'type'         => 'post',
            'child_of'     => 0,
            'parent'       => '',

            'orderby'     => 'name',
            'order'       => 'ASC',
            'hide_empty'   => false,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'taxonomy'     => 'category',
            'pad_counts'   => false,

          );
         ?>
          <?php if( $categories = get_categories( $args ) ) : ?>
                <?php foreach ( $categories as $cat ) :

                    $cat__ID = $cat->cat_ID;
                    if (!empty($selectedCats) && in_array($cat->name, $selectedCats)){
                      $select = 'selected';
                    }else{
                      $select = '';
                    }
                    $field_term = 'category_' . $cat__ID;
                    $cat__type = get_field('cat_type', $field_term);
                    if($cat__type === 'region' || $cat__type === 'country' || $cat__type === 'tour_type') {
                        echo '<option '.$select.'>' . $cat->name . '</option>';
                    } ?>
                <?php endforeach; ?>
            <?php endif; ?>

          </select>
        </div>
                  <?php $form__code = get_field('home_cont_form', $front__id); ?>
                  <?php echo do_shortcode($form__code); ?>
      </div><!-- /.container -->
    </section>
  <?php } ?>
