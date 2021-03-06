<?php get_header(); ?>
    <section id="contents">
      <header class="page-header">
        <h1 class="page-title">
          <?php
          if (is_author()) :
            echo esc_html(get_the_author_meta('display_name',get_query_var('author')));
          else :
            single_cat_title();
          endif;
          ?>
        </h1>
      </header>
      <div class="posts">
<?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      get_template_part('content-archive');
    endwhile;
    if (function_exists('page_navi')) :
      page_navi('elm_class=page-nav&edge_type=span');
    endif;
  endif;
?>
      </div>
<?php get_template_part('back_to_top'); ?>
    </section><!-- #contents end -->
      <?php get_sidebar(); ?>
    </section><!-- #contents-body end -->
  </div><!-- #container end -->
  <?php get_footer(); ?>
