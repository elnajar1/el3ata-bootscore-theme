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
      
      <h5 class = "fw-bolder text-light " >
        روابط
      </h5>
      
      <ul>
        <li>
          <a href ="/">
            مذكرة البناء المنهجي 
          </a>
        </li>
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
      
      <div class = "py-4 text-center">
        <a class = "p-3" href ="https://github.com/moud449/el3ata-bootscore-theme">
          <i style="font-size: 2rem;" class="bi bi-github  text-white"></i>
        </a>
        <a class = "p-3" href ="https://t.me/BinaaManhaji">
          <i style="font-size: 2rem;" class="bi bi-telegram  text-white "></i> 
        </a>
      </div>
      
    </div>
    
    <div class="bootscore-info text-muted py-2 text-center">
      <div class="container">
        <small> 
          <?php bloginfo('name'); ?>
          - 
          علم يُنتفع به 
        </small>
        <br>
        <small> WordPress - El3ata Bootscore Theme </small>
      </div>
    </div>
    
  </div>
  
</footer>

<div class="top-button position-fixed zi-1020">
  <a href="#to-top" class="btn btn-primary shadow"><i class="bi bi-arrow-up-short"></i><span class="visually-hidden-focusable">To top</span></a>
</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>