<?php
/*
Template Name: Blog Page
*/

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

<section id="Blog">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="services-wrapper">
                    <?php
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'orderby'        => 'date',
                        'order'          => 'ASC',
                    );

                    $services = new WP_Query($args);

                    if ($services->have_posts()) :
                        while ($services->have_posts()) : $services->the_post();
                            $icon_url = get_post_meta(get_the_ID(), '_service_icon', true); // Fetch the stored icon URL
                    ?>
                            <div class="service-card">
                                <!-- Service Icon -->
                                <?php the_post_thumbnail('full', ['class' => 'img']); ?>

                                <!-- Service Title -->
                                <h3 class="service-title"><?php the_title(); ?></h3>
                                
                                <!-- Service Description (15-20 words) -->
                                <p class="service-description"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                                
                                <!-- Read More Button -->
                                <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="service-sidebar">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </div>
            </div>
    </div>
</section>

<?php get_footer(); ?>