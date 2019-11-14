<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />
</head>
<body>

<div class="topnav">
  <a class="active" href="acceuil.php">Home</a>
  <a href="liste.php">liste</a>
  <a href="ajout.php">ajout</a>
  <a href="updateliste.php">update</a>
  <a href="supprimer.php">supprimer</a>
  <a href="rechercherProduit.php">recherche</a>
 
  <div class="search-container">
    <form action="index.php">
   
      <button type="submit"><i class="fa fa-sign-out">sign out</i></button>
    </form>
  </div>
</div>

<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>

</body>
</html>
