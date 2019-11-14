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
            <div class="container">
                    <div class="panel panel-info">
                        <div class="panel-heading">Formuaire d'Ajout de Produit</div>
                        <div class="panel-body">
                            <form method="post" action="">
                                
                                <div class="form-group">
                                    <label class="control-label">Libelle</label>
                                    <input class="form-control" type="text" name="nom" id="libelle" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Prix Unitaire</label>
                                    <input class="form-control" type="number" name="prix" required="required" min="100"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Quantite en Stock</label>
                                    <input class="form-control" type="number" name="qte"  required="required" min="1"/>
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="valider" value="Ajouter"/>
                                    <input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            
?>      
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
    
$produit= array(array('nom'=>'riz' ,'prix'=> '500','quantite'=>'5'),
        array('nom'=>'lait' ,'prix'=> '100','quantite'=> '500'),
        array('nom'=>'sucre' ,'prix'=> '600','quantite'=> '100'),
        array('nom'=>'cafe' ,'prix'=> '100','quantite'=> '03'),
        array('nom'=>'pantalon' ,'prix'=> '600','quantite'=> '10'),
        array('nom'=>'t-shirt' ,'prix'=> '100','quantite'=> '20'),
        array('nom'=>'chemise' ,'prix'=> '600','quantite'=> '100'),
        array('nom'=>'huil' ,'prix'=> '300','quantite'=> '100'));
        extract($_POST);
        
        if (isset($_POST['valider'])){
            for($i=0;$i <count($produit);$i++){
     
    }
for($i=0;$i <count($produit);$i++){
   
        
    $nom=$produit[$i]['nom'];
    $prix=$produit[$i]['prix'];;
    $qte=$produit[$i]['quantite'];
    if(strtolower($nom)==$_POST['nom']){
        die('Deux produits ne peuvent avoir le meme nom');
    }else{
        if($qte<=10){
            echo"<tr>";
            echo '<td style=background:red>'.$nom.'</td>';
            echo '<td style=background:red>'.$prix.'</td>';
            echo '<td style=background:red>'.$qte.'</td>';
            echo '<td style=background:red>'.$montant=($prix*$qte).'</td>';
                echo"<tr>";
        }else{
            echo"<tr>";
            echo '<td style=background:grey>'.$nom.'</td>';
            echo '<td style=background:grey>'.$prix.'</td>';
            echo '<td style=background:grey>'.$qte.'</td>';
            echo '<td style=background:grey>'.$montant=($prix*$qte).'</td>';
                echo"<tr>";
        }

    }
  
  
      }


       $mnt=($_POST['prix']*$_POST['qte']);
       echo"<tr style=background:grey>";
       echo '<td>'.$_POST['nom'].'</td>';
       echo '<td>'. $_POST['prix'].'</td>';
       echo '<td>'.$_POST['qte'].'</td>';
       echo '<td>'.$mnt.'</td>';
           echo"</tr>";
        }
     
                 
      ?>      
 
     
                 
        
            </table>
        </div>
    </div>
</div>
 
            
 
    </body>
</html>