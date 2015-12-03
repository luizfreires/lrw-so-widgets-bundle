<?php
/**
 * Widget Name: LRW - Heading
 * Description: A custom heading.
 */
class LRW_Widget_Heading extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'lrw-heading',
		  	__( 'LRW - Heading', 'lrw-so-widgets-bundle' ),
		  	array(
				'description' => __( 'A custom heading.', 'lrw-so-widgets-bundle' ),
				'panels_title' => false,
			),
		  	array(),
		  	array(
		  		'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'lrw-so-widgets-bundle' ),
				),

				'heading_type' => array(
					'type' => 'select',
					'label' => __( 'Element tag', 'lrw-so-widgets-bundle' ),
					'options' => array(
						'h1' => __( 'h1', 'lrw-so-widgets-bundle' ),
						'h2' => __( 'h2', 'lrw-so-widgets-bundle' ),
						'h3' => __( 'h3', 'lrw-so-widgets-bundle' ),
						'h4' => __( 'h4', 'lrw-so-widgets-bundle' ),
						'h5' => __( 'h5', 'lrw-so-widgets-bundle' ),
						'h6' => __( 'h6', 'lrw-so-widgets-bundle' ),
					),
				),

				'heading_color' => array(
					'type' => 'color',
					'label' => __( 'Text color', 'lrw-so-widgets-bundle' ),
				),

				'heading_align' => array(
					'type' => 'select',
					'label' => __( 'Heading align', 'lrw-so-widgets-bundle' ),
					'default' => 'center',
					'options' => array(
						'center' => __( 'Center', 'lrw-so-widgets-bundle' ),
						'right' => __( 'Right', 'lrw-so-widgets-bundle' ),
						'left' => __( 'Left', 'lrw-so-widgets-bundle' ),
					),
				),

				'margin_top' => array(
					'type' => 'measurement',
					'label' => __( 'Margin top', 'lrw-so-widgets-bundle' ),
					'default' => '',
				),

				'margin_bottom' => array(
					'type' => 'measurement',
					'label' => __( 'Margin bottom', 'lrw-so-widgets-bundle' ),
					'default' => '',
				),
			),

		  plugin_dir_path( __FILE__ )
		);
	}


	function get_template_name( $instance ) {
		return 'view';
	}

	function get_style_name( $instance ) {
		return 'style';
	}

	function get_less_variables( $instance ) {
		if ( empty( $instance ) ) return array();

		return array(
			'heading_color' => $instance['heading_color'],
			'heading_align' => $instance['heading_align'],
			'margin_top' 	=> $instance['margin_top'],
			'margin_bottom' => $instance['margin_bottom'],
		);
	}
}

siteorigin_widget_register( 'lrw-heading', __FILE__, 'LRW_Widget_Heading' );
