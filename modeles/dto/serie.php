<?php
class Serie{
	private $idSerie;
	private $nomSerie;


	public function __construct($unIdSerie = NULL , $unNomSerie = NULL){
		$this->idSerie = $unIdSerie;
		$this->nomSerie = $unNomSerie;
	}

	public function getIdSerie(){
		return $this->idSerie;
	}

	public function getNomSerie(){
		return $this->nomSerie;
	}
	public function setNomSerie($unNomSerie){
		$this->nomSerie = $unNomSerie;
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
