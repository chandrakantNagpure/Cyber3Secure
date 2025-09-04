<?php
/*
Template Name: Technology Partner Page
*/


$title        = get_theme_mod( 'partner_section_title', 'Our Technology Partners' );
$description  = get_theme_mod( 'partner_section_description', 'CyberArk is the global leader in Identity Security. Centered on privileged access management, CyberArk provides the most comprehensive security offering for any identity – human or machine – across business applications, distributed workforces, hybrid cloud workloads and throughout the DevOps lifecycle. The world’s leading organizations trust CyberArk to help secure their most critical assets.' );

$partner_logo = get_theme_mod( 'partner_section_logo', get_template_directory_uri() . '/assets/images/large-logo.png' );

$button_text  = get_theme_mod( 'partner_section_button_text', 'More Services' );
$button_link  = get_theme_mod( 'partner_section_button_link', '#' );

get_header(); ?>

<!-- Section 1: Banner -->
<section class="banner" style="background-image: url('<?php echo get_theme_mod('about_banner_image', get_template_directory_uri() . '/assets/images/about-background.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 70vh;">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <nav class="breadcrumb">
            <?php cyberi_secure_breadcrumbs(); ?>
        </nav>
    </div>
</section>


<section id="partner" class="m-4" style="<?php echo esc_attr( $style ); ?>">
    <div class="container row justify-content-space-between align-items-center">
        <div class="col-12">
            <img src="<?php echo esc_url( $partner_logo ); ?>" alt="Partner Logo" width="100%" height="376" style="object-fit: contain;">
        </div>
        <div class="col-12 m-4 text-center">
            <h2><?php echo esc_html( $title ); ?></h2>
            <p><?php echo esc_html( $description ); ?></p>
        </div>
    </div>
</section>

<?php get_footer(); ?>