<?php 
  get_header();
  $lecture_categories = get_terms( array(
      'taxonomy' => 'lecture_category',
      'hide_empty' => false
  ) );

?>
<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">
    
    <div class = "row">
      <div class = "col">

        <div class="">
          <ul>
            <?php
              // Check if any term exists
              if ( ! empty( $lecture_categories ) && is_array( $lecture_categories ) ) {
                  // Run a loop and print them all
                  foreach ( $lecture_categories as $lecture_category ) { ?>
                    <li>
                      <a href="<?php echo esc_url( get_term_link( $lecture_category ) ) ?>">
                          <?php echo $lecture_category->name; ?>
                      </a>
                    </li>
                  <?php
                  }
              } 
            ?>
          </ul>
        </div>
        
      </div>
    </div>
    
  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>