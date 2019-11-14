<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<p>
		 	 <label>matricule</label>
		  <input type="text" name="c">
		 </p>
		 <label>nom</label>
		  <input type="text" name="a">
		 <p>
		 	 <label>prenom</label>
		  <input type="text" name="b">
		 </p>
		  <p>
		  	<input type="submit" name="ok">
		  </p>
	</form>
  <?php
     include'connexion.php';
     extract($_POST);
      if (isset($ok)) {
      	 $req="insert into classe values('$a','$b','$c')";
      	 executesql($req);
      }
  ?>
</body>
</html>
