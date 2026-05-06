<?php
/**
 * Sidebar for single post pages.
 *
 * @package Semut
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$semut_recent_posts = new WP_Query(
	array(
		'posts_per_page'      => 4,
		'post_status'         => 'publish',
		'post__not_in'        => array( get_the_ID() ),
		'ignore_sticky_posts' => true,
	)
);

$semut_categories = get_categories(
	array(
		'hide_empty' => true,
		'number'     => 6,
	)
);
?>

<aside class="semut-sidebar">
	<section class="semut-sidebar-card">
		<p class="semut-kicker"><?php esc_html_e( 'Artikel Terbaru', 'semut' ); ?></p>
		<h2 class="semut-sidebar-title"><?php esc_html_e( 'Lanjut baca yang lain', 'semut' ); ?></h2>

		<?php if ( $semut_recent_posts->have_posts() ) : ?>
			<div class="semut-sidebar-list">
				<?php while ( $semut_recent_posts->have_posts() ) : ?>
					<?php $semut_recent_posts->the_post(); ?>
					<a class="semut-sidebar-link" href="<?php the_permalink(); ?>">
						<span class="semut-sidebar-link__date"><?php echo esc_html( get_the_date() ); ?></span>
						<span class="semut-sidebar-link__title"><?php the_title(); ?></span>
					</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		<?php else : ?>
			<p class="semut-sidebar-copy"><?php esc_html_e( 'Belum ada artikel terbaru lainnya.', 'semut' ); ?></p>
		<?php endif; ?>
	</section>

	<section class="semut-sidebar-card semut-sidebar-card--soft">
		<p class="semut-kicker"><?php esc_html_e( 'Topik', 'semut' ); ?></p>
		<h2 class="semut-sidebar-title"><?php esc_html_e( 'Kategori populer', 'semut' ); ?></h2>

		<?php if ( ! empty( $semut_categories ) ) : ?>
			<div class="semut-sidebar-tags">
				<?php foreach ( $semut_categories as $semut_category ) : ?>
					<a href="<?php echo esc_url( get_category_link( $semut_category->term_id ) ); ?>" class="semut-chip"><?php echo esc_html( $semut_category->name ); ?></a>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="semut-sidebar-copy"><?php esc_html_e( 'Kategori akan muncul setelah artikel diklasifikasikan.', 'semut' ); ?></p>
		<?php endif; ?>
	</section>

	<section class="semut-sidebar-card semut-sidebar-card--accent">
		<p class="semut-kicker"><?php esc_html_e( 'Kontak Sekolah', 'semut' ); ?></p>
		<h2 class="semut-sidebar-title"><?php esc_html_e( 'Ingin tanya program atau kunjungan?', 'semut' ); ?></h2>
		<p class="semut-sidebar-copy"><?php esc_html_e( 'Tim Semut-Semut siap bantu jawab pertanyaan orang tua seputar program dan pendaftaran.', 'semut' ); ?></p>
		<a href="https://wa.me/6281283330186" class="semut-sidebar-button"><?php esc_html_e( 'Chat WhatsApp', 'semut' ); ?></a>
	</section>
</aside>
