<?php
/**
 * Default homepage data for Semut.
 *
 * @package Semut
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function semut_get_navigation_items() {
	return array(
		array(
			'id'    => 'welcome',
			'label' => 'Tentang',
			'class' => 'hover:text-pine',
		),
		array(
			'id'    => 'keunggulan',
			'label' => 'Keunggulan',
			'class' => 'hover:text-pine',
		),
		array(
			'id'    => 'program',
			'label' => 'Program',
			'class' => 'hover:text-pine',
		),
		array(
			'id'    => 'jenjang',
			'label' => 'Jenjang',
			'class' => 'hover:text-pine',
		),
		array(
			'id'    => 'galeri',
			'label' => 'Galeri',
			'class' => 'hover:text-pine',
		),
		array(
			'id'    => 'blog',
			'label' => 'Blog',
			'class' => 'hover:text-pine',
		),
		array(
			'id'    => 'kontak',
			'label' => 'Kontak',
			'class' => 'hover:text-pine',
		),
	);
}

function semut_get_homepage_data() {
	return array(
		'slides'       => array(

			array(
				'label'   => 'Salat Dhuha',
				'title'   => 'Shalat Dhuha, Awal Hari yang Penuh Berkah.',
				'text'    => 'Melalui shalat dhuha bersama, anak-anak belajar membangun kebiasaan baik sejak pagi. Dengan suasana tenang dan penuh kebersamaan.',
				'image'   => 'https://semut-semut.sch.id/wp-content/uploads/solat-duha.jpeg',
				'alt'     => 'salat dhuha',
				'badge'   => 'bg-leafLight/50 text-pine',
				'dot'     => 'bg-pine/25',
			),

			array(
				'label'   => 'Circular Economy',
				'title'   => 'Apresiasi untuk langkah nyata menuju ekonomi sirkular',
				'text'    => 'Penyerahan sertifikat ini menegaskan komitmen pada circular economy—kolaborasi nyata untuk mengurangi limbah dan memaksimalkan sumber daya menuju masa depan berkelanjutan.',
				'image'   => 'https://semut-semut.sch.id/wp-content/uploads/Ekonomi-Sirkular.png',
				'alt'     => 'circular economy',
				'badge'   => 'bg-leafLight/50 text-pine',
				'dot'     => 'bg-pine/25',
			),
			array(
				'label'   => 'STUDENT SHOWCASE',
				'title'   => 'Kreasi Tari yang Penuh Warna dan Semangat',
				'text'    => 'Kegiatan penuh warna ini menampilkan kreativitas dan kepercayaan diri anak dalam kompetisi tari. Melalui gerak dan ekspresi, mereka belajar tampil, berkolaborasi, dan merayakan keberagaman budaya dengan penuh semangat.',
				'image'   => 'https://semut-semut.sch.id/wp-content/uploads/20251204_094900-Edit.jpg',
				'alt'     => 'student showcase',
				'badge'   => 'bg-leafLight/50 text-pine',
				'dot'     => 'bg-pine/25',
			),
		),
		'features'     => array(
			array(
				'icon'  => '&#127807;',
				'title' => 'Natural Learning',
				'text'  => 'Belajar melalui pengalaman nyata dan lingkungan alam.',
				'card'  => 'bg-leafLight/50',
			),
			array(
				'icon'  => '&#129309;',
				'title' => 'Inklusif',
				'text'  => 'Menghargai perbedaan dan menumbuhkan empati.',
				'card'  => 'bg-skySoft/70',
			),
			array(
				'icon'  => '&#127912;',
				'title' => 'Kreatif',
				'text'  => 'Anak diberi ruang berekspresi dan berkarya.',
				'card'  => 'bg-orangeFun/15',
			),
			array(
				'icon'  => '&#129525;',
				'title' => 'Berkarakter',
				'text'  => 'Menguatkan kemandirian, adab, dan tanggung jawab.',
				'card'  => 'bg-earth/15',
			),
		),
		'programs'     => array(
			array(
				'title' => 'Talents Day',
				'text'  => 'Eksplorasi minat, bakat, dan keberanian anak untuk tampil.',
				'image' => 'https://semut-semut.sch.id/wp-content/uploads/cookery-scaled.jpg',
				'alt'   => 'Talents Day',
				'link'  => '',
			),
			array(
				'title' => 'Assembly',
				'text'  => 'Ekspresi seni, cerita, musik, dan kolaborasi dalam panggung anak.',
				'image' => 'https://semut-semut.sch.id/wp-content/uploads/assembly-2.jpeg',
				'alt'   => 'Assembly',
				'link'  => '',
			),
			array(
				'title' => 'Camping',
				'text'  => 'Melatih kemandirian, kerja sama, dan kedekatan dengan alam.',
				'image' => 'https://semut-semut.sch.id/wp-content/uploads/Camping-scaled.jpg',
				'alt'   => 'Camping',
				'link'  => '',
			),
		),
		'levels'       => array(
			array(
				'slug'  => 'http://semut.test/playgrup-semut-semut/',
				'icon'  => '&#129513;',
				'title' => 'Playgroup',
				'text'  => 'Bermain, mengenal diri, dan bersosialisasi.',
			),
			array(
				'slug'  => 'tk',
				'icon'  => '&#127803;',
				'title' => 'TK',
				'text'  => 'Eksplorasi awal, seni, gerak, dan kebiasaan baik.',
			),
			array(
				'slug'  => 'sd',
				'icon'  => '&#128218;',
				'title' => 'SD',
				'text'  => 'Menguatkan karakter dan kecakapan dasar.',
			),
			array(
				'slug'  => 'smp-ins',
				'icon'  => '&#129525;',
				'title' => 'SMP INS',
				'text'  => 'Remaja tangguh, reflektif, dan siap berkarya.',
			),
		),
		'gallery'      => array(
			array(
				'image' => 'https://semut-semut.sch.id/wp-content/uploads/anak-tk.png',
				'alt'   => 'Galeri kegiatan',
				'class' => 'h-56 w-full rounded-[1.5rem] object-cover md:col-span-2 md:h-80',
			),
			array(
				'image' => 'https://semut-semut.sch.id/wp-content/uploads/syair-main-sarung.png',
				'alt'   => 'Galeri kegiatan',
				'class' => 'h-56 w-full rounded-[1.5rem] object-cover md:h-80',
			),
			array(
				'image' => 'https://images.unsplash.com/photo-1596464716127-f2a82984de30?auto=format&fit=crop&w=800&q=80',
				'alt'   => 'Galeri kegiatan',
				'class' => 'h-56 w-full rounded-[1.5rem] object-cover md:h-80',
			),
		),
		'blog_fallback' => array(
			array(
				'badge' => 'Tips Orang Tua',
				'title' => '5 cara sederhana membangun kebiasaan belajar yang menyenangkan di rumah',
				'text'  => 'Rutinitas kecil, bahasa yang hangat, dan ruang eksplorasi bisa membantu anak SD lebih siap belajar tanpa tekanan berlebih.',
				'card'  => 'bg-white p-7 soft-shadow',
				'pill'  => 'bg-leafLight/45 text-pine',
			),
			array(
				'badge' => 'Kegiatan Sekolah',
				'title' => 'Mengapa eksplorasi outdoor penting untuk anak usia sekolah dasar?',
				'text'  => 'Aktivitas luar ruang membantu anak belajar observasi, kerja sama, keberanian, dan rasa ingin tahu lewat pengalaman langsung.',
				'card'  => 'bg-skySoft/55 p-7',
				'pill'  => 'bg-white text-pine',
			),
			array(
				'badge' => 'Cerita Guru',
				'title' => 'Di balik kelas yang hangat: bagaimana guru menyiapkan pengalaman belajar yang bermakna',
				'text'  => 'Bukan cuma materi, guru juga merancang suasana, ritme, dan interaksi supaya anak merasa aman untuk mencoba dan bertanya.',
				'card'  => 'bg-orangeFun/10 p-7',
				'pill'  => 'bg-white text-orangeFun',
			),
		),
		'testimonials' => array(
			array(
				'quote'  => 'Anak kami lebih percaya diri, senang bercerita, dan menikmati proses belajar.',
				'author' => 'Orang Tua Murid',
			),
			array(
				'quote'  => 'Lingkungannya hangat. Anak belajar bukan karena dipaksa, tapi karena penasaran.',
				'author' => 'Orang Tua Murid',
			),
			array(
				'quote'  => 'Kegiatan outdoor dan seni membuat anak lebih mandiri dan berani mencoba.',
				'author' => 'Orang Tua Murid',
			),
		),
	);
}
