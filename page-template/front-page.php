<?php
/**
 * Template Name: Medicaide Home Page
 * The template for displaying the home page
 *
 * @package cyberi_secure
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    get_template_part( 'template-parts/sections/section', 'hero' );
    get_template_part( 'template-parts/sections/section', 'cards' );
    get_template_part( 'template-parts/sections/section', 'deployment' );
    get_template_part( 'template-parts/sections/section', 'client' );
    get_template_part( 'template-parts/sections/section', 'services' );
    get_template_part( 'template-parts/sections/section', 'partner' );
    get_template_part( 'template-parts/sections/section', 'article' );
    get_template_part( 'template-parts/sections/section', 'faq' );
    get_template_part( 'template-parts/sections/section', 'testimonial' );


    ?>
</main><!-- #main -->

<?php
get_footer();