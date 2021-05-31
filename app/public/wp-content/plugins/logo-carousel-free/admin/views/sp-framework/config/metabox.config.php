<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access pages directly.

$prefix = 'sp_lcp_shortcode_options';

// -----------------------------------------
// Shortcode Generator Options.
// -----------------------------------------
SPLC::createMetabox(
	$prefix,
	array(
		'title'     => __( 'Shortcode Options', 'logo-carousel-free' ),
		'post_type' => 'sp_lc_shortcodes',
		'class'     => 'sp_logo_carousel_shortcode',
		'context'   => 'normal',
		'priority'  => 'default',
	)
);

// General Settings.
SPLC::createSection(
	$prefix,
	array(
		'title'  => __( 'General Settings', 'logo-carousel-free' ),
		'icon'   => 'fa fa-cog',
		'fields' => array(
			array(
				'id'       => 'lcp_layout',
				'class'    => 'lcp_layout',
				'type'     => 'layout_preset',
				'title'    => __( 'Layout Preset', 'logo-carousel-free' ),
				'subtitle' => __( 'Select your layout to display the logos.', 'logo-carousel-free' ),
				'desc'     => __( 'To unlock Grid, Isotope, List, and Inline layouts and Settings, <b><a href="https://shapedplugin.com/plugin/logo-carousel-pro/?ref=1" target="_blank">Upgrade To Pro</a></b>!', 'logo-carousel-free' ),
				'options'  => array(
					'carousel' => array(
						'image' => SP_LC_URL . 'admin/assets/images/carousel.svg',
						'text'  => __( 'Carousel', 'logo-carousel-free' ),
					),
					'grid'     => array(
						'image'    => SP_LC_URL . 'admin/assets/images/grid.svg',
						'text'     => __( 'Grid', 'logo-carousel-free' ),
						'pro_only' => true,
					),
					'filter'   => array(
						'image'    => SP_LC_URL . 'admin/assets/images/isotope.svg',
						'text'     => __( 'Isotope', 'logo-carousel-free' ),
						'pro_only' => true,
					),
					'list'     => array(
						'image'    => SP_LC_URL . 'admin/assets/images/list.svg',
						'text'     => __( 'List', 'logo-carousel-free' ),
						'pro_only' => true,
					),
					'inline'   => array(
						'image'    => SP_LC_URL . 'admin/assets/images/inline.svg',
						'text'     => __( 'Inline', 'logo-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'  => 'carousel',
			),
			array(
				'id'         => 'lcp_logo_carousel_mode',
				'type'       => 'button_set',
				'title'      => __( 'Carousel Mode', 'logo-carousel-free' ),
				'subtitle'   => __( 'Select a carousel mode.', 'logo-carousel-free' ),
				'class'      => 'sp-lc-pro-only',
				'options'    => array(
					'standard' => __( 'Standard', 'logo-carousel-free' ),
					'ticker'   => __( 'Ticker', 'logo-carousel-free' ),
					'center'   => __( 'Center', 'logo-carousel-free' ),
				),
				'default'    => 'standard',
				'dependency' => array( 'lcp_layout', '==', 'carousel' ),
			),
			array(
				'id'       => 'lcp_number_of_columns',
				'type'     => 'column',
				'title'    => __( 'Logo Column(s)', 'logo-carousel-free' ),
				'subtitle' => __( 'Set number of column(s) in different devices for responsive view.', 'logo-carousel-free' ),
				'help'     => '<i class="fa fa-television"></i> Large Desktop - is larger than 1200px,<br><i class="fa fa-desktop"></i> Desktop - size is smaller than 1024px,<br> <i class="fa fa-tablet"></i> Tablet - Size is smaller than 768,<br> <i class="fa fa-mobile"></i> Mobile Landscape- size is smaller than 576px.,<br> <i class="fa fa-mobile"></i> Mobile - size is smaller than 480px.',
				'default'  => array(
					'lg_desktop'       => '5',
					'desktop'          => '4',
					'tablet'           => '3',
					'mobile_landscape' => '2',
					'mobile'           => '1',
				),
			),
			array(
				'id'       => 'lcp_display_logos_from',
				'class'    => 'lcp_display_logos_from',
				'type'     => 'select',
				'title'    => __( 'Filter Logos', 'logo-carousel-free' ),
				'subtitle' => __( 'Select an option to display by filtering logos.', 'logo-carousel-free' ),
				'options'  => array(
					'latest'         => __( 'All', 'logo-carousel-free' ),
					'category'       => array(
						'text'     => __( 'Category(Pro)', 'logo-carousel-free' ),
						'pro_only' => true,
					),
					'specific_logos' => array(
						'text'     => __( 'Specific(Pro)', 'logo-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'  => 'latest',
			),
			array(
				'id'       => 'lcp_number_of_total_items',
				'type'     => 'spinner',
				'title'    => __( 'Limit', 'logo-carousel-free' ),
				'subtitle' => __( 'Number of total logos to show.', 'logo-carousel-free' ),
				'default'  => '15',
				'min'      => -1,
			),
			array(
				'id'       => 'lcp_logo_link_type',
				'type'     => 'button_set',
				'title'    => __( 'Logo Link Type ', 'logo-carousel-free' ),
				'subtitle' => __( 'Select a logo link type.', 'logo-carousel-free' ),
				'class'    => 'sp-lc-link-pro--only',
				'options'  => array(
					'Link '  => __( 'Link ', 'logo-carousel-free' ),
					'Popup ' => __( 'Popup ', 'logo-carousel-free' ),
					'none'   => __( 'None', 'logo-carousel-free' ),
				),
				'default'  => 'none',
			),
			array(
				'id'       => 'lcp_item_order_by',
				'type'     => 'select',
				'class'    => 'order_by_pro',
				'title'    => __( 'Order by', 'logo-carousel-free' ),
				'subtitle' => __( 'Select an order by option.', 'logo-carousel-free' ),
				'options'  => array(
					'title'      => __( 'Title', 'logo-carousel-free' ),
					'date'       => __( 'Date', 'logo-carousel-free' ),
					'menu_order' => __( 'Drag & Drop (Pro)', 'logo-carousel-free' ),
					'rand'       => __( 'Random (Pro)', 'logo-carousel-free' ),
				),
				'default'  => 'date',
			),
			array(
				'id'       => 'lcp_item_order',
				'type'     => 'select',
				'title'    => __( 'Order', 'logo-carousel-free' ),
				'subtitle' => __( 'Select an order option.', 'logo-carousel-free' ),
				'options'  => array(
					'ASC'  => __( 'Ascending', 'logo-carousel-free' ),
					'DESC' => __( 'Descending', 'logo-carousel-free' ),
				),
				'default'  => 'ASC',
			),
			array(
				'id'         => 'lcp_preloader',
				'type'       => 'switcher',
				'title'      => __( 'Preloader', 'logo-carousel-free' ),
				'subtitle'   => __( 'Carousel will be hidden until page load completed.', 'logo-carousel-free' ),
				'default'    => true,
				'text_on'    => __( 'Enabled', 'logo-carousel-free' ),
				'text_off'   => __( 'Disabled', 'logo-carousel-free' ),
				'text_width' => 95,
			),
		),
	)
);

// Carousel Controls.
SPLC::createSection(
	$prefix,
	array(
		'title'  => __( 'Carousel Controls', 'logo-carousel-free' ),
		'icon'   => 'fa fa-sliders',
		'fields' => array(
			array(
				'type'     => 'switcher',
				'id'       => 'lcp_carousel_auto_play',
				'title'    => __( 'AutoPlay', 'logo-carousel-free' ),
				'subtitle' => __( 'On/Off autoplay for the carousel.', 'logo-carousel-free' ),
				'default'  => true,
			),
			array(
				'id'         => 'lcp_carousel_auto_play_speed',
				'type'       => 'spinner',
				'title'      => __( 'AutoPlay Speed', 'logo-carousel-free' ),
				'subtitle'   => __( 'Set auto play speed in millisecond.', 'logo-carousel-free' ),
				'unit'       => __( 'ms', 'logo-carousel-free' ),
				'default'    => '3000',
				'min'        => 1,
				'step'       => 10,
				'max'        => 15000,
				'dependency' => array(
					'lcp_carousel_auto_play',
					'==',
					'true',
					true,
				),
			),
			array(
				'id'       => 'lcp_carousel_scroll_speed',
				'type'     => 'spinner',
				'title'    => __( 'Pagination Speed', 'logo-carousel-free' ),
				'subtitle' => __( 'Set pagination/slide scroll speed in millisecond.', 'logo-carousel-free' ),
				'unit'     => __( 'ms', 'logo-carousel-free' ),
				'max'      => 6000,
				'step'     => 10,
				'default'  => '600',
			),
			array(
				'id'         => 'lcp_carousel_pause_on_hover',
				'type'       => 'switcher',
				'title'      => __( 'Pause on Hover', 'logo-carousel-free' ),
				'subtitle'   => __( 'On/Off pause on hover carousel.', 'logo-carousel-free' ),
				'default'    => true,
				'dependency' => array(
					'lcp_carousel_auto_play',
					'==',
					'true',
					true,
				),
			),
			array(
				'id'       => 'lcp_carousel_infinite',
				'type'     => 'switcher',
				'title'    => __( 'Infinite Loop', 'logo-carousel-free' ),
				'subtitle' => __( 'On/Off infinite looping for the carousel.', 'logo-carousel-free' ),
				'default'  => true,
			),
			array(
				'id'       => 'lcp_rtl_mode',
				'type'     => 'button_set',
				'title'    => __( 'Carousel Direction', 'logo-carousel-free' ),
				'subtitle' => __( 'Set carousel direction as you need.', 'logo-carousel-free' ),
				'options'  => array(
					'false' => __( 'Right to Left', 'logo-carousel-free' ),
					'true'  => __( 'Left to Right', 'logo-carousel-free' ),
				),
				'default'  => 'false',
			),
			array(
				'type'    => 'subheading',
				'content' => __( 'Navigation', 'logo-carousel-free' ),
			),
			array(
				'id'       => 'lcp_nav_show',
				'type'     => 'button_set',
				'title'    => __( 'Navigation', 'logo-carousel-free' ),
				'subtitle' => __( 'Show/hide navigation.', 'logo-carousel-free' ),
				'options'  => array(
					'show'           => __( 'Show', 'logo-carousel-free' ),
					'hide'           => __( 'Hide', 'logo-carousel-free' ),
					'hide_on_mobile' => __( 'Hide on Mobile', 'logo-carousel-free' ),
				),
				'default'  => 'show',
			),
			// array(
			// 'id'       => 'lcp_nav_color',
			// 'type'     => 'color',
			// 'title'    => __( 'Navigation Color ', 'logo-carousel-free' ),
			// 'subtitle' => __( 'Pick a color for navigation arrows.', 'logo-carousel-free' ),
			// 'default'  => '#afafaf',
			// ),
			array(
				'id'         => 'lcp_nav_color',
				'type'       => 'color_group',
				'title'      => __( 'Color', 'logo-carousel-free' ),
				'subtitle'   => __( 'Set navigation color.', 'logo-carousel-free' ),
				'options'    => array(
					'color1' => __( 'Color', 'logo-carousel-free' ),
					'color2' => __( 'Hover Color', 'logo-carousel-free' ),
					'color3' => __( 'Background', 'logo-carousel-free' ),
					'color4' => __( 'Hover Background', 'logo-carousel-free' ),
				),
				'default'    => array(
					'color1' => '#aaaaaa',
					'color2' => '#ffffff',
					'color3' => 'transparent',
					'color4' => '#16a08b',
				),
				'dependency' => array(
					'lcp_nav_show',
					'!=',
					'hide',
				),
			),
			array(
				'id'          => 'lcp_nav_border',
				'type'        => 'border',
				'title'       => __( 'Border', 'logo-carousel-free' ),
				'subtitle'    => __( 'Set border for navigation.', 'logo-carousel-free' ),
				'all'         => true,
				'default'     => array(
					'all'         => '1',
					'style'       => 'solid',
					'color'       => '#aaaaaa',
					'hover_color' => '#16a08b',
				),
				'dependency'  => array(
					'lcp_nav_show',
					'!=',
					'hide',
				),
				'hover_color' => true,
			),
			array(
				'type'    => 'subheading',
				'content' => __( 'Pagination', 'logo-carousel-free' ),
			),
			array(
				'id'       => 'lcp_carousel_dots',
				'type'     => 'button_set',
				'title'    => __( 'Pagination', 'logo-carousel-free' ),
				'subtitle' => __( 'Show/hide pagination dots.', 'logo-carousel-free' ),
				'options'  => array(
					'show'           => __( 'Show', 'logo-carousel-free' ),
					'hide'           => __( 'Hide', 'logo-carousel-free' ),
					'hide_on_mobile' => __( 'Hide on Mobile', 'logo-carousel-free' ),
				),
				'default'  => 'show',
			),
			// array(
			// 'id'       => 'lcp_carousel_dots_color',
			// 'type'     => 'color',
			// 'title'    => __( 'Pagination Color ', 'logo-carousel-free' ),
			// 'subtitle' => __( 'Pick a color for pagination dots.', 'logo-carousel-free' ),
			// 'default'  => '#dddddd',
			// ),
			array(
				'id'         => 'lcp_carousel_dots_color',
				'type'       => 'color_group',
				'title'      => __( 'Color', 'logo-carousel-free' ),
				'subtitle'   => __( 'Set pagination dots color.', 'logo-carousel-free' ),
				'options'    => array(
					'color1' => __( 'Color', 'logo-carousel-free' ),
					'color2' => __( 'Active Color', 'logo-carousel-free' ),
				),
				'default'    => array(
					'color1' => '#dddddd',
					'color2' => '#16a08b',
				),
				'dependency' => array(
					'lcp_carousel_dots',
					'!=',
					'hide',
				),
			),
			array(
				'type'    => 'subheading',
				'content' => __( 'Miscellaneous', 'logo-carousel-free' ),
			),
			array(
				'id'         => 'lcp_carousel_swipe',
				'type'       => 'switcher',
				'title'      => __( 'Touch Swipe', 'logo-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable touch swipe mode.', 'logo-carousel-free' ),
				'default'    => true,
				'text_on'    => __( 'Enabled', 'logo-carousel-free' ),
				'text_off'   => __( 'Disabled', 'logo-carousel-free' ),
				'text_width' => 95,
			),
			array(
				'id'         => 'lcp_carousel_draggable',
				'type'       => 'switcher',
				'title'      => __( 'Mouse Draggable', 'logo-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable mouse draggable mode.', 'logo-carousel-free' ),
				'text_on'    => __( 'Enabled', 'logo-carousel-free' ),
				'text_off'   => __( 'Disabled', 'logo-carousel-free' ),
				'text_width' => 95,
				'default'    => true,
			),
		),
	)
);

// Style Settings.
SPLC::createSection(
	$prefix,
	array(
		'title'  => __( 'Style Settings', 'logo-carousel-free' ),
		'icon'   => 'fa fa-paint-brush',
		'fields' => array(
			array(
				'id'         => 'lcp_section_title',
				'type'       => 'switcher',
				'title'      => __( 'Section Title', 'logo-carousel-free' ),
				'subtitle'   => __( 'Display logo section title.', 'logo-carousel-free' ),
				'default'    => false,
				'text_on'    => __( 'Show', 'logo-carousel-free' ),
				'text_off'   => __( 'Hide', 'logo-carousel-free' ),
				'text_width' => 80,
			),
			// array(
			// 'id'       => 'lc_logo_border',
			// 'type'     => 'switcher',
			// 'title'    => __( 'Logo Border', 'logo-carousel-free' ),
			// 'subtitle' => __( 'Check to show logo border.', 'logo-carousel-free' ),
			// 'default'  => 'on',
			// ),
			// array(
			// 'id'       => 'lc_brand_color',
			// 'type'     => 'color',
			// 'title'    => __( 'Brand Color  ', 'logo-carousel-free' ),
			// 'subtitle' => __( 'Brand/Main color includes all hover & active color of the carousel.', 'logo-carousel-free' ),
			// 'default'  => '#16a08b',
			// ),
			array(
				'id'          => 'lcp_logo_border',
				'type'        => 'border',
				'title'       => __( 'Logo Border', 'logo-carousel-free' ),
				'subtitle'    => __( 'Set border for logo image.', 'logo-carousel-free' ),
				'all'         => true,
				'default'     => array(
					'all'         => '1',
					'style'       => 'solid',
					'color'       => '#dddddd',
					'hover_color' => '#16a08b',
				),
				'hover_color' => true,
			),
			array(
				'id'       => 'lcp_image_title_attr',
				'type'     => 'checkbox',
				'title'    => __( 'Logo Title Attribute', 'logo-carousel-free' ),
				'subtitle' => __( 'Check to add logo title attribute.', 'logo-carousel-free' ),
				'default'  => false,
			),
		),
	)
);

// Typography.
SPLC::createSection(
	$prefix,
	array(
		'title'  => __( 'Typography', 'logo-carousel-free' ),
		'icon'   => 'fa fa-font',
		'fields' => array(
			array(
				'type'    => 'notice',
				'style'   => 'normal',
				'content' => __( 'To unlock the following Typography (950+ Google Fonts) options, <b><a href="https://shapedplugin.com/plugin/logo-carousel-pro/?ref=1" target="_blank">Upgrade To Pro</a></b>!', 'logo-carousel-free' ),
			),
			array(
				'id'           => 'lcp_section_title_typography',
				'type'         => 'typography',
				'title'        => __( 'Section Title Font', 'logo-carousel-free' ),
				'subtitle'     => __( 'Set section title font properties.', 'logo-carousel-free' ),
				'default'      => array(
					'font-family'    => 'Ubuntu',
					'font-weight'    => 'regular',
					'type'           => 'google',
					'font-size'      => '24',
					'line-height'    => '32',
					'text-align'     => 'left',
					'text-transform' => 'none',
					'letter-spacing' => '',
					'color'          => '#222',
				),
				'color'        => true, // Enable or disable preview box.
				'preview'      => 'always', // Enable or disable preview box.
				'preview_text' => 'The Section Title', // Replace preview text with any text you like.
			),
			array(
				'id'           => 'lcp_logo_title_typography',
				'type'         => 'typography',
				'title'        => __( 'Logo Title Font', 'logo-carousel-free' ),
				'subtitle'     => __( 'Set logo title font properties', 'logo-carousel-free' ),
				'default'      => array(
					'font-family'    => 'Ubuntu',
					'font-weight'    => 'regular',
					'type'           => 'google',
					'font-size'      => '14',
					'line-height'    => '21',
					'text-align'     => 'center',
					'text-transform' => 'none',
					'letter-spacing' => '',
					'color'          => '#2f2f2f',
				),
				'color'        => true, // Enable or disable preview box.
				'preview'      => 'always', // Enable or disable preview box.
				'preview_text' => 'The Logo Title', // Replace preview text with any text you like.
			),
			array(
				'id'           => 'lcp_logo_description_typography',
				'type'         => 'typography',
				'title'        => __( 'Logo Body/Description Font', 'logo-carousel-free' ),
				'subtitle'     => __( 'Set logo description font properties', 'logo-carousel-free' ),
				'default'      => array(
					'font-family'    => 'Ubuntu',
					'font-weight'    => 'regular',
					'type'           => 'google',
					'font-size'      => '14',
					'line-height'    => '21',
					'text-align'     => 'center',
					'text-transform' => 'none',
					'letter-spacing' => '',
					'color'          => '#555',
				),
				'color'        => true, // Enable or disable color field.
				'preview'      => 'always', // Enable or disable preview box.
				'preview_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				// Replace preview text with any text you like.
			),

		),
	)
);

$prefix = 'sp_logo_carousel_link_option';

// -----------------------------------------
// Logo Link Metabox Options               -
// -----------------------------------------
SPLC::createMetabox(
	$prefix,
	array(
		'title'     => __( 'Logo Link URL', 'logo-carousel-free' ),
		'post_type' => 'sp_logo_carousel',
		'context'   => 'normal',
		'priority'  => 'default',
	)
);

// Logo link.
SPLC::createSection(
	$prefix,
	array(
		'fields' => array(
			array(
				'id'         => 'lcp_logo_link',
				'type'       => 'text',
				'class'      => 'lcp_logo_link',
				'title'      => __( 'Custom URL', 'logo-carousel-free' ),
				'subtitle'   => __( 'Type logo link url.', 'logo-carousel-free' ),
				'desc'       => __( ' This feature is available in <a href="https://shapedplugin.com/plugin/logo-carousel-pro/?ref=1" target="_blank">Pro Version</a> only.', 'logo-carousel-free' ),
				'attributes' => array(
					'placeholder' => 'http://example.com',
					'disabled'    => 'disabled',
				),
			),
		),
	)
);
