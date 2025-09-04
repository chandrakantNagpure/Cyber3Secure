<?php
/**
 * Client Section
 *
 * @package cyberi_secure
 */

// Check if the Client Section is enabled
if ( get_theme_mod( 'client_section_enable', true ) ) {
    $background_color = get_theme_mod( 'client_section_background', 'rgba(255, 255, 255, 1)' );
    $background_image = get_theme_mod( 'client_section_background_image', '' );

    $title  = get_theme_mod( 'client_section_title', 'We are Trusted by More Than 1,000 Clients' );
    $items  = get_theme_mod( 'client_section_items', [] );
    $image  = get_theme_mod( 'client_section_img_1', get_template_directory_uri() . '/assets/images/trusted-client.png' );

    // Generate inline style for background
    $style = "background-color: {$background_color};";
    if ( ! empty( $background_image ) ) {
        $style .= " background-image: url({$background_image}); background-size: cover; background-position: center;";
    }
?>

<section id="client" style="<?php echo esc_attr( $style ); ?>">
    <div class="row justify-content-center align-items-end">
        <div class="col-lg-6 client-left">
            <div class="client-wrapper">
                <h2><?php echo esc_html( $title ); ?></h2>
                <ul>
                    <?php if ( ! empty( $items ) ) : ?>
                        <?php foreach ( $items as $item ) : ?>
                            <li>
                                <h5><?php echo esc_html( $item['title'] ); ?></h5>
                                <p><?php echo esc_html( $item['description'] ); ?></p>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="<?php echo esc_url( $image ); ?>" alt="Trusted Clients">
        </div>
    </div>
</section>

<?php } // End if section enabled ?>
