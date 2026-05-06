<?php
/**
 * 404 template.
 *
 * @package Semut
 */

get_header();
?>

<main class="site-main">
	<div class="container narrow">
		<section class="empty-state empty-state--full">
			<p>404</p>
			<h1><?php esc_html_e( 'Halaman tidak ditemukan', 'semut' ); ?></h1>
			<p><?php esc_html_e( 'Link yang kamu buka mungkin sudah pindah atau belum tersedia.', 'semut' ); ?></p>
			<a class="button button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Kembali ke Beranda', 'semut' ); ?>
			</a>
		</section>
	</div>
</main>

<?php
get_footer();
