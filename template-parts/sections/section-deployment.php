<?php
/**
 * Deployment Section
 *
 * @package cyberi_secure
 */

// Check if the Deployment Section is enabled
$deployment_section_enabled = get_theme_mod( 'deployment_section_enable', true );

if ( $deployment_section_enabled ) {
    $background_color = get_theme_mod( 'deployment_section_background', 'rgba(255, 255, 255, 1)' );
    $background_image = get_theme_mod( 'deployment_section_background_image', '' );

    // Generate inline style for background
    $style = "background-color: {$background_color};";
    if ( ! empty( $background_image ) ) {
        $style .= " background-image: url({$background_image}); background-size: cover; background-position: center;";
    }
?>

<section id="deployment" style="<?php echo esc_attr( $style ); ?>">
    <div class="container row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12 deployment">
            <h2><?php echo esc_html__( 'We have specialization in following deployment:', 'cyberi-secure' ); ?></h2>
            <ul>
                <li><h6><?php echo esc_html__( "CyberArk's Core PAS Solution", 'cyberi-secure' ); ?></h6></li>
                <li><h6><?php echo esc_html__( "CyberArk's Privileged Threat Analytic", 'cyberi-secure' ); ?></h6></li>
                <li><h6><?php echo esc_html__( "CyberArk's Endpoint Privilege Manager", 'cyberi-secure' ); ?></h6></li>
                <li><h6><?php echo esc_html__( "CyberArk's Alero", 'cyberi-secure' ); ?></h6></li>
            </ul>
            <a href="#services-section"><?php echo esc_html__( 'Learn More', 'cyberi-secure' ); ?>
                <span class="icon">    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                </span>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 description">
            <p><?php echo esc_html__( 'The cyber-security challenges faced by organizations today require a broad range of highly technical services, solutions, and the right methodology for deployment. It is critical to use best security practices and leverage the capability of the product early in deployment so that organizations address security threats in a timely manner.', 'cyberi-secure' ); ?></p>
        </div>
    </div>
</section>

<?php } // End if section enabled ?>
