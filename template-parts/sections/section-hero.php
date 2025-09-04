<?php
/**
 * Hero Section for Cyberi Secure Theme
 *
 * @package cyberi_secure
 */

if ( get_theme_mod( 'hero_section_enable', true ) ) {
    $background_color = get_theme_mod( 'hero_section_background', '#ffffff' );
    $background_image = get_theme_mod( 'hero_section_background_image', '' );

    if (empty($background_image)) {
        $background_image = get_template_directory_uri() . '/assets/images/banner.png'; // Set default image
    }

    $style = "background-color: {$background_color};";
    if ($background_image) {
        $style .= " background-image: url({$background_image});";
    }
    ?>
    
    <section id="banner" style="<?php echo esc_attr( $style ); ?>">
        <div class="container">
            
            <h1 data-aos="fade-up" data-aos-delay="200">
                <?php echo wp_kses_post( get_theme_mod( 'hero_section_title', 'Privileged <br> Access Management' ) ); ?>
            </h1>
            <p data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'hero_section_description', 'CyberI3Secure is uniquely qualified to help companies improve efficiency, strengthen compliance, and protecting data and assets by addressing privilege access management. ' ) ); ?></p>
            <a href="<?php echo esc_url( get_theme_mod( 'hero_section_button_link', '#services-section' ) ); ?>"
               data-aos="zoom-in" data-aos-delay="100">
                <?php echo esc_html( get_theme_mod( 'hero_section_button_text', 'Our Services' ) ); ?>
                <span class="icon">    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                </span>
            </a>
        </div>
    </section>

<?php
}
?>
