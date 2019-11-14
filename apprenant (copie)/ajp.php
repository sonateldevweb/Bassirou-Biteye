<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter Promo</title>
</head>
<body>

<h2>ajouter</h2>
    
<form action="" method="post">
<input type="text" name="nom" placeholder="nom promo">Nom Promo</br>

<input type="month"  name="date" placeholder="mois et date">Date et mois</br>

<input type="submit" name = "ajouter" value="ajouter">

</form>

</body>
</html>

<?php

if(isset($_POST['ajouter'])){ 
$code=rand(0,500);
$nom=$_POST['nom'];
$date=$_POST['date'];
$id_file=fopen("promo.txt","a+");

    flock($id_file,2);
    $x=0;

    while ($tab=trim(fgets($id_file))) {
        $tab=explode("-",$tab);
        $i++;
        if($tab[0]==strtolower($code)){
            $t=true;
        }
        if($t==false){
            fwrite($id_file,$code."-".$nom."-".$date."-\n");
            fclose($id_file);
            flock($id_file,3);
        }else{
            echo '<p>Deux promo ne peuvent pas le même code</p>';
            die();
        }
    }


}
?>

</html>
