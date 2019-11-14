<?php
include'acceuil.php';
?>
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
<?php
 extract($_GET);
//var_dump($_GET['nom']);
//echo $_GET['prix'];
//echo $_GET['qte'];
 ?>

  <div class="container">
                    <div class="panel panel-info">
                        <div class="panel-heading">Formuaire de modification</div>
                        <div class="panel-body">
                            <form method="post" action="update.php">
                                
                                <div class="form-group">
                                    <label class="control-label">Libelle</label>
                                    <input class="form-control" type="text" name="nomp" required="required" value="<?php echo $_GET['nom']; ?> "/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Prix Unitaire</label>
                                    <input class="form-control" type="text" name="prixp" required="required" min="100"value="<?php echo $_GET['prix']; ?> "/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Quantite en Stock</label>
                                <input class="form-control" type="text" name="qtep"  required="required" min="1" value="<?php echo $_GET['qte']; ?> "/>
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="valider" value="Modifier"/>
                                    <input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    <td>Action</td>
                </tr>
                <?php
    
    $produit= array(array('nom'=>'riz' ,'prix'=> '500','quantite'=>'5'),
    array('nom'=>'lait' ,'prix'=> '100','quantite'=> '500'),
    array('nom'=>'sucre' ,'prix'=> '600','quantite'=> '100'),
    array('nom'=>'cafe' ,'prix'=> '100','quantite'=> '03'),
    array('nom'=>'pantalon' ,'prix'=> '600','quantite'=> '10'),
    array('nom'=>'t-shirt' ,'prix'=> '100','quantite'=> '20'),
    array('nom'=>'chemise' ,'prix'=> '600','quantite'=> '100'),
    array('nom'=>'huil' ,'prix'=> '300','quantite'=> '100'));
            extract($_POST);
for($i=0;$i <count($produit);$i++){

 
    if(isset($_POST['valider'])){
        if(strtolower($nom)==$produit[$i]['nom']){
            echo '<p style=color:red> Deux produits ne peuvent avoir le meme nom</p>';
        }
        if(preg_match('#[0-9]{5}#',$cp))
{
   echo 'ok';
}
        if($_GET['nom']==$nom && $_GET['prix']==$prix&& $_GET['qte']==$qte){
    
        $nom=$_POST['nomp'];
        $prix=$_POST['prixp'];
        $qte=$_POST['qtep'];
        $montant=($prix*$qte);
        }else{
            $nom=$produit[$i]['nom'];
            $prix=$produit[$i]['prix'];
            $qte=$produit[$i]['quantite'];
            $modif=$produit[$i]['modif'];
        }
    }
  
   if($qte<=10){
        echo"<tr>";
        echo '<td style=background:red>'.$nom.'</td>';
        echo '<td style=background:red>'.$prix.'</td>';
        echo '<td style=background:red>'.$qte.'</td>';
        echo '<td style=background:red>'.$montant=($prix*$qte).'</td>';
        echo"<td><a href='update.php?nom=$nom&prix=$prix&qte=$qte' class='btn btn-success'>modifier</a></td>";
        echo"<tr>";
            echo"<tr>";
    }else{
        echo"<tr>";
        echo '<td style=background:grey>'.$nom.'</td>';
        echo '<td style=background:grey>'.$prix.'</td>';
        echo '<td style=background:grey>'.$qte.'</td>';
        echo '<td style=background:grey>'.$montant=($prix*$qte).'</td>';
        echo"<td><a href='update.php?nom=$nom&prix=$prix&qte=$qte' class='btn btn-success'>modifier</a></td>";
        echo"<tr>";
            echo"<tr>";
    }

     
}
?>  
     
                 
         
            </table>
        </div>
    </div>
</div>

</body>
</html>