<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <form action="" method="POST">
	 	 <label>Nom</label>
	 	 <p>
	 	 	<input type="text" name="nom">
	 	 	<input type="date" name="datenais">
	 	 	<input type="submit" name="ok">
	 	 </p>
	 </form>
<?php
  extract($_REQUEST);
  $personne[0] = array('login'=>'admin' ,'pwd'=> 'passer','prenom'=> 'nino','nom'=> 'wane',/*'datenais'=> '01/12/1984'*/);
  $personne[1] = array('login'=>'admin' ,'pwd'=> 'passer','prenom'=> 'Ali','nom'=> 'ba',/*'datenais'=> '01/01/1996'*/);
  $personne[2] = array('login'=>'admin' ,'pwd'=> 'passer','prenom'=>'houssein','nom'=> 'diba',/*'datenais'=> '01/01/2000'*/);
 $personne[3] = array('login'=>'admin' ,'pwd'=> 'passer','prenom'=>'houssein','nom'=> 'Thiandoume',/*'datenais'=> '01/01/1970'*/);
 //print_r($personne);
echo "<table border=1>";
echo"<tr><td>Login</td><td>Pwd</td><td>Prenom</td><td>Nom</td><td>Date de Naissance</td><td>Age</td></tr>";
 foreach  ($personne as $p) { 
 	if ($_POST['nom']==$p['nom']) 
echo"<tr><td>".$p['login']."</td><td>".$p['pwd']."</td><td>".$p['prenom']."</td><td>".$p['nom']."</td><td>" .$datenais."</td><td>"
.$age."</td></tr>";
 }
 /* if (isset($_POST['ok'])) {
  $age= floor((time()- strtotime($datenais))/3600/24/365);
   echo $age;
  }*/
 
?>

</body>
</html>
