<?php

/*****************************************************************************************************
 * Instancier un objet contenant la liste des équipes et le conserver dans une variable de session
 *****************************************************************************************************/
if(!isset($_SESSION['listeSerie'])){
	$_SESSION['listeSerie'] = new Series(SeriesDAO::lesSeries());

}

/*****************************************************************************************************
 * Conserver dans une variable de session l'item actif du menu equipe
 *****************************************************************************************************/
if(isset($_GET['Serie'])){
	$_SESSION['Serie']= $_GET['Serie'];
}
else
{
	if(!isset($_SESSION['Serie'])){
		$_SESSION['Serie']="0";
	}
}


/*****************************************************************************************************
 * Créer un menu vertical à partir de la liste des équipes
 *****************************************************************************************************/
$menuSerie = new menu("menuSerie");


foreach ($_SESSION['listeSerie']->getSeries() as $unSerie){
	$menuSerie->ajouterComposant($menuSerie->creerItemLien($unSerie->getNomSerie() ,$unSerie->getIdSerie()));
}

$leMenuSerie = $menuSerie->creerMenuFilm($_SESSION['Serie']);



/*****************************************************************************************************
 * Récupérer l'équipe sélectionnée
 *****************************************************************************************************/
/*$SerieActif = $_SESSION['listeSerie']->chercheSerie($_SESSION['Serie']);*/





include_once 'vues/squeletteSerie.php';
