<?php 
require("index.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/ajout.css">
</head>
<body>



<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col">code</th>
      <th scope="col">Nom Promo</th>
      <th scope="col">Date</th>
      <th scope="col">nombre d'apprenants</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($id_file=fopen("promo.txt","r")) 
{
 
    while(!feof($id_file)){
        $tab=trim(fgets($id_file));
        $tab=explode(";",$tab);
        $file=fopen("apprenant.txt","r");
       
          $i=0;
            while(!feof($file))
            {
                $t=trim(fgets($file));
                $t=explode(";",$t);
                if($tab[0]==$t[6])
                {
               
                    $i++;
                  $tab[3]=$i;
                 if($t[7]==exclu){
                   $i--;
                   $tab[3]=$i;
                 }
                }else
                $tab[3]=0;
            }
            
            echo"<tr>";
            echo '<td >'.$tab[0].'</td>';
            echo '<td >'.$tab[1].'</td>';
            echo '<td >'.$tab[2].'</td>';
            echo '<td >'.$tab[3].'</td>';
            echo"</tr>"; 
            
        fclose($file);
    }
    
fclose($id_file);

}
?>

  </tbody>
</table>

</body>
</html>