<?php
$ini = parse_ini_file('app.ini');

$port = $ini['db_host'];
$hote = $ini['db_host'];
$nom_bdd = $ini['db_name'];
$utilisateur = $ini['db_user'];
$mot_de_passe = $ini['db_password'];
try
{
	$cnx = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bdd,$utilisateur,$mot_de_passe);
}
// affichage de l'erreur en cas de mauvaise connexion à la base de données MySQL
catch (Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'</br/>';
	echo 'N° : '.$e->getCode();
}
?>