<?php
/**
 * Footer template.
 *
 * @package Semut
 */

$contact_eyebrow = semut_get_home_field( 'contact_eyebrow', 'Siap Berkunjung?' );
$contact_title = semut_get_home_field( 'contact_title', 'Mari kenal lebih dekat dengan ruang tumbuh anak di Semut-Semut.' );
$contact_description = semut_get_home_field( 'contact_description', 'Kami dengan senang hati menerima kunjungan calon orang tua dan peserta didik untuk mengenal lingkungan sekolah dan berkonsultasi mengenai pendidikan dasar yang sesuai dengan kebutuhan anak.' );
$contact_whatsapp_link = semut_get_home_field( 'contact_whatsapp_link', 'https://wa.me/6281283330186' );
$contact_whatsapp_text = semut_get_home_field( 'contact_whatsapp_text', 'Chat WhatsApp' );
$contact_phone = semut_get_home_field( 'contact_phone', 'WhatsApp: 0812 8333 0186' );
$contact_email = semut_get_home_field( 'contact_email', 'Email: adm.semut@yahoo.co.id' );
$contact_hours = semut_get_home_field( 'contact_hours', 'Senin - Jumat, 08.00 - 15.00 WIB' );
$contact_address = semut_get_home_field( 'contact_address', 'Jl. Industri Kapal Dalam No.25A, Depok, RTM, Kelapa Dua, Depok' );
$contact_map_label = semut_get_home_field( 'contact_map_label', 'Google Maps Embed' );
$contact_map_embed = semut_get_home_field( 'contact_map_embed', '' );
$contact_map_default_embed = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4687.992431554969!2d106.84311427499152!3d-6.371495693618682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec7271548033%3A0xcb3df43539e93af1!2sSemut-Semut%20The%20Natural%20School!5e1!3m2!1sen!2sid!4v1777826530605!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
$contact_map_output = ! empty( $contact_map_embed ) ? $contact_map_embed : $contact_map_default_embed;
?>

<footer id="kontak" class="bg-ink px-5 py-14 text-white">
	<div class="mx-auto max-w-7xl">
		<div class="rounded-[2.5rem] bg-white/10 p-6 ring-1 ring-white/10 md:flex md:items-center md:justify-between md:gap-8 md:p-9">
			<div class="max-w-2xl">
				<p class="text-sm font-black uppercase tracking-[.2em] text-leafLight"><?php echo esc_html( $contact_eyebrow ); ?></p>
				<h3 class="mt-3 font-display text-3xl font-bold md:text-4xl"><?php echo esc_html( $contact_title ); ?></h3>
				<p class="mt-3 text-sm leading-7 text-white/70 md:text-base"><?php echo esc_html( $contact_description ); ?></p>
			</div>
			<div class="mt-6 flex flex-col gap-3 sm:flex-row sm:flex-wrap md:mt-0">
				<a href="<?php echo esc_url( $contact_whatsapp_link ); ?>" class="rounded-full bg-orangeFun px-6 py-3 text-center text-sm font-extrabold text-white shadow-lg shadow-orange-900/20 hover:bg-earth"><?php echo esc_html( $contact_whatsapp_text ); ?></a>
				<a href="<?php echo esc_url( semut_section_url( 'program' ) ); ?>" class="rounded-full border border-white/20 bg-white/10 px-6 py-3 text-center text-sm font-extrabold text-white hover:bg-white/15"><?php esc_html_e( 'Lihat Program', 'semut' ); ?></a>
			</div>
		</div>

		<div class="mt-10 grid gap-10 md:grid-cols-[1.15fr_.85fr_1fr_1.1fr]">
			<div>
				<h3 class="font-display text-2xl font-bold"><?php bloginfo( 'name' ); ?></h3>
				<p class="mt-4 max-w-sm text-sm leading-7 text-white/65"><?php esc_html_e( 'The Natural School - sekolah alam inklusif berazaskan Islam dengan suasana belajar yang natural, hangat, dan menyenangkan.', 'semut' ); ?></p>
				<p class="mt-5 inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-black uppercase tracking-[.18em] text-leafLight"><?php esc_html_e( 'Open Admission 2026 / 2027', 'semut' ); ?></p>
			</div>

			<div>
				<h4 class="font-bold text-leafLight"><?php esc_html_e( 'Navigasi Cepat', 'semut' ); ?></h4>
				<div class="mt-4 space-y-3 text-sm text-white/70">
					<?php foreach ( semut_get_navigation_items() as $item ) : ?>
						<a href="<?php echo esc_url( semut_section_url( $item['id'] ) ); ?>" class="block hover:text-white"><?php echo esc_html( $item['label'] ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>

			<div>
				<h4 class="font-bold text-leafLight"><?php esc_html_e( 'Kontak', 'semut' ); ?></h4>
				<div class="mt-4 space-y-3 text-sm text-white/70">
					<p><?php echo esc_html( $contact_phone ); ?></p>
					<p><?php echo esc_html( $contact_email ); ?></p>
					<p><?php echo esc_html( $contact_hours ); ?></p>
					<p><?php echo esc_html( $contact_address ); ?></p>
				</div>
			</div>

			<div>
				<h4 class="font-bold text-leafLight"><?php esc_html_e( 'Lokasi', 'semut' ); ?></h4>
				<div class="mt-4 overflow-hidden rounded-[2rem] bg-white/10 text-center text-sm text-white/60">
					<div class="semut-map-embed h-44">
						<?php echo $contact_map_output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mx-auto mt-10 flex max-w-7xl flex-col gap-3 border-t border-white/10 pt-6 text-xs text-white/45 md:flex-row md:items-center md:justify-between">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.</p>
		<p><?php esc_html_e( 'Happy Teacher, Cheerful Kids.', 'semut' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
