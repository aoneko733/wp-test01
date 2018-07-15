<?php get_header(); ?>
    <section id="contents">
<?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      get_template_part('content');
    endwhile;
  endif;
  
?>
    </section><!-- #contents end -->
      <?php get_sidebar(); ?>
    </section><!-- #contents-body end -->
  </div><!-- #container end -->
  <?php get_footer(); ?>
