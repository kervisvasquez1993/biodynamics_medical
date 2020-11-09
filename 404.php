<?php get_header();?>
    <section class="err404" style=" background:url('<?php echo get_template_directory_uri()?>/img/404.png');">
            <div class="contenido">
                    <h2 class="NewsCycle">ERROR 404- PAGINA NO ENCONTRADA</h2>
                    <h1 class="NewsCycle">ESTA PAGIANA ESTA PERDIDA EN EL LIMBO.</h1>
                    <p class="releweay">O SENTIMOS, NO HEMOS PODIDO ENCONTRAR LA PAGINA QUE BUSCA</p>        
            </div>
            <div class="anclas">
                <h3>
                    <a href="<?php echo esc_url(home_url('/'));?>">INICIO</a>
                    <a href="<?php echo esc_url(home_url('/contactanos'));?>">CONTACTANOS</a>
                </h3>
            </div>
    </section>
<?php get_footer();?>