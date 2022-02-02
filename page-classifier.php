<?php 
  get_header();
  $parents = get_terms( array(
      'taxonomy'   => 'lecture_category',
      'parent'     => '13' ,
      'depth'      => 1,
      'hide_empty' => false
  ) );
  
  foreach( $parents as $parent ):
      echo $parent->name . "<hr>" ;
      //echo "<pre>"; var_dump($parent); echo "</pre>";
      
      $childs = get_terms( array(
        'taxonomy' => 'lecture_category',
        'child_of'      => $parent->ID, 
        'depth'  => 1,
        'hide_empty'  => false
      ));
      
      foreach( $childs as $child ):
       // echo "- " . $child->name . "<hr>" ;
        //echo "<pre>"; var_dump($child); echo "</pre>"; 
      endforeach ;  
      
  endforeach ;              
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