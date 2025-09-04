<?php
/**
 * Cyberi Secure functions and definitions
 *
 * @package cyberi_secure
 */

if ( ! function_exists( 'cyberi_secure_setup' ) ) :
    /**
     * Set up theme defaults and register support for various WordPress features.
     */
    function cyberi_secure_setup() {
        // Load the theme text domain for translations.
        load_theme_textdomain( 'cyberi-secure', get_template_directory() . '/languages' );
        
        // Add theme support for various features.
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        
        // Register a primary navigation menu.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'cyberi-secure' ),
        ) );
        
        // Add support for HTML5 elements.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        
        // Add support for custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        // Add support for block styles, responsive embeds, and wide alignments.
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'align-wide' );
        
        // Add support for custom header and custom background.
        add_theme_support( 'custom-header', array(
            'width'         => 1920,
            'height'        => 600,
            'flex-width'    => true,
            'flex-height'   => true,
            'header-text'   => false,
        ) );
        add_theme_support( 'custom-background', array(
            'default-color' => 'ffffff',
        ) );

        // Register block pattern.
        register_block_pattern( 'cyberi-secure/intro-section', array(
            'title'   => __( 'Intro Section', 'cyberi-secure' ),
            'content' => '<!-- wp:paragraph --><p>' . __( 'Welcome to our website!', 'cyberi-secure' ) . '</p><!-- /wp:paragraph -->',
        ) );

    }
endif;
add_action( 'after_setup_theme', 'cyberi_secure_setup' );


function cyberi_secure_enqueue_bootstrap() {
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0', 'all' );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true );
}
add_action( 'wp_enqueue_scripts', 'cyberi_secure_enqueue_bootstrap' );


/**
 * Enqueue theme styles and scripts conditionally.
 */
function cyberi_secure_scripts() {
    // Enqueue main stylesheet (loaded on all pages).
    wp_enqueue_style( 'cyberi-secure-style', get_stylesheet_uri() );
    wp_enqueue_style( 'cyberi-secure-customizer', get_template_directory_uri() . './inc/style/customizer.css');    
    
    // Conditional stylesheet and script loading

    // Home page stylesheet and script
    if ( is_home() || is_front_page() ) {
        error_log('Home page detected');
        wp_enqueue_style( 'medicaid-home-style', get_template_directory_uri() . './assets/css/home.css' );
        wp_enqueue_script( 'medicaid-home-script', get_template_directory_uri() . './assets/js/home.js', array('jquery'), false, true );
    }

    // Single post/page styles and script
    if ( is_singular() ) {
        wp_enqueue_style( 'medicaid-single-style', get_template_directory_uri() . './assets/css/single.css' );
        wp_enqueue_script( 'medicaid-single-script', get_template_directory_uri() . './assets/js/single.js', array('jquery'), false, true );
    }

    // Archive page stylesheet and script
    if ( is_archive() ) {
        wp_enqueue_style( 'medicaid-archive-style', get_template_directory_uri() . './assets/css/archive.css' );
        wp_enqueue_script( 'medicaid-archive-script', get_template_directory_uri() . './assets/js/archive.js', array('jquery'), false, true );
    }

    // Page-specific stylesheet (for all pages)
    if ( is_page() ) {
        wp_enqueue_style( 'medicaid-page-style', get_template_directory_uri() . './assets/css/page.css' );
        wp_enqueue_script( 'medicaid-page-script', get_template_directory_uri() . './assets/js/page.js', array('jquery'), false, true );
    }

    // Contact page styles and script (if page slug is 'contact')
    if ( is_page( 'contact' ) ) {
        wp_enqueue_style( 'medicaid-contact-style', get_template_directory_uri() . './assets/css/contact.css' );
        wp_enqueue_script( 'medicaid-contact-script', get_template_directory_uri() . './assets/js/contact.js', array('jquery'), false, true );
    }

    // Enqueue comment-reply script for threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'cyberi_secure_scripts' );


/**
 * Ensure the customizer file exists and include it.
 */
$customizer_path = get_template_directory() . '/inc/customizer.php';
if ( file_exists( $customizer_path ) ) {
    require $customizer_path;
} else {
    // Handle the case where the customizer file is missing
    // For example, log an error or display a warning in the admin area
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p><strong>Cyberi Secure:</strong> Customizer file is missing. Please ensure "inc/customizer.php" exists in your theme folder.</p></div>';
    });
}

/**
 * Register Block Styles
 */
function cyberi_secure_register_block_styles() {
    // Register custom block styles
    register_block_style( 'core/paragraph', array(
        'name'  => 'highlighted',
        'label' => 'Highlighted Text'
    ) );
    register_block_style( 'core/button', array(
        'name'  => 'primary-button',
        'label' => 'Primary Button'
    ) );
}
add_action( 'init', 'cyberi_secure_register_block_styles' );

/**
 * Add editor style
 */
function cyberi_secure_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'cyberi_secure_add_editor_styles' );

/**
 * Display tags on single posts
 */
// function cyberi_secure_display_tags() {
//     if ( is_single() ) {
//         the_tags( '<p class="tags">Tags: ', ', ', '</p>' );
//     }
// }
// add_action( 'the_content', 'cyberi_secure_display_tags' );

// Append featured image and tags inside single post content
function cyberi_secure_append_featured_image_and_tags($content) {
    if ( is_single() && in_the_loop() && is_main_query() ) {
        // Get featured image HTML if available
        $featured_image = '';
        if ( has_post_thumbnail() ) {
            $featured_image = get_the_post_thumbnail( get_the_ID(), 'large', array('class' => 'featured-image') );
        }

        // Get tags HTML if available
        $tags = get_the_tag_list('<p class="tags">Tags: ', ', ', '</p>');

        // Append featured image and tags after the content
        $content .= $featured_image . $tags;
    }
    return $content;
}
add_filter('the_content', 'cyberi_secure_append_featured_image_and_tags');


/**
 * Register Sidebar Widget Area
 */
function cyberi_secure_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'cyberi-secure' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'cyberi_secure_widgets_init' );

/**
 * Add styles for common WordPress classes.
 */
function cyberi_secure_styles() {
    ?>
    <style>
        .wp-caption {
            margin: 0 auto;
            text-align: center;
        }
        .wp-caption-text {
            font-size: 0.875em;
            color: #555;
        }
        .sticky {
            background-color: #f7f7f7;
        }
        .gallery-caption {
            font-size: 0.9em;
            color: #333;
        }
        .bypostauthor {
            font-weight: bold;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'cyberi_secure_styles' );

/**
 * Display the featured image (post thumbnail) in the theme
 */
function cyberi_secure_featured_image() {
    if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'large', array( 'class' => 'featured-image' ) );
    }
}
add_action( 'the_content', 'cyberi_secure_featured_image' );

function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );


// Register Service Post Type
function register_service_post_type() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'name_admin_bar'     => 'Service',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Service',
        'new_item'           => 'New Service',
        'edit_item'          => 'Edit Service',
        'view_item'          => 'View Service',
        'all_items'          => 'All Services',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found.',
        'not_found_in_trash' => 'No services found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields'),
        'taxonomies'         => array('service_category', 'service_tag'),
        'rewrite'            => array('slug' => 'services'),
        'show_in_rest'       => true,
    );
    register_post_type('service', $args);
}
add_action('init', 'register_service_post_type');

// Register Taxonomies
function register_service_taxonomies() {
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name'          => 'Service Categories',
            'singular_name' => 'Service Category',
            'search_items'  => 'Search Categories',
            'all_items'     => 'All Categories',
            'edit_item'     => 'Edit Category',
            'update_item'   => 'Update Category',
            'add_new_item'  => 'Add New Category',
            'menu_name'     => 'Categories',
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service-category'),
        'show_in_rest' => true,
    ));
    
    register_taxonomy('service_tag', 'service', array(
        'labels' => array(
            'name'          => 'Service Tags',
            'singular_name' => 'Service Tag',
            'search_items'  => 'Search Tags',
            'all_items'     => 'All Tags',
            'edit_item'     => 'Edit Tag',
            'update_item'   => 'Update Tag',
            'add_new_item'  => 'Add New Tag',
            'menu_name'     => 'Tags',
        ),
        'hierarchical' => false,
        'show_admin_column' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service-tag'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_service_taxonomies');

// Add FAQ Meta Box
function add_service_faq_meta_box() {
    add_meta_box('service_faq_meta_box', 'Service FAQs', 'service_faq_meta_box_callback', 'service', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_service_faq_meta_box');

// FAQ Meta Box Callback
function service_faq_meta_box_callback($post) {
    $faqs = get_post_meta($post->ID, '_service_faqs', true) ?: [];
    $faq_section_title = get_post_meta($post->ID, '_service_faq_section_title', true) ?: 'We have 5 Common Questions';

    wp_nonce_field('save_service_faq_meta', 'service_faq_nonce');
    ?>

    <p><strong>FAQ Section Title:</strong></p>
    <input type="text" name="service_faq_section_title" value="<?php echo esc_attr($faq_section_title); ?>" style="width: 100%; margin-bottom: 10px;" />

    <div id="service-faqs-container" class="sortable-faqs">
        <?php foreach ($faqs as $index => $faq) : ?>
            <div class="service-faq-item" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; background: #f9f9f9;">
                <span class="drag-handle" style="cursor: grab; padding: 10px;">&#x2630;</span>
                <div style="flex-grow: 1;">
                    <input type="text" name="service_faqs[<?php echo $index; ?>][question]" placeholder="Question" value="<?php echo esc_attr($faq['question']); ?>" style="width: 100%; margin-bottom: 5px;" />
                    <textarea name="service_faqs[<?php echo $index; ?>][answer]" placeholder="Answer" style="width: 100%;"><?php echo esc_textarea($faq['answer']); ?></textarea>
                </div>
                <button type="button" class="button button-secondary remove-faq">Remove</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="button button-primary" id="add-service-faq">Add FAQ</button>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $(".sortable-faqs").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                $(".service-faq-item").each(function(index) {
                    $(this).find("input, textarea").each(function() {
                        let name = $(this).attr("name").replace(/\[\d+\]/, "[" + index + "]");
                        $(this).attr("name", name);
                    });
                });
            }
        });

        $('#add-service-faq').click(function() {
            let index = $('#service-faqs-container .service-faq-item').length;
            let newFAQ = `<div class="service-faq-item" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; background: #f9f9f9;">
                <span class="drag-handle" style="cursor: grab; padding: 10px;">&#x2630;</span>
                <div style="flex-grow: 1;">
                    <input type="text" name="service_faqs[${index}][question]" placeholder="Question" style="width: 100%; margin-bottom: 5px;" />
                    <textarea name="service_faqs[${index}][answer]" placeholder="Answer" style="width: 100%;"></textarea>
                </div>
                <button type="button" class="button button-secondary remove-faq">Remove</button>
            </div>`;
            $('#service-faqs-container').append(newFAQ);
        });

        $(document).on('click', '.remove-faq', function() {
            $(this).parent('.service-faq-item').remove();
            $(".service-faq-item").each(function(index) {
                $(this).find("input, textarea").each(function() {
                    let name = $(this).attr("name").replace(/\[\d+\]/, "[" + index + "]");
                    $(this).attr("name", name);
                });
            });
        });
    });
    </script>

    <?php
}


// Save FAQ Data Including Title
function save_service_faq_meta($post_id) {
    if (!isset($_POST['service_faq_nonce']) || !wp_verify_nonce($_POST['service_faq_nonce'], 'save_service_faq_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Save FAQ Section Title
    if (isset($_POST['service_faq_section_title'])) {
        update_post_meta($post_id, '_service_faq_section_title', sanitize_text_field($_POST['service_faq_section_title']));
    } else {
        delete_post_meta($post_id, '_service_faq_section_title');
    }

    // Save FAQ Data
    if (isset($_POST['service_faqs']) && is_array($_POST['service_faqs'])) {
        $faqs = array_map(function ($faq) {
            return [
                'question' => sanitize_text_field($faq['question']),
                'answer'   => sanitize_textarea_field($faq['answer']),
            ];
        }, $_POST['service_faqs']);
        update_post_meta($post_id, '_service_faqs', $faqs);
    } else {
        delete_post_meta($post_id, '_service_faqs');
    }
}
add_action('save_post', 'save_service_faq_meta');


// Display FAQs on Frontend
function display_service_faqs() {
    $faqs = get_post_meta(get_the_ID(), '_service_faqs', true);
    $faq_section_title = get_post_meta(get_the_ID(), '_service_faq_section_title', true) ?: 'We have ' . count($faqs) . ' Common Questions';

    if (!empty($faqs)) : ?>
        <div class="service-faq-section mt-4">
            <h2><?php echo esc_html($faq_section_title); ?></h2>
            <div class="accordion" id="faqAccordion">
                <?php foreach ($faqs as $index => $faq) : ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                            <button class="accordion-button <?php echo $index === 0 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $index; ?>">
                                <?php echo esc_html($faq['question']); ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo esc_html($faq['answer']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif;
}





function custom_footer_widgets_init() {
    register_sidebar(array(
        'name'          => 'Footer Widget 1',
        'id'            => 'footer_widget_1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => 'Footer Widget 2',
        'id'            => 'footer_widget_2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => 'Footer Widget 3',
        'id'            => 'footer_widget_3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'custom_footer_widgets_init');

function cyberi_secure_breadcrumbs() {
    if (!is_front_page()) {
        echo '<nav class="breadcrumb">';
        echo '<a href="' . home_url() . '">Home</a> » ';

        if (is_singular('service')) {
            // Get taxonomy for 'service' post type
            $terms = get_the_terms(get_the_ID(), 'service_category');
            if ($terms && !is_wp_error($terms)) {
                $term = array_shift($terms); // Get first category
                echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a> » ';
            }
            echo '<span>' . get_the_title() . '</span>';
        } elseif (is_page()) {
            global $post;
            if ($post->post_parent) {
                $ancestors = get_post_ancestors($post->ID);
                foreach (array_reverse($ancestors) as $ancestor) {
                    echo '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a> » ';
                }
            }
            echo '<span>' . get_the_title() . '</span>';
        } elseif (is_category()) {
            echo '<span>' . single_cat_title('', false) . '</span>';
        } elseif (is_search()) {
            echo '<span>Search results for: ' . get_search_query() . '</span>';
        } elseif (is_404()) {
            echo '<span>404 - Page Not Found</span>';
        }

        echo '</nav>';
    }
}

