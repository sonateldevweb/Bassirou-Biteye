<?php
include'acceuil.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    <title>modification de produit</title>
 
</head>
<body class="userac">
    <div class="container">

        </nav> <br>
        <form action="" method="post"> 
         <input type="text" name="Designation" placeholder="Designation" > 
        <input type="number" name="Quantite" placeholder="Qantite "> 
       <input type="number" name="prixunitaire" placeholder="  Prix-unitaire  " > 
        <input type="submit" value="modifier" name="ok" class="btn btn-success">
       
    </form>
   <br> <br>
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
                  
                </tr>
   
        <?php
 
 $monfichier=fopen('../liste.txt','r');
 while(!feof($monfichier)){
    $str=trim(fgets($monfichier));
    $l=explode(';',$str);
    $Designation=$l[0];
    $Quantite=$l[1];
    $prixunitaire=$l[2];
    $Montant=$l[3];

    if($Designation==$_POST["Designation"])
    {   
        $qt=$_POST['Quantite']*$_POST['prixunitaire'];
     
       $ligne=$_POST["Designation"].';'.$_POST['Quantite'].';'.$_POST['prixunitaire'].';'.$qt;
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
/* } */
  $monfichier=fopen('../liste.txt','r');
  while(!feof($monfichier)){
    //echo $str;
    $str=trim(fgets($monfichier));
    $l=explode(';',$str);
   
      $Designation=$l[0];
      $Quantite=$l[1];
      $prixunitaire=$l[2];
      $Montant=$l[3];

  
    if($Quantite<=10){$color="rgb(214, 18, 44)";}
    else{
        $color="";
        }
    
  

?>
 
    <tr style='background-color: <?php echo $color;?>'>
      <td> <?php echo $Designation;?></td>
      <td> <?php echo $Quantite;?></td>
      <td> <?php echo $prixunitaire;?></td>
      <td> <?php echo $Montant;?></td>
    </tr>
 
<?php
  } 
  fclose($monfichier);
?>
      </table>
    </div>
 </div>
</body>
</html>