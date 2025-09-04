<?php
/**
 * Three Cards Section
 *
 * @package cyberi_secure
 */

// Check if the Three Cards Section is enabled
$three_card_section_enabled = get_theme_mod( 'three_card_section_enable', true );

if ( $three_card_section_enabled ) {
    $background_color = get_theme_mod( 'three_card_section_background', 'rgba(21, 74, 185, 1)' );
    $background_image = get_theme_mod( 'three_card_section_background_image', '' );

    // Generate inline style for background
    $style = "background-color: {$background_color};";
    if ( ! empty( $background_image ) ) {
        $style .= " background-image: url({$background_image}); background-size: cover; background-position: center;";
    }
?>

<section id="three-cards">
    <div class="container row" style="<?php echo esc_attr( $style ); ?>">
        <div class="col-lg-4">
            <img src="<?php echo esc_url( get_theme_mod( 'card_section_img_1', get_template_directory_uri() . '/assets/images/Graph.png' ) ); ?>" alt="Image">
            <h3><?php echo esc_html( get_theme_mod( 'card_section_title_1', 'Expert Insight' ) ); ?></h3>
            <p><?php echo esc_html( get_theme_mod( 'card_section_description_1', 'In-depth analysis to secure privileged access.' ) ); ?></p>
        </div>
        <div class="col-lg-4">
            <img src="<?php echo esc_url( get_theme_mod( 'card_section_img_2', get_template_directory_uri() . '/assets/images/Diploma.png' ) ); ?>" alt="Image">
            <h3><?php echo esc_html( get_theme_mod( 'card_section_title_2', 'Certified Professional Team' ) ); ?></h3>
            <p><?php echo esc_html( get_theme_mod( 'card_section_description_2', 'Industry-certified experts ensuring top-tier security.' ) ); ?></p>
        </div>
        <div class="col-lg-4">
            <img src="<?php echo esc_url( get_theme_mod( 'card_section_img_3', get_template_directory_uri() . '/assets/images/Graph.png' ) ); ?>" alt="Image">
            <h3><?php echo esc_html( get_theme_mod( 'card_section_title_3', 'PAM Technology Solutions' ) ); ?></h3>
            <p><?php echo esc_html( get_theme_mod( 'card_section_description_3', 'Advanced tools to safeguard critical assets.' ) ); ?></p>
        </div>
    </div>
</section>

<?php } // End if section enabled ?>
