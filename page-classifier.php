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
          <pre>
            <?php var_dump($lecture_categories); ?>
          </pre>
        </div>
        
      </div>
    </div>
    
  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>