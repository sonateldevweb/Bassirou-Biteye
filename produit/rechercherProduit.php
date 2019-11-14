<?php
include'acceuil.php';

?>  
<!DOCTYPE HTML>
<html> 
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
 
<body>

<div>
<form action="rechercherProduit.php" method="post">

<label control-label class="control-label">quantite</label>
 <input type="number" name="qte" value="<?php echo $_POST['qte']; ?> ">
 <label control-label class="control-label">prix max</label>
 <input type="number" name="min">
 <label control-label class="control-label">prix min</label>
  <input type="number" name="max">
<input class="btn btn-success" type="submit" value="rechercher" name="ok">
</form>
</div>
    <div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Liste des Produits</div>   
        <div class="panel-body">
            <table class="table table-bordered table-striped ">
                <tr>
                   
                    <td>Libelle</td>
                    <td>Prix Unitaire</td>
                    <td>Quantite en Stock</td>
                    <td>Montant total</td>                
                    
                </tr>
                <?php
                extract($_POST);
$produit= array(array('nom'=>'riz' ,'prix'=> '500','quantite'=>'5'),
array('nom'=>'lait' ,'prix'=> '100','quantite'=> '500'),
array('nom'=>'sucre' ,'prix'=> '600','quantite'=> '100'),
array('nom'=>'cafe' ,'prix'=> '100','quantite'=> '03'),
array('nom'=>'pantalon' ,'prix'=> '600','quantite'=> '10'),
array('nom'=>'t-shirt' ,'prix'=> '100','quantite'=> '20'),
array('nom'=>'chemise' ,'prix'=> '600','quantite'=> '100'),
array('nom'=>'huil' ,'prix'=> '300','quantite'=> '100'));

for($i=0;$i <count($produit);$i++){
    $nom=$produit[$i]['nom'];
    $prix=$produit[$i]['prix'];
    $qte=$produit[$i]['quantite'];
     if (isset($_POST['ok'])){
        if (empty($_POST["qte"])&&empty($_POST["min"])&&empty($_POST["max"])) {
            echo "<h3 style=color:red>renseigner au moins un champ</h3>";
            exit;
          }
        if($_POST['qte']<=$qte  && empty($_POST["min"])&& empty($_POST["max"])){
           
            if($qte<=10){
                echo "<tr>";
                echo '<td style=background-color:red>'.$nom.'</td>';
                echo '<td style=background-color:red>'.$prix.'</td>';
                echo '<td style=background-color:red>'.$qte.'</td>';
                echo '<td style=background-color:red>'.$montant=($prix*$qte).'</td></tr>';  
            }else{
             
                echo "<tr><td>".$nom.'</td>';
                echo '<td>'.$prix.'</td>';
                echo '<td>'.$qte.'</td>';
                echo '<td>'.$montant=($prix*$qte).'</td>';
                echo"</tr>";
           
        }
    }else if($_POST['max']>=$prix  && empty($_POST["qte"]) && empty($_POST["min"])){
     
        if($qte<=10){
            echo "<tr>";
            echo '<td style=background-color:red>'.$nom.'</td>';
            echo '<td style=background-color:red>'.$prix.'</td>';
            echo '<td style=background-color:red>'.$qte.'</td>';
            echo '<td style=background-color:red>'.$montant=($prix*$qte).'</td></tr>';  
        }else{
         
            echo "<tr><td>".$nom.'</td>';
            echo '<td>'.$prix.'</td>';
            echo '<td>'.$qte.'</td>';
            echo '<td>'.$montant=($prix*$qte).'</td>';
            echo"</tr>";
       
    }
}
else if($_POST['min']<=$prix  && empty($_POST["qte"]) && empty($_POST["max"])){
     
    if($qte<=10){
        echo "<tr>";
        echo '<td style=background-color:red>'.$nom.'</td>';
        echo '<td style=background-color:red>'.$prix.'</td>';
        echo '<td style=background-color:red>'.$qte.'</td>';
        echo '<td style=background-color:red>'.$montant=($prix*$qte).'</td></tr>';  
    }else{
     
        echo "<tr><td>".$nom.'</td>';
        echo '<td>'.$prix.'</td>';
        echo '<td>'.$qte.'</td>';
        echo '<td>'.$montant=($prix*$qte).'</td>';
        echo"</tr>";
   
}
}

else if($_POST['max']>=$prix  && $_POST['min']<=$prix  &&empty($_POST["qte"])){
     
    if($qte<=10){
        echo "<tr>";
        echo '<td style=background-color:red>'.$nom.'</td>';
        echo '<td style=background-color:red>'.$prix.'</td>';
        echo '<td style=background-color:red>'.$qte.'</td>';
        echo '<td style=background-color:red>'.$montant=($prix*$qte).'</td></tr>';  
    }else{
     
        echo "<tr><td>".$nom.'</td>';
        echo '<td>'.$prix.'</td>';
        echo '<td>'.$qte.'</td>';
        echo '<td>'.$montant=($prix*$qte).'</td>';
        echo"</tr>";
   
}
}else if($_POST['max']>=$prix  && $_POST['min']<=$prix  && $_POST["qte"]<=$qte){
     
    if($qte<=10){
        echo "<tr>";
        echo '<td style=background-color:red>'.$nom.'</td>';
        echo '<td style=background-color:red>'.$prix.'</td>';
        echo '<td style=background-color:red>'.$qte.'</td>';
        echo '<td style=background-color:red>'.$montant=($prix*$qte).'</td></tr>';  
    }else{
     
        echo "<tr><td>".$nom.'</td>';
        echo '<td>'.$prix.'</td>';
        echo '<td>'.$qte.'</td>';
        echo '<td>'.$montant=($prix*$qte).'</td>';
        echo"</tr>";
   
}
}

    }

}

      ?>      
      </table>
        </div>
    </div>
</div>

</body>
</html>