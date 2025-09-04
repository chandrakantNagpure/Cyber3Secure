<?php
/**
 * Kirki Customizer
 *
 * @package cyberi_secure
 */

// Load Kirki from a CDN or include it in your theme.
if ( ! class_exists( 'Kirki' ) ) {
    include_once dirname( __FILE__ ) . '/kirki/kirki.php';
}