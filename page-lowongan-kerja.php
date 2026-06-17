<?php
/**
 * Template Name: Lowongan Kerja
 * Template Post Type: page
 *
 * @package Semut
 */

get_header();

$career_email = 'hrd@sd-semutsemut.sch.id';
$hero_image   = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
?>

<main class="career-page">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<header class="career-hero"<?php echo $hero_image ? ' style="--career-hero-image: url(' . esc_url( $hero_image ) . ');"' : ''; ?>>
			<div class="career-hero__content">
				<span class="career-eyebrow"><?php esc_html_e( 'We Are Hiring', 'semut' ); ?></span>
				<h1><?php esc_html_e( 'Mari Bergabung Bersama Semut-Semut', 'semut' ); ?></h1>
				<p><?php esc_html_e( 'Bersama mendidik generasi yang berakhlak, mandiri, cinta belajar, dekat dengan alam, dan tumbuh bahagia.', 'semut' ); ?></p>
				<a href="#lowongan" class="career-button career-button--primary"><?php esc_html_e( 'Lihat Lowongan', 'semut' ); ?></a>
			</div>
		</header>

		<section class="career-section" id="lowongan">
			<div class="career-section-heading">
				<span class="career-section-label"><?php esc_html_e( 'Posisi Dibuka', 'semut' ); ?></span>
				<h2><?php esc_html_e( 'Temukan peran yang paling sesuai.', 'semut' ); ?></h2>
				<p><?php esc_html_e( 'Pilih posisi berdasarkan jenjang, minat, pengalaman, dan panggilan mendidik Anda.', 'semut' ); ?></p>
			</div>

			<div class="career-filters" aria-label="<?php esc_attr_e( 'Filter lowongan berdasarkan jenjang', 'semut' ); ?>">
				<button class="career-filter-button active" type="button" data-filter="all"><?php esc_html_e( 'Semua', 'semut' ); ?></button>
				<button class="career-filter-button" type="button" data-filter="sd"><?php esc_html_e( 'SD', 'semut' ); ?></button>
				<button class="career-filter-button" type="button" data-filter="smp"><?php esc_html_e( 'SMP', 'semut' ); ?></button>
				<button class="career-filter-button" type="button" data-filter="tk"><?php esc_html_e( 'TK', 'semut' ); ?></button>
			</div>

			<div class="career-jobs">
				<?php
				$jobs = array(
					array(
						'tag'           => 'SD / SMP',
						'category'      => 'sd smp',
						'title'         => 'Shadow Teacher SD / SMP',
						'description'   => 'Mendampingi siswa berkebutuhan khusus dalam proses belajar.',
						'qualifications' => array(
							'Minimal S1 Psikologi, PLB, Keguruan, atau jurusan relevan.',
							'Menguasai mata pelajaran jenjang SD atau SMP.',
							'Berpengalaman mendampingi ABK.',
							'Memahami karakteristik dan kebutuhan belajar ABK.',
							'Mampu menyusun strategi pendampingan.',
							'Mampu berkolaborasi dengan guru kelas dan orang tua.',
						),
					),
					array(
						'tag'           => 'SMP',
						'category'      => 'smp',
						'title'         => 'Guru Pendidikan Pancasila SMP',
						'description'   => 'Mengajar Pendidikan Pancasila secara kontekstual dan menyenangkan.',
						'qualifications' => array(
							'Minimal S1 Pendidikan Pancasila, PKn, atau jurusan relevan.',
							'Berakhlak baik dan menjadi teladan bagi peserta didik.',
							'Menguasai materi Pendidikan Pancasila.',
							'Mampu mengaitkan materi dengan kehidupan sehari-hari.',
							'Kreatif dalam merancang pembelajaran aktif dan menyenangkan.',
						),
					),
					array(
						'tag'           => 'SD',
						'category'      => 'sd',
						'title'         => 'Guru Bahasa Inggris SD',
						'description'   => 'Mengajar Bahasa Inggris dengan metode kreatif dan komunikatif.',
						'qualifications' => array(
							'Minimal S1 Pendidikan Bahasa Inggris atau Sastra Inggris.',
							'Memiliki semangat mendidik anak usia SD.',
							'Memiliki kemampuan Bahasa Inggris aktif lisan dan tulisan.',
							'Mampu mengajar secara kreatif dan menyenangkan.',
							'Mampu menyusun perangkat pembelajaran dan asesmen.',
							'Memiliki pronunciation yang baik.',
							'Sertifikasi TOEFL, IELTS, atau sejenisnya menjadi nilai tambah.',
						),
					),
					array(
						'tag'           => 'TK',
						'category'      => 'tk',
						'title'         => 'Guru TK',
						'description'   => 'Mendampingi anak usia dini melalui bermain, belajar, dan eksplorasi.',
						'qualifications' => array(
							'Minimal S1 PAUD, Psikologi, PGSD, atau jurusan relevan.',
							'Berakhlak baik, sabar, penyayang, dan menyukai dunia anak.',
							'Memahami karakteristik perkembangan anak usia dini.',
							'Kreatif merancang kegiatan bermain sambil belajar.',
							'Mampu menciptakan lingkungan belajar yang aman dan bermakna.',
							'Komunikatif dengan anak maupun orang tua.',
							'Menyukai kegiatan alam terbuka dan eksplorasi bersama anak.',
							'Kemampuan seni, storytelling, musik, atau kreativitas menjadi nilai tambah.',
						),
					),
				);
				?>

				<?php foreach ( $jobs as $job ) : ?>
					<article class="career-job-card" data-category="<?php echo esc_attr( $job['category'] ); ?>">
						<div class="career-job-card__header">
							<span class="career-job-tag"><?php echo esc_html( $job['tag'] ); ?></span>
							<h3><?php echo esc_html( $job['title'] ); ?></h3>
						</div>
						<p><?php echo esc_html( $job['description'] ); ?></p>

						<div class="career-accordion">
							<button class="career-accordion-trigger" type="button" aria-expanded="false"><?php esc_html_e( 'Lihat Kualifikasi', 'semut' ); ?></button>
							<div class="career-accordion-panel" hidden>
								<ol>
									<?php foreach ( $job['qualifications'] as $qualification ) : ?>
										<li><?php echo esc_html( $qualification ); ?></li>
									<?php endforeach; ?>
								</ol>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="career-section career-section--soft">
			<div class="career-info-grid">
				<article class="career-info-box">
					<h2><?php esc_html_e( 'Kualifikasi Umum', 'semut' ); ?></h2>
					<ol>
						<li><?php esc_html_e( 'Muslim/Muslimah taat dan mampu membaca Al-Qur\'an dengan fasih.', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Mampu bekerja dalam tim maupun mandiri.', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Memiliki kesabaran, empati, dan komunikasi yang baik.', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Menyukai kegiatan alam terbuka dan pembelajaran berbasis pengalaman.', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Keterampilan seni, teknologi, atau media pembelajaran menjadi nilai tambah.', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Menguasai bahasa asing menjadi nilai tambah.', 'semut' ); ?></li>
					</ol>
				</article>

				<article class="career-info-box">
					<h2><?php esc_html_e( 'Persyaratan Berkas', 'semut' ); ?></h2>
					<ol>
						<li><?php esc_html_e( 'Surat lamaran', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Curriculum Vitae / CV', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Fotokopi ijazah dan transkrip nilai', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Fotokopi KTP', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Pas foto terbaru', 'semut' ); ?></li>
						<li><?php esc_html_e( 'Dokumen pendukung lainnya', 'semut' ); ?></li>
					</ol>
				</article>
			</div>
		</section>

		<section class="career-section">
			<div class="career-cta">
				<span class="career-eyebrow"><?php esc_html_e( 'Happy Teacher, Cheerful Kids', 'semut' ); ?></span>
				<h2><?php esc_html_e( 'Siap Bertumbuh Bersama?', 'semut' ); ?></h2>
				<p><?php esc_html_e( 'Mari bertumbuh, belajar, dan menginspirasi bersama di lingkungan pendidikan yang mencintai alam dan menghargai keunikan setiap anak.', 'semut' ); ?></p>

				<div class="career-email-box">
					<span><?php esc_html_e( 'Kirim lamaran ke:', 'semut' ); ?></span>
					<strong><?php echo esc_html( $career_email ); ?></strong>
					<small><?php esc_html_e( 'Subjek Email: Nama_Posisi yang Dilamar', 'semut' ); ?></small>
				</div>

				<a class="career-button career-button--primary" href="<?php echo esc_url( 'mailto:' . $career_email . '?subject=Nama_Posisi%20yang%20Dilamar' ); ?>"><?php esc_html_e( 'Kirim Lamaran Sekarang', 'semut' ); ?></a>
			</div>
		</section>

		<?php if ( get_the_content() ) : ?>
			<section class="career-section career-section--soft">
				<div class="semut-prose mx-auto max-w-5xl">
					<?php the_content(); ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
