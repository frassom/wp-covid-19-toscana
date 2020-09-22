<?php

if (!defined("ABSPATH")) {
	die;
}

require_once "csv-reader.php";

class C19T_Dataset_Ajax {
	
	private static $instance = null;
	
	public static function get_instance() {
		if (self::$instance == null) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	public function __construct() {
		add_action("wp_ajax_covid_dataset", [$this, "send_dataset"]);
		add_action("wp_ajax_nopriv_covid_dataset", [$this, "send_dataset"]);
	}
	
	public function send_dataset() {
		check_ajax_referer("covid_dataset");
		
		$dataset_url = get_option("dataset_url");
		
		if (!$dataset_url) {
			wp_send_json_error("Unable to find dataset url");
		}
		
		$graph_options = get_option("graph_options");
		$provence_colors = get_option("provence_colors");
		
		$dataset = array_merge(["options" => $graph_options], $provence_colors);
		
		try {
			$csv = new C19T_CSV_Reader($dataset_url);
		} catch (Exception $e) {
			wp_send_json_error("Error while opening dataset file: " . $e->getMessage());
		}
		
		try {
			$giorno = -1;
			while ($csv->next()) {
				if ($giorno != $csv->get("giorno")) {
					$giorno = $csv->get("giorno");
					
					$data = $csv->get("data");
					$dataset["date"][ $giorno ] = substr($data, 0, strlen($data) - 5);
				}
				
				$zona = $csv->get("geografia");
				if ($zona == "Toscana") {
					if ($csv->get("totale_casi_positivi") != 0) {
						$letalita = sprintf("%.2e", $csv->get("deceduti") / $csv->get("totale_casi_positivi") * 100);
					} else {
						$letalita = 0;
					}
					
					$dataset["Toscana"]["positivi_att"][ $giorno ]		= (int) $csv->get("attualmente_positivi");
					$dataset["Toscana"]["positivi_tot"][ $giorno ]		= (int) $csv->get("totale_casi_positivi");
					$dataset["Toscana"]["positivi_perc"][ $giorno ]		= sprintf("%.2e", $csv->get("totale_casi_positivi") / 3729641 * 100);
					$dataset["Toscana"]["positivi_inc_abs"][ $giorno ]	= (int) $csv->get("totale_casi_positivi") - $dataset["Toscana"]["positivi_tot"][ $giorno - 1 ];
					$dataset["Toscana"]["deceduti_tot"][ $giorno ]		= (int) $csv->get("deceduti");
					$dataset["Toscana"]["deceduti_inc_perc"][ $giorno ]	= sprintf("%.2e", $csv->get("deceduti_inc"));
					$dataset["Toscana"]["deceduti_inc_abs"][ $giorno ]	= (int) $csv->get("deceduti") - $dataset["Toscana"]["deceduti_tot"][ $giorno - 1 ];
					$dataset["Toscana"]["letalita"][ $giorno ]			= $letalita;
					$dataset["Toscana"]["ricoveri_tot"][ $giorno ]		= (int) $csv->get("totale_ricoveri");
					$dataset["Toscana"]["ricoveri_inc_perc"][ $giorno ]	= sprintf("%.2e", $csv->get("totale_ricoveri_inc"));
					$dataset["Toscana"]["dimessi"][ $giorno ]			= (int) $csv->get("dimessi");
					$dataset["Toscana"]["tamponi"][ $giorno ]			= (int) $csv->get("tamponi");
					$dataset["Toscana"]["tamponi_inc"][ $giorno ]		= sprintf("%.2e", $csv->get("tamponi_inc"));
					
				} elseif (substr($zona,0, 3) != "asl") {
					$dataset[ $zona ]["positivi_tot"][ $giorno ]		= (int) $csv->get("totale_casi_positivi");
					$dataset[ $zona ]["positivi_perc"][ $giorno ]		= sprintf("%.2e", $csv->get("totale_casi_positivi_ab"));	// Percentuale positivi su territorio
					$dataset[ $zona ]["positivi_inc_abs"][ $giorno ]	= (int) $csv->get("totale_casi_positivi") - $dataset[$zona]["positivi_tot"][ $giorno - 1 ];
					$dataset[ $zona ]["deceduti_tot"][ $giorno ]		= (int) $csv->get("deceduti");
					$dataset[ $zona ]["deceduti_inc_perc"][ $giorno ]	= sprintf("%.2e", $csv->get("deceduti_inc"));
					$dataset[ $zona ]["deceduti_inc_abs"][ $giorno ]	= (int) $csv->get("deceduti") - $dataset[$zona]["deceduti_tot"][ $giorno - 1 ];
					$dataset[ $zona ]["letalita"][ $giorno ]			= sprintf("%.2e", $csv->get("letalita"));
				}
			}
		} catch (Exception $e) {
			wp_send_json_error("Error while parsing csv file: " . $e->getMessage());
		}
		
		wp_send_json($dataset);
	}
}

C19T_Dataset_Ajax::get_instance();

?>
