<?php
/**
 * The template for displaying search results pages
 *
 * @package ushop
 */

?>
<form method="get" class="search-form position-relative"  aria-labelledby="header-search-id" action="<?php echo esc_url( home_url( '/' )); ?>">
    <div class="input-group mb-3">
        <input type="text" class="search-field form-control" value="<?php echo get_search_query() ?>" name="s">
        <div class="input-group-append" type="submit">
            <button class="search-submit input-group-text">
                <i class="ion-paper-airplane"></i>
            </button>
        </div>
    </div>
</form>


