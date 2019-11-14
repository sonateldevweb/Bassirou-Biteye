<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdecole', 'root', '');
	$reponse=$bdd->query('select * from etudiant');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>