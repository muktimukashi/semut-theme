<?php
/**
 * Theme functions for Semut.
 *
 * @package Semut
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_template_directory() . '/inc/theme-data.php';

function semut_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'semut' ),
		)
	);
}
add_action( 'after_setup_theme', 'semut_theme_setup' );

function semut_enqueue_assets() {
	wp_enqueue_style(
		'semut-fonts',
		'https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Quicksand:wght@500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_script(
		'semut-tailwind',
		'https://cdn.tailwindcss.com',
		array(),
		null,
		false
	);

	$tailwind_config = <<<JS
window.tailwind = window.tailwind || {};
window.tailwind.config = {
	theme: {
		extend: {
			colors: {
				leafLight: '#D8E88D',
				leaf: '#3F8E2E',
				pine: '#1E6A58',
				orangeFun: '#FF8A2A',
				earth: '#C99655',
				skySoft: '#D9F3F4',
				cream: '#FFFBEF',
				ink: '#294038'
			},
			fontFamily: {
				body: ['Nunito', 'sans-serif'],
				display: ['Quicksand', 'sans-serif']
			}
		}
	}
};
JS;
	wp_add_inline_script( 'semut-tailwind', $tailwind_config, 'before' );

	wp_enqueue_style(
		'semut-home',
		get_template_directory_uri() . '/assets/css/home.css',
		array(),
		'1.0.0'
	);

	wp_enqueue_script(
		'semut-home',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		'1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'semut_enqueue_assets' );

function semut_get_logo_url() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	if ( $custom_logo_id ) {
		$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		if ( ! empty( $logo[0] ) ) {
			return semut_rewrite_public_media_url( $logo[0] );
		}
	}

	return get_template_directory_uri() . '/assets/images/logo.png';
}

function semut_section_url( $section = '' ) {
	$url = home_url( '/' );

	if ( $section ) {
		$url .= '#' . ltrim( $section, '#' );
	}

	return $url;
}

function semut_get_primary_menu_items() {
	$locations = get_nav_menu_locations();

	if ( ! empty( $locations['primary'] ) ) {
		$menu_items = wp_get_nav_menu_items( $locations['primary'] );

		if ( ! empty( $menu_items ) ) {
			return $menu_items;
		}
	}

	return array();
}

function semut_render_primary_nav( $mobile = false ) {
	$menu_items = semut_get_primary_menu_items();

	if ( ! empty( $menu_items ) ) {
		foreach ( $menu_items as $item ) {
			$class = $mobile ? 'rounded-xl px-3 py-2 hover:bg-skySoft/50' : 'hover:text-pine';
			printf(
				'<a href="%1$s" class="%2$s">%3$s</a>',
				esc_url( $item->url ),
				esc_attr( $class ),
				esc_html( $item->title )
			);
		}

		return;
	}

	foreach ( semut_get_navigation_items() as $item ) {
		$class = $mobile ? 'rounded-xl px-3 py-2 hover:bg-skySoft/50' : $item['class'];
		printf(
			'<a href="%1$s" class="%2$s">%3$s</a>',
			esc_url( semut_section_url( $item['id'] ) ),
			esc_attr( $class ),
			esc_html( $item['label'] )
		);
	}
}

function semut_primary_nav_fallback() {
	semut_render_primary_nav();
}

function semut_primary_nav_mobile_fallback() {
	semut_render_primary_nav( true );
}

function semut_rewrite_public_media_url( $url ) {
	if ( empty( $url ) || ! is_string( $url ) ) {
		return $url;
	}

	$replacements = array(
		'http://semut.test'  => 'https://semut-semut.sch.id',
		'https://semut.test' => 'https://semut-semut.sch.id',
	);

	return strtr( $url, $replacements );
}

function semut_filter_attachment_image_src( $image ) {
	if ( ! empty( $image[0] ) ) {
		$image[0] = semut_rewrite_public_media_url( $image[0] );
	}

	return $image;
}
add_filter( 'wp_get_attachment_image_src', 'semut_filter_attachment_image_src' );

function semut_filter_attachment_url( $url ) {
	return semut_rewrite_public_media_url( $url );
}
add_filter( 'wp_get_attachment_url', 'semut_filter_attachment_url' );

function semut_filter_srcset_urls( $sources ) {
	if ( empty( $sources ) || ! is_array( $sources ) ) {
		return $sources;
	}

	foreach ( $sources as $width => $source ) {
		if ( ! empty( $source['url'] ) ) {
			$sources[ $width ]['url'] = semut_rewrite_public_media_url( $source['url'] );
		}
	}

	return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'semut_filter_srcset_urls' );

function semut_filter_content_media_urls( $content ) {
	return str_replace(
		array(
			'http://semut.test/wp-content/uploads/',
			'https://semut.test/wp-content/uploads/',
		),
		array(
			'https://semut-semut.sch.id/wp-content/uploads/',
			'https://semut-semut.sch.id/wp-content/uploads/',
		),
		$content
	);
}
add_filter( 'the_content', 'semut_filter_content_media_urls', 20 );

function semut_sanitize_map_embed( $value ) {
	$value = trim( (string) $value );

	if ( '' === $value ) {
		return '';
	}

	if ( false === strpos( $value, '<iframe' ) && preg_match( '#https://www\.google\.com/maps/embed\?[^"\s]+#', $value, $matches ) ) {
		$value = sprintf(
			'<iframe src="%1$s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
			esc_url_raw( $matches[0] )
		);
	}

	return wp_kses(
		$value,
		array(
			'iframe' => array(
				'src'             => true,
				'width'           => true,
				'height'          => true,
				'style'           => true,
				'allowfullscreen' => true,
				'loading'         => true,
				'referrerpolicy'  => true,
				'title'           => true,
				'class'           => true,
			),
		)
	);
}

function semut_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'semut_jenjang_links',
		array(
			'title'    => __( 'Semut Jenjang Links', 'semut' ),
			'priority' => 40,
		)
	);

	$levels = array(
		'playgroup' => __( 'Playgroup Link', 'semut' ),
		'tk'        => __( 'TK Link', 'semut' ),
		'sd'        => __( 'SD Link', 'semut' ),
		'smp-ins'   => __( 'SMP INS Link', 'semut' ),
	);

	foreach ( $levels as $slug => $label ) {
		$setting_id = 'semut_level_link_' . $slug;

		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $label,
				'section' => 'semut_jenjang_links',
				'type'    => 'url',
			)
		);
	}
}
add_action( 'customize_register', 'semut_customize_register' );

function semut_get_level_link( $slug ) {
	$link = get_theme_mod( 'semut_level_link_' . $slug, '' );

	if ( ! empty( $link ) ) {
		return $link;
	}

	return semut_section_url( 'kontak' );
}

function semut_get_front_page_id() {
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return (int) get_option( 'page_on_front' );
	}

	return 0;
}

function semut_get_home_field( $key, $default = '' ) {
	$page_id = semut_get_front_page_id();

	if ( ! $page_id ) {
		return $default;
	}

	$value = get_post_meta( $page_id, '_semut_' . $key, true );

	if ( '' === $value || null === $value ) {
		return $default;
	}

	return $value;
}

function semut_home_meta_fields() {
	return array(
		'_section_slider'       => array(
			'label' => __( 'Slider Hero', 'semut' ),
			'type'  => 'section',
		),
		'hero_badge'            => array(
			'label' => __( 'Hero Badge', 'semut' ),
			'type'  => 'text',
		),
		'hero_title_top'        => array(
			'label' => __( 'Hero Title Top', 'semut' ),
			'type'  => 'text',
		),
		'hero_title_highlight'  => array(
			'label' => __( 'Hero Title Highlight', 'semut' ),
			'type'  => 'text',
		),
		'hero_title_bottom'     => array(
			'label' => __( 'Hero Title Bottom', 'semut' ),
			'type'  => 'text',
		),
		'hero_description'      => array(
			'label' => __( 'Hero Description', 'semut' ),
			'type'  => 'textarea',
		),
		'hero_primary_label'    => array(
			'label' => __( 'Hero Primary Button Label', 'semut' ),
			'type'  => 'text',
		),
		'hero_primary_link'     => array(
			'label' => __( 'Hero Primary Button Link', 'semut' ),
			'type'  => 'url',
		),
		'hero_secondary_label'  => array(
			'label' => __( 'Hero Secondary Button Label', 'semut' ),
			'type'  => 'text',
		),
		'hero_secondary_link'   => array(
			'label' => __( 'Hero Secondary Button Link', 'semut' ),
			'type'  => 'url',
		),
		'slide_1_label'         => array(
			'label' => __( 'Slide 1 Label', 'semut' ),
			'type'  => 'text',
		),
		'slide_1_title'         => array(
			'label' => __( 'Slide 1 Title', 'semut' ),
			'type'  => 'text',
		),
		'slide_1_text'          => array(
			'label' => __( 'Slide 1 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'slide_1_image'         => array(
			'label' => __( 'Slide 1 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'slide_2_label'         => array(
			'label' => __( 'Slide 2 Label', 'semut' ),
			'type'  => 'text',
		),
		'slide_2_title'         => array(
			'label' => __( 'Slide 2 Title', 'semut' ),
			'type'  => 'text',
		),
		'slide_2_text'          => array(
			'label' => __( 'Slide 2 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'slide_2_image'         => array(
			'label' => __( 'Slide 2 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'slide_3_label'         => array(
			'label' => __( 'Slide 3 Label', 'semut' ),
			'type'  => 'text',
		),
		'slide_3_title'         => array(
			'label' => __( 'Slide 3 Title', 'semut' ),
			'type'  => 'text',
		),
		'slide_3_text'          => array(
			'label' => __( 'Slide 3 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'slide_3_image'         => array(
			'label' => __( 'Slide 3 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'_section_welcome'      => array(
			'label' => __( 'Welcome Section', 'semut' ),
			'type'  => 'section',
		),
		'welcome_label'         => array(
			'label' => __( 'Welcome Label', 'semut' ),
			'type'  => 'text',
		),
		'welcome_title'         => array(
			'label' => __( 'Welcome Title', 'semut' ),
			'type'  => 'text',
		),
		'welcome_paragraph_1'   => array(
			'label' => __( 'Welcome Paragraph 1', 'semut' ),
			'type'  => 'textarea',
		),
		'welcome_paragraph_2'   => array(
			'label' => __( 'Welcome Paragraph 2', 'semut' ),
			'type'  => 'textarea',
		),
		'welcome_paragraph_3'   => array(
			'label' => __( 'Welcome Paragraph 3', 'semut' ),
			'type'  => 'textarea',
		),
		'_section_features'     => array(
			'label' => __( 'Keunggulan Section', 'semut' ),
			'type'  => 'section',
		),
		'features_label'        => array(
			'label' => __( 'Keunggulan Label', 'semut' ),
			'type'  => 'text',
		),
		'features_title'        => array(
			'label' => __( 'Keunggulan Title', 'semut' ),
			'type'  => 'text',
		),
		'feature_1_title'       => array(
			'label' => __( 'Keunggulan 1 Title', 'semut' ),
			'type'  => 'text',
		),
		'feature_1_text'        => array(
			'label' => __( 'Keunggulan 1 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'feature_2_title'       => array(
			'label' => __( 'Keunggulan 2 Title', 'semut' ),
			'type'  => 'text',
		),
		'feature_2_text'        => array(
			'label' => __( 'Keunggulan 2 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'feature_3_title'       => array(
			'label' => __( 'Keunggulan 3 Title', 'semut' ),
			'type'  => 'text',
		),
		'feature_3_text'        => array(
			'label' => __( 'Keunggulan 3 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'feature_4_title'       => array(
			'label' => __( 'Keunggulan 4 Title', 'semut' ),
			'type'  => 'text',
		),
		'feature_4_text'        => array(
			'label' => __( 'Keunggulan 4 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'_section_program'      => array(
			'label' => __( 'Program Section', 'semut' ),
			'type'  => 'section',
		),
		'program_label'         => array(
			'label' => __( 'Program Label', 'semut' ),
			'type'  => 'text',
		),
		'program_title'         => array(
			'label' => __( 'Program Title', 'semut' ),
			'type'  => 'text',
		),
		'program_description'   => array(
			'label' => __( 'Program Description', 'semut' ),
			'type'  => 'textarea',
		),
		'program_1_title'       => array(
			'label' => __( 'Program 1 Title', 'semut' ),
			'type'  => 'text',
		),
		'program_1_text'        => array(
			'label' => __( 'Program 1 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'program_1_image'       => array(
			'label' => __( 'Program 1 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'program_1_link'        => array(
			'label' => __( 'Program 1 Link', 'semut' ),
			'type'  => 'url',
		),
		'program_2_title'       => array(
			'label' => __( 'Program 2 Title', 'semut' ),
			'type'  => 'text',
		),
		'program_2_text'        => array(
			'label' => __( 'Program 2 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'program_2_image'       => array(
			'label' => __( 'Program 2 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'program_2_link'        => array(
			'label' => __( 'Program 2 Link', 'semut' ),
			'type'  => 'url',
		),
		'program_3_title'       => array(
			'label' => __( 'Program 3 Title', 'semut' ),
			'type'  => 'text',
		),
		'program_3_text'        => array(
			'label' => __( 'Program 3 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'program_3_image'       => array(
			'label' => __( 'Program 3 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'program_3_link'        => array(
			'label' => __( 'Program 3 Link', 'semut' ),
			'type'  => 'url',
		),
		'_section_levels'       => array(
			'label' => __( 'Jenjang Section', 'semut' ),
			'type'  => 'section',
		),
		'levels_label'          => array(
			'label' => __( 'Jenjang Label', 'semut' ),
			'type'  => 'text',
		),
		'levels_title'          => array(
			'label' => __( 'Jenjang Title', 'semut' ),
			'type'  => 'text',
		),
		'level_1_title'         => array(
			'label' => __( 'Jenjang 1 Title', 'semut' ),
			'type'  => 'text',
		),
		'level_1_text'          => array(
			'label' => __( 'Jenjang 1 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'level_1_button'        => array(
			'label' => __( 'Jenjang 1 Button Text', 'semut' ),
			'type'  => 'text',
		),
		'level_2_title'         => array(
			'label' => __( 'Jenjang 2 Title', 'semut' ),
			'type'  => 'text',
		),
		'level_2_text'          => array(
			'label' => __( 'Jenjang 2 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'level_2_button'        => array(
			'label' => __( 'Jenjang 2 Button Text', 'semut' ),
			'type'  => 'text',
		),
		'level_3_title'         => array(
			'label' => __( 'Jenjang 3 Title', 'semut' ),
			'type'  => 'text',
		),
		'level_3_text'          => array(
			'label' => __( 'Jenjang 3 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'level_3_button'        => array(
			'label' => __( 'Jenjang 3 Button Text', 'semut' ),
			'type'  => 'text',
		),
		'level_4_title'         => array(
			'label' => __( 'Jenjang 4 Title', 'semut' ),
			'type'  => 'text',
		),
		'level_4_text'          => array(
			'label' => __( 'Jenjang 4 Text', 'semut' ),
			'type'  => 'textarea',
		),
		'level_4_button'        => array(
			'label' => __( 'Jenjang 4 Button Text', 'semut' ),
			'type'  => 'text',
		),
		'_section_gallery'      => array(
			'label' => __( 'Galeri Section', 'semut' ),
			'type'  => 'section',
		),
		'testimonial_label'     => array(
			'label' => __( 'Testimonial Label', 'semut' ),
			'type'  => 'text',
		),
		'testimonial_title'     => array(
			'label' => __( 'Testimonial Title', 'semut' ),
			'type'  => 'text',
		),
		'testimonial_1_quote'   => array(
			'label' => __( 'Testimonial 1 Quote', 'semut' ),
			'type'  => 'textarea',
		),
		'testimonial_1_author'  => array(
			'label' => __( 'Testimonial 1 Author', 'semut' ),
			'type'  => 'text',
		),
		'testimonial_2_quote'   => array(
			'label' => __( 'Testimonial 2 Quote', 'semut' ),
			'type'  => 'textarea',
		),
		'testimonial_2_author'  => array(
			'label' => __( 'Testimonial 2 Author', 'semut' ),
			'type'  => 'text',
		),
		'testimonial_3_quote'   => array(
			'label' => __( 'Testimonial 3 Quote', 'semut' ),
			'type'  => 'textarea',
		),
		'testimonial_3_author'  => array(
			'label' => __( 'Testimonial 3 Author', 'semut' ),
			'type'  => 'text',
		),
		'_section_testimonial'  => array(
			'label' => __( 'Testimonial Section', 'semut' ),
			'type'  => 'section',
		),
		'gallery_label'         => array(
			'label' => __( 'Gallery Label', 'semut' ),
			'type'  => 'text',
		),
		'gallery_title'         => array(
			'label' => __( 'Gallery Title', 'semut' ),
			'type'  => 'text',
		),
		'gallery_button_label'  => array(
			'label' => __( 'Gallery Button Label', 'semut' ),
			'type'  => 'text',
		),
		'gallery_button_link'   => array(
			'label' => __( 'Gallery Button Link', 'semut' ),
			'type'  => 'url',
		),
		'gallery_1_image'       => array(
			'label' => __( 'Gallery 1 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'gallery_2_image'       => array(
			'label' => __( 'Gallery 2 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'gallery_3_image'       => array(
			'label' => __( 'Gallery 3 Image URL', 'semut' ),
			'type'  => 'url',
		),
		'_section_contact'      => array(
			'label' => __( 'Footer Contact Section', 'semut' ),
			'type'  => 'section',
		),
		'contact_eyebrow'       => array(
			'label' => __( 'Footer CTA Eyebrow', 'semut' ),
			'type'  => 'text',
		),
		'contact_title'         => array(
			'label' => __( 'Footer CTA Title', 'semut' ),
			'type'  => 'text',
		),
		'contact_description'   => array(
			'label' => __( 'Footer CTA Description', 'semut' ),
			'type'  => 'textarea',
		),
		'contact_whatsapp_link' => array(
			'label' => __( 'WhatsApp Link', 'semut' ),
			'type'  => 'url',
		),
		'contact_whatsapp_text' => array(
			'label' => __( 'WhatsApp Button Text', 'semut' ),
			'type'  => 'text',
		),
		'contact_email'         => array(
			'label' => __( 'Contact Email', 'semut' ),
			'type'  => 'text',
		),
		'contact_phone'         => array(
			'label' => __( 'Contact Phone', 'semut' ),
			'type'  => 'text',
		),
		'contact_hours'         => array(
			'label' => __( 'Contact Hours', 'semut' ),
			'type'  => 'text',
		),
		'contact_address'       => array(
			'label' => __( 'Contact Address', 'semut' ),
			'type'  => 'textarea',
		),
		'contact_map_label'     => array(
			'label' => __( 'Map Placeholder', 'semut' ),
			'type'  => 'text',
		),
		'contact_map_embed'     => array(
			'label' => __( 'Map Embed HTML (iframe)', 'semut' ),
			'type'  => 'textarea',
		),
	);
}

function semut_add_home_meta_box() {
	add_meta_box(
		'semut-home-fields',
		__( 'Semut Front Page Fields', 'semut' ),
		'semut_render_home_meta_box',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'semut_add_home_meta_box' );

function semut_render_home_meta_box( $post ) {
	wp_nonce_field( 'semut_save_home_fields', 'semut_home_fields_nonce' );
	$front_page_id = semut_get_front_page_id();

	echo '<p>';
	echo esc_html__( 'Field ini dipakai untuk mengisi konten homepage theme Semut. Idealnya dipakai di page yang dipilih sebagai Homepage pada Settings > Reading.', 'semut' );
	echo '</p>';

	if ( $front_page_id && (int) $post->ID !== $front_page_id ) {
		echo '<p><strong>' . esc_html__( 'Catatan:', 'semut' ) . '</strong> ' . esc_html__( 'Page ini bukan homepage aktif saat ini, jadi perubahan di sini belum akan muncul di beranda.', 'semut' ) . '</p>';
	}

	echo '<table class="form-table" role="presentation"><tbody>';
	$semut_section_open = false;

	foreach ( semut_home_meta_fields() as $key => $field ) {
		if ( 'section' === $field['type'] ) {
			if ( $semut_section_open ) {
				echo '</div></td></tr>';
			}

			echo '<tr><td colspan="2" style="padding:18px 0 8px;">';
			echo '<details class="semut-meta-section" open style="border:1px solid #dcdcde;border-radius:10px;background:#fff;overflow:hidden;">';
			echo '<summary style="cursor:pointer;list-style:none;margin:0;padding:14px 16px;background:#f6f7f7;font-weight:600;">' . esc_html( $field['label'] ) . '</summary>';
			echo '<div style="padding:14px 16px 8px;">';
			$semut_section_open = true;
			continue;
		}

		$value = get_post_meta( $post->ID, '_semut_' . $key, true );
		echo '<tr>';
		echo '<th scope="row"><label for="semut_' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th>';
		echo '<td>';

		if ( 'textarea' === $field['type'] ) {
			echo '<textarea id="semut_' . esc_attr( $key ) . '" name="semut_fields[' . esc_attr( $key ) . ']" rows="4" class="large-text">' . esc_textarea( $value ) . '</textarea>';
		} else {
			echo '<input id="semut_' . esc_attr( $key ) . '" name="semut_fields[' . esc_attr( $key ) . ']" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $value ) . '" class="regular-text">';

			if ( 'url' === $field['type'] && false !== strpos( $key, 'image' ) ) {
				echo ' <button type="button" class="button semut-upload-image" data-target="semut_' . esc_attr( $key ) . '">' . esc_html__( 'Pilih Gambar', 'semut' ) . '</button>';
				echo ' <button type="button" class="button semut-clear-image" data-target="semut_' . esc_attr( $key ) . '">' . esc_html__( 'Hapus', 'semut' ) . '</button>';
				echo '<div class="semut-image-preview-wrap" style="margin-top:10px;">';
				echo '<img class="semut-image-preview" data-preview-for="semut_' . esc_attr( $key ) . '" src="' . esc_url( $value ) . '" alt="" style="' . ( ! empty( $value ) ? 'display:block;' : 'display:none;' ) . 'max-width:180px;height:auto;border-radius:10px;border:1px solid #dcdcde;">';
				echo '</div>';
			}
		}

		echo '</td>';
		echo '</tr>';
	}

	if ( $semut_section_open ) {
		echo '</div></details></td></tr>';
	}

	echo '</tbody></table>';
}

function semut_save_home_meta_box( $post_id ) {
	if ( ! isset( $_POST['semut_home_fields_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['semut_home_fields_nonce'] ) ), 'semut_save_home_fields' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( empty( $_POST['semut_fields'] ) || ! is_array( $_POST['semut_fields'] ) ) {
		return;
	}

	$allowed_fields = semut_home_meta_fields();
	$posted_fields  = wp_unslash( $_POST['semut_fields'] );

	foreach ( $allowed_fields as $key => $field ) {
		if ( 'section' === $field['type'] ) {
			continue;
		}

		$value = isset( $posted_fields[ $key ] ) ? $posted_fields[ $key ] : '';

		if ( 'url' === $field['type'] ) {
			$value = esc_url_raw( $value );
		} elseif ( 'contact_map_embed' === $key ) {
			$value = semut_sanitize_map_embed( $value );
		} else {
			$value = sanitize_textarea_field( $value );
		}

		update_post_meta( $post_id, '_semut_' . $key, $value );
	}
}
add_action( 'save_post_page', 'semut_save_home_meta_box' );

function semut_admin_home_fields_assets( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || 'page' !== $screen->post_type ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script(
		'semut-admin-home-fields',
		get_template_directory_uri() . '/assets/js/admin-home-fields.js',
		array( 'jquery' ),
		'1.0.0',
		true
	);
}
add_action( 'admin_enqueue_scripts', 'semut_admin_home_fields_assets' );
