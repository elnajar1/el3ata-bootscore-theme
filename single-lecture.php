<?php acf_form_head(); ?>
<?php get_header(); ?>

<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area">
    
    <div class = "row">
      <div class = "col">
        
        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
          <div class="">
            
            <h1 class="fw-bold bg-secondary p-2 m-2 rounded" >
              <?php the_title(); ?> 
            </h1>
            
            <div class="bg-light p-2 m-2 rounded">
              <?php the_content(); ?> 
            </div>
            
            <div class="bg-light p-2 m-2 rounded">
              <?php 
                if ( get_fields(['handout_files']['link'] ) ) {
                  echo get_fields(['handout_files']['link']) ;
                }
              ?> 
            </div>
            
            <div class="bg-light p-2 m-2 rounded">
              <?php
              
                if( stripos(get_fields(['url']),'youtu') === false){
                  //not YouTube video ?>
                  <p>
                    للاستاع للمحاضرة ،  هذا هو
                    <a href ="<?php echo get_fields(['url']) ?>">
                       رابط محاضرة 
                       ( <?php the_title(); ?> ) 
                       كمقطع صوتي علي تلجرام
                    </a>
                  </p>
                 
                 <?php
                } else {
                  //is youtube ?>
                  <iframe width="560" height="315" src="<?php echo get_fields(['url']) ?>" title="<?php the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <?php
                }
              ?>
            </div>
            
          </div>
        <?php endwhile; endif; ?>
    
      </div>
    </div>
    
    <div class = "d-none row">
      <div class = "col border-tob">
        <?php comments_template(); ?>
      </div>
    </div> 

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>