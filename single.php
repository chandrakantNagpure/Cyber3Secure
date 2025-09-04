<?php
/**
 * The template for displaying all single posts
 *
 * @package cyberi_secure
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();

        // Get the featured image URL after the_post() to ensure it works
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $fallback_image_url = get_template_directory_uri() . '/assets/images/about-background.jpg';
        $banner_image_url = $featured_image_url ? $featured_image_url : $fallback_image_url;
        ?>

        <!-- Banner Section -->
        <section class="banner" style="background-image: url('<?php echo esc_url($banner_image_url); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 70vh;">
            <div class="container">
                <h1 class="page-title" style="color: #fff;"><?php the_title(); ?></h1>
            </div>
        </section>

        <!-- Post Content -->
        <main id="main" class="site-main py-5">
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php
                        // Display post content
                      echo get_the_content();
                        // get_the_excerpt();
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'cyberi_secure'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>

                <?php
                the_post_navigation();

                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>
            </div>
        </main>

        <?php
    endwhile;
endif;

get_footer();
