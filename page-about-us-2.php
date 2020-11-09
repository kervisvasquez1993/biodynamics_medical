<?php get_header();?>
<div class="item active responsive" id="var_exist_columna">
    <img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid img-responsive" alt="Responsive image">
</div>
    <div class="container">
        <?php while(have_posts()): the_post();?>
        <div class="row">
            <section class="cabecera_about">
                <?php the_field('cabecera_about');?>
            </section>
            <div class="eslogan_about">
                <?php the_field('cabecera_eslogan');?>
            </div>
            <section>
                <?php the_content();?>
            </section>
        </div>
        <?php endwhile;?>
    </div>
<?php get_footer();?>
