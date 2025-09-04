<?php
// Get slides from Customizer
$hero_slides = get_theme_mod('cyberi_secure_hero_slider_repeater', []);

// Check if slider is enabled
if (!empty($hero_slides)) : 
?>

<section class="hero-slider-section">
    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <?php foreach ($hero_slides as $slide) : ?>
                <div class="swiper-slide">
                    <div class="slide-content" style="background-image: url('<?php echo esc_url($slide['image']); ?>');">
                        <div class="container">
                            <h2><?php echo esc_html($slide['title']); ?></h2>
                            <p><?php echo esc_html($slide['description']); ?></p>
                            <?php if (!empty($slide['button_text']) && !empty($slide['button_link'])) : ?>
                                <a href="<?php echo esc_url($slide['button_link']); ?>" class="hero-btn"><?php echo esc_html($slide['button_text']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".hero-slider", {
            loop: true,
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            autoplay: { delay: 5000 },
        });
    });
</script>

<style>
    .hero-slider-section {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 500px;
        background-size: cover;
        background-position: center;
        text-align: center;
        color: #fff;
        position: relative;
    }
    .slide-content {
        padding: 20px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
    }
    .hero-btn {
        display: inline-block;
        padding: 10px 20px;
        background: #ff6600;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

<?php endif; ?>
