<?php
/**
 * The Sidebar containing the widget area.
 */
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div id="primary" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #primary -->
<?php endif; ?>
