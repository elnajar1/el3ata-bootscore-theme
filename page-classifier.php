<?php 
  get_header();
  $lecture_categories = get_terms( array(
      'taxonomy' => 'lecture_category',
      'hide_empty' => false
  ) );

?>

<?php
function ow_categories_with_subcategories_and_posts( $taxonomy, $post_type ) {

    // Get the top categories that belong to the provided taxonomy (the ones without parent)
    $categories = get_terms( 
        array(
            'taxonomy'   => $taxonomy,
            'parent'     => 0, // <-- No Parent
            'orderby'    => 'term_id',
            'hide_empty' => true // <!-- change to false to also display empty ones
        )
    );
    ?>
    <div>
        <?php
        // Iterate through all categories to display each individual category
        foreach ( $categories as $category ) {

            $cat_name = $category->name;
            $cat_id   = $category->term_id;
            $cat_slug = $category->slug;

            // Display the name of each individual category
            echo '<h3>Category: ' . $cat_name . ' - ID: ' . $cat_id . ' - Slug: ' . $cat_slug  . '</h3>'; 


            // Get all the subcategories that belong to the current category
            $subcategories = get_terms(
                array(
                    'taxonomy'   => $taxonomy,
                    'parent'     => $cat_id, // <-- The parent is the current category
                    'orderby'    => 'term_id',
                    'hide_empty' => true
                )
            );
            ?>
            <div>
                <?php
                // Iterate through all subcategories to display each individual subcategory
                foreach ( $subcategories as $subcategory ) {

                    $subcat_name = $subcategory->name;
                    $subcat_id   = $subcategory->term_id;
                    $subcat_slug = $subcategory->slug;

                    // Display the name of each individual subcategory with ID and Slug
                    echo '<h4>Subcategory: ' . $subcat_name . ' - ID: ' . $subcat_id . ' - Slug: ' . $subcat_slug  . '</h4>';

                    // Get all posts that belong to this specific subcategory
                    $posts = new WP_Query(
                        array(
                            'post_type'      => $post_type,
                            'posts_per_page' => -1, // <-- Show all posts
                            'hide_empty'     => true,
                            'order'          => 'ASC',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'terms'    => $subcat_id,
                                    'field'    => 'id'
                                )
                            )
                        )
                    );

                    // If there are posts available within this subcategory
                    if ( $posts->have_posts() ):
                        ?>
                        <div>
                            <?php

                            // As long as there are posts to show
                            while ( $posts->have_posts() ): $posts->the_post();

                                //Show the title of each post with the Post ID
                                ?>
                                <p>Post: <?php the_title(); ?> - ID: <?php the_ID(); ?></p>
                                <?php

                            endwhile;
                            ?>
                        </div>
                        <?php
                    else:
                        echo 'No posts found';
                    endif;

                    wp_reset_query();
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
ow_categories_with_subcategories_and_posts( 'lecture_category', 'lecture' );
?>
<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">
    
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