 

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST">
	<label>nom</label>
	<input type="text" name="nom">
<input type="submit" name="ok" value="rechercher">
</form>

<?php
 if(isset($_POST['ok'])) { ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="brown">


<table border="2"bgcolor="#00ffff" width="50%" height="50%" >
	<tr bgcolor="#ff0000">
		<td>idet</td>
		<td>nom</td>
		<td>prenom</td>
		<td>sexe</td>
		<td>date naissance</td>
		<td>Modifier</td>
		<td>Supprimer</td>

	</tr>
	<?php
     include'connexion.php';
     extract($_POST);
      	 $req="select * from etudiant where nom='$nom' ";
      	 $exe=executesql($req);
      	 while($ligne=mysqli_fetch_array($exe))
      	 {
      	 	extract($ligne);
			echo"<tr>";
			echo"<td>$idet</td>";
			echo"<td>$nom</td>";
			echo"<td>$prenom</td>";
			echo"<td>$sexe</td>";
			echo"<td>$date</td>";
			
			echo"<td><a href='ModifierEtudiant.php?id=$idet'>Modifier</a></td>";
			echo"<td><a href='supprimerEtudiant.php?id=$idet'>X</a></td>";
			echo"</tr>";
      	 }

     
  ?>
</table>
</body>
</html>
<?php } ?>
</body>
</html>
