<?php
include'index.php';
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
        <div class="panel-heading">Liste des utilisateurs</div>
        <div class="panel-body">
        <table class="table table-bordered table-striped ">
                <tr>
                   
                    <td>Login</td>
                    <td>Password</td>
                    <td>Nom</td>
                    <td>Telephone</td>                
                    <td>Addresse</td> 
                    <td>status</td> 
                    <td>Etat</td> 
                       
                </tr>
        <?php
if($id_file=fopen("../index.txt","r")) 
{

    while(!feof($id_file)){
        $tab=trim(fgets($id_file));
        $tab=explode(";",$tab);

  
echo "<tr> 
<td > $tab[0] </td>
<td > $tab[1] </td> 
<td > $tab[2] </td>  
<td > $tab[3] </td> 
<td > $tab[4] </td> 
<td > $tab[5] </td> 
<td>";
 if($tab[6]==actif){
     echo "<a href=modif.php?login=$tab[0] class='btn btn-success'>actif</a>";
 } else if($tab[6]==bloquer){
   echo "<a href=modif.php?login=$tab[0] class='btn btn-danger'>bloquer</a>";
 }
 
echo  "</td> 
 </tr> ";
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