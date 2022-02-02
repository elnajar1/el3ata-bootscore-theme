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
            $level_one_clild_posts = get_posts(array(
                'post_type' => 'lecture',
                'numberposts' => -1,
                'tax_query' => array(
                array(
                  'taxonomy' => 'lecture_category',
                  'field' => $level_one_clild->term_id, 
                  'terms' => $level_one_clild->term_id, /// Where term_id of Term 1 is "1".
                  'include_children' => false
                )
               )
              ));
              
              foreach ( $level_one_clild_posts as $post ) : setup_postdata( $post ); ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </li>
              <?php endforeach; // Term Post foreach ?>
              </ul>
              <?php wp_reset_postdata(); 
              
            //--level_tow_clilds--
            $level_tow_clilds = get_terms( array(
              'taxonomy'    => 'lecture_category',
              'parent'      => $level_one_clild->term_id, 
              'depth'       => 1,
              'hide_empty'  => false
            ));
            foreach( $level_tow_clilds as $level_tow_clild ):
              echo "- " . $level_tow_clild->name . "<hr>" ;
              
               //---level_three_clild ---
               $level_three_clilds = get_terms( array(
                'taxonomy'    => 'lecture_category',
                'parent'      => $level_tow_clild->term_id, 
                'depth'       => 1,
                'hide_empty'  => false
              ));
              foreach( $level_three_clilds as $level_three_clild ):
                echo "-- " . $level_three_clild->name . "<hr>" ;
              endforeach ; //level_three_clild
              
            endforeach ;  //level_tow_clild
            
        endforeach ; //level_one_clilds
        ?>
      </div>
    </div>
    
  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>