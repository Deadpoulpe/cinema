<?php
class DBConnex extends PDO{

	private static $instance;

	public static function getInstance(){
		if ( !self::$instance ){
			self::$instance = new DBConnex();
		}
		return self::$instance;
	}

	function __construct(){
		try {
			parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
		} catch (Exception $e) {
			echo $e->getMessage();
			die("Impossible de se connecter. " );
		}
	}

	public function __destruct(){
		if(!is_null(self::$instance)){
			self::$instance = null;
		}
	}


	public function queryFetchAll($sql){
		$sth  =$this->query($sql);

		if ( $sth ){
			return $sth -> fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}


	public function queryFetchFirstRow($sql){
		$sth    = $this->query($sql);
		$result    = array();

		if ( $sth ){
			$result  = $sth -> fetch();
		}

		return $result;
	}


	public function insert($sql){
		if ( $this -> exec($sql) > 0 ){
			return 1;
			//$this->lastInsertId();
		}
		return false;
	}

	public function update($sql){
		return $this->exec($sql) ;
	}

	public function delete($sql){
		return $this->exec($sql) ;
	}
}



class FilmsDAO{


	public static function lire(Film $film){
		$sql = "select * from film where idfilm = " . $film->getIdFilm();
		$equipe = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return $equipe;
	}





	public static function lesFilms(){
		$result = [];
		$sql = "select * from film order by nomFilm " ;
		$liste = DBConnex::getInstance()->queryFetchAll($sql);
		if(!empty($liste)){
			foreach($liste as $film){
				$unFilm = new film($film['idFilm'],$film['nomFilm'] );
				$unFilm->hydrate($film);
				$result[] = $unFilm;
			}
		}
		return $result;
	}
}

	class SeriesDAO{


		public static function lire(Serie $Serie){
			$sql = "select * from Serie where idSerie = " . $Serie->getIdSerie();
			$equipe = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return $equipe;
		}





		public static function lesSeries(){
			$result = [];
			$sql = "select * from Serie order by nomSerie " ;
			$liste = DBConnex::getInstance()->queryFetchAll($sql);
			if(!empty($liste)){
				foreach($liste as $Serie){
					$unSerie = new Serie($Serie['idSerie'],$Serie['nomSerie'] );
					$unSerie->hydrate($Serie);
					$result[] = $unSerie;
				}
			}
			return $result;
		}


}
