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


      <section class="section-search-form">

        <?php $front__id = (int)(get_option( 'page_on_front' )); ?>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2><?php the_field('page_form_title'); ?></h2>
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                  <div class="form-wrap">

                    <div class="input-wrapp big" data-placeholder="<?php the_field('ph_reg_filter', $front__id); ?>">
                      <div class="select-title"><?php the_field('title_reg_filter', $front__id); ?></div>

                        <?php if( $categories = get_categories( $args ) ) : ?>
                            <select class="multisel" id="regionfilter" name="regionfilter[]" multiple="multiple">

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

                    <div class="input-wrapp big" data-placeholder="<?php the_field('ph_country_filter', $front__id); ?>">
                      <div class="select-title"><?php the_field('title_country_filter', $front__id); ?></div>

                        <?php if( $categories = get_categories( $args ) ) : ?>
                            <select class="multisel" id="countryfilter" name="countryfilter[]" multiple="multiple">

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

                    <div class="input-wrapp med-s" data-placeholder="<?php the_field('ph_month_filter', $front__id); ?>">
                      <div class="select-title"><?php the_field('title_month_filter', $front__id); ?></div>

                        <select class="multisel" id="monthfilter" name="monthfilter[]" multiple="multiple">

                          <?php
                          $i = 1;
                          while ($i <= 12){
                          $monthPre = strftime("%B", mktime(0, 0, 0, $i, 1, 1999) );
                            $month =  __( $monthPre );

                            echo '<option value="' . $i . '" >' . $month . '</option>';
                            $i++;
                          }
                          ?>

                        </select>
                      <!-- </label> -->
                    </div>

                    <div class="input-wrapp med" data-placeholder="">
                      <div class="select-title"><?php the_field('title_intent_filter', $front__id); ?></div>

                        <?php if( $categories = get_categories( $args ) ) : ?>
                            <select class="multisel" id="tourtypefilter" name="tourtypefilter[]" multiple="multiple">
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

                    <?php if( have_rows('days_filter_settings', $front__id) ): ?>
                      <div class="input-wrapp med-s" data-placeholder="">
                        <div class="select-title"><?php the_field('title_days_filter', $front__id); ?></div>
                          <select name="daysfilter[]" id="daysfilter" class="multisel" multiple="multiple">
                            <?php while ( have_rows('days_filter_settings', $front__id) ) : the_row(); ?>
                              <option value="<?php the_sub_field('day_min'); ?>;<?php the_sub_field('day_max'); ?>"><?php the_sub_field('day_label'); ?></option>
                            <?php  endwhile; ?>
                          </select>
                      </div>
                    <?php endif; ?>

                    <?php if( have_rows('currency_settings', $front__id) ): ?>
                      <div class="input-wrapp small">
                        <div class="select-title"><?php the_field('title_currency_filter', $front__id); ?></div>
                        <label class="custom-select" for=" ">
                          <select name="currency-filter" id="currency-filter">
                            <?php while ( have_rows('currency_settings', $front__id) ) : the_row(); ?>
                              <option value="<?php the_sub_field('curr_coef'); ?>"><?php the_sub_field('curr_name'); ?> <?php the_sub_field('curr_label'); ?></option>
                            <?php  endwhile; ?>
                          </select>
                        </label>
                      </div>
                    <?php endif; ?>

                    <div class="input-wrapp btn-wrap">
                      <button class="btn form-search" type="submit" ><?php the_field('title_filter_btn', $front__id); ?> <i class="fa fa-search"></i></button>
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
                <?php the_field('content_nothing_found', $front__id); ?>
              </div>
              <div  id="response" class="row searh-resolt-wrap">
              </div><!-- /.row -->
            </div>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section>
