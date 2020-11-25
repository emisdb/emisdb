<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;


use Yii;
/**
 * Description of CSVParser
 *
 * @author emisd
 */
class CSVParser {
	protected $file;
	protected $delimiter;

	public function __construct($filename, $delimiter) {
		$this->file = $filename;
		$this->delimiter = $delimiter;

	}
		public function parse(){
			if(!file_exists($this->file) || !is_readable($this->file))
				return FALSE;

			$header = NULL;
			$data = array();
			if (($handle = fopen($this->file, 'r')) !== FALSE)
			{
				while (($row = fgetcsv($handle, 1500, $this->delimiter)) !== FALSE)
				{
					if(!$header)
						$header = $row;
					else
						$data[] = array_combine($header, $row);
//						$data[] = $row;
				}
				fclose($handle);
			}
			return $data;
	}

}
