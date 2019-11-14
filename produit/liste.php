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
 
for($i=0;$i <count($produit);$i++){
    $nom=$produit[$i]['nom'];
    $prix=$produit[$i]['prix'];;
    $qte=$produit[$i]['quantite'];
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
     
                 
      ?>      
            </table>
        </div>
    </div>
</div>
</body>
</html>