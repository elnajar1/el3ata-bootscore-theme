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
          <main>
            
            <div class = "d-none bg-light p-2">
              <?php the_breadcrumb(); ?>        
           </div>
            
            <header>
              <h1 class="fw-bold bg-secondary text-white py-4 px-2 my-2 rounded" >
                <?php the_title(); ?> 
              </h1>
            </header> 
            
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
                if ( !empty( has_post_thumbnail() ) ) { ?>
                  
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
              <article class ="post-content">
                <?php the_content(); ?>
              <article/>
              <a class ="p-2 " href ="http://el3ata.com/%d9%83%d9%8a%d9%81%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%b3%d8%a7%d9%87%d9%85%d8%a9-%d8%a8%d8%a7%d9%84%d9%86%d8%b4%d8%b1-%d9%88-%d8%a7%d9%84%d8%aa%d8%ad%d8%b1%d9%8a%d8%b1-%d9%81%d9%8a-%d8%b9%d8%b7%d8%a7/">
                <u>
                  <i class="bi bi-pencil-square"></i>
                  ساهم بالتعديل 
                </u>
              </a>
            </div>
            
            <div id ="video" class="bg-light py-2 my-2 rounded">
              <?php
              
                if( strpos($details['url'],'youtu') === false){
                  //not YouTube video ?>
                  <p>
                    للاستاع للمحاضرة ،  هذا هو
                    <a href ="<?php echo $details['url'] ?>">
                       رابط محاضرة 
                       ( <?php the_title(); ?> ) 
                    </a>
                  </p>
                 
                <?php
                }else {
                  
                  if( strpos($details['url'],'playlist') ){
                    //YouTube playlist 
                    ?>
                    <div class ="p-2">
                      <iframe style ="width: 100vw;height: calc(100vw/1.77); " class ="rounded" src="http://www.youtube.com/embed/<?php echo $details['url']  ?>" title="<?php the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?php 
                    
                  }else{
                   //YouTube video
                    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#",
                      $details['url'] ,
                      $youtube_video_id
                    );
                    
                    ?>
                    <div class ="p-2">
                      <iframe style ="width: 100vw;height: calc(100vw/1.77); " class ="rounded" src="http://www.youtube.com/embed/<?php echo $youtube_video_id[0]  ?>" title="<?php the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?php 
                  }
                  
                }
              ?>
            </div>
            
          </main>
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