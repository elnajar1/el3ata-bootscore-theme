<?php 
  get_header();
?>

<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area">
    
    <div class = "row">
      <div class = "col bg-light">
      
        <?php
        
        //parent category (then child(category) and subchild, then posts(lectures) in each category ) 
        $parent_ID = 13; //البناء المنهجي
        
        //-level_one_clilds-
        $level_one_clilds = get_terms( array(
            'taxonomy'   => 'lecture_category',
            'parent'     => $parent_ID ,
            'depth'      => 1,
            'hide_empty' => false
        ) );
        foreach( $level_one_clilds as $level_one_clild ):
            
            echo $level_one_clild->name . "<hr>" ;
            
            // #level_one_clild_posts#
            $level_one_clild_posts = get_posts(array(
                'post_type' => 'lecture',
                'numberposts' => -1,
                'tax_query' => array(
                array(
                  'taxonomy' => 'lecture_category',
                  'field' => $level_one_clild->term_id, 
                  'terms' => $level_one_clild->term_id, 
                  'include_children' => false
                )
               )
              ));
              
              echo "<ul>";
              foreach ( $level_one_clild_posts as $post ) : setup_postdata( $post ); 
                echo "<li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>";
              endforeach;  
              echo "</ul>";
              wp_reset_postdata(); // #level_one_clild_posts#
              
            //--level_two_clilds--
            $level_two_clilds = get_terms( array(
              'taxonomy'    => 'lecture_category',
              'parent'      => $level_one_clild->term_id, 
              'depth'       => 1,
              'hide_empty'  => false
            ));
            foreach( $level_two_clilds as $level_two_clild ):
              
              echo "- " . $level_two_clild->name . "<hr>" ;
                
                // ##level_one_clild_posts##
                $level_two_clild_posts = get_posts(array(
                    'post_type' => 'lecture',
                    'numberposts' => -1,
                    'tax_query' => array(
                    array(
                      'taxonomy' => 'lecture_category',
                      'field' => $level_two_clild->term_id, 
                      'include_children' => false
                    )
                   )
                  ));
                  
                  echo "<ul>";
                  foreach ( $level_two_clild_posts as $post ) : setup_postdata( $post ); 
                    echo "<li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>";
                  endforeach;  
                  echo "</ul>";
                  wp_reset_postdata(); // ##level_two_clild_posts##
                 
               //---level_three_clilds ---
               $level_three_clilds = get_terms( array(
                'taxonomy'    => 'lecture_category',
                'parent'      => $level_two_clild->term_id, 
                'depth'       => 1,
                'hide_empty'  => false
              ));
              foreach( $level_three_clilds as $level_three_clild ):
                
                echo "-- " . $level_three_clild->name . "<hr>" ;
                
                // ###level_three_clild_posts###
                $level_three_clild_posts = get_posts(array(
                    'post_type' => 'lecture',
                    'numberposts' => -1,
                    'tax_query' => array(
                    array(
                      'taxonomy' => 'lecture_category',
                      'field' => $level_three_clild->term_id, 
                      'include_children' => false
                    )
                   )
                  ));
                  
                  echo "<ul>";
                  foreach ( $level_three_clild_posts as $post ) : setup_postdata( $post ); 
                    echo "<li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>";
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