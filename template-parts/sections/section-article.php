<?php
/**
 * Recent Articles Section
 *
 * @package cyberi_secure
 */

// Check if the section is enabled
if ( get_theme_mod( 'recent_articles_enable', true ) ) {
    $title       = get_theme_mod( 'recent_articles_title', 'Recent Articles' );
    $post_count  = get_theme_mod( 'recent_articles_count', 3 );
    $order       = get_theme_mod( 'recent_articles_order', 'DESC' );
    $orderby     = get_theme_mod( 'recent_articles_orderby', 'date' );
    $button_text = get_theme_mod( 'recent_articles_button_text', 'More Articles' );
    $button_link = get_theme_mod( 'recent_articles_button_link', '#' );

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $post_count,
        'order'          => $order,
        'orderby'        => $orderby
    );

    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) :
        $count = 0;
?>

<section id="recent-articles">
    <div class="container">
        <h2><?php echo esc_html( $title ); ?></h2>
        <div class="row">
            <?php
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    if ($count == 0) : ?>
                        <!-- First Post (col-lg-5) -->
                        <div class="col-lg-5">
                            <div class="article-card">
                                <!-- Featured Image -->
                                <?php the_post_thumbnail('full', ['class' => 'img']); ?>
                                
                                <div class="post-wrap">
                                    <date><?php echo get_the_date(); ?></date>
                                    <h3><?php the_title(); ?></h3>
                                    <!-- Excerpt -->
                                    <p><?php echo wp_trim_words(get_the_content(), 50, '...'); ?></p>
                                    <!-- Read More Button -->
                                    <a href="<?php the_permalink(); ?>">Read More</a>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 horizontal">
                            <div class="row">
                    <?php else : ?>
                        <!-- Next Posts (col-lg-7) -->
                        <div class="col-12">
                            <div class="article-card d-flex align-items-center">
                                <?php the_post_thumbnail('medium', ['class' => 'img']); ?>
                                <div class="article-content ms-3">
                                    <date><?php echo get_the_date('j F Y'); ?></date>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php echo wp_trim_words(get_the_content(), 18, '...'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                    endif;
                    $count++;
                endwhile;
                echo '</div>' ?>
                <!-- <div class="btn-wrapper">
                    <a href="<?php /* echo esc_url( $button_link ); */ ?>" class="icon-btn">
                        <?php /* echo esc_html( $button_text ); */ ?>
                        <span class="icon">    
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                            </svg>
                        </span>
                    </a>
                </div>                 -->
<?php                '</div>'; // Close row and col-lg-7
                wp_reset_postdata();
            else :
                echo '<p>No recent articles found.</p>';
            endif;
            ?>

        </div>
    </div>
</section>

<?php } // End if section enabled ?>
