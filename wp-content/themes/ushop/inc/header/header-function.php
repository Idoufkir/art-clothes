<?php
/**
 * Header Function
 */
/**
 * Logo
 */
function ushop_logo_action() { ?>
    <div class="col-lg-3 col-md-12 col-6">
        <div class="site-branding">
            <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            endif;

            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
            endif; ?>
        </div><!-- .site-branding -->
    </div>
<?php }
add_action( 'ushop_logo', 'ushop_logo_action' );

/**
 * Navigation
 */
function ushop_navigration_action() { ?>
    <nav class="navbar navbar-expand-lg pl-0 pr-0">
        <?php
        wp_nav_menu( array(
                'theme_location'    => 'menu-1',
                'container'			=> 'div',
                'container_class'	=> 'collapse navbar-collapse',
                'container_id'		=> 'ushop-navbar-collapse',
                'menu_class'		=> 'navbar-nav',
                'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                'walker'			=> new WP_Bootstrap_Navwalker()
            )
        );
        ?>
    </nav>
<?php }
add_action( 'ushop_navigration', 'ushop_navigration_action' );

/**
 * Cart, Account, Search
 */
function ushop_cart_acctount_search_action() {

    $hide_search = get_theme_mod( 'hide_search', 1 );
    $woo_hide_account = get_theme_mod( 'woo_hide_account', 1 );
    $woo_hide_cart = get_theme_mod( 'woo_hide_cart', 1 );

    if( $hide_search ):
        ?>

        <div class="search-modal d-inline">
            <a class="" href="#" role="button" data-toggle="modal" data-target="#search-modal"><i class="ion-ios-search"></i></a>
            <!-- Modal -->
        </div>
        <?php
    endif;
    if ( $woo_hide_account && class_exists( 'WooCommerce' ) ) : ?>
        <div class="account-login d-inline">
            <div class="dropdown d-inline">
                <a class="" href="#" role="button" id="header-search-id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-ios-person"></i></a>
                <div class="dropdown-menu account-login-dropdown">
                    <?php if ( is_user_logged_in() ) { ?>
                        <a class="d-block" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="ion-ios-person-outline"></i> <?php esc_html_e('My Account','ushop'); ?></a>
                        <a class="d-block" href="<?php echo esc_url( wp_logout_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) ); ?>"><i class="ion-log-out"></i> <?php esc_html_e('Log Out','ushop'); ?></a>
                    <?php }
                    else { ?>
                        <a class="d-block" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="ion-log-in"></i> <?php esc_html_e('Login / Register','ushop'); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php  endif;
    if( $woo_hide_cart && class_exists( 'WooCommerce' ) ): ?>
        <div class="mini-cart d-inline">
            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" >
                <i class="ion-bag"></i>
									<span>
										<?php echo sprintf ( _n( ' %d', ' %d', WC()->cart->get_cart_contents_count(), 'ushop' ), WC()->cart->get_cart_contents_count() ); ?>
									</span>
            </a>
            <div class="mini-cart-fix">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="mobile-bar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ushop-navbar-collapse" aria-controls="ushop-navbar-collapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'ushop' ); ?>">
            <i class="ion-android-menu"></i>
        </button>
    </div>

<?php }
add_action( 'ushop_cart_account_search', 'ushop_cart_acctount_search_action' );

function ushop_header_action() {
    $header_layout = get_theme_mod( 'header_layout_3' );
    ?>
    <section class="<?php echo $header_layout; ?> site-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <?php
                if( $header_layout == 'header-2' ){

                do_action( 'ushop_logo' );
                ?>
                <div class="col-lg-9 col-md-9 col-6 mini-cart-search text-right">
                    <?php
                    do_action( 'ushop_cart_account_search' );
                    ?>
                </div>
            </div>
        </div>
        <div class="header-bg-2 mt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-start position-relative main-menu">
                        <?php
                        do_action( 'ushop_navigration' );
                        ?>
                    </div>
                </div>
                <?php
                }else{
                    do_action( 'ushop_logo' );
                    ?>
                    <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-lg-center main-menu">
                        <?php
                        do_action( 'ushop_navigration' );
                        ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 mini-cart-search text-right">
                        <?php
                        do_action( 'ushop_cart_account_search' );
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    $hide_search = get_theme_mod( 'hide_search', 1 );
    if( $hide_search ): ?>
        <section>
            <div class="search-modal d-inline">
                <!-- Modal -->
                <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h3 class="search-title-modal"><?php esc_html_e( 'Search for Anything here','ushop' ); ?></h3>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endif;
    ?>
<?php }
add_action( 'ushop_header', 'ushop_header_action' );

/**
 * Hero Area
 */
function ushop_hero_area_action(){
    $hero_area_show = get_theme_mod( 'hero_area_show', true );
    $hero_title = get_theme_mod( 'hero_title' );
    $hero_sub_title = get_theme_mod( 'hero_sub_title' );
    $hero_text = get_theme_mod( 'hero_text' );
    $hero_button_text = get_theme_mod( 'hero_button_text' );
    $hero_button_url = get_theme_mod( 'hero_button_url' );

    if ( $hero_area_show && is_front_page() ): ?>
        <section class="hero-area position-relative">
            <div class="container-fluid">
                <div class="hero-content">
                    <h2><?php echo esc_html( $hero_title ); ?></h2>
                    <?php if( $hero_sub_title ) : ?>
                        <h2><?php echo esc_html( $hero_sub_title ); ?></h2>
                    <?php endif;?>
                    <?php if( $hero_text ) : ?>
                        <p><?php echo esc_html( $hero_text ); ?></p>
                    <?php endif;?>

                    <?php if( $hero_button_text || $hero_button_url ) : ?>
                        <a href="<?php echo esc_url( $hero_button_url ); ?>" class="text-uppercase"><?php echo esc_html( $hero_button_text ); ?></a>
                    <?php endif;?>
                </div>
            </div>
            <?php if ( get_header_image() ) : ?>
                <img src="<?php header_image(); ?>"  alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" class="img-fluid">
            <?php endif; ?>
        </section>
    <?php endif;
}

add_action( 'ushop_hero_banner', 'ushop_hero_area_action' );