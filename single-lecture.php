<?php acf_form_head(); ?>
<?php get_header(); ?>

<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area">
    
    <div class = "row">
      <div class = "col">
        
        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
          <div class="py-2">
            
            <h1 class="fw-bold single-post-title" >
              <?php the_title(); ?> 
            </h1>
            
            <div class="">
              <?php the_content(); ?> 
            </div>
            
            <div class="">
              <pre>
                <?php var_dump(get_fields()); ?>
             </pre>
            </div>
            
          </div>
        <?php endwhile; endif; ?>
    
      </div>
    </div>
    
    <div class = "row bg-light py-5">
      <div class = "col text-center">
        
        <?php 
          if ( get_next_post_link('%link','') ) :
            //get next post in the same category
            echo  next_post_link('%link', '<button class ="btn btn-light bg-white text-primary border"> التالي :  %title </button>') ;
          else:
            //get previous post in the same category
            echo  previous_post_link('%link', '<button class ="btn btn-light bg-white text-primary border"> السابق : %title </button>' ) ;
          endif;
          
        ?>
      </div>
    </div> 
    
    <div class = "row">
      <div class = "col border-tob">
        <?php comments_template(); ?>
      </div>
    </div> 

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>