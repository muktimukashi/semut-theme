<?php
/**
 * Page template.
 *
 * @package Semut
 */

get_header();
?>

<main class="section-wash px-5 py-10 md:py-14">
	<div class="mx-auto max-w-5xl">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'semut-article-shell semut-page-shell' ); ?>>
				<div class="mb-8">
					<p class="semut-kicker"><?php esc_html_e( 'Halaman', 'semut' ); ?></p>
					<h1 class="semut-entry-title semut-page-title"><?php the_title(); ?></h1>
				</div>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="semut-entry-thumb">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
				<?php endif; ?>
				<div class="semut-prose">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</main>

<?php
get_footer();
