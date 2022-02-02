<?php 
  get_header();
  $parent_ID = 13; //البناء المنهجي
 
  $level_one_clilds = get_terms( array(
      'taxonomy'   => 'lecture_category',
      'parent'     => $parent_ID ,
      'depth'      => 1,
      'hide_empty' => false
  ) );
  foreach( $level_one_clilds as $level_one_clild ):
      
      echo $level_one_clild->name . "<hr>" ;
      //echo "<pre>"; var_dump($level_one_clild); echo "</pre>";
      
      $level_tow_clilds = get_terms( array(
        'taxonomy'    => 'lecture_category',
        'parent'      => $level_one_clild->term_id, 
        'depth'       => 1,
        'hide_empty'  => false
      ));
      foreach( $level_tow_clilds as $level_tow_clild ):
        echo "- " . $level_tow_clild->name . "<hr>" ;
        //echo "<pre>"; var_dump($level_tow_clild); echo "</pre>"; 
         
         $level_three_clilds = get_terms( array(
          'taxonomy'    => 'lecture_category',
          'parent'      => $level_tow_clild->term_id, 
          'depth'       => 1,
          'hide_empty'  => false
        ));
        foreach( $level_three_clilds as $level_three_clild ):
          echo "-- " . $level_three_clild->name . "<hr>" ;
          //echo "<pre>"; var_dump($level_tow_clild); echo "</pre>"; 
        endforeach ; //level_three_clild
        
      endforeach ;  //level_tow_clild
      
  endforeach ; //level_one_clilds
?>
    <div class = "row">
      <div class = "col">
        
        <div>
          <ul>   
            <?php 
                $get_parent_cats = array(
                    'parent' => '0', //get top level categories only
                    'taxonomy' => 'lecture_category',
                    'hide_empty' => false
                );
    
                $all_categories = get_terms( $get_parent_cats );//get parent categories 
    
                foreach( $all_categories as $single_category ){
                    //for each category, get the ID
                    $catID = $single_category->cat_ID;
    
                    echo '<li><a href=" ' . get_category_link( $catID ) . ' ">' . $single_category->name . '</a>'; //category name & link
                     echo '<ul class="post-title">';
    
                    $query = new WP_Query( array( 'cat'=> $catID, 'posts_per_page'=>10 ) );
                    while( $query->have_posts() ):$query->the_post();
                     echo get_the_title();
                    endwhile;
                    wp_reset_postdata();
    
                    echo '</ul>';
                    $get_children_cats = array(
                        'child_of' => $catID //get children of this parent using the catID variable from earlier
                    );
    
                    $child_cats = get_categories( $get_children_cats );//get children of parent category
                    echo '<ul class="children">';
                        foreach( $child_cats as $child_cat ){
                            //for each child category, get the ID
                            $childID = $child_cat->cat_ID;
    
                            //for each child category, give us the link and name
                            echo '<a href=" ' . get_category_link( $childID ) . ' ">' . $child_cat->name . '</a>';
    
                             echo '<ul class="post-title">';
    
                            $query = new WP_Query( array( 'cat'=> $childID, 'posts_per_page'=>10 ) );
                            while( $query->have_posts() ):$query->the_post();
                             echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
                            endwhile;
                            wp_reset_postdata();
    
                            echo '</ul>';
    
                        }
                    echo '</ul></li>';
                } //end of categories logic ?>
          </ul>
        </div>
        
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
                      <ul>
                        <?php
                          $args = array(
                            'post_type'   => 'lecture', 
                            'category'    => $lecture_category->ID
                          );
                          $lectures = get_posts( $args );
                         
                          foreach ( $lectures as $lecture ) { ?>
                            <li>
                              <a href="<?php echo esc_url( get_term_link( $lecture ) ) ?>">
                                  <?php echo $lecture->name; ?>
                              </a>
                            </li>
                          <?php } ?>
                      </ul>
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