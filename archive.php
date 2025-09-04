<?php
/**
 * The template for displaying archive pages
 *
 * @package cyberi_secure
 */

get_header();
?>

<!-- Section: Banner -->
<section class="banner" style="background-image: url('<?php echo get_theme_mod('about_banner_image', get_template_directory_uri() . '/assets/images/about-background.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 70vh;">
    <div class="container">
        <h1 class="page-title"><?php the_archive_title(); ?></h1>
    </div>
</section>

<!-- Main Content -->
<main id="main" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>

            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>

            <div class="post-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post">
                        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post-meta"><?php the_time('F j, Y'); ?> | <?php the_category(', '); ?></div>
                        <div class="post-excerpt"><?php the_excerpt(); ?></div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total'     => $wp_query->max_num_pages,
                    'current'   => max(1, get_query_var('paged')),
                    'prev_text' => __('« Prev'),
                    'next_text' => __('Next »'),
                ));
                ?>
            </div>

        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
