<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="">
		 <label>idclasse</label>
		  <input type="text" name="a">
		 <p>
		 	 <label>libel</label>
		  <input type="text" name="b">
		 </p>
		  <p>
		  	<input type="submit" name="ok">
		  </p>
	</form>
  <?php 
     include 'connexion.php';
     extract($_POST);
      if (isset($ok)) {
      	 $req="insert into classe values('$a','$b')";
      	 executesql($req);
      }
  ?>
</body>
</html>