<?php
/*
 *  Author: knaipa | @Saitobaza
 *  URL: saitobaza.ru
 *  Custom functions, support, custom post types and more.
 */

//  Enable styles for WP admin panel
add_action('admin_enqueue_scripts', 'wpeAdminThemeStyle');
function wpeAdminThemeStyle() {
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/admin.css');
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/editor-style.css');
  wp_register_script('wpe-admin-script', get_template_directory_uri() . '/js/admin.js');
  wp_enqueue_script( 'wpe-admin-script' );
}

//  Catch first image from post and display it
function catchFirstImage() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
    $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
    $first_img = get_template_directory_uri() . '/img/noimage.jpg'; }
    return $first_img;
}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyCZF31krTQH_5QnEpdIsEgmsBV-Iy884rE');
}

add_action('wp_enqueue_scripts', 'wpeStyles'); // Add Theme Stylesheet
function wpeStyles()  {
  wp_dequeue_style('fancybox');
  wp_dequeue_style('wp_dequeue_style');

  wp_register_style('wpeasy-style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
  wp_enqueue_style('wpeasy-style'); // Enqueue it!
}

add_action('init', 'wpeHeaderScripts'); // Add Scripts to wp_head
function wpeHeaderScripts() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
    wp_enqueue_script('jquery');

    wp_register_script('jquery-migrate', '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js', array(), '3.0.0');
    wp_enqueue_script('jquery-migrate');

    wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3');
    wp_enqueue_script('modernizr');

    wp_deregister_script( 'jquery-form' );

    //  Load footer scripts (footer.php)
    wp_register_script('wpeScripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
    wp_enqueue_script('wpeScripts');

  }
}

//  Remove wp_head() injected Recent Comment styles
//  add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
function my_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array(
    $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
    'recent_comments_style'
  ));
}

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
  $content_width = 980;
}

if (function_exists('add_theme_support')) {
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 1200, '', true); // Large Thumbnail
  add_image_size('medium', 600, '', true); // Medium Thumbnail
  add_image_size('small', 250, '', true); // Small Thumbnail
  add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');

  // Localisation Support
  load_theme_textdomain('wpeasy', get_template_directory() . '/languages');
}

// WPE head navigation
function wpeHeadNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'header-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}

// WPE head navigation
function wpeLangNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'lang-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="lengnav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}

// WPE head navigation
function wpeTopLeftNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'top-left-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="topleftnav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}

// WPE head navigation
function wpeTopRightNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'top-right-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="toprightnav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}

// WPE footer navigation
function wpeFootNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'footer-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="footernav">%3$s</ul>',
    'depth'           => 1,
    'walker'          => ''
    )
  );
}

// WPE sidebar navigation
function wpeSideNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'sidebar-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="sidebarnav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
//  Register WPE Navigation
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
function register_html5_menu() {
  register_nav_menus(array(
    'header-menu' => __('Меню в шапке', 'wpeasy'),
    'top-left-menu' => __('Меню вверху слева', 'wpeasy'),
    'top-right-menu' => __('Меню вверху справа', 'wpeasy'),
    'lang-menu' => __('Меню языков', 'wpeasy'),
    'sidebar-menu' => __('Меню в сайдбар', 'wpeasy'),
    'footer-menu' => __('Меню в подвал', 'wpeasy')
  ));
}
//  If Dynamic Sidebar Existsов
if (function_exists('register_sidebar')) {
  //  Define Sidebar Widget Area 1
  register_sidebar(array(
    'name' => __('Блок виджетов #1', 'wpeasy'),
    'description' => __('Description for this widget-area...', 'wpeasy'),
    'id' => 'widgetarea1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6>',
    'after_title' => '</h6>'
  ));
  //  Define Sidebar Widget Area 2. If your want to display more widget - uncoment this
  /*
  register_sidebar(array(
    'name' => __('Блок виджетов #2', 'wpeasy'),
    'description' => __('Description for this widget-area...', 'wpeasy'),
    'id' => 'widgetarea2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6>',
    'after_title' => '</h6>'
  ));
  */
}

//  Custom Excerpts
//  RU: Произвольное обрезание текста
function wpeExcerpt10($length) {
  return 10;
}
function wpeExcerpt20($length) {
  return 20;
}
function wpeExcerpt40($length) {
  return 40;
}
//  Create the Custom Excerpts callback
//  RU: Собственная обрезка контента
function wpeExcerpt($length_callback = '', $more_callback = '') {
  global $post;
  if (function_exists($length_callback)) {
      add_filter('excerpt_length', $length_callback);
  }
  if (function_exists($more_callback)) {
      add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

//  Custom View Article link to Post
//  RU: Добавляем "Читать дальше" к обрезанным записям
/*
function html5_blank_view_article($more) {
  global $post;
  return '... <!-- noindex --><a rel="nofollow" class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'wpeasy') . '</a><!-- /noindex -->';
}
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
*/
// Remove the <div> surrounding the dynamic navigation to cleanup markup
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
function my_wp_nav_menu_args($args = '') {
  $args['container'] = false;
  return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
function remove_category_rel_from_category_list($thelist) {
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
function add_slug_to_body_class($classes) {
  global $post;
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'prev_text' => __('« Previous'),
      'next_text' => __('Next »'),
      'total' => $wp_query->max_num_pages
    )
  );
}

// Remove Admin bar
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
function remove_admin_bar() {
  return false;
}

// Remove 'text/css' from our enqueued stylesheet
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
function html5_style_remove($tag) {
  return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

// Custom Gravatar in Settings > Discussion
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults) {
  $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
  $avatar_defaults[$myavatar] = "Custom Gravatar";
  return $avatar_defaults;
}

// Threaded Comments
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
function enable_threaded_comments() {
  if (!is_admin()) {
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script('comment-reply');
    }
  }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
?>
  <!-- heads up: starting < for the html tag (li or div) in the next line: -->
  <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
      <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
        <br />
      <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
      <?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' ); ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
      <?php if ( 'div' != $args['style'] ) : ?>
    </div>
  <?php endif; ?>
<?php }

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

 // Как отключить комментарии для Медиафайлов WordPress
 // http://wordpresso.org/hacks/kak-otklyuchit-kommentarii-dlya-mediafaylov-wordpress/
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
function filter_media_comment_status( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
    return false;
  }
  return $open;
}

 // Редирект записи, когда поисковый запрос выдает один результат
 // http://wordpresso.org/hacks/29-wordpress-tryukov-dlya-rabotyi-s-zapisyami-i-stranitsami/
add_action('template_redirect', 'single_result');
function single_result() {
  if (is_search()) {
    global $wp_query;
    if ($wp_query->post_count == 1) {
      wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    }
  }
}

// хлебные крошки   http://dimox.name/wordpress-breadcrumbs-without-a-plugin/
/* <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?> */

function easy_breadcrumbs() {

  // Settings
  $separator          = ' &raquo; ';
  $breadcrums_id      = 'breadcrumbs';
  $breadcrums_class   = 'breadcrumbs';
  $home_title         = __('Home', 'wpeasy');

  // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
  $custom_taxonomy    = 'categories';

  // Get the query & post information
  global $post,$wp_query;

  // Do not display on the homepage
  if ( !is_front_page() ) {

    // Build the breadcrums
    echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

    // Home page
    echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
    echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}
// end easy_breadcrumbs()

// to remove the /./ from links, use this filter
// https://stackoverflow.com/questions/17798815/remove-category-tag-base-from-wordpress-url-without-a-plugin
add_filter( 'term_link', function($termlink){
  return str_replace('/./', '/', $termlink);
}, 10, 1 );


add_action( 'init', 'disable_wp_emojicons' );
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
/*
function rflms_post_type() {
    $labels = array(
        'name'                => _x( 'Lessons', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Lesson', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Lessons', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Product:', 'text_domain' ),
        'all_items'           => __( 'All Lessons', 'text_domain' ),
        'view_item'           => __( 'View Lesson', 'text_domain' ),
        'add_new_item'        => __( 'Add New Lesson', 'text_domain' ),
        'add_new'             => __( 'New Lesson', 'text_domain' ),
        'edit_item'           => __( 'Edit Lesson', 'text_domain' ),
        'update_item'         => __( 'Update Lesson', 'text_domain' ),
        'search_items'        => __( 'Search Lessions', 'text_domain' ),
        'not_found'           => __( 'No Lessons Found', 'text_domain' ),
        'not_found_in_trash'  => __( 'No Lessons Found in Trash', 'text_domain' ),
    );

    $args = array(
        'label'               => __( 'Lessons', 'text_domain' ),
        'description'         => __( 'Referable Lessons', 'text_domain' ),
        'labels'              => $labels,
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'supports'        => array('title', 'editor', 'author', 'thumbnail', 'page-attributes'),
        'menu_position'       => 5,
        'menu_icon'           => null,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite' => array('slug' => '%course%')
    );

    register_post_type( 'lessons', $args );


// Hook into the 'init' action

}
add_action( 'init', 'rflms_post_type', 0 );

// Register Custom Taxonomy
function custom_taxonomy()  {
    $labels = array(
        'name'                       => _x( 'Courses', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Course', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Courses', 'text_domain' ),
        'all_items'                  => __( 'All Courses', 'text_domain' ),
        'parent_item'                => __( 'Parent Course', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Course:', 'text_domain' ),
        'new_item_name'              => __( 'New Course Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Course', 'text_domain' ),
        'edit_item'                  => __( 'Edit Course', 'text_domain' ),
        'update_item'                => __( 'Update Course', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Courses with commas', 'text_domain' ),
        'search_items'               => __( 'Search Courses', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or Remove Courses', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from Most Used courses', 'text_domain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'                    => array('slug' => 'courses'),
    );

    register_taxonomy( 'course', 'lessons', $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 0 );




function wpa_course_post_link( $post_link, $id = 0 ){
    $post = get_post($id);
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'course' );
        if( $terms ){
            return str_replace( '%course%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_course_post_link', 1, 3 );
*/

/*
// hook into the init action and call create_book_taxonomies when it fires*/






function filter_ptags_on_images($content){

    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


//shortcode slider
function insert_slider() {
    $images = get_field('page_image_slider');

    if( $images ){
        $html = '<div class="page_slider_wrap">';
        $html .= '<div class="page_slider owl-carousel" >';
        foreach( $images as $img ):

            $html .= '<div class="page_slider_item item">';
                $html .= '<div class="img_wrapp"><a href="' . $img['url'] . '" rel="lightbox"><img src="' . $img['sizes']['small'] . '"/></div></a>';
            $html .= '</div>';
        endforeach;
    }
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode( 'insert_slider', 'insert_slider' );
//[insert_slider]





//FILTER





function misha_filter_function(){
  $args = array(

    'order'       => 'DESC',
    'posts_per_page' => -1,

  );



//chek region and country
  if( isset( $_POST['regionfilter']) || isset( $_POST['countryfilter']) ){
    $catRegion = $_POST['regionfilter'];

    $catCountry = $_POST['countryfilter'];

    foreach ($catRegion as $key => $var) {
        $catRegionArray[$key] = get_cat_ID($var);
    }

    foreach ($catCountry as $key => $var) {
        $catCountryArray[$key] = get_cat_ID($var);
    }


    if(($catRegionArray[0] != 0) && ($catCountryArray[0] != 0) ){
      $args['cat'] = $catCountryArray;
      //$variant = 1;
    } else if(($catRegionArray[0] != 0) && ($catCountryArray[0] == 0) ){
      $args['cat'] = $catRegionArray;
      //$variant = 2;
    } else if(($catRegionArray[0] == 0) && ($catCountryArray[0] != 0) ){
      $args['cat'] =  $catCountryArray;
      //$variant = 3;
    }

  }



//chek tour typ

  if( isset( $_POST['tourtypefilter']) ){
    $catTourType = $_POST['tourtypefilter'];
    foreach ($catTourType as $key => $var) {
        $catTourTypeArray[$key] = (int)$var;
    }

  }



/*    if ( isset( $_POST['monthfilter'] )) {

      $args['meta_query'][] = array(
            'key'   => 'tour_months_chekbox',
            'value'   => $_POST['monthfilter'],
            'compare' => 'IN',

        );

  }*/

if( isset( $_POST['daysfilter'] ) ){
  $dayFilters = $_POST['daysfilter'];
  $dayArrMin = array();
  $dayArrMax = array();
  $minDay = 0;
  $maxDay = 0;

  foreach($dayFilters as $key=>$dayFilter){
    $dayArrs[$key] = explode(";", $dayFilter);
  }

  foreach($dayArrs as $key=>$dayArr){
    $dayArrMin[$key] = (int)$dayArr[0];
    $dayArrMax[$key] = (int)$dayArr[1];
  }


  if(!empty($dayArrMin)){
    $minDay = min($dayArrMin);
  }

  if(!empty($dayArrMax) && !in_array(0, $dayArrMax)){
    $maxDay = max($dayArrMax);
  }


  if( $minDay > 0 && $maxDay > 0 ) {
    $args['meta_query'][] = array(
      'key' => 'tour_days',
      'value' => array( $minDay, $maxDay ),
      'type' => 'numeric',
      'compare' => 'BETWEEN'
    );
  } else if( $minDay > 0 && $maxDay == 0 ){
    $args['meta_query'][] = array(
      'key' => 'tour_days',
      'value' => $minDay,
      'type' => 'numeric',
      'compare' => '>='
    );
  } else if( $minDay == 0 && $maxDay > 0 ){
    $args['meta_query'][] = array(
      'key' => 'tour_days',
      'value' => $maxDay,
      'type' => 'numeric',
      'compare' => '<='
    );
  }

}

/*
  // create $args['meta_query'] array if one of the following fields is filled
  if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
    $args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true

  // if both minimum price and maximum price are specified we will use BETWEEN comparison
  if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
    $args['meta_query'][] = array(
      'key' => 'tour_days',
      'value' => array( $_POST['price_min'], $_POST['price_max'] ),
      'type' => 'numeric',
      'compare' => 'between'
    );
  } else {
    // if only min price is set
    if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
      $args['meta_query'][] = array(
        'key' => 'tour_days',
        'value' => $_POST['price_min'],
        'type' => 'numeric',
        'compare' => '>'
      );

    // if only max price is set
    if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
      $args['meta_query'][] = array(
        'key' => 'tour_days',
        'value' => $_POST['price_max'],
        'type' => 'numeric',
        'compare' => '<'
      );
  }*/


  if( isset( $_POST['monthfilter']) ){
    $monthArr = $_POST['monthfilter'];
  }



  $args['meta_key'] =  'tour_price';
  $args['orderby'] =  'meta_value';
  //$args['meta_value'] =  'single-tour.php';

  $query = new WP_Query( $args );

  if( $query->have_posts() ) :


    while( $query->have_posts() ): $query->the_post();


      $monthCompare = true;

      if( $monthArr ){
        $monthCompare = false;
        $monthPost = get_field('tour_months_chekbox');
        if( !empty(array_intersect($monthPost,  $monthArr))){
            $monthCompare = true;
          }
      }


      if(get_page_template_slug() === 'single-tour.php' && $monthCompare){
          if( ($catTourTypeArray[0] != 0) ){
            if(in_category($catTourTypeArray) ){
              get_template_part('search-loop');
            }
          }else{
            get_template_part('search-loop');

          }
      }

    endwhile;
    wp_reset_postdata();
  else :

  endif;

  die();
}


add_action('wp_ajax_myfilter', 'misha_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');



//update country list
function regionfilter_ajax() {
  $value = $_POST['data'];
  if( $value ){
    foreach ($value as $key => $var) {
        $valueIDs[$key] = get_cat_ID($var);
    }

    foreach ( $valueIDs as $valID ) :
      if($valID == 0){ $valID = '';}
        $argsCountry = array(
          'type'         => 'post',
          'parent'       => $valID,
          'orderby'      => 'name',
          'order'        => 'ASC',
          //'hide_empty'   => false,
        );

      $query = new WP_Query( $argsCountry );
        if( $categories = get_categories( $argsCountry ) ) :
          foreach ( $categories as $cat ) :
              $cat__ID = $cat->cat_ID;
              $field_term = 'category_' . $cat__ID;
              $cat__type = get_field('cat_type', $field_term);
              if($cat__type === 'country') {
                      echo '<option value="' . $cat->name . '">' . $cat->name . '</option>';
              }
          endforeach;
          wp_reset_postdata();
      endif;
    endforeach;
  }
  wp_die();
}

add_action( 'wp_ajax_regionfilter_ajax', __NAMESPACE__ . '\\regionfilter_ajax' );
add_action( 'wp_ajax_nopriv_regionfilter_ajax', __NAMESPACE__ . '\\regionfilter_ajax' );



function update_wpfp_list(){

    $linkPostId = $_POST['user_id'];
    $linkData = $_POST['linkData'];

    if($linkPostId != 0){
        $favorite_post_ids = get_user_meta( $linkPostId, WPFP_META_KEY, true);
    }else{
        $favorite_post_ids = wpfp_get_users_favorites();
    }

    $favorite_post_ids = array_reverse($favorite_post_ids);
    $post_per_page = wpfp_get_option("post_per_page");
    $page = intval(get_query_var('paged'));


    //var_dump($favorite_post_ids);
    //var_dump($linkData);
   //var_dump($linkPostId);
    $fpCount = 0;
    if ($favorite_post_ids) {
        $qry = array(
          'post__in' => $favorite_post_ids,
          'posts_per_page'=> -1,//$post_per_page,
          'orderby' => 'post__in',
          //'paged' => $page
        );
      $fpCount = count($favorite_post_ids);
      $query = new WP_Query( $qry );

      if( $query->have_posts() ) :
          echo "<div class='favorites-row row' data-fpcount='".$fpCount."'>";
          while( $query->have_posts() ): $query->the_post();
              get_template_part('favorite-loop');
          endwhile;
          echo "</div>";
          wp_reset_postdata();
      endif;
    }
    die();
}


add_action('wp_ajax_update_fp', 'update_wpfp_list');
add_action('wp_ajax_nopriv_update_fp', 'update_wpfp_list');


function update_wpfp__link(){
  $linkPostId = $_POST['post_id'];
  if($linkPostId){
    if (wpfp_check_favorited($linkPostId)):

       echo wpfp_loading_img().wpfp_link_html($linkPostId, wpfp_get_option('remove_favorite'), "remove");
    else:
       echo wpfp_loading_img().wpfp_link_html($linkPostId, wpfp_get_option('add_favorite'), "add");
    endif;
  }
  die();
}


add_action('wp_ajax_update_fplink', 'update_wpfp__link');
add_action('wp_ajax_nopriv_update_fplink', 'update_wpfp__link');




/*
function update_wpfp__post(){
  $linkPostId = $_POST['post_id'];
  if($linkPostId){

    if (wpfp_check_favorited($linkPostId)):

        wpfp_remove_favorite($linkPostId);

    else:
        wpfp_add_favorite($linkPostId);
    endif;
  }

  die();
}


add_action('wp_ajax_update_fpost', 'update_wpfp__post');
add_action('wp_ajax_nopriv_update_fpost', 'update_wpfp__post');*/




/*
Plugin Name: Filter Page by Template
Description: See list of pages or any type of posts by filtering based on used template. Page template filter dropdown for post/page listing. New column in page list that shows template name.
Plugin URI: http://onetarek.com
Author: oneTarek
Author URI: http://onetarek.com
Version: 1.1
*/

class FilterPagesByTemplate {

  public function __construct()
  {
    add_action( 'restrict_manage_posts', array( $this, 'filter_dropdown' ) );
    add_filter( 'request', array( $this, 'filter_post_list' ) );

    add_filter('manage_pages_columns', array( $this, 'post_list_columns_head'));
    add_action('manage_pages_custom_column', array( $this, 'post_list_columns_content' ), 10, 2);

  }

  public function filter_dropdown()
  {
    if ( $GLOBALS['pagenow'] === 'upload.php' ) {
      return;
    }

    $template = isset( $_GET['page_template_filter'] ) ? $_GET['page_template_filter'] : "all";
    $default_title = apply_filters( 'default_page_template_title',  __( 'Default Template' ), 'meta-box' );
    ?>
    <select name="page_template_filter" id="page_template_filter">
      <option value="all">All Page Templates</option>
      <option value="default" <?php echo ( $template == 'default' )? ' selected="selected" ' : "";?>><?php echo esc_html( $default_title ); ?></option>
      <?php page_template_dropdown($template); ?>
    </select>
    <?php
  }//end func

  public function filter_post_list( $vars ){

    if ( ! isset( $_GET['page_template_filter'] ) ) return $vars;
    $template = trim($_GET['page_template_filter']);
    if ( $template == "" || $template == 'all' ) return $vars;

    $vars = array_merge(
      $vars,
      array(
        'meta_query' => array(
          array(
            'key'     => '_wp_page_template',
            'value'   => $template,
            'compare' => '=',
          ),
        ),
      )
    );
    return $vars;

  }//end func

  # Add new column to post list
  public function post_list_columns_head( $columns )
  {
      $columns['template'] = 'Template';
      return $columns;
  }

  #post list column content
  public function post_list_columns_content( $column_name, $post_id )
  {
      $post_type = 'page';

      if($column_name == 'template')
      {
          $template = get_post_meta($post_id, "_wp_page_template" , true );
          if($template)
          {
            if($template == 'default')
            {
              $template_name = apply_filters( 'default_page_template_title',  __( 'Default Template' ), 'meta-box' );
              echo '<span title="Template file : page.php">'.$template_name.'</span>';
            }
            else
            {
              $templates = wp_get_theme()->get_page_templates( null, $post_type );

              if( isset( $templates[ $template ] ) )
              {
                echo '<span title="Template file : '.$template.'">'.$templates[ $template ].'</span>';
              }
              else
              {

                echo '<span style="color:red" title="This template file does not exist">'.$template.'</span>';
              }
            }

          }
      }
  }


}//end class

new FilterPagesByTemplate();
























?>
