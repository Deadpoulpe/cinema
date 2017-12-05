<?php

require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';


if(isset($_GET['menuPrincipalC'])){
	$_SESSION['menuPrincipalC']= $_GET['menuPrincipalC'];
}
else
{
	if(!isset($_SESSION['menuPrincipalC'])){
		$_SESSION['menuPrincipalC']="film";
	}
}

$menuPrincipal = new Menu("menuPrincipal");

$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("film",  "images/film.png" , "Film"));
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("serie",  "images/serie.png" , "Serie"));


include_once dispatcher::dispatch($_SESSION['menuPrincipalC']);
