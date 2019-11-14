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
                            <form method="post" action="ajout.php">
                                
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
if(isset($_POST['valider'])) 
{
$nom=$_POST['nom'];
$prix=$_POST['prix'];
$qte=$_POST['qte'];
$mnt=$prix*$qte;
//echo "<h2> $prix $nom $qte $mnt </h2> ";
$t=false;
if($id_file=fopen("../ste.txt","a+"))
{
flock($id_file,2); 
$x=0;

while($tab=fgets($id_file)){
    $tab=explode(";",$tab);
    $i++;
   
    if ($tab[0]==strtolower($nom)) {
        $t=true; 
    }
    if($t==false)
    {
    fwrite($id_file,$nom.";".$prix.";".$qte.";".$mnt."\n");
    fclose($id_file); 
    flock($id_file,3);

    } else{
        echo '<p style=color:red> Deux produits ne peuvent avoir le meme nom</p>';
        break;
    }
}
}
else {echo "Fichier inaccessible";}
}

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
if($id_file=fopen("../liste.txt","r")) 
{

$i=0;
while($tab=fgetcsv($id_file,200,";") ) 
{
$i++;
if($tab[2]<=10){
echo "<tr style=background:red> <td > $tab[0] </td>
 <td > $tab[1] </td> 
 <td > $tab[2] </td>  
 <td > $tab[3] </td> 
 </tr>"; 
}else
{
    echo "<tr> <td > $tab[0] </td>
 <td > $tab[1] </td> 
 <td > $tab[2] </td>  
 <td > $tab[3] </td> 
 </tr>";
}
echo "<tr>  </tr> ";
}
fclose($id_file);
}





?>
    </table>
        </div>
    </div>
</div>
    
    </body>
</html>