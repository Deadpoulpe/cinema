<?php
class Films{
	private $films= array();

	public function __construct($array){
		if (is_array($array)) {
			$this->Films = $array;
		}
	}

	public function getFilms(){
		return $this->Films;
	}

	public function chercheFilm($unIdFilm){
		$i = 0;
		while ($unIdFilm != $this->Films[$i]->getIdFilm() && $i < count($this->Films)-1){
			$i++;
		}
		if ($unIdFilm == $this->Films[$i]->getIdFilm()){
			return $this->Films[$i];
		}
	}



}
