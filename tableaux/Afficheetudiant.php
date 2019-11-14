


    
<!DOCTYPE html>
<html>
<title>GESTECH</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 


<meta charset="utf-8">
<style type="">
  html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}



* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}


ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}


/* Container for flexboxes */
section {
    display: -webkit-flex;
    display: flex;
}

article {
    -webkit-flex: 3;
    -ms-flex: 3;
    flex: 3;
    background-color: #f1f1f1;
    padding: 10px;
}

/* Style the footer */
footer {
    background-color: #777;
    padding: 10px;
    text-align: center;
    color: white;
}


@media (max-width: 600px) {
    section {
      -webkit-flex-direction: column;
      flex-direction: column;
    }
}
</style>



</head>
<body style="background-image :url('img/img2.jpg');background-attachment: fixed;">


<header>

  <nav>
     
<ul>
  <li><a href="acceuil.php">Home</a></li>

  <li style="float:right"><a class="active" href="logout.php">deconnecter</a></li>
</ul>
      

  </nav>
</header>

<section>
 <aside>
    <div class="w3-container w3-content" style="max-width:300px;margin-top:60px">    
 
      <!-- Profile -->
      <div class="w3-card w3-round "style="background-color:#12d9ea;">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
        
         <?php
     include'connexion.php';
         session_start();
         $req="select * from utilisateurs where login='".$_SESSION['login']."'";
         $exe=executesql($req);
         while($ligne=mysqli_fetch_array($exe))
         {//
          extract($ligne);

         //echo"<p ><img src='$photo'</p>";
         echo "<p ><img src='$photo' class='w3-circle' style='height:120px;width:120px' alt='Avatar'></p>";
         
            
      echo"$prenom";
      echo "    ";
      echo"$nom";
    
         }

     
  ?>
         <hr>
      
         
        </div>
      </div>
      <br>
       <div class="w3-container w3-content" style="max-width:300px;margin-top:60px">
                                          
  <div class="dropdown" >
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">parametres
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="http://localhost/tech/ajoutnature.php">ajout nature</a></li>
      <li><a href="http://localhost/tech/fournisseur.php">ajout fournisseur</a></li>
      <li><a href="http://localhost/tech/ajoutclient.php">ajout client</a></li>
            <li><a href="http://localhost/tech/ajoutproduit.php">ajout produit</a></li>
            <li><a href="http://localhost/tech/produit.php"> produit</a></li>
            <li><a href="http://localhost/tech/nature.php">nature</a></li>
            <li><a href="http://localhost/tech/affichclient.php">client</a></li>
            <li><a href="http://localhost/tech/affichefour.php">founisseur</a></li>
    </ul>
  </div>
</div>
      <div class="w3-container w3-content" style="max-width:300px;margin-top:60px">
                                          
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">service
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="achat.php">achat</a></li>
      <li><a href="vente.php">vente</a></li>
      <li><a href="recherv.php">reglement vente</a></li>
            <li><a href="rechera.php">reglement achat</a></li>
    </ul>
  </div>
</div>
<div class="w3-container w3-content" style="max-width:300px;margin-top:60px">
                                         
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Etat
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="stockprod.php">stock de produit</a></li>
      <li><a href="credit.php">credit fournisseur</a></li>
      <li><a href="creance.php">creances clients</a></li>
      <li><a href="histovente.php">histogramme vente</a></li>
      <li><a href="montantv.php">montant vente</a></li>
      <li><a href="montanta.php">montant achat</a></li>
      <li><a href="recherf.php">imprimer des facturs vente</a></li>
    </ul>
  </div>
</div>

    

         </aside>
         <aside style="max-width:1000px;text-align:center;margin-top:50px;height:400px; margin: auto;">
         
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

      	 $req="select * from etudiant ";
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
  </aside>
      
         
     
      

  
 
</section>

<footer>
  <p>Footer</p>
</footer>

</body>
</html>




