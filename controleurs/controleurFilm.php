<?php

/*****************************************************************************************************
 * Instancier un objet contenant la form des équipes et le conserver dans une variable de session
 *****************************************************************************************************/



/*****************************************************************************************************
 * Conserver dans une variable de session l'item actif du menu Film
 *****************************************************************************************************/
if(isset($_GET['film'])){
	$_SESSION['film']= $_GET['film'];
}
else
{
	if(!isset($_SESSION['film'])){
		$_SESSION['film']="0";
	}
}


/*****************************************************************************************************
 * Créer un menu vertical à partir de la form des équipes
 *****************************************************************************************************/
$menuFilm = new menu("menuFilm");


foreach (FilmsDAO::lesFilms() as $unFilm){
	$menuFilm->ajouterComposant($menuFilm->creerItemLien($unFilm->getNomFilm() ,$unFilm->getIdFilm()));
}

$leMenuFilm = $menuFilm->creerMenufilm($_SESSION['film']);






$formFilm = new formulaire("","","formFilm","afficheFilm");
$listeFilm = new Films(FilmsDAO::lesFilms());
$i=1;
foreach ($listeFilm->getFilms() as $unFilm){
		$formFilm->ajouterComposantLigne($formFilm->concactComposants($formFilm->creerInputImage($unFilm->getNomFilm(),$unFilm->getIdFilm(),"images/film".$unFilm->getNomFilm()),	$formFilm->creerLabel($unFilm->getNomFilm())),1);
		if ($i%5==0) {
		$formFilm->ajouterComposantTab();
	}
		$i+=1;

}
$formFilm->ajouterComposantTab();
$formFilm->creerFormulaire();

include_once 'vues/squeletteFilm.php';
