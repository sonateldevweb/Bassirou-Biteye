<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#00ffff">
 <form action="" method="POST" bgcolor="">
 	<label>idet</label>
 	 <input type="number" name="f" min="1"><br>
 	<label>Nom</label>
    <input type="text" name="a"><br>
    <label>Prenom</label>
    <input type="text" name="b"><br>
     <label>SEXE</label>
    <select name="c">
    	 <option>M</option>
        <option>F</option>
    </select><br>
    <label>Date de Naissance</label>
    <input type="date" name="d"><br>
  
     <label>Message</label>
    <textarea cols="20" rows="5" name="e"></textarea><br>
    <LABEL>idcl</LABEL>
    <select name="idclv">
      <?php
     include'connexion.php';

         $req="select * from classe ";
         $exe=executesql($req);
         while($ligne=mysqli_fetch_array($exe))
         {
          extract($ligne);
          echo"<option value='$idcl'>$libel</option>";
         }

 

  ?>
       
    </select><br>
    <input type="submit" name="ok">
 </form>
 <?php 
   extract($_POST);
  // $photo=$_POST['photo'];
    if (isset($ok)) {
    	$req= "insert into etudiant values('$f','$a','$b','$c','$d','$e','$idcl')";
    	executesql($req);
    }
 ?>
</body>
</html>