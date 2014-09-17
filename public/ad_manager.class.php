<?php

class adManager {

	public $datafile = "";

	public __construct($datafile = "ads.csv") {

		$this->datafile = $datafile;
	}

	public function load_ads () {

		$ads = [];

		$handle = fopen($this->datafile, 'r');
		while(!feof($handle)){
        	$row = fgetcsv($handle);
            if(is_array($row)){
                $ads[] = $row;
            }
    	}
    	fclose($handle);
    	return $ads;
	}

	public function save_ads ($array) {

        $handle = fopen($this->datafile, 'w');

        fputcsv($handle,$array);

        fclose($handle);
 	}
}