<?php 
 /*
    Template Name: Blog Post
 */
  get_header();
  $pagina_blog = get_option('page_for_posts');
  $imagen = get_post_thumbnail_id($pagina_blog);
  $imagen = wp_get_attachment_image_src($imagen,'full');
?>
<div class="coriusel-inner" role="listbox">
    <div class="item active responsive">
        <img src="<?php echo $imagen[0];?>" class="img-fluid" alt="">
    </div>
</div>



 <?php get_footer();?>