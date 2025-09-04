<?php
/**
 * The template for displaying search results pages
 *
 * @package cyberi_secure
 */

get_header();
?>
<section class="banner" style="background-image: url('<?php echo esc_url(get_theme_mod('about_banner_image', get_template_directory_uri() . '/assets/images/about-background.jpg')); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 70vh;">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <nav class="breadcrumb">
            <?php cyberi_secure_breadcrumbs(); ?>
        </nav>
    </div>
</section>
<main id="main" class="site-main">
<div class="container py-5">
    <h1 class="mb-4">Search Results for: <?php echo get_search_query(); ?></h1>

    <?php if ( have_posts() ) : ?>
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>

                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination(); ?>
    
    <?php else : ?>
        <p>No results found. Try a different search term.</p>
    <?php endif; ?>
</div>
</main><!-- #main -->

<?php
get_footer();