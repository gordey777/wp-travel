
    <article id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>

        <div class="row">
          <div class="col-md-10 col-md-offset-1"><h1 class="page-title inner-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>

        </div><!-- /.row -->

      <?php if(get_field('content_wrapper')){ ?>

          <div class="row">
            <div class="col-md-10 col-md-offset-1">
      <?php } ?>

        <?php the_content(); ?>

      <?php if(get_field('content_wrapper')){ ?>
            </div>
          </div><!-- /.row -->

      <?php } ?>

    </article>


