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
echo $_GET['prix'];
echo $_GET['qte'];
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
                                    <input class="form-control" type="number" name="prixp" required="required" min="100" value="<?php echo $_GET['prix']; ?> "/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Quantite en Stock</label>
                                <input class="form-control" type="number" name="qtep"  required="required" min="1" value="<?php echo $_GET['qte']; ?> "/>
                                </div> 
                                
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="valider" value="Modifier"/>
                                    <input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
      extract($_POST);           
 $monfichier=fopen('../liste.txt','r');
 while(!feof($monfichier)){
    $str=trim(fgets($monfichier));
    $l=explode(';',$str);
    $Designation=$l[0];
    $Quantite=$l[1];
    $prixunitaire=$l[2];
    $Montant=$l[3];

    if($Designation==$_POST["nomp"])
    {   
        $qt=$_POST['qtep']*$_POST['prixp'];
     
       $ligne=$_POST["nomp"].';'.$_POST['qtep'].';'.$_POST['prixp'].';'.$qt;
      /*  echo $ligne; */
    }
    else{
        $ligne= $str;
       }
    $az=$az.$ligne."\n";
 }

 fclose($monfichier);


$monfichier=fopen('../liste.txt','w+');
fwrite($monfichier,trim($az));
fclose($monfichier); 

?>


                <div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">liste des Produits</div>
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
$id_file=fopen("../liste.txt","r");
    while(!feof($id_file)){
        $tab=trim(fgets($id_file));
        $tab=explode(";",$tab);
if($tab[2]<=10){
echo "<tr> <td style=background:red> $tab[0] </td>
 <td style=background:red> $tab[1] </td> 
 <td style=background:red> $tab[2] </td>  
 <td style=background:red> $tab[3] </td> 
 <td><a href='update.php?nom=$tab[0]&prix=$tab[1]&qte=$tab[2]' class='btn btn-success'>modifier</a></td>
 </tr>"; 
}else
{
    echo "<tr> <td > $tab[0] </td>
 <td > $tab[1] </td> 
 <td > $tab[2] </td>  
 <td > $tab[3] </td> 
 <td><a href='update.php?nom=$tab[0]&prix=$tab[1]&qte=$tab[2]' class='btn btn-success'>modifier</a></td>
 </tr>";
}

}
fclose($id_file);



?>
    </table>
        </div>
    </div>
</div>         
</body>
</html>