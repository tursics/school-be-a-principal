<?php
	// php function to convert csv to json format
	// see https://www.kodingmadesimple.com/2016/04/convert-csv-to-json-using-php.html
	function csvToJson($fname) {
		// open csv file
		if (!($fp = fopen($fname, 'r'))) {
			die("Can't open file...");
		}

		//read csv headers
		$key = fgetcsv($fp,"1024",",");

		// parse csv rows into array
		$json = array();
			while ($row = fgetcsv($fp,"1024",",")) {
			$json[] = array_combine($key, $row);
		}

		// release file handle
		fclose($fp);

		// encode array to json
		return json_encode($json);
	}

	$url = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vSw9Gcow-XwpzVW2iiJOpd3KCLuf9lqeJrjL6PYOk0a2Du09I-mvqWyI1V_sm3iYyEMXs-hrEQCGA03/pub?gid=0&single=true&output=csv';

	header("Access-Control-Allow-Origin: *");
	print_r(csvToJson($url));
?>