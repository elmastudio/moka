<?php
/**
 * Demo Installer content, One Click Demo Import plugin required
 * See: https://wordpress.org/plugins/one-click-demo-import/
 *
 * @package Moka
 * @since Moka 1.1.2
 */

function ocdi_import_files() {
	return array(

		array(
			'import_file_name'             => 'Demo Moka',
			'categories'                   => array( 'Blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/demo/moka-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/demo/moka-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/demo/moka-customizer.dat',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
