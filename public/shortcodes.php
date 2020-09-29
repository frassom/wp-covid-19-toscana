<?php

if (!defined("ABSPATH")) {
	die;
}

class C19T_Shortcodes {
	
	private static $instance = null;
	
	public static function get_instance() {
		if (self::$instance == null) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	private function __construct() {
		add_action("wp_enqueue_scripts", [$this, "enqueue_scripts"]);
		add_action("init", [$this, "init_shortcodes"]);
	}
	
	public function enqueue_scripts() {
		wp_enqueue_script("c19t-chart-js", C19T_PLUGIN_URL . "lib/chart.min.js", [], false, true);
		wp_enqueue_script("c19t-covid-chart", C19T_PLUGIN_URL . "public/js/covid-chart.js", ["jquery", "c19t-chart-js"], false, true);
		wp_localize_script(
			"c19t-covid-chart",
			"covidAjaxObj",
			[
				"ajaxUrl"	=> admin_url("admin-ajax.php"),
				"nonce"		=> wp_create_nonce("covid_dataset"),
			]
		);
	}
	
	public function init_shortcodes() {
		add_shortcode("grafico-toscana", [$this, "toscana_shortcode"]);
		add_shortcode("grafico-provincia", [$this, "provincia_shortcode"]);
		add_shortcode("grafico-confronto-province", [$this, "confronto_province_shortcode"]);
	}
	
	public function toscana_shortcode($atts, $content, $tag) {
		$default_atts = [
			"dati" => "positivi_tot,positivi_att,dimessi,deceduti_tot",
		];
		
		$atts = shortcode_atts($default_atts, $atts, $tag);
		
		$o  = "<canvas class='grafico-toscana' ";
		$o .= "data-dati='" . esc_attr($atts["dati"]) . "'></canvas>";
		$o .= "<div class='covid-visual-loading'>Caricamanto Dati...</div>";
		
		return $o;
	}
	
	public function provincia_shortcode($atts, $content, $tag) {
		$default_atts = [
			"provincia"	=> "FI",
			"dati"		=> "positivi_tot,deceduti_tot",
		];
		
		$atts = shortcode_atts($default_atts, $atts, $tag);
		
		$o  = "<canvas class='grafico-provincia' ";
		$o .= "data-provincia='". esc_attr($atts["provincia"]) . "' ";
		$o .= "data-dati='" . esc_attr($atts["dati"]) . "'></canvas>";
		$o .= "<div class='covid-visual-loading'>Caricamento Dati...</div>";
		
		return $o;
	}
	
	public function confronto_province_shortcode($atts, $content, $tag) {
		$default_atts = [
			"province"	=> "AR,FI,GR,LI,LU,MS,PI,PO,PT,SI",
			"dato"		=> "positivi_tot",
		];
		
		$atts = shortcode_atts($default_atts, $atts, $tag);
		
		$o  = "<canvas class='grafico-confronto-province' ";
		$o .= "data-province='" . esc_attr($atts["province"]) . "' ";
		$o .= "data-dato='" . esc_attr($atts["dato"]) . "'></canvas>";
		$o .= "<div class='covid-visual-loading'>Caricamento Dati...</div>";
		
		return $o;
	}
}

C19T_Shortcodes::get_instance();

?>
