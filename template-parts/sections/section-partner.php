<?php
/**
 * Partner Section
 *
 * @package cyberi_secure
 */

// Check if the Partner Section is enabled
if ( get_theme_mod( 'partner_section_enable', true ) ) {
    $background_color = get_theme_mod( 'partner_section_bg_color', 'rgba(255, 255, 255, 1)' );
    $background_image = get_theme_mod( 'partner_section_bg_image', '' );

    $title        = get_theme_mod( 'partner_section_title', 'Our Technology Partners' );
    $description  = get_theme_mod( 'partner_section_description', 'CyberArk is the global leader in Identity Security. Centered on privileged access management, CyberArk provides the most comprehensive security offering for any identity – human or machine – across business applications, distributed workforces, hybrid cloud workloads and throughout the DevOps lifecycle. The world’s leading organizations trust CyberArk to help secure their most critical assets.' );

    $partner_logo = get_theme_mod( 'partner_section_logo', get_template_directory_uri() . '/assets/images/large-logo.png' );
    
    $button_text  = get_theme_mod( 'partner_section_button_text', 'More Services' );
    $button_link  = get_theme_mod( 'partner_section_button_link', '#' );

    // Generate inline style for background
    $style = "background-color: {$background_color};";
    if ( ! empty( $background_image ) ) {
        $style .= " background-image: url({$background_image}); background-size: cover; background-position: center;";
    }
?>

<section id="partner" style="<?php echo esc_attr( $style ); ?>">
    <div class="container row justify-content-space-between align-items-center">
        <div class="col-lg-4">
            <img src="<?php echo esc_url( $partner_logo ); ?>" alt="Partner Logo" width="100%" height="376">
        </div>
        <div class="col-lg-7">
            <h2><?php echo esc_html( $title ); ?></h2>
            <p><?php echo esc_html( $description ); ?></p>
            <div class="btn-wrapper">
                <a href="#services-section" class="icon-btn">
                    <?php echo esc_html( $button_text ); ?>
                    <span class="icon">    
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php } // End if section enabled ?>
