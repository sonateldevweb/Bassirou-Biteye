<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../style/style.css" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="topnav">
  <a class="active" href="acceuil.php">Home</a>
  <a href="liste.php">liste</a>
  <a href="ajout.php">ajout</a>
  <a href="modifier.php">update</a>
  <a href="supprimer.php">supprimer</a>
  <a href="rechercher.php">rechercher</a>
  <div class="search-container">
  <a href="../index.php?logout" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
  </div>
</div>
<?php
session_start();
if (empty($_SESSION['nom']))
{
	header("location:index.php");
}


echo'<h3>Bienvenue  '. $_SESSION['nom'].'   vous etes connectés en tant que Utilisateur';
?>
</body>
</html>
