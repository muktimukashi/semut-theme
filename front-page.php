<?php
/**
 * Front page template.
 *
 * @package Semut
 */

$semut_data = semut_get_homepage_data();
$hero_badge = semut_get_home_field( 'hero_badge', 'Sekolah Natural • Inklusif • Islami • Ramah Anak' );
$hero_title_top = semut_get_home_field( 'hero_title_top', 'Tempat anak' );
$hero_title_highlight = semut_get_home_field( 'hero_title_highlight', 'tumbuh alami' );
$hero_title_bottom = semut_get_home_field( 'hero_title_bottom', 'dan bahagia.' );
$hero_description = semut_get_home_field( 'hero_description', 'Semut-Semut menghadirkan ruang belajar yang dekat dengan alam, hangat, dan menyenangkan agar anak berani bereksplorasi, mengenal dirinya, dan tumbuh dengan karakter baik.' );
$hero_primary_label = semut_get_home_field( 'hero_primary_label', 'Lihat Program' );
$hero_primary_link = semut_get_home_field( 'hero_primary_link', semut_section_url( 'program' ) );
$hero_secondary_label = semut_get_home_field( 'hero_secondary_label', 'Hubungi Sekolah' );
$hero_secondary_link = semut_get_home_field( 'hero_secondary_link', semut_section_url( 'kontak' ) );
$slides = array(
	array(
		'label' => semut_get_home_field( 'slide_1_label', $semut_data['slides'][0]['label'] ),
		'title' => semut_get_home_field( 'slide_1_title', $semut_data['slides'][0]['title'] ),
		'text'  => semut_get_home_field( 'slide_1_text', $semut_data['slides'][0]['text'] ),
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'slide_1_image', $semut_data['slides'][0]['image'] ) ),
		'alt'   => semut_get_home_field( 'slide_1_title', $semut_data['slides'][0]['alt'] ),
		'badge' => $semut_data['slides'][0]['badge'],
	),
	array(
		'label' => semut_get_home_field( 'slide_2_label', $semut_data['slides'][1]['label'] ),
		'title' => semut_get_home_field( 'slide_2_title', $semut_data['slides'][1]['title'] ),
		'text'  => semut_get_home_field( 'slide_2_text', $semut_data['slides'][1]['text'] ),
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'slide_2_image', $semut_data['slides'][1]['image'] ) ),
		'alt'   => semut_get_home_field( 'slide_2_title', $semut_data['slides'][1]['alt'] ),
		'badge' => $semut_data['slides'][1]['badge'],
	),
	array(
		'label' => semut_get_home_field( 'slide_3_label', $semut_data['slides'][2]['label'] ),
		'title' => semut_get_home_field( 'slide_3_title', $semut_data['slides'][2]['title'] ),
		'text'  => semut_get_home_field( 'slide_3_text', $semut_data['slides'][2]['text'] ),
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'slide_3_image', $semut_data['slides'][2]['image'] ) ),
		'alt'   => semut_get_home_field( 'slide_3_title', $semut_data['slides'][2]['alt'] ),
		'badge' => $semut_data['slides'][2]['badge'],
	),
);
$welcome_label = semut_get_home_field( 'welcome_label', 'Welcome' );
$welcome_title = semut_get_home_field( 'welcome_title', 'Welcome to Semut-Semut The Natural School' );
$welcome_paragraph_1 = semut_get_home_field( 'welcome_paragraph_1', 'Semut-Semut adalah sekolah natural inklusif yang percaya bahwa setiap anak memiliki cara bertumbuh, bakat, dan kecerdasan yang unik.' );
$welcome_paragraph_2 = semut_get_home_field( 'welcome_paragraph_2', 'Melalui lingkungan yang dekat dengan alam, anak belajar dari pengalaman nyata: mengamati, bertanya, mencoba, berdiskusi, dan menyampaikan gagasannya dengan percaya diri.' );
$welcome_paragraph_3 = semut_get_home_field( 'welcome_paragraph_3', 'Dengan semangat Happy Teacher, Cheerful Kids, kami membangun suasana belajar yang hangat, aman, dan penuh makna bagi anak, guru, dan keluarga.' );
$features_label = semut_get_home_field( 'features_label', 'Keunggulan Sekolah' );
$features_title = semut_get_home_field( 'features_title', 'Belajar yang natural, hangat, dan penuh karakter.' );
$program_label = semut_get_home_field( 'program_label', 'Program Unggulan' );
$program_title = semut_get_home_field( 'program_title', 'Ruang anak menemukan potensi.' );
$program_description = semut_get_home_field( 'program_description', 'Program dirancang agar anak berani mencoba, tampil, bekerja sama, dan belajar dari pengalaman langsung.' );
$testimonial_label = semut_get_home_field( 'testimonial_label', 'Testimoni' );
$testimonial_title = semut_get_home_field( 'testimonial_title', 'Apa kata keluarga Semut-Semut?' );
$gallery_label = semut_get_home_field( 'gallery_label', 'Preview Kegiatan' );
$gallery_title = semut_get_home_field( 'gallery_title', 'Cerita kecil dari hari-hari belajar.' );
$gallery_button_label = semut_get_home_field( 'gallery_button_label', 'Lihat Galeri' );
$gallery_button_link = semut_get_home_field( 'gallery_button_link', semut_section_url( 'kontak' ) );
$levels_label = semut_get_home_field( 'levels_label', 'Jenjang Pendidikan' );
$levels_title = semut_get_home_field( 'levels_title', 'Tumbuh bertahap sesuai usia.' );

$programs = array(
	array(
		'title' => semut_get_home_field( 'program_1_title', $semut_data['programs'][0]['title'] ),
		'text'  => semut_get_home_field( 'program_1_text', $semut_data['programs'][0]['text'] ),
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'program_1_image', $semut_data['programs'][0]['image'] ) ),
		'alt'   => semut_get_home_field( 'program_1_title', $semut_data['programs'][0]['alt'] ),
		'link'  => semut_get_home_field( 'program_1_link', $semut_data['programs'][0]['link'] ),
	),
	array(
		'title' => semut_get_home_field( 'program_2_title', $semut_data['programs'][1]['title'] ),
		'text'  => semut_get_home_field( 'program_2_text', $semut_data['programs'][1]['text'] ),
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'program_2_image', $semut_data['programs'][1]['image'] ) ),
		'alt'   => semut_get_home_field( 'program_2_title', $semut_data['programs'][1]['alt'] ),
		'link'  => semut_get_home_field( 'program_2_link', $semut_data['programs'][1]['link'] ),
	),
	array(
		'title' => semut_get_home_field( 'program_3_title', $semut_data['programs'][2]['title'] ),
		'text'  => semut_get_home_field( 'program_3_text', $semut_data['programs'][2]['text'] ),
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'program_3_image', $semut_data['programs'][2]['image'] ) ),
		'alt'   => semut_get_home_field( 'program_3_title', $semut_data['programs'][2]['alt'] ),
		'link'  => semut_get_home_field( 'program_3_link', $semut_data['programs'][2]['link'] ),
	),
);

$testimonials = array(
	array(
		'quote'  => semut_get_home_field( 'testimonial_1_quote', $semut_data['testimonials'][0]['quote'] ),
		'author' => semut_get_home_field( 'testimonial_1_author', $semut_data['testimonials'][0]['author'] ),
	),
	array(
		'quote'  => semut_get_home_field( 'testimonial_2_quote', $semut_data['testimonials'][1]['quote'] ),
		'author' => semut_get_home_field( 'testimonial_2_author', $semut_data['testimonials'][1]['author'] ),
	),
	array(
		'quote'  => semut_get_home_field( 'testimonial_3_quote', $semut_data['testimonials'][2]['quote'] ),
		'author' => semut_get_home_field( 'testimonial_3_author', $semut_data['testimonials'][2]['author'] ),
	),
);

$gallery_images = array(
	array(
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'gallery_1_image', $semut_data['gallery'][0]['image'] ) ),
		'alt'   => $semut_data['gallery'][0]['alt'],
		'class' => $semut_data['gallery'][0]['class'],
	),
	array(
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'gallery_2_image', $semut_data['gallery'][1]['image'] ) ),
		'alt'   => $semut_data['gallery'][1]['alt'],
		'class' => $semut_data['gallery'][1]['class'],
	),
	array(
		'image' => semut_rewrite_public_media_url( semut_get_home_field( 'gallery_3_image', $semut_data['gallery'][2]['image'] ) ),
		'alt'   => $semut_data['gallery'][2]['alt'],
		'class' => $semut_data['gallery'][2]['class'],
	),
);

$levels = array(
	array(
		'slug'   => 'playgroup',
		'icon'   => $semut_data['levels'][0]['icon'],
		'title'  => semut_get_home_field( 'level_1_title', $semut_data['levels'][0]['title'] ),
		'text'   => semut_get_home_field( 'level_1_text', $semut_data['levels'][0]['text'] ),
		'button' => semut_get_home_field( 'level_1_button', 'Lihat Detail' ),
	),
	array(
		'slug'   => 'tk',
		'icon'   => $semut_data['levels'][1]['icon'],
		'title'  => semut_get_home_field( 'level_2_title', $semut_data['levels'][1]['title'] ),
		'text'   => semut_get_home_field( 'level_2_text', $semut_data['levels'][1]['text'] ),
		'button' => semut_get_home_field( 'level_2_button', 'Lihat Detail' ),
	),
	array(
		'slug'   => 'sd',
		'icon'   => $semut_data['levels'][2]['icon'],
		'title'  => semut_get_home_field( 'level_3_title', $semut_data['levels'][2]['title'] ),
		'text'   => semut_get_home_field( 'level_3_text', $semut_data['levels'][2]['text'] ),
		'button' => semut_get_home_field( 'level_3_button', 'Lihat Detail' ),
	),
	array(
		'slug'   => 'smp-ins',
		'icon'   => $semut_data['levels'][3]['icon'],
		'title'  => semut_get_home_field( 'level_4_title', $semut_data['levels'][3]['title'] ),
		'text'   => semut_get_home_field( 'level_4_text', $semut_data['levels'][3]['text'] ),
		'button' => semut_get_home_field( 'level_4_button', 'Lihat Detail' ),
	),
);

$features = array(
	array(
		'icon'  => $semut_data['features'][0]['icon'],
		'title' => semut_get_home_field( 'feature_1_title', $semut_data['features'][0]['title'] ),
		'text'  => semut_get_home_field( 'feature_1_text', $semut_data['features'][0]['text'] ),
		'card'  => $semut_data['features'][0]['card'],
	),
	array(
		'icon'  => $semut_data['features'][1]['icon'],
		'title' => semut_get_home_field( 'feature_2_title', $semut_data['features'][1]['title'] ),
		'text'  => semut_get_home_field( 'feature_2_text', $semut_data['features'][1]['text'] ),
		'card'  => $semut_data['features'][1]['card'],
	),
	array(
		'icon'  => $semut_data['features'][2]['icon'],
		'title' => semut_get_home_field( 'feature_3_title', $semut_data['features'][2]['title'] ),
		'text'  => semut_get_home_field( 'feature_3_text', $semut_data['features'][2]['text'] ),
		'card'  => $semut_data['features'][2]['card'],
	),
	array(
		'icon'  => $semut_data['features'][3]['icon'],
		'title' => semut_get_home_field( 'feature_4_title', $semut_data['features'][3]['title'] ),
		'text'  => semut_get_home_field( 'feature_4_text', $semut_data['features'][3]['text'] ),
		'card'  => $semut_data['features'][3]['card'],
	),
);

get_header();
?>

<main>
	<section class="relative overflow-hidden px-5 pb-6 pt-8">
		<div class="mx-auto max-w-7xl">
			<div class="relative">
				<div class="pointer-events-none absolute inset-x-3 top-[96px] z-10 flex -translate-y-1/2 justify-between sm:inset-x-5 sm:top-[118px] md:inset-x-6 md:top-[270px]">
					<button type="button" id="prevSlide" class="pointer-events-auto grid h-11 w-11 place-items-center rounded-full bg-white/85 text-xl font-black text-pine soft-shadow backdrop-blur hover:bg-white" aria-label="<?php esc_attr_e( 'Slide sebelumnya', 'semut' ); ?>">&#8592;</button>
					<button type="button" id="nextSlide" class="pointer-events-auto grid h-11 w-11 place-items-center rounded-full bg-white/85 text-xl font-black text-pine soft-shadow backdrop-blur hover:bg-white" aria-label="<?php esc_attr_e( 'Slide berikutnya', 'semut' ); ?>">&#8594;</button>
				</div>

				<div class="slider-track">
					<?php foreach ( $slides as $slide ) : ?>
						<article class="slider-panel" data-slide>
							<div class="overflow-hidden rounded-[2rem] bg-white soft-shadow">
								<img class="h-[240px] w-full object-cover sm:h-[300px] md:h-[540px]" src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['alt'] ); ?>">
							</div>
							<div class="mt-4 rounded-[1.5rem] bg-white/90 p-5 soft-shadow backdrop-blur md:mt-5 md:p-8">
								<div class="max-w-3xl">
									<span class="inline-flex rounded-full px-4 py-2 text-xs font-black uppercase tracking-[.18em] <?php echo esc_attr( $slide['badge'] ); ?>"><?php echo esc_html( $slide['label'] ); ?></span>
									<h3 class="mt-4 font-display text-xl font-bold text-pine sm:text-2xl md:text-3xl"><?php echo esc_html( $slide['title'] ); ?></h3>
									<p class="mt-3 text-sm leading-7 text-ink/70 md:text-base"><?php echo esc_html( $slide['text'] ); ?></p>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="mt-4 flex justify-center rounded-[1.25rem] bg-white/70 px-5 py-3 soft-shadow backdrop-blur md:mt-5 md:py-4">
				<div class="flex gap-2" aria-label="<?php esc_attr_e( 'Slide indicators', 'semut' ); ?>">
					<?php foreach ( $slides as $index => $slide ) : ?>
						<button type="button" class="<?php echo 0 === $index ? 'h-3 w-8 rounded-full bg-pine' : 'h-3 w-3 rounded-full bg-pine/25'; ?>" data-dot aria-label="<?php echo esc_attr( 'Slide ' . ( $index + 1 ) ); ?>"></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="relative overflow-hidden px-5 pb-16 pt-10 md:pt-14">
		<div class="absolute left-[-80px] top-20 h-72 w-72 organic bg-leafLight/35 blur-2xl"></div>
		<div class="absolute right-[-80px] top-48 h-80 w-80 organic-2 bg-skySoft/60 blur-2xl"></div>
		<div class="relative mx-auto grid max-w-7xl items-center gap-10 md:grid-cols-[1.05fr_.95fr]">
			<div>
				<div class="mb-5 inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-extrabold text-pine shadow-sm">&#127807; <?php echo esc_html( $hero_badge ); ?></div>
				<h1 class="font-display text-4xl font-bold leading-[1.02] tracking-tight text-ink sm:text-5xl md:text-7xl">
					<?php echo esc_html( $hero_title_top ); ?><br>
					<span class="text-pine"><?php echo esc_html( $hero_title_highlight ); ?></span><br>
					<?php echo esc_html( $hero_title_bottom ); ?>
				</h1>
				<p class="mt-5 max-w-xl text-base leading-7 text-ink/70 sm:text-lg sm:leading-8"><?php echo esc_html( $hero_description ); ?></p>
				<div class="mt-8 flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:gap-4">
					<a href="<?php echo esc_url( $hero_primary_link ); ?>" class="rounded-full bg-pine px-7 py-4 text-center text-sm font-extrabold text-white shadow-xl shadow-green-900/15 hover:bg-leaf"><?php echo esc_html( $hero_primary_label ); ?></a>
					<a href="<?php echo esc_url( $hero_secondary_link ); ?>" class="rounded-full border-2 border-pine/15 bg-white px-7 py-4 text-center text-sm font-extrabold text-pine hover:bg-skySoft/40"><?php echo esc_html( $hero_secondary_label ); ?></a>
				</div>
			</div>

			<div class="relative min-h-[360px] sm:min-h-[420px] md:min-h-[470px]">
				<div class="relative left-0 top-0 w-[88%] overflow-hidden rounded-[1.25rem] border-[8px] border-white bg-white soft-shadow sm:w-[78%] md:absolute md:left-3 md:top-4 md:w-[72%] md:rounded-[1.75rem] md:border-[10px]">
					<img class="h-[280px] w-full object-cover sm:h-[340px] md:h-[390px]" src="https://semut-semut.sch.id/wp-content/uploads/baca-buku-1.jpeg" alt="<?php esc_attr_e( 'Anak belajar di sekolah', 'semut' ); ?>">
				</div>
				<div class="absolute bottom-8 right-0 w-[56%] overflow-hidden rounded-[1.25rem] border-[6px] border-white bg-white soft-shadow sm:bottom-10 sm:w-[52%] md:bottom-12 md:rounded-[1.5rem] md:border-[8px]">
					<!-- <img class="h-40 w-full object-cover sm:h-48 md:h-52" src="https://semut-semut.sch.id/wp-content/uploads/perpustakaan.jpeg" alt="<?php esc_attr_e( 'Kegiatan anak', 'semut' ); ?>"> -->
				</div>
				<div class="absolute right-5 top-4 grid h-20 w-20 place-items-center organic bg-orangeFun text-center text-xs font-black text-white shadow-xl shadow-orange-200 sm:right-8 sm:top-5 sm:h-24 sm:w-24 sm:text-sm md:right-12 md:top-6"><?php esc_html_e( 'Happy', 'semut' ); ?><br><?php esc_html_e( 'Kids', 'semut' ); ?></div>
				<div class="absolute bottom-0 left-4 rounded-[1rem] bg-white px-4 py-3 soft-shadow sm:left-10 sm:px-5 sm:py-4 md:left-12 md:rounded-[1.125rem]">
					<p class="text-sm font-black text-pine"><?php esc_html_e( 'Happy Teacher, Cheerful Kids', 'semut' ); ?></p>
					<p class="text-xs text-ink/50"><?php esc_html_e( 'Belajar dengan hati yang gembira', 'semut' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section id="welcome" class="px-5 py-16">
		<div class="mx-auto grid max-w-7xl gap-10 rounded-[2rem] bg-white p-8 soft-shadow md:grid-cols-[.8fr_1.2fr] md:p-12">
			<div>
				<p class="mb-3 text-sm font-black uppercase tracking-[.2em] text-orangeFun"><?php echo esc_html( $welcome_label ); ?></p>
				<h2 class="font-display text-4xl font-bold leading-tight text-pine md:text-5xl"><?php echo esc_html( $welcome_title ); ?></h2>
			</div>
			<div class="space-y-5 text-base leading-8 text-ink/70">
				<p><?php echo esc_html( $welcome_paragraph_1 ); ?></p>
				<p><?php echo esc_html( $welcome_paragraph_2 ); ?></p>
				<p><?php echo esc_html( $welcome_paragraph_3 ); ?></p>
			</div>
		</div>
	</section>

	<section id="keunggulan" class="px-5 py-16">
		<div class="mx-auto max-w-7xl">
			<div class="mb-9 max-w-2xl">
				<p class="text-sm font-black uppercase tracking-[.2em] text-orangeFun"><?php echo esc_html( $features_label ); ?></p>
				<h2 class="mt-3 font-display text-4xl font-bold text-ink md:text-5xl"><?php echo esc_html( $features_title ); ?></h2>
			</div>
			<div class="grid gap-5 md:grid-cols-4">
				<?php foreach ( $features as $feature ) : ?>
					<div class="rounded-[1.5rem] p-7 <?php echo esc_attr( $feature['card'] ); ?>">
						<div class="mb-5 text-4xl"><?php echo wp_kses_post( $feature['icon'] ); ?></div>
						<h3 class="font-display text-xl font-bold text-pine"><?php echo esc_html( $feature['title'] ); ?></h3>
						<p class="mt-3 text-sm leading-6 text-ink/65"><?php echo esc_html( $feature['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="program" class="px-5 py-16">
		<div class="mx-auto max-w-7xl">
			<div class="mb-9 flex flex-col justify-between gap-4 md:flex-row md:items-end">
				<div>
					<p class="text-sm font-black uppercase tracking-[.2em] text-orangeFun"><?php echo esc_html( $program_label ); ?></p>
					<h2 class="mt-3 font-display text-4xl font-bold text-ink md:text-5xl"><?php echo esc_html( $program_title ); ?></h2>
				</div>
				<p class="max-w-lg text-sm leading-7 text-ink/60"><?php echo esc_html( $program_description ); ?></p>
			</div>
			<div class="grid gap-6 md:grid-cols-3">
				<?php foreach ( $programs as $program ) : ?>
					<article class="overflow-hidden rounded-[1.75rem] bg-white soft-shadow">
						<?php if ( ! empty( $program['link'] ) ) : ?>
							<a href="<?php echo esc_url( $program['link'] ); ?>" class="block">
								<img class="h-56 w-full object-cover" src="<?php echo esc_url( $program['image'] ); ?>" alt="<?php echo esc_attr( $program['alt'] ); ?>">
							</a>
						<?php else : ?>
							<img class="h-56 w-full object-cover" src="<?php echo esc_url( $program['image'] ); ?>" alt="<?php echo esc_attr( $program['alt'] ); ?>">
						<?php endif; ?>
						<div class="p-7">
							<h3 class="font-display text-2xl font-bold text-pine">
								<?php if ( ! empty( $program['link'] ) ) : ?>
									<a href="<?php echo esc_url( $program['link'] ); ?>" class="hover:text-leaf"><?php echo esc_html( $program['title'] ); ?></a>
								<?php else : ?>
									<?php echo esc_html( $program['title'] ); ?>
								<?php endif; ?>
							</h3>
							<p class="mt-3 text-sm leading-6 text-ink/65"><?php echo esc_html( $program['text'] ); ?></p>
							<?php if ( ! empty( $program['link'] ) ) : ?>
								<a href="<?php echo esc_url( $program['link'] ); ?>" class="mt-5 inline-flex text-sm font-extrabold text-orangeFun"><?php esc_html_e( 'Selengkapnya', 'semut' ); ?> &#8594;</a>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="jenjang" class="bg-pine px-5 py-16 text-white">
		<div class="mx-auto max-w-7xl">
			<p class="text-sm font-black uppercase tracking-[.2em] text-leafLight"><?php echo esc_html( $levels_label ); ?></p>
			<h2 class="mt-3 font-display text-4xl font-bold md:text-5xl"><?php echo esc_html( $levels_title ); ?></h2>
			<div class="mt-9 grid gap-5 sm:grid-cols-2 md:grid-cols-4">
				<?php foreach ( $levels as $level ) : ?>
					<div class="rounded-[2rem] bg-white/10 p-7 ring-1 ring-white/10">
						<div class="text-4xl"><?php echo wp_kses_post( $level['icon'] ); ?></div>
						<h3 class="mt-5 font-display text-2xl font-bold"><?php echo esc_html( $level['title'] ); ?></h3>
						<p class="mt-3 text-sm text-white/70"><?php echo esc_html( $level['text'] ); ?></p>
						<a href="<?php echo esc_url( semut_get_level_link( $level['slug'] ) ); ?>" class="mt-5 inline-flex rounded-full bg-white px-4 py-2 text-sm font-extrabold text-pine hover:bg-leafLight"><?php echo esc_html( $level['button'] ); ?></a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="galeri" class="section-wash px-5 py-16">
		<div class="mx-auto max-w-7xl">
			<div class="mb-9 flex justify-between gap-5">
				<div>
					<p class="text-sm font-black uppercase tracking-[.2em] text-orangeFun"><?php echo esc_html( $gallery_label ); ?></p>
					<h2 class="mt-3 font-display text-4xl font-bold text-ink md:text-5xl"><?php echo esc_html( $gallery_title ); ?></h2>
				</div>
				<a href="<?php echo esc_url( $gallery_button_link ); ?>" class="hidden self-end rounded-full bg-white px-5 py-3 text-sm font-extrabold text-pine shadow-sm md:block"><?php echo esc_html( $gallery_button_label ); ?> &#8594;</a>
			</div>
			<div class="grid grid-cols-2 gap-4 md:grid-cols-4">
				<?php foreach ( $gallery_images as $image ) : ?>
					<img class="<?php echo esc_attr( $image['class'] ); ?>" src="<?php echo esc_url( $image['image'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="blog" class="px-5 py-16">
		<div class="mx-auto max-w-7xl">
			<div class="mb-9 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
				<div class="max-w-2xl">
					<p class="text-sm font-black uppercase tracking-[.2em] text-orangeFun"><?php esc_html_e( 'Read Our Blog', 'semut' ); ?></p>
					<h2 class="mt-3 font-display text-4xl font-bold text-ink md:text-5xl"><?php esc_html_e( 'Cerita, tips, dan kabar kecil dari dunia belajar anak.', 'semut' ); ?></h2>
				</div>
				<p class="max-w-lg text-sm leading-7 text-ink/60"><?php esc_html_e( 'Section ini bantu SEO sekaligus bikin sekolah terasa aktif, komunikatif, dan dekat dengan orang tua.', 'semut' ); ?></p>
			</div>

			<div class="grid gap-6 md:grid-cols-3">
				<?php
				$semut_blog_query = new WP_Query(
					array(
						'posts_per_page' => 3,
						'post_status'    => 'publish',
					)
				);
				?>
				<?php
				$semut_rendered_posts = 0;
				?>
				<?php if ( $semut_blog_query->have_posts() ) : ?>
					<?php while ( $semut_blog_query->have_posts() ) : ?>
						<?php
						$semut_blog_query->the_post();
						$semut_rendered_posts++;
						?>
						<article class="rounded-[1.5rem] bg-white p-7 soft-shadow">
							<span class="inline-flex rounded-full bg-leafLight/45 px-4 py-2 text-xs font-black uppercase tracking-[.18em] text-pine"><?php echo esc_html( get_the_category_list( ', ' ) ? wp_strip_all_tags( get_the_category_list( ', ' ) ) : __( 'Artikel', 'semut' ) ); ?></span>
							<h3 class="mt-5 font-display text-2xl font-bold text-pine"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="mt-4 text-sm leading-7 text-ink/65"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
							<a href="<?php the_permalink(); ?>" class="mt-6 inline-flex text-sm font-extrabold text-orangeFun"><?php esc_html_e( 'Baca artikel', 'semut' ); ?> &#8594;</a>
						</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

				<?php if ( $semut_rendered_posts < 3 ) : ?>
					<?php
					$semut_fallback_posts = array_slice( $semut_data['blog_fallback'], 0, 3 - $semut_rendered_posts );
					?>
					<?php foreach ( $semut_fallback_posts as $post ) : ?>
						<article class="rounded-[1.5rem] <?php echo esc_attr( $post['card'] ); ?>">
							<span class="inline-flex rounded-full px-4 py-2 text-xs font-black uppercase tracking-[.18em] <?php echo esc_attr( $post['pill'] ); ?>"><?php echo esc_html( $post['badge'] ); ?></span>
							<h3 class="mt-5 font-display text-2xl font-bold text-pine"><?php echo esc_html( $post['title'] ); ?></h3>
							<p class="mt-4 text-sm leading-7 text-ink/65"><?php echo esc_html( $post['text'] ); ?></p>
							<a href="<?php echo esc_url( semut_section_url( 'kontak' ) ); ?>" class="mt-6 inline-flex text-sm font-extrabold text-orangeFun"><?php esc_html_e( 'Baca artikel', 'semut' ); ?> &#8594;</a>
						</article>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="px-5 py-16">
		<div class="mx-auto max-w-7xl rounded-[2rem] bg-skySoft/55 p-8 md:p-12">
			<p class="text-sm font-black uppercase tracking-[.2em] text-orangeFun"><?php echo esc_html( $testimonial_label ); ?></p>
			<h2 class="mt-3 font-display text-4xl font-bold text-ink md:text-5xl"><?php echo esc_html( $testimonial_title ); ?></h2>
			<div class="mt-8 grid gap-5 md:grid-cols-3">
				<?php foreach ( $testimonials as $testimonial ) : ?>
					<div class="rounded-[1.5rem] bg-white p-7 soft-shadow">
						<p class="leading-7 text-ink/70">"<?php echo esc_html( $testimonial['quote'] ); ?>"</p>
						<p class="mt-5 font-black text-pine"><?php echo esc_html( $testimonial['author'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
