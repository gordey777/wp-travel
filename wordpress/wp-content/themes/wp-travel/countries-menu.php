<?php $front__id = (int)(get_option( 'page_on_front' )); ?>


        <li class="menu-item-has-children tours-list">
          <a href="#"><?php the_field('countries_menu_title', $front__id); ?></a>

          <?php if( have_rows('countries_menu', $front__id) ): ?>
            <?php $k = 0; ?>


          <ul class="sub-menu">
              <?php while ( have_rows('countries_menu', $front__id) ) : the_row(); ?>
                <?php
                if (get_sub_field('region_link_type')){
                  $item__link = get_sub_field('region_page');
                  //
                } else {
                  $item__link = get_category_link(get_sub_field('region_category'));
                  // = get_sub_field('region_category');
                }
                $parent___cat = '';
                $argsCountries = array(
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

                $subCountries = get_sub_field('sub_countries');

                if( !empty($subCountries) ){
                  $i = 0;
                  $arrCountries = array();
                  foreach ($subCountries as $subCatID){

                      $args = array(
                        'type'         => 'post',
                        'child_of'     => $subCatID,
                        'parent'       => $subCatID,
                        'hide_empty'   => false,
                        'hierarchical' => 1,
                        'number'       => 0,
                        'taxonomy'     => 'category',
                      );
                      $childArr =  get_categories( $args );
                      if($childArr){
                        foreach ($childArr as $child){
                          $childID = $child->cat_ID;
                          $field_term = 'category_' . $childID;
                          $cat__type = get_field('cat_type', $field_term);
                          if( $cat__type === 'country' && !in_array($childID, $arrCountries) ) {
                              $arrCountries[$i] = $childID;
                              $i++;
                          }
                        }
                      } else {
                        $field_term = 'category_' . $subCatID;
                        $cat__type = get_field('cat_type', $field_term);
                        if( $cat__type === 'country' && !in_array($subCatID, $arrCountries) ) {
                            $arrCountries[$i] = $subCatID;
                            $i++;
                        }
                      }
                  }
                  if(empty($arrCountries)){
                    $parent___cat = $subCountries[0];
                  }

                } else {
                  $i = 0;
                  if ( $subCoun = get_categories($argsCountries) ){
                    foreach ($subCoun as $subCatID){

                      $field_term = 'category_' . $subCatID->cat_ID;
                      $cat__type = get_field('cat_type', $field_term);
                      if( $cat__type === 'country' && !in_array($subCatID, $arrCountries) ) {
                          $arrCountries[$i] = $subCatID->cat_ID;
                          $i++;
                      }
                    }
                  }
                }

                $argsMenu = array(
                  'type'         => 'post',
                  'child_of'     => 0,
                  'parent'       => $parent___cat,
                  'orderby'     => 'name',
                  'order'       => 'ASC',
                  'hide_empty'   => false,
                  'hierarchical' => 1,
                  'exclude'      => '',
                  'include'      => implode(",", $arrCountries),
                  'number'       => 0,
                  'taxonomy'     => 'category',
                  'pad_counts'   => false,
                );
                ?>


                <li class="menu-item-has-children <?php if ($k == 0){ echo 'active';}?>">
                  <a href="<?php echo $item__link;?>"><?php the_sub_field('region_title'); ?></a>
                    <?php if ( $menuCats = get_categories($argsMenu) ){ ?>
                      <ul class="sub-menu countries">
                        <?php foreach ($menuCats as $menuCat){ ?>

                          <li  class="menu-item-has-children"><?php //var_dump( $menuCat ); ?>
                            <a href="<?php echo get_term_link($menuCat->cat_ID); ?>"><?php echo $menuCat->name ?></a>

                            <?php $cityArgs = array(

                              'cat' => $menuCat->cat_ID,
                              'post_type' => 'page',
                              'orderby'     => 'name',
                              'order'       => 'ASC',
                              'posts_per_page' => -1,
                              'meta_value' => 'page-city.php'

                            );

                            $query = new WP_Query( $cityArgs );

                            if( $query->have_posts() ) : ?>
                              <ul class="sub-menu">
                                <?php while( $query->have_posts() ): $query->the_post(); ?>
                                  <li class="menu-item-has-children">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <?php $hotelsArr = array(
                                        'post_type' => 'page',
                                        'post_parent'       => $post->ID,
                                        'order'             => 'ASC',
                                        'orderby'           => 'menu_order',
                                        'posts_per_page'    => -1,
                                        'meta_value' => 'page-hotel.php'
                                    );
                                    $query = new WP_Query( $hotelsArr );

                                    if( $query->have_posts() ) : ?>
                                      <ul class="sub-menu">
                                        <?php while( $query->have_posts() ): $query->the_post(); ?>
                                          <li class="menu-item-has-children">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                          </li>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                      </ul>
                                    <?php endif; ?>

                                  </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                              </ul>
                            <?php endif; ?>
                          </li>
                        <?php } ?>
                      </ul>
                    <?php } ?>
                </li>
                <?php $k++; ?>
              <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </li>
