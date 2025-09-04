<?php
/**
 * Sections for Cyberi Secure Theme
 *
 * @package cyberi_secure
 */

// ...existing code...

function render_hero_section() {
    if ( get_theme_mod( 'hero_section_enable', true ) ) {
        $background_color = get_theme_mod( 'hero_section_background', '#ffffff' );
        $background_image = get_theme_mod( 'hero_section_background_image', '' );
        $style = "background-color: {$background_color};";
        if ( $background_image ) {
            $style .= " background-image: url({$background_image});";
        }
        ?>
        <section id="hero" style="<?php echo esc_attr( $style ); ?>">
            <div class="container">
                <h1><?php echo get_theme_mod( 'hero_section_title', 'Privileged <br> Access Management' ); ?></h1>
                <p><?php echo get_theme_mod( 'hero_section_subtitle', 'Is our business' ); ?></p>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_section_button_link', '#' ) ); ?>" class="btn">
                    <?php echo esc_html( get_theme_mod( 'hero_section_button_text', 'Read More' ) ); ?>
                </a>
            </div>
        </section>
        <?php
    }
}

// ...existing code...
add_action( 'wp_head', 'render_hero_section' );