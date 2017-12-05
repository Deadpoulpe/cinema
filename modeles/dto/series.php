<?php
class Series{
	private $Series= array();

	public function __construct($array){
		if (is_array($array)) {
			$this->Series = $array;
		}
	}

	public function getSeries(){
		return $this->Series;
	}

	public function chercheSerie($unIdSerie){
		$i = 0;
		while ($unIdSerie != $this->Series[$i]->getIdSerie() && $i < count($this->Series)-1){
			$i++;
		}
		if ($unIdSerie == $this->Series[$i]->getIdSerie()){
			return $this->Series[$i];
		}
	}




}
