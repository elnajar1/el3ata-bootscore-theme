<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 */

?>

<footer>

  <div class="bootscore-footer bg-dark pt-5 pb-3">
    
    <div class="container">
      
      <p class "fw-bolder text-white border-bottom" >
        روابط
      </p>
      
      <ul>
        <li>
          <a href = "http://el3ata.com/%d9%83%d9%8a%d9%81%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%b3%d8%a7%d9%87%d9%85%d8%a9-%d8%a8%d8%a7%d9%84%d9%86%d8%b4%d8%b1-%d9%88-%d8%a7%d9%84%d8%aa%d8%ad%d8%b1%d9%8a%d8%b1-%d9%81%d9%8a-%d8%b9%d8%b7%d8%a7/">
            المشاركة بالنشر و التعديل
          </a>
        </li>
        <li>
          <a href = "http://el3ata.com/%d8%a7%d9%84%d9%85%d8%b3%d8%a7%d9%87%d9%85%d8%a9-%d9%81%d9%8a-%d8%a8%d8%b1%d9%85%d8%ac%d8%a9-%d9%88%d8%aa%d8%b7%d9%88%d9%8a%d8%b1-%d9%85%d9%88%d9%82%d8%b9-%d8%b9%d8%b7%d8%a7%d8%a1/">
              المشاركة برمجيا
              | Developers 
          </a>
        </li>
      </ul>
      
      <div class = "text-center text-white">
        <a class = "m-2" href ="https://github.com/moud449/el3ata-bootscore-theme">
          <i class="bi bi-github"></i>
        </a>
        <a class = "m-2" href ="https://t.me/BinaaManhaji">
          <i class="bi bi-telegram"></i> 
        </a>
      </div>
      
    </div>
    
    <div class="container">
      
    <div class="container">

      <!-- Top Footer Widget -->
      <?php if (is_active_sidebar('top-footer')) : ?>
        <div>
          <?php dynamic_sidebar('top footer'); ?>
        </div>
      <?php endif; ?>

      <div class="row">

        <!-- Footer 1 Widget -->
        <div class="col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-1')) : ?>
            <div>
              <?php dynamic_sidebar('footer-1'); ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 2 Widget -->
        <div class="col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-2')) : ?>
            <div>
              <?php dynamic_sidebar('footer-2'); ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 3 Widget -->
        <div class="col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-3')) : ?>
            <div>
              <?php dynamic_sidebar('footer-3'); ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 4 Widget -->
        <div class="col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-4')) : ?>
            <div>
              <?php dynamic_sidebar('footer-4'); ?>
            </div>
          <?php endif; ?>
        </div>
        <!-- Footer Widgets End -->

      </div>

      <!-- Bootstrap 5 Nav Walker Footer Menu -->
      <?php
      wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'container' => false,
        'menu_class' => '',
        'fallback_cb' => '__return_false',
        'items_wrap' => '<ul id="footer-menu" class="nav %2$s">%3$s</ul>',
        'depth' => 1,
        'walker' => new bootstrap_5_wp_nav_menu_walker()
      ));
      ?>
      <!-- Bootstrap 5 Nav Walker Footer Menu End -->

    </div>
  </div>

  <div class="bootscore-info bg-dark text-light border-top py-2 text-center">
    <div class="container">
      <small> وعلم يُنتفع به - <?php bloginfo('name'); ?></small>
      <br>
      <small> WordPress - El3ata Bootscore Theme </small>
    </div>
  </div>

</footer>

<div class="top-button position-fixed zi-1020">
  <a href="#to-top" class="btn btn-primary shadow"><i class="fas fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>
</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>