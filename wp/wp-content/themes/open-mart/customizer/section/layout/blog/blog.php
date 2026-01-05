<?php
/**
 *Blog Option
 /*******************/
//blog post content
/*******************/
    $wp_customize->add_setting('open_mart_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
    $wp_customize->add_control('open_mart_blog_post_content', array(
        'settings' => 'open_mart_blog_post_content',
        'label'   => __('Blog Post Content','open-mart'),
        'section' => 'open-mart-section-blog-group',
        'type'    => 'select',
        'choices'    => array(
        'full'   => __('Full Content','open-mart'),
        'excerpt' => __('Excerpt Content','open-mart'), 
        'nocontent' => __('No Content','open-mart'), 
        ),
         'priority'   =>9,
    ));
    // excerpt length
    $wp_customize->add_setting('open_mart_blog_expt_length', array(
			'default'           =>'30',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'open_mart_sanitize_number',
		)
	);
	$wp_customize->add_control('open_mart_blog_expt_length', array(
			'type'        => 'number',
			'section'     => 'open-mart-section-blog-group',
			'label'       => __( 'Excerpt Length', 'open-mart' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 3000,
			),
             'priority'   =>10,
		)
	);
	// read more text
    $wp_customize->add_setting('open_mart_blog_read_more_txt', array(
			'default'           =>'Read More',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'open_mart_sanitize_text',
		)
	);
	$wp_customize->add_control('open_mart_blog_read_more_txt', array(
			'type'        => 'text',
			'section'     => 'open-mart-section-blog-group',
			'label'       => __( 'Read More Text', 'open-mart' ),
			'settings' => 'open_mart_blog_read_more_txt',
             'priority'   =>11,
			
		)
	);
    /*********************/
    //blog post pagination
    /*********************/
   $wp_customize->add_setting('open_mart_blog_post_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
    $wp_customize->add_control('open_mart_blog_post_pagination', array(
        'settings' => 'open_mart_blog_post_pagination',
        'label'   => __('Post Pagination','open-mart'),
        'section' => 'open-mart-section-blog-group',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','open-mart'),
        'click'   => __('Load More (Pro)','open-mart'), 
        'scroll'  => __('Infinite Scroll (Pro)','open-mart'), 
        ),
        'priority'   =>13,
    ));
    $wp_customize->add_setting( 'open_mart_blog_single_sidebar_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_blog_single_sidebar_disable', array(
                'label'                 => esc_html__('Force to disable sidebar in single page.', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open-mart-section-blog-group',
                'settings'              => 'open_mart_blog_single_sidebar_disable',
                'priority'   => 14,
            ) ) );
/****************/
//blog doc link
/****************/
$wp_customize->add_setting('open_mart_blog_arch_learn_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_blog_arch_learn_more',
            array(
        'section'    => 'open-mart-section-blog-group',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#blog-setting',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));