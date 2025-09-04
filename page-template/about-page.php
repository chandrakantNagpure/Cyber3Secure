<?php
/*
Template Name: About Page
*/

get_header(); ?>

<!-- Section 1: Banner -->
<section class="banner" style="background-image: url('<?php echo get_theme_mod('about_banner_image', get_template_directory_uri() . '/assets/images/about-background.jpg'); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 70vh;">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <nav class="breadcrumb">
            <?php cyberi_secure_breadcrumbs(); ?>
        </nav>
    </div>
</section>

<!-- Section 2: About Us -->
<section class="about-us">
    <div class="container">
        <div class="row about-content">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 about-image">

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 about-text">
                <p class="tag">About Cyberi3secure</p>
                <h2 class="section-title"><?php echo get_theme_mod('about_us_title', 'About Us'); ?></h2>
                <p>The cyber-security challenges face by organizations today requires a broad range of highly technical services, solutions and right methodology for deployment. It is critical to use best security practices and leveraging the capability of the product early in deployment so that organization addressing security threats in timely manner.</p>

 

<p>CyberI3Secure is uniquely qualified to help companies improve efficiency, strengthen compliance, and protecting data and assets by addressing privilege access management. Our specialized focus on PAM practice, combined with our deep knowledge and experience, we can deliver and deploy customized privilege access management solution for every customer. </p>

 

<p>Unlike other consultancies, our strength lies in our people: we have carefully cultivated our skilled team of experts so that we can offer clients affordable, scalable and high-value engagements. We strive to be easy to work with, transparent, flexible, accountable, collaborative, problem-solvers, and excellent communicators.</p>
                <ul>
                    <li>CyberArk's Core PAS Solution</li>
                    <li>CyberArk's Endpoint Privilege Manager</li>
                    <li>CyberArk's Privileged Threat Analytic</li>
                    <li>CyberArk's Alero</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php 
get_template_part( 'template-parts/sections/section', 'services' );
get_footer(); ?>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const aboutImage = document.querySelector(".about-image");

    let timeout;

    aboutImage.addEventListener("mousemove", function (e) {
        clearTimeout(timeout);

        const rect = aboutImage.getBoundingClientRect();
        const offsetX = (e.clientX - rect.left - rect.width / 2) * -0.1;
        const offsetY = (e.clientY - rect.top - rect.height / 2) * -0.1;

        aboutImage.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
        aboutImage.style.transition = "transform 0.1s ease-out";

        timeout = setTimeout(() => {
            aboutImage.style.transition = "transform 0.3s ease-out";
        }, 100);
    });

    aboutImage.addEventListener("mouseleave", function () {
        aboutImage.style.transform = "translate(0, 0)";
        aboutImage.style.transition = "transform 0.5s ease-out";
    });
});

</script>