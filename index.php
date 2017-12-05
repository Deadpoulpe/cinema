<?php
require_once 'fonctions/autoload.php';
session_start()?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Site Cinéma</title>
		<style type="text/css">
			@import url(styles/cinema.css);
		</style>
	</head>
	<body>
		<?php
			include_once 'controleurs/controleurPrincipal.php';
		?>
	</body>
</html>
