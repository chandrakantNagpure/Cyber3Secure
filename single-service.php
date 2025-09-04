<?php get_header(); ?>

<?php
// Ensure we have the correct post data
if (have_posts()) :
    while (have_posts()) : the_post();

        // Get service metadata
        $icon_url = get_post_meta(get_the_ID(), '_service_icon', true);
?>
<section class="banner" style="background-image: url('<?php echo esc_url(get_theme_mod('about_banner_image', get_template_directory_uri() . '/assets/images/about-background.jpg')); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 70vh;">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <nav class="breadcrumb">
            <?php cyberi_secure_breadcrumbs(); ?>
        </nav>
    </div>
</section>

<section class="single-service m-4">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="service-details">
                    <!-- Service Icon -->
                    <?php /* if (!empty($icon_url)) : ?>
                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php the_title(); ?>" class="service-icon">
                    <?php endif; */ ?>


                    <!-- Service Content -->
                    <div class="service-content">
                        <?php echo get_the_content(); ?>
                    </div>

<!-- FAQ Section -->
<?php
$faqs = get_post_meta(get_the_ID(), '_service_faqs', true);
$faq_section_title = get_post_meta(get_the_ID(), '_service_faq_section_title', true) ?: 'Frequently Asked Questions';
if (!empty($faqs) && is_array($faqs)) : ?>
    <div class="service-faq-section mt-4">
        <h2 class="faq-title"><?php echo esc_html($faq_section_title); ?></h2>
        <div class="accordion" id="faqAccordion">
            <?php foreach ($faqs as $index => $faq) : ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                            <?php echo esc_html($faq['question']); ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?php echo esc_html($faq['answer']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <style>
        /* FAQ Section Styling */
        .service-faq-section {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        /* Accordion Styling */
        .accordion-item {
            border: none;
            background: linear-gradient(135deg, #fefefe, #e9f5ff);
            margin-bottom: 10px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease-in-out;
        }

        .accordion-item:hover {
            transform: scale(1.02);
        }

        .accordion-button {
            background: linear-gradient(90deg, #dbeafe, #c3e6cb);
            color: #333;
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            border: none;
            text-align: left;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.4s ease-in-out, transform 0.2s ease;
            border-radius: 10px;
        }

        .accordion-button:hover {
            background: linear-gradient(90deg, #c3e6cb, #a3d8f4);
        }

        .accordion-button:not(.collapsed) {
            background: linear-gradient(90deg, #a3d8f4, #c3e6cb);
            color: #222;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-body {
            background: #f9f9f9;
            padding: 15px;
            font-size: 16px;
            border-top: 1px solid #ddd;
            transition: all 0.3s ease-in-out;
        }

        /* Smooth Collapse Transition */
        .accordion-collapse {
            transition: height 0.4s ease-in-out;
        }

        /* Icon Animation */
        .faq-icon {
            transition: transform 0.4s ease-in-out;
        }

        .accordion-button:not(.collapsed) .faq-icon {
            transform: rotate(180deg);
        }
    </style>
<?php endif; ?>


                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="service-sidebar">
                    <h3>Related Services</h3>
                    <ul>
                        <?php
                        // Fetch related services from the same category
                        $related_args = array(
                            'post_type'      => 'service',
                            'posts_per_page' => 5,
                            'post__not_in'   => array(get_the_ID()),
                            'orderby'        => 'rand',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'service_category',
                                    'field'    => 'slug',
                                    'terms'    => wp_get_post_terms(get_the_ID(), 'service_category', array('fields' => 'slugs')),
                                ),
                            ),
                        );

                        $related_services = new WP_Query($related_args);
                        if ($related_services->have_posts()) :
                            while ($related_services->have_posts()) : $related_services->the_post();
                        ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        remove_filter('the_content', 'cyberi_secure_display_tags', 10);
                        remove_filter('the_content', 'cyberi_secure_featured_image', 10);
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>





<?php 
    endwhile;
endif;
wp_reset_postdata();
get_footer();
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const accordions = document.querySelectorAll(".accordion-button");

    accordions.forEach((button) => {
        button.addEventListener("click", function() {
            const collapseElement = button.parentElement.nextElementSibling;
            const isCollapsed = collapseElement.classList.contains("show");

            // Collapse all accordion items
            document.querySelectorAll('.accordion-collapse').forEach(collapse => {
                if (collapse !== collapseElement) {
                    collapse.classList.remove('show');
                    collapse.style.maxHeight = null;
                    collapse.style.opacity = 0;
                }
            });

            // If the clicked item was previously collapsed, expand it
            if (!isCollapsed) {
                collapseElement.classList.add("show");
                collapseElement.style.maxHeight = collapseElement.scrollHeight + "px";
                collapseElement.style.opacity = 1;
            } else {
                collapseElement.classList.remove("show");
                collapseElement.style.maxHeight = null;
                collapseElement.style.opacity = 0;
            }

            // Rotate the arrow
            button.querySelector('::before').style.transform = isCollapsed ? 'rotate(0deg)' : 'rotate(180deg)';
        });
    });
});
</script>