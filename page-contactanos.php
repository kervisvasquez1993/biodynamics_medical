<?php get_header();?>
<div class="corousel-inner" role="listbox">
    <div class="item active responsive">
        <?php while(have_posts()): the_post(); ?>
        <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid" alt="Responsive image">

    </div>
    <?php endwhile;?>
</div>

<?php while(have_posts()): the_post();?>
    <br>
<div class="container">

    <div class="row row-centered d-flex align-items-center">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
           <h2 class="oxygen"><?php the_title();?></h2>
       <form  class="" method="POST">
        <div class="form-group col-lg-12 col-centered col-xs-12">
            <label for="nombre" class="label abel"><?php the_field('nombre');?></label>
            <input type="text" name="nombrecompleto" id="nombre" class="validate form-control" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required>

        </div>
        <div class="form-group col-centered col-lg-12 col-xs-12">
            <label for="exampleInputEmail1" class="label abel"><?php the_field('email');?></label>
            <input type="email" class="form-control validate" name="email" id="exampleInputEmail1" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted"><?php the_field('smallEmail');?></small>
        </div>
        <div class="form-group col-centered col-lg-12  col-xs-12">
            <label for="telefono" class="label abel"><?php the_field('telefono');?></label>
            <input type="tel" class="form-control" id="telefono" name="telefono" required>
            <small id="emailHelp" name="telefono"  pattern="^[0-9]+$" class="form-text text-muted"><?php the_field('smallTelefono');?></small>
        </div>

        <div class="form-group col-centered col-lg-12">
            <label for="comment" class="label abel"><?php the_field('comentarios');?></label>
            <textarea class="form-control" rows="5" id="comment" name="mensaje" required></textarea>


        </div>
        <div class="form-group col-centered col-lg-12">
            <input type="submit" name="contactanos" class="btn btn-primary" value="<?php the_field('enviar_contactanos');?>">
            <input type="hidden" name="oculto"  value="1">
        </div>

      </form>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 NewsCycle">

            <div class="p-small"><?php the_content();?></div>
        </div>
    </div>
</div>
<?php endwhile;?>



            <?php get_footer();?>
