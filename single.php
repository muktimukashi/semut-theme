<?php
/**
 * Single post template.
 *
 * @package Semut
 */

get_header();
?>

<main class="px-5 py-12 md:py-16">
	<div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[minmax(0,1.45fr)_340px]">
		<div>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'semut-article-shell' ); ?>>
					<div class="mb-6">
						<p class="semut-kicker"><?php echo esc_html( get_the_date() ); ?></p>
						<h1 class="semut-entry-title"><?php the_title(); ?></h1>
					</div>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="semut-entry-thumb">
							<?php the_post_thumbnail( 'large' ); ?>
						</div>
					<?php endif; ?>

					<div class="semut-prose">
						<?php the_content(); ?>
					</div>

					<div class="mt-10 flex flex-wrap gap-3 border-t border-pine/10 pt-6">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="rounded-full bg-pine px-5 py-3 text-sm font-extrabold text-white hover:bg-leaf"><?php esc_html_e( 'Kembali ke Beranda', 'semut' ); ?></a>
						<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>" class="rounded-full border border-pine/15 bg-white px-5 py-3 text-sm font-extrabold text-pine hover:bg-skySoft/40"><?php esc_html_e( 'Lihat Artikel Lain', 'semut' ); ?></a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<div>
			<?php get_template_part( 'template-parts/post', 'sidebar' ); ?>
		</div>
	</div>
</main>

<?php
get_footer();
