<?php

if (!defined("ABSPATH")) {
	die;
}

class C19T_Admin_Page {
	
	private static $instance = null;
	
	public static function get_instance() {
		if (self::$instance == null) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	const ICON = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjxzdmcKICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIgogICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIgogICB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiCiAgIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIKICAgd2lkdGg9IjMyIgogICBoZWlnaHQ9IjMyIgogICB2aWV3Qm94PSIwIDAgOC40NjY2NjY1IDguNDY2NjY2OSIKICAgdmVyc2lvbj0iMS4xIgogICBpZD0ic3ZnOCI+CiAgPGRlZnMKICAgICBpZD0iZGVmczIiIC8+CiAgPG1ldGFkYXRhCiAgICAgaWQ9Im1ldGFkYXRhNSI+CiAgICA8cmRmOlJERj4KICAgICAgPGNjOldvcmsKICAgICAgICAgcmRmOmFib3V0PSIiPgogICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2Uvc3ZnK3htbDwvZGM6Zm9ybWF0PgogICAgICAgIDxkYzp0eXBlCiAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4KICAgICAgICA8ZGM6dGl0bGU+PC9kYzp0aXRsZT4KICAgICAgPC9jYzpXb3JrPgogICAgPC9yZGY6UkRGPgogIDwvbWV0YWRhdGE+CiAgPGcKICAgICBpZD0ibGF5ZXIyIgogICAgIHN0eWxlPSJkaXNwbGF5OmlubGluZSI+CiAgICA8cGF0aAogICAgICAgaWQ9InBhdGg4MzYiCiAgICAgICBzdHlsZT0ib3BhY2l0eToxO2ZpbGw6I2ZmZmZmZjtmaWxsLW9wYWNpdHk6MTtzdHJva2Utd2lkdGg6MS4wODc1NTtzdHJva2UtbGluZWpvaW46YmV2ZWw7c3Ryb2tlLWRhc2hvZmZzZXQ6MC43NSIKICAgICAgIGQ9Ik0gMy4xNzUsMC4xMzIyOTE2NyBWIDAuNzkzNzQ5OTkgSCAzLjkwMjYwNDEgViAxLjcxMTAwNjggQSAyLjU0Mzk0OTEsMi41NDM5NDkxIDAgMCAwIDIuNjgzNTU3MSwyLjIxNTg4NTUgTCAyLjAzNTAxNzksMS41NjczNDYzIDIuNTQ5NzE1MiwxLjA1MjY0OSAyLjA4MjA0MzUsMC41ODQ5NzcyMyAwLjU4NDk3NzIzLDIuMDgyMDQzNSAxLjA1MjY0OSwyLjU0OTcxNTMgMS41NjczNDYxLDIuMDM1MDE4IDIuMjE1ODg1NSwyLjY4MzU1NzIgQSAyLjU0Mzk0OTEsMi41NDM5NDkxIDAgMCAwIDEuNzExMDA2NywzLjkwMjYwNDIgSCAwLjc5Mzc0OTk5IFYgMy4xNzUwMDAxIEggMC4xMzIyOTE2NyBWIDUuMjkxNjY2NiBIIDAuNzkzNzQ5OTkgViA0LjU2NDA2MjUgSCAxLjcxMTAwNjcgQSAyLjU0Mzk0OTEsMi41NDM5NDkxIDAgMCAwIDIuMjE1ODg1NSw1Ljc4MzEwOTYgTCAxLjU2NzM0NjEsNi40MzE2NDg3IDEuMDUyNjQ5LDUuOTE2OTUxNiAwLjU4NDk3NzIzLDYuMzg0NjIzMiAyLjA4MjA0MzUsNy44ODE2ODkzIDIuNTQ5NzE1Miw3LjQxNDAxNzcgMi4wMzUwMTc5LDYuODk5MzIwNCAyLjY4MzU1NzEsNi4yNTA3ODE0IGEgMi41NDM5NDkxLDIuNTQzOTQ5MSAwIDAgMCAxLjIxOTA0NywwLjUwNDg3ODcgViA3LjY3MjkxNjcgSCAzLjE3NSBWIDguMzM0Mzc1MSBIIDUuMjkxNjY2NiBWIDcuNjcyOTE2NyBIIDQuNTY0MDYyNSBWIDYuNzU1NjYwMSBBIDIuNTQzOTQ5MSwyLjU0Mzk0OTEgMCAwIDAgNS43ODMxMDk1LDYuMjUwNzgxNCBMIDYuNDMxNjQ4Nyw2Ljg5OTMyMDQgNS45MTY5NTE1LDcuNDE0MDE3NyA2LjM4NDYyMzEsNy44ODE2ODkzIDcuODgxNjg5Miw2LjM4NDYyMzIgNy40MTQwMTc3LDUuOTE2OTUxNiA2Ljg5OTMyMDQsNi40MzE2NDg3IDYuMjUwNzgxMyw1Ljc4MzEwOTYgQSAyLjU0Mzk0OTEsMi41NDM5NDkxIDAgMCAwIDYuNzU1NjU5OSw0LjU2NDA2MjUgSCA3LjY3MjkxNjYgViA1LjI5MTY2NjYgSCA4LjMzNDM3NTEgViAzLjE3NTAwMDEgSCA3LjY3MjkxNjYgViAzLjkwMjYwNDIgSCA2Ljc1NTY1OTkgQSAyLjU0Mzk0OTEsMi41NDM5NDkxIDAgMCAwIDYuMjUwNzgxMywyLjY4MzU1NzIgTCA2Ljg5OTMyMDQsMi4wMzUwMTggNy40MTQwMTc3LDIuNTQ5NzE1MyA3Ljg4MTY4OTIsMi4wODIwNDM1IDYuMzg0NjIzMSwwLjU4NDk3NzIzIDUuOTE2OTUxNSwxLjA1MjY0OSA2LjQzMTY0ODcsMS41NjczNDYzIDUuNzgzMTA5NSwyLjIxNTg4NTUgQSAyLjU0Mzk0OTEsMi41NDM5NDkxIDAgMCAwIDQuNTY0MDYyNSwxLjcxMTAwNjggViAwLjc5Mzc0OTk5IEggNS4yOTE2NjY2IFYgMC4xMzIyOTE2NyBaIiAvPgogIDwvZz4KPC9zdmc+Cg==";
	
	const DEFAULT_DATASET_URL =
		"http://dati.toscana.it/dataset/843000c5-8d28-4426-bed3-54703399be06/resource/c472c0cb-4105-43b9-ae38-d66b88dc0107/download/covidars.csv";
		
	const DEFAULT_GRAPH_OPTIONS = [
		"positivi_att"		=> ["label" => "Positivi Attuali",		"type" => "",				"color" => "#A93226"],
		"positivi_perc"		=> ["label" => "Percentuale Positivi",	"type" => "",				"color" => "#CD6155"],
		"positivi_tot"		=> ["label" => "Positivi Totali",		"type" => "",				"color" => "#7B241C"],
		"positivi_inc_abs"	=> ["label" => "Incremento Positivi",	"type" => "BarWithLine",	"color" => "#A90000"],
		"ricoveri_tot"		=> ["label" => "Ricoveri Totali",		"type" => "",				"color" => "#6C3483"],
		"ricoveri_inc_perc"	=> ["label" => "Incremento Ricoveri %",	"type" => "BarWithLine",	"color" => "#A569BD"],
		"deceduti_tot"		=> ["label" => "Deceduti Totali",		"type" => "",				"color" => "#34495E"],
		"deceduti_inc_abs"	=> ["label" => "Incremento Deceduti",	"type" => "BarWithLine",	"color" => "#566573"],
		"deceduti_inc_perc"	=> ["label" => "Incremento Deceduti %",	"type" => "BarWithLine",	"color" => "#5D6D7E"],
		"letalita"			=> ["label" => "Letalità",				"type" => "",				"color" => "#17202A"],
		"dimessi"			=> ["label" => "Dimessi",				"type" => "",				"color" => "#117A65"],
		"tamponi"			=> ["label" => "Tamponi",				"type" => "",				"color" => "#2471A3"],
		"tamponi_inc"		=> ["label" => "Incremento Tamponi",	"type" => "BarWithLine",	"color" => "#5DADE2"]
	];
	
	const DEFAULT_PROVENCE_COLORS = [
		"AR" => ["color" => "#303F9F"],
		"FI" => ["color" => "#512DA8"],
		"GR" => ["color" => "#F57C00"],
		"LI" => ["color" => "#00796B"],
		"LU" => ["color" => "#C2185B"],
		"MS" => ["color" => "#616161"],
		"PI" => ["color" => "#FBC02D"],
		"PO" => ["color" => "#5D4037"],
		"PT" => ["color" => "#0097A7"],
		"SI" => ["color" => "#689F38"]
	];
	
	private function __construct() {
		add_action("admin_init", [$this, "register_settings"]);
		add_action("admin_enqueue_scripts", [$this, "enqueue_scripts"]);
		add_action("admin_menu", [$this, "create_menu"]);
	}
	
	public function register_settings() {
		if (!get_option("dataset_url")) {
			add_option("dataset_url", self::DEFAULT_DATASET_URL);
		}
		
		if (!get_option("graph_options")) {
			add_option("graph_options", self::DEFAULT_GRAPH_OPTIONS);
		}
		
		if (!get_option("provence_colors")) {
			add_option("provence_colors", self::DEFAULT_PROVENCE_COLORS);
		}
		
		register_setting("covid19toscana-settings", "dataset_url", [$this, "validate_dataset_url"]);
		register_setting("covid19toscana-settings", "graph_options", [$this, "validate_graph_options"]);
		register_setting("covid19toscana-settings", "provence_colors", [$this, "validate_provence_colors"]);
	}
	
	public function validate_dataset_url($option) {
		if (empty($option) || $option != esc_url_raw($option)) {
			add_settings_error(
			    "dataset_url",
			    "dataset-url-error",
			    "'$option' non è un url dataset valido"
			);
			
			$option = self::DEFAULT_DATASET_URL;
		}
		
		return $option;
	}
	
	public function validate_graph_options($option) {
		foreach ($option as $key => $value) {
			// LABEL
			$label = sanitize_text_field($value["label"]);
			
			if (empty($label)) {
				$label = self::DEFAULT_GRAPH_OPTIONS[ $key ]["label"];
			}
			
			$option[ $key ]["label"]= $label;
			
			// TYPE
			$type = sanitize_text_field($value["type"]);
			
			if ($type != "BarWithLine" && $type != "") {
				$type = self::DEFAULT_GRAPH_OPTIONS[ $key ]["type"];
			}
			
			$option[ $key ]["type"] = $type;
			
			// COLOR
			$color = $this->sanitize_color($value["color"]);
			
			if (empty($color)) {
				add_settings_error(
					"graph_options",
					"graph-options-error-${key}-color",
					"'$value[color]' non è un colore valido per $key"
				);
				
				$color = self::DEFAULT_GRAPH_OPTIONS[ $key ]["color"];
			}
			
			$option[ $key ]["color"] = $color;
		}
		
		return $option;
	}
	
	public function validate_provence_colors($option) {
		foreach ($option as $key => $value) {
			$color = $this->sanitize_color($value["color"]);
			
			if (empty($color)) {
				add_settings_error(
					"provence_colors",
					"provence-colors-error-$key",
					"'$value[color]' non è un colore valido per $key"
				);
				
				$color = self::DEFAULT_PROVENCE_COLORS[ $key ]["color"];
			}
			
			$option[ $key ]["color"] = $color;
		}
		
		return $option;
	}
	
	public function sanitize_color($color) {
		$color = trim($color);
		$color = sanitize_text_field($color);
		
		if (preg_match("/^#([0-9a-f]{6}|[0-9a-f]{3})$/i", $color) == 1) {
			return $color;
		} else {
			return "";
		}
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style("c19t-admin-page-style", C19T_PLUGIN_URL . "admin/css/style.css");
		wp_enqueue_style("wp-color-picker");
		wp_enqueue_script("c19t-color-picker-handle", C19T_PLUGIN_URL . "admin/js/color-picker-init.js", ["wp-color-picker"], false, true);
	}
	
	public function create_menu() {
		add_menu_page(
			"COVID-19 Toscana | Impostazioni",
			"COVID-19 Toscana",
			"manage_options",
			"covid19toscana-options",
			[$this, "display_menu_options"],
			self::ICON
		);
		
		add_submenu_page(
			"covid19toscana-options",
			"COVID-19 Toscana | Impostazioni",
			"Impostazioni",
			"manage_options",
			"covid19toscana-options"
		);
		
		add_submenu_page(
			"covid19toscana-options",
			"COVID-19 Toscana | Per Iniziare",
			"Per Iniziare",
			"edit_posts",
			"covid19toscana-start",
			[$this, "display_menu_start"]
		);
	}
	
	public function display_menu_options() {
		if (!current_user_can("manage_options")) {
			wp_die("You do not have sufficient permissions to access this page.");
		}
		
		$dataset_url = get_option("dataset_url");
		$graph_options = get_option("graph_options");
		$provence_colors = get_option("provence_colors");
		
		echo "<div class='wrap'>";
		settings_errors();
		echo "<h1>Impostazioni COVID-19 Toscana</h1>";
		echo "<form method='post' action='options.php'>";
		settings_fields("covid19toscana-settings");
		
		echo "<table class='form-table'>";
		echo "<th><label for='dataset_url'>Dataset URL</label></th>";
		echo "<td><input type='text' id='dataset_url' name='dataset_url' size='120' " .
				"value='" . esc_attr($dataset_url) . "'></td>";
		echo "</table>";
		echo "<p style='margin-top: -10px'>";
		echo "ATTENZIONE!! Dal 24 giugno, il Ministero della Salute ha modificato il sistema di rilevazione dei " .
			 "dati sulla diffusione del COVID-19. I casi positivi non sono più indicati secondo la provincia di " .
			 "notifica bensì in base alla provincia di residenza o domicilio ";
		echo "(<a href='http://dati.toscana.it/dataset/open-data-covid19' target='_blank'>info dataset</a>).";
		echo "</p>";
		
		echo "<h1>Stile Attributi</h1>";
		echo "<table class='list-form-table'>";
		echo "<tr><th>ID</th><th>LABEL</th><th>COLORE</th><th>TIPO</th></tr>";
		foreach ($graph_options as $key => $value) {
			echo "<tr>";
			
			echo "<th><label for='${key}-text-label'>${key}</label></th>";
			echo "<td><input id='${key}-text-label' type='text' name='graph_options[${key}][label]'" . 
					"value='" . esc_attr($value["label"]) . "'></td>";
			echo "<td><input class='color-field' type='text' name='graph_options[${key}][color]' " .
					"value='" . esc_attr($value["color"]) . "' " .
					"data-default-color='" . self::DEFAULT_GRAPH_OPTIONS[ $key ]["color"] . "'></td>";
			
			echo "<td>";
			echo "<span class='graph-type-container'>";
			echo "<input " . (empty($value["type"]) ? "checked='checked'" : "") . " id='${key}-type-line' " .
					"type='radio' name='graph_options[${key}][type]' value=''>";
			echo "<label for='${key}-type-line'>Linea</label>";
			echo "</span>";
			echo "<span class='graph-type-container'>";
			echo "<input " . (empty($value["type"]) ? "" : "checked='checked'") . " id='${key}-type-bar' " .
					"type='radio' name='graph_options[${key}][type]' value='BarWithLine'>";
			echo "<label for='${key}-type-bar'>Barra</label>";
			echo "</span>";
			echo "</td>";
			
			echo "</tr>";
		}
		echo "</table>";
		
		echo "<br>";
		
		echo "<h1>Colore Province</h1>";
		echo "<table class='list-form-table'>";
		echo "<tr><th>PROVINCIA</th><th>COLORE</th></tr>";
		foreach ($provence_colors as $key => $value) {
			echo "<tr>";
			
			echo "<th>${key}</th>";
			echo "<td><input class='color-field' type='text' " .
				 "name='provence_colors[${key}][color]' " .
				 "value='" .  esc_attr($value["color"]) . "' " .
				 "data-default-color='" . self::DEFAULT_PROVENCE_COLORS[ $key ]["color"] . "'></td>";
			
			echo "</tr>";
		}
		echo "</table>";
		
		submit_button();
		echo "</form>";
		echo "</div>";
	}
	
	public function display_menu_start() {
		if (!current_user_can("edit_posts")) {
			wp_die("You do not have sufficient permissions to access this page.");
		}
		
		?>

<div class='wrap covidtoscana-start'>
	<h1>Per Iniziare</h1>
	<p>
		Questo plugin permette di utilizzare tre shortcode per la visualizzazione di grafici sui dati COVID-19
		pubblicati da
		<a href='https://www.ars.toscana.it/chi-siamo.html' target='_blank'>ARS Toscana</a> al link
		<a href='http://dati.toscana.it/dataset/open-data-covid19' target='_blank'>
			dati.toscana.it/dataset/open-data-covid19
		</a>.<br>
		Di seguito sono elencati gli shortcode, i possibili valori da dare agli attributi sono elencati nell' ultima sezione.
	</p>
	<h2>Shortcode Toscana</h2>
	<p>
		<span class='code'>[grafico-toscana dati="..."]</span><br>
		
		Questo shortcode genera un grafico con i dati COVID-19 della Regione Toscana.<br>
		
		- <span class='code'>dati</span> può contenere un singolo valore o più valori separati da virgole
		(default: <span class='code'>positivi_tot, positivi_att, dimessi, deceduti_tot</span>).
	</p>
		<h4>Esempi</h4>
	<ul>
		<li>
			<span class='code'>[grafico-toscana]</span> o equivalentemente<br>
			<span class='code'>[grafico-toscana dati="positivi_tot, positivi_att, dimessi, deceduti_tot"]</span>
			<br>
			<img class='example-img' src='<?php echo C19T_PLUGIN_URL . "assets/toscana0.png"?>'
				 alt='grafico covid toscana generale' />
		</li>
		<li>
			<span class='code'>[grafico-toscana dati="tamponi"]</span>
			<br>
			<img class='example-img' src='<?php echo C19T_PLUGIN_URL . "assets/toscana1.png"?>'
				 alt='grafico covid toscana su tamponi' />
		</li>
		
	</ul>
	<br>
	
	<h2>Shortcode singola Provincia</h2>
	<p>
		<span class='code'>[grafico-provincia provincia="..." dati="..."]</span><br>
		Questo shortcode genera un grafico con i dati COVID-19 di una sola Provincia toscana.<br>
		
		- <span class='code'>provincia</span> deve contenere un solo valore
		(default: <span class='code'>FI</span>).<br>
		
		- <span class='code'>dati</span> può contenere un singolo valore o più valori separati da virgole
		(default: <span class='code'>positivi_tot, deceduti_tot</span>).
	</p>
		<h4>Esempi</h4>
	<ul>
		<li>
			<span class='code'>[grafico-provincia]</span> o equivalentemente<br>
			<span class='code'>[grafico-provincia provincia="FI" dati="positivi_tot, deceduti_tot"]</span>
			<br>
			<img class='example-img' src='<?php echo C19T_PLUGIN_URL . "assets/provincia0.png"?>'
				 alt='grafico covid Firenze generale' />
		</li>
		<li>
			<span class='code'>[grafico-provincia provincia="GR" dati="positivi_inc_abs"]</span>
			<br>
			<img class='example-img' src='<?php echo C19T_PLUGIN_URL . "assets/provincia1.png"?>'
				 alt='grafico covid Grosseto su incremento positivi' />
		</li>
	</ul>
	<br>
	
	<h2>Shortcode confronto tra Province</h2>
	<p>
		<span class='code'>[grafico-confronto-province dato="..." province="..."]</span><br>
		Questo shortcode genera un grafico che confronta un singolo dato COVID-19 su più province.<br>
		
		- <span class='code'>dato</span> deve contenere un solo valore 
		(default: <span class='code'>positivi_tot</span>).<br>
		
		- <span class='code'>province</span> può contenere un singolo valore o più valori separati da virgole
		(default: <span class='code'>AR, FI, GR, LI, LU, MS, PI, PO, PT, SI</span>).
	</p>
		<h4>Esempi</h4>
	<ul>
		<li>
			<span class='code'>[grafico-confronto-province]</span> o equivalentemente<br>
			<span class='code'>[grafico-confronto-province dato="positivi_tot", province="AR, FI, GR, LI, LU, MS, PI, PO, PT, SI"]</span>
			<br>
			<img class='example-img' src='<?php echo C19T_PLUGIN_URL . "assets/confronto0.png"?>'
				 alt='grafico di confronto sui positivi di tutte le province' />
		</li>
		<li>
			<span class='code'>[grafico-confronto-province dato="deceduti_tot" province="FI, PO"]</span>
			<br>
			<img class='example-img' src='<?php echo C19T_PLUGIN_URL . "assets/confronto1.png"?>'
				 alt='grafico di confronto Firenze e Prato su deceduti' />
		</li>
	</ul>
	<br><br>
	<h1>Valori Attributi</h1>
	I valori ammissibili per gli attributi <span class='code'>dato</span> e <span class='code'>dati</span> sono:
	<ul>
		<li><span class='code'>positivi_att<strong>*</strong></span>: casi di contagio positivi attuali sul territorio.</li>
		<li><span class='code'>positivi_perc</span>: numero di persone contagiate in rapporto all’intera popolazione del territorio.</li>
		<li><span class='code'>positivi_tot</span>: casi di contagio positivi cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.</li>
		<li><span class='code'>positivi_inc_abs</span>: incremento dei casi postivi giornalieri.</li>
		<li><span class='code'>ricoveri_tot<strong>*</strong></span>: ricoveri cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.</li>
		<li><span class='code'>ricoveri_inc_perc<strong>*</strong></span>: incremento percentuale del numero di ricoveri giornaliero.</li>
		<li><span class='code'>deceduti_tot</span>: numero di deceduti cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.</li>
		<li><span class='code'>deceduti_inc_abs</span>: morti registrati giornalieri.</li>
		<li><span class='code'>deceduti_inc_perc</span>: incremento percentuale del numero di morti giornaliero.</li>
		<li><span class='code'>letalita</span>: numero morti in rapporto al numero di positivi.</li>
		<li><span class='code'>dimessi<strong>*</strong></span>: numero di dimessi cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.</li>
		<li><span class='code'>tamponi<strong>*</strong></span>: numero di tamponi effettuati cumulativi a partire dal 24 Febbraio 2020 registrati sul territorio.</li>
		<li><span class='code'>tamponi_inc<strong>*</strong></span>: incremento percentuale del numero di tamponi giornaliero.</li>
	</ul>
	<strong>
		&#10148; Gli elementi contrassegnati da un <span class='code'>*</span> NON possono essere utilizzati nei grafici
		delle province, il grafico della Toscana può contenere tutti gli attributi.
	</strong>
	<br><br><br>
	I valori ammissibili per gli attributi <span class='code'>provincia</span> e <span class='code'>province</span> sono:
	<ul>
		<li><span class='code'>FI</span>: Provincia di Firenze.</li>
		<li><span class='code'>PI</span>: Provincia di Pisa.</li>
		<li><span class='code'>LU</span>: Provincia di Lucca.</li>
		<li><span class='code'>AR</span>: Provincia di Arezzo.</li>
		<li><span class='code'>LI</span>: Provincia di Livorno.</li>
		<li><span class='code'>PT</span>: Provincia di Pistoia.</li>
		<li><span class='code'>SI</span>: Provincia di Siena.</li>
		<li><span class='code'>PO</span>: Provincia di Prato.</li>
		<li><span class='code'>GR</span>: Provincia di Grosseto.</li>
		<li><span class='code'>MS</span>: Provincia di Massa-Carrara.</li>
	</ul>
</div>

		<?php
	}
}

C19T_Admin_Page::get_instance();

?>
