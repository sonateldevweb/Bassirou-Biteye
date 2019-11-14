<!DOCTYPE html>
<html>
<head>
	<title>connecter</title>
</head>
<body>
  <form method="POST">
  <p>
  	<label>login</label>
  	<input type="text" name="a">
  </p>
  <p>
  	<label>password</label>
  	<input type="password" name="b">
  </p>
  <input type="submit" name="ok">
  </form>
  <?php
  include 'connexion.php';
  extract($_POST && isset($ok));
  if ($b!=int(8)) {
  	echo "veuillez mettre votre mote de passe plus de 8 chiffre";
  }
  else{
  	 if (isset($ok)) {
  	 $t="insert into test values('$a','$b')";
  	  executesql($t);
  }
  }
  ?>
</body>
</html>