<?php 
  get_header();
?>

<div id="content" class="site-content container">
  <div id="primary" class="content-area">
    
    <div class = "row py-4">
      <div class = "col">
        <h2 class = "fw-bold text-secondary">
          عطاء 
        </h2>
        <p class = "text-muted">
          مذكرة طالب البناء المنهجي 
        </p>
      </div>
    </div>
    
    <div class = "row">
      <div class = "col classifier-container py-2 pb-4">
        
        <h2 class = "text-center btn btn-light">
          مُحاضرات البناء المنهجي 
        </h2>
        
        <?php
        
        //parent category (then child(category) and subchild, then posts(lectures) in each category ) 
        $parent_ID = 13; //البناء المنهجي
        
        //-level_one_clilds-
        $level_one_clilds = get_terms( array(
            'taxonomy'   => 'lecture_category',
            'parent'     => $parent_ID ,
            'depth'      => 1,
            'orderby'    => 'post_date', 
            'order'      => 'ASC', 
            'hide_empty' => true 
        ) );
        foreach( $level_one_clilds as $level_one_clild ):
            
            echo "<div class ='level-one-clild' ><p>" . $level_one_clild->name . "</p></div>" ;
            
            // #level_one_clild_posts#
            $level_one_clild_posts = get_posts(array(
                'post_type' => 'lecture',
                'numberposts' => -1,
                'orderby'    => 'post_date', 
                'order'      => 'ASC',
                'tax_query' => array(
                array(
                  'taxonomy' => 'lecture_category',
                  'field' => $level_one_clild->term_id, 
                  'terms' => $level_one_clild->term_id, 
                  'include_children' => false
                )
               )
              ));
              
              echo "<ul  class='level-one-clild-posts' >";
              foreach ( $level_one_clild_posts as $post ) : setup_postdata( $post ); ?>
                <li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
              <?php 
              endforeach;  
              echo "</ul>";
              wp_reset_postdata(); // #level_one_clild_posts#
              
            //--level_two_clilds--
            $level_two_clilds = get_terms( array(
              'taxonomy'    => 'lecture_category',
              'parent'      => $level_one_clild->term_id, 
              'depth'       => 1,
              'orderby'    => 'post_date', 
              'order'      => 'ASC',
              'hide_empty'  => false
            ));
            foreach( $level_two_clilds as $level_two_clild ):
              
              echo "<div class ='level-two-clild' ><p>" . $level_two_clild->name . "</p></div>" ;
            
                // ##level_one_clild_posts##
                $level_two_clild_posts = get_posts(array(
                    'post_type' => 'lecture',
                    'numberposts' => -1,
                    'orderby'    => 'post_date', 
                    'order'      => 'ASC',
                    'tax_query' => array(
                    array(
                      'taxonomy' => 'lecture_category',
                      'field' => $level_two_clild->term_id, 
                      'terms' => $level_two_clild->term_id, 
                      'include_children' => false
                    )
                   )
                  ));
                  
                  echo "<ul class = 'level-two-clild-posts'>";
                  foreach ( $level_two_clild_posts as $post ) : setup_postdata( $post ); ?>
                    <li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
                  <?php 
                  endforeach;  
                  echo "</ul>";
                  wp_reset_postdata(); // ##level_two_clild_posts##
                 
               //---level_three_clilds ---
               $level_three_clilds = get_terms( array(
                'taxonomy'    => 'lecture_category',
                'parent'      => $level_two_clild->term_id, 
                'depth'       => 1,
                'orderby'    => 'post_date', 
                'order'      => 'ASC',
                'hide_empty'  => false
              ));
              foreach( $level_three_clilds as $level_three_clild ):
                
                echo "<div class ='level-three-clild' ><p>" . $level_three_clild->name . "</p></div>" ;
            
                // ###level_three_clild_posts###
                $level_three_clild_posts = get_posts(array(
                    'post_type' => 'lecture',
                    'numberposts' => -1,
                    'orderby'    => 'post_date', 
                    'order'      => 'ASC',
                    'tax_query' => array(
                    array(
                      'taxonomy' => 'lecture_category',
                      'field' => $level_three_clild->term_id, 
                      'terms' => $level_three_clild->term_id, 
                      'include_children' => false
                    )
                   )
                  ));
                  
                  echo "<ul class ='level-three-clild-posts'>";
                  foreach ( $level_three_clild_posts as $post ) : setup_postdata( $post ); ?>
                    <li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
                  <?php 
                  endforeach;  
                  echo "</ul>";
                  wp_reset_postdata(); // ###level_one_clild_posts###
                 
              endforeach ; //-level_three_clild-
              
            endforeach ;  //--level_two_clild--
            
        endforeach ; //---level_one_clilds---
        ?>
      </div>
    </div>
    
  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>