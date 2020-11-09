<?php
$cat2 = $the_query->query[cat];
if ( !empty($cat2)):
    $list_subcat = get_categories( ['hide_empty' => false, 'parent' => $cat2] );


endif;

if ( count($list_subcat)):?>
    <div class="categoria-padre">
        <?php foreach ($list_subcat as $item_subcat) :
            $category_link = get_category_link( $item_subcat->term_id );
            ?>
            <a class="categoria oxygen btn btn-outline-secondary"
               href=<?php echo $category_link ?>
            ><?php  echo $item_subcat->name ?>
            </a>
        <?php  endforeach ?>
    </div>
    <?php
    foreach ($the_query->query as $clave){
        echo "$clave <br>";
    }
    ?>
    <div class="flex-row row">
<?php
endif;