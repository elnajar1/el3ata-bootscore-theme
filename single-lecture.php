<?php acf_form_head(); ?>
<?php 
  get_header(); 
  $details = get_fields();
?>

<div id="content" class="site-content container">
  <div id="primary" class="content-area">
    
    <div class = "row">
      <div class = "col">
        
        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
          <div class="">
            
            <div class = "bg-light p-2">
              <?php
                $taxonomy = 'lecture_category';
                
                // Get the term IDs assigned to post.
                $post_terms = wp_get_object_terms(
                    $post->ID,
                    $taxonomy,
                    array(
                        'fields' => 'ids'
                    )
                );
                
                // Separator between links.
                $separator = ',';
                
                if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
                
                    $term_ids = implode( ',' , $post_terms );
                
                    $terms = get_terms( array(
                        'title_li' => '',
                        'style'    => 'none',
                        'echo'     => false,
                        'taxonomy' => $taxonomy,
                        'include'  => $term_ids
                    ) );
                    var_dump ($terms) ;
                    $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
                
                    // Display post categories.
                    echo  $terms;
                }
              ?>
            </div>
            
            <h1 class="fw-bold bg-secondary text-white py-4 px-2 my-2 rounded" >
              <?php the_title(); ?> 
            </h1>
            
            <div class="bg-light py-2 my-2 rounded">
              <?php 
                if ( !empty($details['url']) ) { ?>
                  <a href = "#video" class = "my-1 btn btn-sm btn-outline-secondary" >
                    <i class="text-danger bi bi-youtube"></i>
                    مشاهدة 
                  </a>
                <?php 
                }
              ?>  
              
              <?php 
                if ( !empty($details['handout_files']['url']) ) { ?>
                  <a href = "<?php echo $details['handout_files']['url'] ?>" class = "my-1 btn btn-sm btn-outline-secondary" >
                    <i class="bi bi-download"></i> 
                    <i class="bi bi-file-earmark-pdf"></i>
                    التفريغ
                  </a>
                <?php
                }
              ?> 
              
              <?php 
                if ( !empty($details['summarization_files']['url']) ) { ?>
                  <a href = "<?php echo $details['summarization_files']['url'] ?>" class = "my-1 btn btn-sm btn-outline-secondary" >
                    <i class="bi bi-download"></i>
                    <i class="bi bi-file-earmark-text"></i> 
                     التلخيص
                  </a>
                <?php
                }
              ?> 
              
              <?php 
                if ( !empty($details['summarization_files']['url']) ) { ?>
                  
                  <button  onclick ="document.getElementById('thumbnail').style.display = 'block' " class = "my-1 btn btn-sm btn-outline-secondary" >
                    <i class="text-warning bi bi-image"></i>
                    تشجير 
                  </button>
                <?php
                }
              ?> 
            </div> 
            
            <div class="bg-light py-2 my-2 rounded">
              <div id = "thumbnail" style = "display : none">
                <?php the_post_thumbnail('', ['class' => 'p-1' ] ) ?>
              </div>
              <?php the_content(); ?> 
            </div>
            
            <div id ="video" class="bg-light py-2 my-2 rounded">
              <?php
              
                if( stripos($details['url'],'youtu') === false){
                  //not YouTube video ?>
                  <p>
                    للاستاع للمحاضرة ،  هذا هو
                    <a href ="<?php echo $details['url'] ?>">
                       رابط محاضرة 
                       ( <?php the_title(); ?> ) 
                       كمقطع صوتي علي تلجرام
                    </a>
                  </p>
                 
                 <?php
                } else {
                  //is youtube
                  preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",
                    $details['url'] ,
                    $youtube_video_id
                  );
                  
                  ?>
                  <div class ="m-auto">
                    <iframe class="m-auto" src="http://www.youtube.com/embed/<?php echo $youtube_video_id[0]  ?>" title="<?php the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
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