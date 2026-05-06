<?php
/**
 * Archive template.
 *
 * @package Semut
 */

get_header();
?>

<main class="px-5 py-12 md:py-16">
	<div class="mx-auto max-w-7xl">
		<section class="mb-8 max-w-3xl">
			<p class="semut-kicker"><?php esc_html_e( 'Arsip', 'semut' ); ?></p>
			<h1 class="font-display text-4xl font-bold text-ink md:text-5xl"><?php the_archive_title(); ?></h1>
			<?php the_archive_description( '<div class="mt-4 text-sm leading-7 text-ink/70 md:text-base">', '</div>' ); ?>
		</section>

		<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<article class="semut-post-card overflow-hidden rounded-[2.25rem] bg-white soft-shadow">
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="semut-post-card__thumb block overflow-hidden" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'large' ); ?>
							</a>
						<?php else : ?>
							<a class="semut-post-card__thumb semut-post-card__thumb--placeholder block overflow-hidden" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
								<span class="semut-post-card__placeholder-icon">▣</span>
							</a>
						<?php endif; ?>
						<div class="p-7">
							<p class="semut-kicker"><?php echo esc_html( get_the_date() ); ?></p>
							<h2 class="font-display text-2xl font-bold text-pine"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="mt-4 text-sm leading-7 text-ink/70"><?php the_excerpt(); ?></div>
							<a href="<?php the_permalink(); ?>" class="mt-6 inline-flex text-sm font-extrabold text-orangeFun"><?php esc_html_e( 'Baca artikel', 'semut' ); ?> &#8594;</a>
						</div>
					</article>
				<?php endwhile; ?>
			<?php else : ?>
				<div class="rounded-[2.5rem] bg-white p-8 text-center soft-shadow">
					<h2><?php esc_html_e( 'Konten tidak ditemukan.', 'semut' ); ?></h2>
				</div>
			<?php endif; ?>
		</div>

		<div class="pt-8">
			<?php the_posts_pagination(); ?>
		</div>
	</div>
</main>

<?php
get_footer();
