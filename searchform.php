
<form role="search" method="get" class="flex-seach" action="<?php echo home_url( '/' ); ?>">


    <input   type="search" class="search-field form-control "  placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
             value="<?php echo get_search_query() ?>" name="s"
             title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" class="search-submit btn fa fa-search" name="post_type" value="post">
        
    </button>
    

</form>
