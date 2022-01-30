<?php acf_form_head(); ?>
<?php get_header(); ?>
<script src="https://cdn.tiny.cloud/1/lci9jcx8cwzf3c52un3vk7bjcsbc4pvrhvvs01q8zhpe6j33/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area">
    
    <div class = "row">
      <div class = "col">
          
        <div class="p-2 border rounded m-auto" style = "max-width: 500px">
          <?php
            $form_args = array(
                'post_id'	    	=> 'new_post',
                'post_title'    => true,
                'post_content'    => true,
                'post_thumbnail'    => true,
                'new_post'		  => array(
            			'post_type'		=> 'lecture',
            			'post_status'	=> 'publish'
            		), 
                'field_groups' => ['group_61f2d683300cb'], 
                'updated_message' => ' تم الإضافة بحمدالله بنجاح، شكرا لك', 
                'submit_value' => 'أرسال ', 
                
              );
            acf_form($form_args); 
          ?>
        </div>
        
      </div>
    </div>
    
  </div><!-- #primary -->
</div><!-- #content -->
<script>
  tinymce.init({
    selector: 'textarea',
    directionality : 'rtl', 
        //language_url : '/admino/layout/js/tiny_ar.js',
        //language : 'ar', 
        plugins: 'link fullscreen',
        contextmenu : 'h3 | bold | underline', 
        menubar: 'bold underline styleselect view',
        toolbar: 'fullscreen | undo | styleselect | h3 bold underline| link| bullist forecolor | paste pastetext',
        toolbar_mode: 'floating',
        fullscreen_native: true, 
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Mahmoud',
        default_link_target: '_blank', 
  });
</script>
<?php get_footer(); ?>