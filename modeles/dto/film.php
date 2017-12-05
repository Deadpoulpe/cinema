<?php
class Film{
	private $idFilm;
	private $nomFilm;


	public function __construct($unIdFilm = NULL , $unNomFilm = NULL){
		$this->idFilm = $unIdFilm;
		$this->nomFilm = $unNomFilm;
	}

	public function getIdFilm(){
		return $this->idFilm;
	}

	public function getNomFilm(){
		return $this->nomFilm;
	}
	public function setNomFilm($unNomFilm){
		$this->nomFilm = $unNomFilm;
	}


	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}



}
