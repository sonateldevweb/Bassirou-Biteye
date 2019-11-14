
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
    $nom=$_GET['nom'];
    $prix=$_GET['prix'];
    $qte=$_GET['qte'];
  //  echo $nom;
  $tab1="";
$del="";
     $id_file=fopen("../liste.txt","r");

while(!feof($id_file)){

    $lign=fgets($id_file);
    $tab=explode(";",$lign);
    
    if($nom==$tab[0]){
         $del="";
        
    }else
    {
        $del=$lign;
        //echo $del;
    }
    $tab1=$tab1.$del;
    //$tab1 = array($tab);
    }
   
    fclose($id_file);
    $file=fopen("../liste.txt","w+");
    fwrite($file,trim($tab1));
   fclose($file); 

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
                        <td><a href='supprimerliste.php?nom=$tab[0]&prix=$tab[1]&qte=$tab[2]' class='btn btn-danger'>supprimer</a></td>
                        </tr>"; 
                        }else
                        {
                            echo "<tr> <td > $tab[0] </td>
                        <td > $tab[1] </td> 
                        <td > $tab[2] </td>  
                        <td > $tab[3] </td> 
                        <td><a href='supprimerliste.php?nom=$tab[0]&prix=$tab[1]&qte=$tab[2]' class='btn btn-danger'>supprimer</a></td>
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