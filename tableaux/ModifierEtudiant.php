 <?php
  extract($_GET);
  include 'connexion.php';
  $sql="select * from etudiant where idet=$id";
  $exe=executesql($sql);
 while( $ligne=mysqli_fetch_array($exe)) {
  	extract($ligne);
  } 
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body  bgcolor="">
 <form action="" method="POST" bgcolor="red">
 	<label>Nom</label>
    <input type="text" name="nom" value= > <br>
    <label>Prenom</label>
    <input type="text" name="Prenom" value= ><br>
     <label>SEXE</label>
    <select name="Sexe">
    	 <option>M</option>
        <option>F</option>
    </select><br>
    <label>Date de Naissance</label>
    <input type="date" name="date"><br>
  
     <label>Message</label>
    <textarea cols="20" rows="5" name="e"></textarea><br>
    <LABEL>idcl</LABEL>
    <select name="idclv">
      <?php
   
         $req="select * from classe ";
         $exe=executesql($req);
         while($ligne=mysqli_fetch_array($exe))
         {
          extract($ligne);
          echo"<option value='$idcl'>$libel</option>";
         }

 

  ?>
       
    </select><br>
    <input type="submit" name="ok" >
 </form>
 <?php 
   extract($_POST);
  
  // $photo=$_POST['photo'];
    if (isset($ok)) {
    	$req= "update etudiant set nom='$nom',prenom='$Prenom',sexe='$Sexe',date='date'
    	where idet=$id";
       	executesql($req);
       	//echo $req;
       	header("location:afficheetudiant.php");
    }
    
 ?>
</body>
</html>