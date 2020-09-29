<?php
/**
 * Plugin Name:		COVID-19 Toscana
 * Description:		Plug-in per la visualizzazione dei dati COVID-19 della regione Toscana.
 * Plugin URI:		https://covidvisual.altervista.org
 * Author:		Marco Frassineti, Pietro Longinetti
 * Version:		1.0.1
 * License:		GPL v2
 * License URI:		https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:		covid-19-toscana
 */

if (!defined("ABSPATH")) {
	die;
}


define("C19T_PLUGIN_URL", plugin_dir_url(__FILE__));


if (is_admin()) {
	require_once __DIR__ . "/admin/admin-page.php";
}


require_once __DIR__ . "/public/shortcodes.php";

require_once __DIR__ . "/public/dataset-ajax.php";

?>
