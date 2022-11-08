<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmExportViewCSVHelper {
	/**
	 * The default separator between columns.
	 *
	 * @var string $column_separator
	 */
	protected static $column_separator = ',';

	/**
	 * The default separator between rows.
	 *
	 * @var string $line_break
	 */
	protected static $line_break = 'return';

	/**
	 * The default charset for the export.
	 *
	 * @var string $charset
	 */
	protected static $charset = 'UTF-8';

	/**
	 * Sets class parameters.
	 */
	public static function set_class_parameters() {
		$settings = new FrmExportViewGlobalSettings();
		$options  = $settings->get_options();

		self::set_column_separator( $options );
		self::$line_break = apply_filters( 'frm_export_csv_line_break', self::$line_break );
		self::set_charset();
	}

	/**
	 * Sets to_encoding from settings.
	 *
	 * @param string $csv_format The default csv encoding.
	 */
	public static function to_encoding( $csv_format = 'UTF-8' ) {
		$settings = new FrmExportViewGlobalSettings();
		$options  = $settings->get_options();

		if ( ! empty( $options->csv_format ) ) {
			$csv_format = $options->csv_format;
		}
		return $csv_format;
	}

	/**
	 * Sets column separator.
	 *
	 * @param object $options The Formidable Global Settings object.
	 */
	private static function set_column_separator( $options ) {
		$column_separator = self::$column_separator;
		if ( ! empty( $options->csv_col_sep ) ) {
			$column_separator = $options->csv_col_sep;
		}

		self::$column_separator = apply_filters( 'frm_export_csv_column_sep', $column_separator );
	}

	/**
	 * Sets charset.
	 */
	private static function set_charset() {
		$new_charset = get_option( 'blog_charset' );
		if ( ! empty( $new_charset ) ) {
			self::$charset = $new_charset;
		}
	}


	/**
	 * Returns column separator.
	 *
	 * @return string Column separator.
	 */
	public static function get_column_separator() {
		return self::$column_separator;
	}

	/**
	 * Prints file headers.
	 *
	 * @param string $filename Name of CSV file being created.
	 */
	public static function print_file_headers( $filename ) {
		header( 'Content-Description: File Transfer' );
		header( 'Content-Disposition: attachment; filename="' . esc_attr( $filename ) . '"' );
		header( 'Content-Type: text/csv; charset=' . self::$charset, true );
		header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', mktime( gmdate( 'H' ) + 2, gmdate( 'i' ), gmdate( 's' ), gmdate( 'm' ), gmdate( 'd' ), gmdate( 'Y' ) ) ) . ' GMT' );
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
		header( 'Cache-Control: no-cache, must-revalidate' );
		header( 'Pragma: no-cache' );
	}

	/**
	 * Gets the directory where the CSV file being created will be stored.
	 *
	 * @param string $location Location to store file, which may not be set.
	 *
	 * @return string Directory where the CSV file being created will be stored.
	 */
	public static function get_file_location( $location ) {
		if ( $location && self::validate_directory( $location ) ) {
			return $location;
		}

		$frm_settings = new FrmExportViewGlobalSettings();
		$upload_dir   = $frm_settings->settings->upload_dir;

		if ( self::validate_directory( $upload_dir ) ) {
			return $upload_dir;
		}

		return self::get_default_export_directory();
	}

	/**
	 * Tests whether given directory exists and is writeable.
	 *
	 * @param string $dir Name of directory.
	 *
	 * @return string Name of directory or empty string, if the directory didn't pass the tests.
	 */
	public static function validate_directory( $dir ) {
		$dir = trim( $dir );
		if ( $dir && file_exists( $dir ) && is_writable( $dir ) ) {
			return $dir;
		}

		return '';
	}

	/**
	 * Adds an .htaccess file to the specified directory if it doesn't already have an one
	 *
	 * @param string $location Path to directory where CSV export is to be saved.
	 *
	 * @return bool Whether creating the .htaccess was successful (true) or caused an error (false).
	 */
	public static function add_htaccess_if_needed( $location ) {
		if ( file_exists( $location . '/.htaccess' ) ) {
			return true;
		}

		// If an earlier version of Pro is installed where FrmProForm::get_htaccess_content is private, bail without creating an .htaccess file.
		if ( ! is_callable( 'FrmProForm::get_htaccess_content' ) ) {
			return true;
		}

		$content = '';
		FrmProForm::get_htaccess_content( $content );

		$create_file = new FrmCreateFile(
			array(
				'new_file_path' => $location,
				'file_name'     => '.htaccess',
				// Translators: %s: path to location where CSV export will be saved.
				'error_message' => sprintf( __( 'Unable to write to %s to protect your exports.', 'formidable-export-view' ), $location . '/.htaccess' ),
			)
		);

		ob_start();
		$create_file->create_file( $content );
		$message = ob_get_contents();
		ob_end_clean();

		return ! strpos( $message, 'exports' );
	}

	/**
	 * Get default directory for saving CSV exports
	 *
	 * @return string $target_path Desired directory path.
	 */
	private static function get_default_export_directory() {
		$uploads     = wp_upload_dir();
		$target_path = $uploads['basedir'];

		self::maybe_make_directory( $target_path );

		$relative_path = apply_filters( 'frm_export_upload_folder', 'formidable/exports' );
		$relative_path = untrailingslashit( $relative_path );
		$folders       = explode( '/', $relative_path );

		foreach ( $folders as $folder ) {
			$target_path .= '/' . $folder;
			self::maybe_make_directory( $target_path );
		}

		return $target_path;
	}

	/**
	 * Create a directory if it doesn't exist
	 *
	 * @param string $target_path Desired path.
	 */
	private static function maybe_make_directory( $target_path ) {
		if ( ! file_exists( $target_path ) ) {
			@mkdir( $target_path . '/' );
		}
	}

	/**
	 * Cleans and improves table cell contents.
	 *
	 * @param array $cells Array of cell content strings.
	 *
	 * @return array Improved array of cell content strings.
	 */
	public static function adjust_cell_content( $cells ) {
		$adjusted_cells = array();
		foreach ( $cells as $cell ) {
			$cell = strip_tags( $cell );
			if ( 'ISO-8859-1' === self::$charset ) {
				$cell = utf8_decode( $cell );
			}
			$cell = self::maybe_change_line_break( $cell );
			$cell = self::prevent_csv_vulnerabilities( $cell );
			$cell = apply_filters( 'frm_export_content', $cell );

			$adjusted_cells[] = $cell;
		}

		return $adjusted_cells;
	}

	/**
	 * Maybe change line break.
	 *
	 * @param string $val String whose line breaks may be changed.
	 *
	 * @return mixed Content with line breaks possibly changed.
	 */
	private static function maybe_change_line_break( $val ) {
		if ( 'return' !== self::$line_break ) {
			$val = str_replace( array( "\r\n", "\r", "\n" ), self::$line_break, $val );
		}

		return $val;
	}

	/**
	 * Adds character before cells that start with potentially dangerous characters in a CSV, like =.
	 *
	 * @param string $cell The contents of a table cell.
	 *
	 * @return string Sanitized cell content.
	 */
	private static function prevent_csv_vulnerabilities( $cell ) {
		if ( empty( $cell ) ) {
			return $cell;
		}
		$risky_first_characters = array( '=', '+', '@' );
		if ( in_array( substr( $cell, 0, 1 ), $risky_first_characters ) ) {
			return "'" . $cell;
		}

		return $cell;
	}
}
