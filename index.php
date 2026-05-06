<?php
/**
 * Main template file.
 *
 * @package Semut
 */

get_header();
?>

<main class="px-5 py-12 md:py-16">
	<div class="mx-auto max-w-7xl">
		<section class="grid gap-8 lg:grid-cols-[1.6fr_.8fr]">
			<div>
				<div class="mb-8 max-w-3xl">
					<p class="semut-kicker"><?php esc_html_e( 'Blog Sekolah', 'semut' ); ?></p>
					<h1 class="font-display text-4xl font-bold text-ink md:text-5xl"><?php esc_html_e( 'Cerita dan kabar terbaru dari Semut-Semut.', 'semut' ); ?></h1>
				</div>

				<div class="grid gap-6">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'semut-post-card overflow-hidden rounded-[2.25rem] bg-white soft-shadow' ); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<a class="semut-post-card__thumb block overflow-hidden" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'large' ); ?>
								</a>
							<?php else : ?>
								<a class="semut-post-card__thumb semut-post-card__thumb--placeholder block overflow-hidden" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
									<span class="semut-post-card__placeholder-icon">▣</span>
								</a>
							<?php endif; ?>

							<div class="p-7 md:p-8">
								<p class="semut-kicker"><?php echo esc_html( get_the_date() ); ?></p>
								<h2 class="font-display text-2xl font-bold text-pine md:text-3xl">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="mt-4 text-sm leading-7 text-ink/70 md:text-base">
									<?php the_excerpt(); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="mt-6 inline-flex text-sm font-extrabold text-orangeFun"><?php esc_html_e( 'Baca artikel', 'semut' ); ?> &#8594;</a>
							</div>
						</article>
					<?php endwhile; ?>

					<div class="pt-2">
						<?php the_posts_pagination(); ?>
					</div>
				<?php else : ?>
					<section class="rounded-[2.5rem] bg-white p-8 text-center soft-shadow">
						<h2><?php esc_html_e( 'Belum ada konten.', 'semut' ); ?></h2>
						<p><?php esc_html_e( 'Silakan tambah posting atau halaman baru dari dashboard WordPress.', 'semut' ); ?></p>
					</section>
				<?php endif; ?>
				</div>
			</div>

			<aside class="h-fit rounded-[2rem] bg-white p-7 soft-shadow">
				<h3 class="font-display text-2xl font-bold text-pine"><?php esc_html_e( 'Tentang Semut', 'semut' ); ?></h3>
				<p class="mt-4 text-sm leading-7 text-ink/70"><?php esc_html_e( 'Kumpulan artikel, cerita kegiatan, dan insight belajar anak dari Semut-Semut The Natural School.', 'semut' ); ?></p>

				<div class="mt-6 rounded-[1.5rem] bg-skySoft/55 p-5">
					<p class="text-sm font-black uppercase tracking-[.18em] text-orangeFun"><?php esc_html_e( 'Kontak Cepat', 'semut' ); ?></p>
					<p class="mt-3 text-sm leading-7 text-ink/70"><?php esc_html_e( 'Ingin tanya program atau jadwal kunjungan? Hubungi tim Semut-Semut lewat WhatsApp.', 'semut' ); ?></p>
					<a href="https://wa.me/6281283330186" class="mt-5 inline-flex rounded-full bg-orangeFun px-5 py-3 text-sm font-extrabold text-white hover:bg-earth"><?php esc_html_e( 'Chat WhatsApp', 'semut' ); ?></a>
				</div>
			</aside>
		</section>
	</div>
</main>

<?php
get_footer();
