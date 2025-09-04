<?php
/*
Template Name: Contact Page
*/

get_header(); ?>



<section class="banner" style="background-image: url('<?php echo get_theme_mod('about_banner_image', get_template_directory_uri() . '/assets/images/about-background.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 70vh;">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <nav class="breadcrumb">
            <?php cyberi_secure_breadcrumbs(); ?>
        </nav>
    </div>
</section>
<section id="contact">
    <div class="container">
        <div class="contact-page">
        <!-- Contact Form Section -->
        <div class="contact-form">
            <h2>Get in Touch</h2>
            <?php echo do_shortcode('[contact-form-7 id="6ebf4e2" title="Contact form 1"]'); ?>
        </div>

        <!-- Contact Information Section -->
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Phone:</strong>
            <a href="tel:+91 7972107085">+91 7972107085</a>
            <a href="tel:+91 7498419344">+91 7498419344</a></p>
            <a href="mailto:info@cyberi3secure.com"><strong>Email:</strong> info@cyberi3secure.com</a>
            <p><strong>Address:</strong> Flat No. C 103, Plot No.6, Barkha CHS, Sector 20D Airoli Navi Mumbai Thane</p>
        </div>
    </div>
    </div>
            <!-- Map Section -->
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15076.058417500444!2d72.941952!3d19.150838!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b863115511e5%3A0x36314d7cf334b448!2sAnand%20Nagar%20Barkha%20CHS!5e0!3m2!1sen!2sus!4v1742715046987!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</section>

<?php get_footer(); ?>