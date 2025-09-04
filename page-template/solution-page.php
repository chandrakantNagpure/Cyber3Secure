<?php
/*
Template Name: Solution Page
*/

$title        = get_theme_mod( 'services_section_title', 'We Offer Different Services' );
$description  = get_theme_mod( 'services_section_description', 'Cyberi3secure offers implementation & support for deployment of following privilege access management (PAM) technology solutions.' );

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

<section id="solution">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
        <p class="section-desc"><?php echo esc_html( $description ); ?></p>

        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="services-wrapper">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get the current page

                    $args = array(
                        'post_type'      => 'service',
                        'posts_per_page' => 4,
                        'paged'          => $paged,
                        'orderby'        => 'date',
                        'order'          => 'ASC',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'service_category', // Change if needed
                                'field'    => 'slug',
                                'terms'    => 'solution', // Ensure this is the correct slug
                            ),
                        ),
                    );

                    $services = new WP_Query($args);

                    if ($services->have_posts()) :
                        while ($services->have_posts()) : $services->the_post();
                            $icon_url = get_post_meta(get_the_ID(), '_service_icon', true);
                    ?>
                            <div class="service-card">
                                <!-- Service Icon -->
                                <?php if (!empty($icon_url)) : ?>
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php the_title(); ?>" class="service-icon">
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/100" alt="Default Icon" class="service-icon">
                                <?php endif; ?>

                                <!-- Service Title -->
                                <h3 class="service-title"><?php the_title(); ?></h3>
                                
                                <!-- Service Description (15-20 words) -->
                                <p class="service-description"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                                
                                <!-- Read More Button -->
                                <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
                            </div>
                    <?php
                        endwhile;
                    ?>

                    <!-- Pagination -->
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'total'     => $services->max_num_pages,
                            'current'   => $paged,
                            'prev_text' => __('« Previous'),
                            'next_text' => __('Next »'),
                        ));
                        ?>
                    </div>

                    <?php else : ?>
                        <p>No services found.</p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="service-sidebar">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
