<?php
/**
 * Dynamic FAQ Section
 *
 * @package cyberi_secure
 */

// Check if the section is enabled
if ( get_theme_mod( 'faq_section_enable', true ) ) {
    $background_color = get_theme_mod( 'faq_section_background', 'rgba(21, 74, 185, 1)' );
    $background_image = get_theme_mod( 'faq_section_background_image', '' );
    $faqs = get_theme_mod( 'faq_repeater', [] );

    // Generate inline style for background
    $style = "background-color: {$background_color};";
    if ( ! empty( $background_image ) ) {
        $style .= " background-image: url({$background_image}); background-size: cover; background-position: center;";
    }
}
?>

<section id="faq-section" class="faq-container py-5" style="<?php echo esc_attr( $style ); ?>">
    <div class="container">
        <h2 class="section-title text-left mb-4">Got Questions? We’ve Got Answers</h2>
        <div class="row">
            <?php if ( ! empty( $faqs ) ) : ?>
                <?php
                $half_count = ceil( count( $faqs ) / 2 );
                $chunks     = array_chunk( $faqs, $half_count );
                ?>
                
                <!-- First Column -->
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion1">
                        <?php foreach ( $chunks[0] as $key => $faq ) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading1-<?php echo $key; ?>">
                                    <button class="accordion-button <?php echo $key > 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1-<?php echo $key; ?>" aria-expanded="<?php echo $key == 0 ? 'true' : 'false'; ?>" aria-controls="collapse1-<?php echo $key; ?>">
                                        <?php echo esc_html( $faq['question'] ); ?>
                                    </button>
                                </h2>
                                <div id="collapse1-<?php echo $key; ?>" class="accordion-collapse collapsed <?php echo $key == 0 ? 'show' : ''; ?>" aria-labelledby="heading1-<?php echo $key; ?>" data-bs-parent="#faqAccordion1">
                                    <div class="accordion-body">
                                        <?php echo wp_kses_post( $faq['answer'] ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion2"> <!-- Fixed ID -->
                        <?php foreach ( $chunks[1] as $key => $faq ) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading2-<?php echo $key; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse2-<?php echo $key; ?>">
                                        <?php echo esc_html( $faq['question'] ); ?>
                                    </button>
                                </h2>
                                <div id="collapse2-<?php echo $key; ?>" class="accordion-collapse collapsed" aria-labelledby="heading2-<?php echo $key; ?>" data-bs-parent="#faqAccordion2">
                                    <div class="accordion-body">
                                        <?php echo wp_kses_post( $faq['answer'] ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>



<!-- Smooth Accordion Animation -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const accordions = document.querySelectorAll(".accordion-button");

    accordions.forEach((button) => {
        button.addEventListener("click", function() {
            const collapseElement = button.parentElement.nextElementSibling;
            const isCollapsed = collapseElement.classList.contains("show");

            // Collapse all accordion items
            document.querySelectorAll('.accordion-collapse').forEach(collapse => {
                if (collapse !== collapseElement) {
                    collapse.classList.remove('show');
                    collapse.style.maxHeight = null;
                    collapse.style.opacity = 0;
                }
            });

            // If the clicked item was previously collapsed, expand it
            if (!isCollapsed) {
                collapseElement.classList.add("show");
                collapseElement.style.maxHeight = collapseElement.scrollHeight + "px";
                collapseElement.style.opacity = 1;
            } else {
                collapseElement.classList.remove("show");
                collapseElement.style.maxHeight = null;
                collapseElement.style.opacity = 0;
            }

            // Rotate the arrow
            button.querySelector('::before').style.transform = isCollapsed ? 'rotate(0deg)' : 'rotate(180deg)';
        });
    });
});
</script>