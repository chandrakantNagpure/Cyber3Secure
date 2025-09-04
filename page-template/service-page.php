<?php
/**
 * Template Name: Services Page
 *
 * @package cyberi_secure
 */

get_header();
?>

<section id="services-section" class="services-container textb_background_circle_double" style="<?php echo esc_attr( $style ); ?>">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
        <p class="section-desc"><?php echo esc_html( $description ); ?></p>
        <div class="services-wrapper">
            <?php
                $args = array(
                    'post_type'      => 'service',
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'service_category', // Change this if needed
                            'field'    => 'slug',
                            'terms'    => 'services', // Ensure this is the correct slug
                        ),
                    ),
                );
            $services = new WP_Query($args);

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $icon_url = get_post_meta(get_the_ID(), '_service_icon', true); // Fetch the stored icon URL
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
                wp_reset_postdata();
            else :
                echo '<p>No services found.</p>';
            endif;
            ?>
        </div>
        <div class="btn-wrapper">
            <a href="<?php echo esc_url( $button_link ); ?>" class="icon-btn">
                <?php echo esc_html( $button_text ); ?>
                <span class="icon">    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>

<?php } // End if section enabled ?>
