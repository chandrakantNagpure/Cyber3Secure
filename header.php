<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?> 

<header id="masthead" class="site-header" role="banner">
    <div class="site-branding container d-flex justify-content-between align-items-center">
        <div class="logo_menu d-flex justify-content-between align-items-center">
        <?php if ( has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
        <?php endif; ?>
        <?php wp_nav_menu(); ?>
        </div>
        <?php if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>

        <?php
        $cyberi_secure_description = get_bloginfo( 'description', 'display' );
        if ( $cyberi_secure_description || is_customize_preview() ) :
        ?>
            <p class="site-description"><?php echo $cyberi_secure_description; /* WPCS: xss ok. */ ?></p>
        <?php endif; ?>

            

            <div class="searc-sidebar d-flex justify-content-between align-items-center gap-3">
                        <!-- Search Icon -->
        <button class="search-icon" id="search-icon" aria-label="Open Search">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        </button>

        <!-- Hamburger Menu Icon -->
        <button class="hamburger" id="hamburger-icon" aria-label="Toggle navigation">
            <span class="bar bar-1"></span>
            <span class="bar bar-2"></span>
            <span class="bar bar-3"></span>
        </button>
            </div>

    </div><!-- .site-branding -->
</header><!-- #masthead -->

<!-- Sidebar for Navigation & Widgets -->
<aside id="sidebar-menu" class="sidebar">
    <?php the_custom_logo(); ?>
    <nav id="site-navigation" class="main-navigation" role="navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'container'      => false,
            'menu_class'     => 'menu',
        ) );
        ?>
    </nav>
    
</aside>

<div id="overlay"></div> <!-- Background overlay for sidebar -->

<!-- Search Popup -->
<div id="search-popup" class="search-popup">
    <button class="close-search" id="close-search">✖</button>
    <?php get_search_form(); ?>
</div>

<!-- JavaScript for Sidebar & Search -->
<script>
document.getElementById('hamburger-icon').addEventListener('click', function () {
    const sidebar = document.getElementById('sidebar-menu');
    const overlay = document.getElementById('overlay');
    
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
    
    this.classList.toggle('active'); // Animate the hamburger icon
});

// Close sidebar when overlay is clicked
document.getElementById('overlay').addEventListener('click', function () {
    document.getElementById('sidebar-menu').classList.remove('active');
    this.classList.remove('active');
    document.getElementById('hamburger-icon').classList.remove('active');
});

// Search Popup Open
document.getElementById('search-icon').addEventListener('click', function () {
    document.getElementById('search-popup').classList.add('active');
});

// Search Popup Close
document.getElementById('close-search').addEventListener('click', function () {
    document.getElementById('search-popup').classList.remove('active');
});

window.addEventListener("scroll", function () {
    const header = document.getElementById("masthead");
    if (window.scrollY > 300) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
});

</script>
