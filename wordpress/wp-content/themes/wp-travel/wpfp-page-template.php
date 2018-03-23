<?php
    $fpCount = 0;
    if ($favorite_post_ids) {
		$favorite_post_ids = array_reverse($favorite_post_ids);
        $post_per_page = wpfp_get_option("post_per_page");
        $page = intval(get_query_var('paged'));
        $fpCount = count($favorite_post_ids);
        $qry = array(
            'post__in' => $favorite_post_ids,
            'posts_per_page'=> -1,//$post_per_page,
            'orderby' => 'post__in',
            //'paged' => $page
        );

        // $qry['post_type'] = array('post','page');
        query_posts($qry);

        echo "<div class='favorites-row row' data-fpcount='".$fpCount."'>";
        while ( have_posts() ) : the_post();
            get_template_part('favorite-loop');
        endwhile;
        echo "</div>";

        wp_reset_query();
    }
