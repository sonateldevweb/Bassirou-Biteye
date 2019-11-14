<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <form action="" method="POST">
	 	<fieldset>
    		<legend>connect-vous</legend>
    		 <center>
    		 	<p>
    		 		<label>Login</label>
    		 		<input type="text" name="a">
    		 	</p>
    		 	<p>
    		 		<label>password</label>
    		 		<input type="password" name="b">
    		 	</p>
    		 	<p>
    		 		 <input type="submit" name="ok" value="connexion">
    		 	</p>
    		 </center>
    	</fieldset>
	 </form>
<?php
  extract($_POST);
  $personne[0] = array('login'=>'admin' ,'pwd'=> 'admin','prenom'=> 'nino','nom'=> 'wane',/*'datenais'=> '01/12/1984'*/);
  $personne[1] = array('login'=>'voir' ,'pwd'=> 'passer2','prenom'=> 'Ali','nom'=> 'ba',/*'datenais'=> '01/01/1996'*/);
  $personne[2] = array('login'=>'test' ,'pwd'=> '709244670','prenom'=>'houssein','nom'=> 'diba',/*'datenais'=> '01/01/2000'*/);
$personne[3]=array('login'=>'chuck' ,'pwd'=> 'libangamal@','prenom'=>'houssein','nom'=> 'Thiandoume',/*'datenais'=> '01/01/1970'*/);
 //print_r($personne);
echo "<table border=1>";
echo"<tr><td>Login</td><td>Pwd</td><td>Prenom</td><td>Nom</td><td>Date de Naissance</td><td>Age</td></tr>";
    if (isset($_POST['ok'])) {
    foreach($personne as $p) { 
  if ($a==$p['login'] && $b==$p['pwd']){
     echo"<tr><td>".$p['login']."</td><td>".$p['pwd']."</td><td>".$p['prenom']."</td><td>".$p['nom']."</td></tr>";
 }
 
}

}
 /* if (isset($_POST['ok'])) {
  $age= floor((time()- strtotime($datenais))/3600/24/365);dia
   echo $age;
  }*/
 
?>

</body>
</html>