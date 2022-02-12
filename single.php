<?php
/*
	 * Template Post Type: post
	 */

get_header();  ?>

<div id="content" class="site-content container py-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <?php //the_breadcrumb(); ?>

    <div class="row">
      <div class="col-md-8 col-xxl-9">

        <main id="main" class="site-main">

          <header class="entry-header">
            <?php the_post(); ?>
            <?php bootscore_category_badge(); ?>
            <?php the_title('<h1>', '</h1>'); ?>
            <p class="entry-meta">
              <small class="text-muted">
                <?php
                bootscore_date();
                ?>
              </small>
            </p>
            <?php bootscore_post_thumbnail(); ?>
          </header>

          <div class="post-content bg-light">
            <?php the_content(); ?>
          </div>

          <footer class="entry-footer clear-both">
            <div class="mb-4">
              <?php bootscore_tags(); ?>
            </div>
          </footer>

          <?php comments_template(); ?>

        </main> <!-- #main -->

      </div><!-- col -->
    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>