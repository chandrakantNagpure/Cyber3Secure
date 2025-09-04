<?php
/**
 * Cyberi Secure Theme Customizer
 *
 * @package cyberi_secure
 */

if ( class_exists( 'Kirki' ) ) {
    Kirki::add_config( 'cyberi_secure', array(
        'capability'  => 'edit_theme_options',
        'option_type' => 'theme_mod',
    ) );

    Kirki::add_panel( 'cyberi_securi_panel', array(
        'priority'    => 20,
        'title'       => esc_html__( 'Cyberi Securi', 'cyberi-secure' ),
        'description' => esc_html__( 'Additional settings for Cyberi Securi', 'cyberi-secure' ),
    ) );

    /**
     * Hero Section
     */
    Kirki::add_section( 'hero_section', array(
        'title'          => __( 'Hero Section', 'cyberi-secure' ),
        'description'    => __( 'Settings for the hero section', 'cyberi-secure' ),
        'priority'       => 160,
        'panel'          => 'cyberi_securi_panel',
    ) );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'switch',
        'settings'    => 'hero_section_enable',
        'label'       => __( 'Enable Hero Section', 'cyberi-secure' ),
        'section'     => 'hero_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi-secure' ),
            'off' => esc_html__( 'Disable', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'color',
        'settings'    => 'hero_section_background',
        'label'       => __( 'Background Color', 'cyberi-secure' ),
        'section'     => 'hero_section',
        'default'     => '#ffffff',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'hero_section_background_image',
        'label'       => __( 'Background Image', 'cyberi-secure' ),
        'section'     => 'hero_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'hero_section_title',
        'label'       => __( 'Title', 'cyberi-secure' ),
        'section'     => 'hero_section',
        'default'     => 'Privileged <br> Access Management',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'hero_section_description',
        'label'       => __( 'Tagline', 'cyberi-secure' ),
        'section'     => 'hero_section',
        'default'     => 'CyberI3Secure is uniquely qualified to help companies improve efficiency, strengthen compliance, and protecting data and assets by addressing privilege access management. ',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'hero_section_button_text',
        'label'       => __( 'Button Text', 'cyberi-secure' ),
        'section'     => 'hero_section',
        'default'     => 'Read More',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'hero_section_button_link',
        'label'       => __( 'Button Link', 'cyberi-secure' ),
        'section'     => 'hero_section',
        'default'     => '#',
    ] );


    /**
     * Three Cards Section
     */
    Kirki::add_section( 'three_cards_section', array(
        'title'       => __( 'Three Cards Section', 'cyberi-secure' ),
        'description' => __( 'Customize the Three Cards Section settings', 'cyberi-secure' ),
        'priority'    => 161,
        'panel'          => 'cyberi_securi_panel',        
    ) );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'switch',
        'settings'    => 'three_card_section_enable',
        'label'       => __( 'Enable Three Cards Section', 'cyberi-secure' ),
        'section'     => 'three_cards_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi-secure' ),
            'off' => esc_html__( 'Disable', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'color',
        'settings'    => 'three_card_section_background',
        'label'       => __( 'Background Color', 'cyberi-secure' ),
        'section'     => 'three_cards_section',
        'default'     => 'rgba(21, 74, 185, 1)',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'three_card_section_background_image',
        'label'       => __( 'Background Image', 'cyberi-secure' ),
        'section'     => 'three_cards_section',
        'default'     => '',
    ] );

    for ($i = 1; $i <= 3; $i++) {
        Kirki::add_field( 'cyberi_secure', [
            'type'        => 'image',
            'settings'    => "card_section_img_$i",
            'label'       => sprintf( __( 'Card %d Image', 'cyberi-secure' ), $i ),
            'section'     => 'three_cards_section',
            'default'     => get_template_directory_uri() . '/assets/images/Graph.png',
        ] );

        Kirki::add_field( 'cyberi_secure', [
            'type'        => 'text',
            'settings'    => "card_section_title_$i",
            'label'       => sprintf( __( 'Card %d Title', 'cyberi-secure' ), $i ),
            'section'     => 'three_cards_section',
            'default'     => ($i == 1) ? 'Expert Insight' : (($i == 2) ? 'Certified Professional Team' : 'PAM Technology Solutions'),
        ] );

        Kirki::add_field( 'cyberi_secure', [
            'type'        => 'textarea',
            'settings'    => "card_section_description_$i",
            'label'       => sprintf( __( 'Card %d Description', 'cyberi-secure' ), $i ),
            'section'     => 'three_cards_section',
            'default'     => ($i == 1) ? 'In-depth analysis to secure privileged access.' : (($i == 2) ? 'Industry-certified experts ensuring top-tier security.' : 'Advanced tools to safeguard critical assets.'),
        ] );
    }

    /**
     * Deployment Section Customizer Settings
     */
    Kirki::add_section( 'deployment_section', array(
        'title'       => __( 'Deployment Section', 'cyberi-secure' ),
        'description' => __( 'Customize the Deployment Section settings', 'cyberi-secure' ),
        'priority'    => 162,
        'panel'       => 'cyberi_securi_panel',        
    ) );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'switch',
        'settings'    => 'deployment_section_enable',
        'label'       => __( 'Enable Deployment Section', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi-secure' ),
            'off' => esc_html__( 'Disable', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'color',
        'settings'    => 'deployment_section_background',
        'label'       => __( 'Background Color', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'default'     => 'rgba(255, 255, 255, 1)',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'deployment_section_background_image',
        'label'       => __( 'Background Image', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'deployment_section_title',
        'label'       => __( 'Section Title', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'default'     => 'We have specialization in following deployment:',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'repeater',
        'settings'    => 'deployment_section_items',
        'label'       => __( 'Deployment List Items', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'row_label'   => [
            'type'  => 'text',
            'value' => __( 'Deployment Item', 'cyberi-secure' ),
        ],
        'button_label' => __( 'Add New Item', 'cyberi-secure' ),
        'default'     => [
            ['text' => "CyberArk's Core PAS Solution"],
            ['text' => "CyberArk's Privileged Threat Analytic"],
            ['text' => "CyberArk's Endpoint Privilege Manager"],
            ['text' => "CyberArk's Alero"],
        ],
        'fields' => [
            'text' => [
                'type'        => 'text',
                'label'       => __( 'Item Text', 'cyberi-secure' ),
                'default'     => '',
            ],
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'textarea',
        'settings'    => 'deployment_section_description',
        'label'       => __( 'Section Description', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'default'     => 'The cybersecurity challenges faced by organizations today require a broad range of highly technical services, solutions, and the right methodology for deployment. It is critical to use best security practices and leverage the capability of the product early in deployment so that organizations address security threats in a timely manner.',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'deployment_section_button_text',
        'label'       => __( 'Button Text', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'default'     => 'Learn More',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'link',
        'settings'    => 'deployment_section_button_link',
        'label'       => __( 'Button Link', 'cyberi-secure' ),
        'section'     => 'deployment_section',
        'default'     => '#',
    ] );

    /**
     * Client Section Customizer Settings
     */
    Kirki::add_section( 'client_section', array(
        'title'       => __( 'Client Section', 'cyberi-secure' ),
        'description' => __( 'Customize the Client Section settings', 'cyberi-secure' ),
        'priority'    => 163,
        'panel'       => 'cyberi_securi_panel',        
    ) );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'switch',
        'settings'    => 'client_section_enable',
        'label'       => __( 'Enable Client Section', 'cyberi-secure' ),
        'section'     => 'client_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi-secure' ),
            'off' => esc_html__( 'Disable', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'color',
        'settings'    => 'client_section_background',
        'label'       => __( 'Background Color', 'cyberi-secure' ),
        'section'     => 'client_section',
        'default'     => 'rgba(255, 255, 255, 1)',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'client_section_background_image',
        'label'       => __( 'Background Image', 'cyberi-secure' ),
        'section'     => 'client_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'client_section_title',
        'label'       => __( 'Section Title', 'cyberi-secure' ),
        'section'     => 'client_section',
        'default'     => 'We are Trusted by More Than 1,000 Clients',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'repeater',
        'settings'    => 'client_section_items',
        'label'       => __( 'Client Section Items', 'cyberi-secure' ),
        'section'     => 'client_section',
        'row_label'   => [
            'type'  => 'text',
            'value' => __( 'Client Service', 'cyberi-secure' ),
        ],
        'button_label' => __( 'Add New Service', 'cyberi-secure' ),
        'default'     => [
            ['title' => 'Consulting Services', 'description' => 'Expert guidance to strengthen privileged access security, ensure compliance, and integrate seamlessly with your IT infrastructure.'],
            ['title' => 'Managed Services', 'description' => 'Ongoing PAM monitoring, maintenance, and optimization to enhance security, efficiency, and compliance with minimal operational effort.'],
        ],
        'fields' => [
            'title' => [
                'type'        => 'text',
                'label'       => __( 'Service Title', 'cyberi-secure' ),
                'default'     => '',
            ],
            'description' => [
                'type'        => 'textarea',
                'label'       => __( 'Service Description', 'cyberi-secure' ),
                'default'     => '',
            ],
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'client_section_img_1',
        'label'       => __( 'Client Section Image', 'cyberi-secure' ),
        'section'     => 'client_section',
        'default'     => get_template_directory_uri() . '/assets/images/trusted-client.png',
    ] );

    /**
     * Services Section Customizer Settings
     */
    Kirki::add_section( 'services_section', array(
        'title'       => __( 'Services Section', 'cyberi-secure' ),
        'description' => __( 'Customize the Services Section settings', 'cyberi-secure' ),
        'priority'    => 164,
        'panel'       => 'cyberi_securi_panel',
    ) );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'switch',
        'settings'    => 'services_section_enable',
        'label'       => __( 'Enable Services Section', 'cyberi-secure' ),
        'section'     => 'services_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi-secure' ),
            'off' => esc_html__( 'Disable', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'color',
        'settings'    => 'services_section_bg_color',
        'label'       => __( 'Background Color', 'cyberi-secure' ),
        'section'     => 'services_section',
        'default'     => 'rgba(255, 255, 255, 1)',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'services_section_bg_image',
        'label'       => __( 'Background Image', 'cyberi-secure' ),
        'section'     => 'services_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'services_section_title',
        'label'       => __( 'Section Title', 'cyberi-secure' ),
        'section'     => 'services_section',
        'default'     => 'We Offer Different Services',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'textarea',
        'settings'    => 'services_section_description',
        'label'       => __( 'Section Description', 'cyberi-secure' ),
        'section'     => 'services_section',
        'default'     => 'Cyberi3secure offers implementation & support for deployment of following privilege access management (PAM) technology solutions.',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'services_section_button_text',
        'label'       => __( 'Button Text', 'cyberi-secure' ),
        'section'     => 'services_section',
        'default'     => 'More Services',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'link',
        'settings'    => 'services_section_button_link',
        'label'       => __( 'Button Link', 'cyberi-secure' ),
        'section'     => 'services_section',
        'default'     => '#',
    ] );

    /**
     * Partner Section Customizer Settings
     */
    Kirki::add_section( 'partner_section', array(
        'title'       => __( 'Partner Section', 'cyberi-secure' ),
        'description' => __( 'Customize the Partner Section settings', 'cyberi-secure' ),
        'priority'    => 165,
        'panel'       => 'cyberi_securi_panel',
    ) );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'switch',
        'settings'    => 'partner_section_enable',
        'label'       => __( 'Enable Partner Section', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi-secure' ),
            'off' => esc_html__( 'Disable', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'color',
        'settings'    => 'partner_section_bg_color',
        'label'       => __( 'Background Color', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => 'rgba(255, 255, 255, 1)',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'partner_section_bg_image',
        'label'       => __( 'Background Image', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'partner_section_title',
        'label'       => __( 'Section Title', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => 'Our Technology Partners',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'textarea',
        'settings'    => 'partner_section_description',
        'label'       => __( 'Section Description', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => 'CyberArk is the global leader in Identity Security. Centered on privileged access management, CyberArk provides the most comprehensive security offering for any identity – human or machine – across business applications, distributed workforces, hybrid cloud workloads and throughout the DevOps lifecycle. The world’s leading organizations trust CyberArk to help secure their most critical assets.',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'image',
        'settings'    => 'partner_section_logo',
        'label'       => __( 'Partner Logo', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => get_template_directory_uri() . '/assets/images/large-logo.png',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'partner_section_button_text',
        'label'       => __( 'Button Text', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => 'More Services',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'link',
        'settings'    => 'partner_section_button_link',
        'label'       => __( 'Button Link', 'cyberi-secure' ),
        'section'     => 'partner_section',
        'default'     => '#',
    ] );

    /**
     * Recent Articles Section Customizer Settings
     */
    Kirki::add_section( 'recent_articles_section', array(
        'title'       => __( 'Recent Articles Section', 'cyberi-secure' ),
        'description' => __( 'Customize the Recent Articles section settings', 'cyberi-secure' ),
        'priority'    => 170,
        'panel'       => 'cyberi_securi_panel',
    ) );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'switch',
        'settings'    => 'recent_articles_enable',
        'label'       => __( 'Enable Recent Articles Section', 'cyberi-secure' ),
        'section'     => 'recent_articles_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi-secure' ),
            'off' => esc_html__( 'Disable', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'recent_articles_title',
        'label'       => __( 'Section Title', 'cyberi-secure' ),
        'section'     => 'recent_articles_section',
        'default'     => 'Recent Articles',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'number',
        'settings'    => 'recent_articles_count',
        'label'       => __( 'Number of Articles to Display', 'cyberi-secure' ),
        'section'     => 'recent_articles_section',
        'default'     => 3,
        'choices'     => [
            'min'  => 1,
            'max'  => 10,
            'step' => 1,
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'select',
        'settings'    => 'recent_articles_order',
        'label'       => __( 'Post Order', 'cyberi-secure' ),
        'section'     => 'recent_articles_section',
        'default'     => 'DESC',
        'choices'     => [
            'ASC'  => __( 'Ascending', 'cyberi-secure' ),
            'DESC' => __( 'Descending', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'select',
        'settings'    => 'recent_articles_orderby',
        'label'       => __( 'Order By', 'cyberi-secure' ),
        'section'     => 'recent_articles_section',
        'default'     => 'date',
        'choices'     => [
            'date'     => __( 'Date', 'cyberi-secure' ),
            'title'    => __( 'Title', 'cyberi-secure' ),
            'rand'     => __( 'Random', 'cyberi-secure' ),
            'modified' => __( 'Last Modified', 'cyberi-secure' ),
        ],
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'text',
        'settings'    => 'recent_articles_button_text',
        'label'       => __( 'Button Text', 'cyberi-secure' ),
        'section'     => 'recent_articles_section',
        'default'     => 'More Articles',
    ] );

    Kirki::add_field( 'cyberi_secure', [
        'type'        => 'link',
        'settings'    => 'recent_articles_button_link',
        'label'       => __( 'Button Link', 'cyberi-secure' ),
        'section'     => 'recent_articles_section',
        'default'     => '#',
    ] );







        /**
     * FAQ Section Customizer Settings
     */
    Kirki::add_section( 'faq_section', [
        'title'    => esc_html__( 'FAQ Section', 'cyberi_secure' ),
        'panel'    => 'cyberi_securi_panel',
        'priority' => 175,
    ] );
    
    // Enable/Disable Section
    Kirki::add_field( 'cyberi_secure_config', [
        'type'        => 'switch',
        'settings'    => 'faq_section_enable',
        'label'       => esc_html__( 'Enable FAQ Section', 'cyberi_secure' ),
        'section'     => 'faq_section',
        'default'     => '1',
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'cyberi_secure' ),
            'off' => esc_html__( 'Disable', 'cyberi_secure' ),
        ],
    ]);
    
    // Background Color
    Kirki::add_field( 'cyberi_secure_config', [
        'type'     => 'color',
        'settings' => 'faq_section_background',
        'label'    => esc_html__( 'Background Color', 'cyberi_secure' ),
        'section'  => 'faq_section',
        'default'  => 'rgba(21, 74, 185, 1)',
        'choices'  => [
            'alpha' => true,
        ],
    ]);
    
    // Background Image
    Kirki::add_field( 'cyberi_secure_config', [
        'type'     => 'image',
        'settings' => 'faq_section_background_image',
        'label'    => esc_html__( 'Background Image', 'cyberi_secure' ),
        'section'  => 'faq_section',
    ]);
    
    // FAQs Repeater Field
    Kirki::add_field( 'cyberi_secure_config', [
        'type'        => 'repeater',
        'label'       => esc_html__( 'FAQs List', 'cyberi_secure' ),
        'section'     => 'faq_section',
        'settings'    => 'faq_repeater',
        'row_label'   => [
            'type'  => 'text',
            'value' => esc_html__( 'FAQ', 'cyberi_secure' ),
        ],
        'button_label' => esc_html__( 'Add New FAQ', 'cyberi_secure' ),
        'default'     => [
            ['question' => 'What times can I book a security system?', 'answer' => 'You can book a security system at any time that suits you.'],
            ['question' => 'Why should I have an FAQ page?', 'answer' => 'An FAQ page helps address common customer inquiries quickly and efficiently.'],
            ['question' => 'How do I pay for my online advertising?', 'answer' => 'Payments can be made via credit card, PayPal, or direct bank transfer.'],
            ['question' => 'What languages does Cyberi Secure support?', 'answer' => 'We support multiple languages including English, Spanish, and French.'],
            ['question' => 'Do you offer marketing services?', 'answer' => 'Yes, we offer a range of digital marketing services tailored to your needs.'],
            ['question' => 'What is the spend limit?', 'answer' => 'There is no fixed limit. Your spending depends on your campaign settings.'],
            ['question' => 'Can I target my competitors?', 'answer' => 'Yes, you can set up targeted campaigns that focus on competitor-related keywords.'],
            ['question' => 'Where will my Google Ads be shown?', 'answer' => 'Your Google Ads can appear on search results, YouTube, and partner websites.'],
            ['question' => 'Do you have specific features for agencies?', 'answer' => 'Yes, we offer agency tools that help manage multiple accounts efficiently.'],
            ['question' => 'Do you offer bulk discounts?', 'answer' => 'Yes, bulk discounts are available for enterprise-level purchases.'],
        ],
        'fields'      => [
            'question' => [
                'type'  => 'text',
                'label' => esc_html__( 'Question', 'cyberi_secure' ),
            ],
            'answer'   => [
                'type'  => 'textarea',
                'label' => esc_html__( 'Answer', 'cyberi_secure' ),
            ],
        ],
    ]);
}















?>
