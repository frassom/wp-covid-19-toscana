<?php

if (!defined("ABSPATH")) {
	die;
}

class C19T_CSV_Reader {
	private $index = 0;
	private $file;
	private $row;
	private $loc;
	
	function __construct($url) {
		$url = esc_url_raw($url);
		$request = wp_safe_remote_get($url);
		
		if (is_wp_error($request)) {
		    throw new Exception("Unable to perform request from: $url");
		}
		
		$body = wp_remote_retrieve_body($request);
		
		$this->file = explode("\n", $body);
		$this->file = preg_replace("/[^0-9a-z_\.\-\/\|]/i", "", $this->file);
		
		
		// Parse header
		
		if (!$this->next()) {
			throw new Exception("Empty csv file submitted");
		}
		
		foreach ($this->row as $idx => $value) {
			$this->loc[ $value ] = $idx;
		}
		
		if (count($this->loc) < 1) {
			throw new Exception("Invalid csv format");
		}
	}
	
	function next() {
		do {
			$line = $this->file[ $this->index ];
			$this->index++;
		} while (empty($line) && $this->index < count($this->file));
		
		if (!empty($line)) {
			$this->row = str_getcsv($line, "|");
			
			if (isset($this->loc) && count($this->row) !== count($this->loc)) {
				throw new Exception("Missing element(s) at row " . ($this->index - 1));
			}
			
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function get($id) {
		if (is_numeric($id)) {
			$result = $this->row[ $id ];
		} else {
			if (!isset($this->loc[ $id ])) {
				throw new Exception("Trying to access non existing field '$id'");
			}
			
			$result = $this->row[ $this->loc[ $id ] ];
		}
		
		if (empty($result)) {
			$result = 0;
		}
		
		return $result;
	}
}

?>
