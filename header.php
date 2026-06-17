<?php
/**
 * Header template.
 *
 * @package Semut
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-cream text-ink font-body' ); ?>>
<?php wp_body_open(); ?>

<header class="sticky top-0 z-40 border-b border-pine/10 bg-cream shadow-[0_10px_30px_rgba(36,52,46,0.06)]">
	<div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-4">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex shrink-0 items-center gap-3">
			<img src="<?php echo esc_url( semut_get_logo_url() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-11 w-auto object-contain sm:h-14">
			<div class="semut-brand-text">
				<p class="font-display text-xl font-bold leading-none text-pine"><?php bloginfo( 'name' ); ?></p>
				<p class="text-xs font-bold tracking-wide text-earth"><?php bloginfo( 'description' ); ?></p>
			</div>
		</a>

		<nav class="semut-nav semut-nav--desktop hidden flex-1 justify-end md:flex" aria-label="<?php esc_attr_e( 'Primary navigation', 'semut' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'menu',
					'fallback_cb'    => 'semut_primary_nav_fallback',
				)
			);
			?>
		</nav>

		<div class="flex items-center gap-3">
			<a href="<?php echo esc_url( semut_section_url( 'kontak' ) ); ?>" class="hidden rounded-full bg-orangeFun px-5 py-3 text-sm font-extrabold text-white shadow-lg shadow-orange-200 hover:bg-earth sm:inline-flex"><?php esc_html_e( 'Daftar / Kunjungi', 'semut' ); ?></a>
			<button type="button" id="mobileMenuButton" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-pine/10 bg-white text-pine md:hidden" aria-expanded="false" aria-controls="mobileMenu" aria-label="<?php esc_attr_e( 'Buka menu', 'semut' ); ?>">
				<span class="text-xl leading-none">&#9776;</span>
			</button>
		</div>
	</div>

	<div id="mobileMenu" class="mx-5 mb-4 hidden rounded-[2rem] border border-pine/10 bg-cream p-5 soft-shadow md:hidden">
		<nav class="semut-nav semut-nav--mobile" aria-label="<?php esc_attr_e( 'Mobile navigation', 'semut' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'menu',
					'fallback_cb'    => 'semut_primary_nav_mobile_fallback',
				)
			);
			?>
			<a href="<?php echo esc_url( semut_section_url( 'kontak' ) ); ?>" class="mt-2 inline-flex justify-center rounded-full bg-orangeFun px-5 py-3 text-sm font-extrabold text-white shadow-lg shadow-orange-200"><?php esc_html_e( 'Daftar / Kunjungi', 'semut' ); ?></a>
		</nav>
	</div>
</header>
