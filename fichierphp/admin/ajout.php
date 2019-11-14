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
                        <div class="panel-heading">Formuaire d'Ajout d'utilisateur</div>
                        <div class="panel-body">
                            <form method="post" action="ajout.php" >
                            <div class="form-group">
                                    <label class="control-label">nom</label>
                                    <input class="form-control" type="text" name="nom" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">login</label>
                                    <input class="form-control" type="text" name="login" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">mot de passe</label>
                                    <input class="form-control" type="password" name="password" required="required" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">telephone</label>
                                    <input class="form-control" type="number" name="tel"  required="required" min="1"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">adresse</label>
                                    <input class="form-control" type="text" name="adresse" required="required"/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="sel1" name="etat">
                                  <option>bloquer</option>
                                  <option>actif</option>
                                   </select>
                    
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio1">
                                        <input type="radio" class="form-check-input" id="radio1" name="status" value="admin" checked>admin
                                    </label>
                                    </div>
                                    <div class="form-check-inline">
                                    <label class="form-check-label" for="radio2">
                                        <input type="radio" class="form-check-input" id="radio2" name="status" value="user">user
                                    </label>
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
$login=$_POST['login'];
$password=$_POST['password'];
$tel=$_POST['tel'];
$adresse=$_POST['adresse'];
$etat=$_POST['etat'];
$status=$_POST['status'];
$t=false;
$tr=false;
if($id_file=fopen("../index.txt","a+"))
{
flock($id_file,2); 
$x=0;

while($tab=trim(fgets($id_file))){
    $tab=explode(";",$tab);
    $i++;
    if ($tab[0]==strtolower($login)) {
        $t=true; 
    }
     if ($tab[4]==$tel) {
        $tr==true;
       
    }
    if($t==false && $tr==false)
     {
        fwrite($id_file,$login.";".$password.";".$nom.";".$tel.";".$adresse.";".$status.";".$etat.";\n");
    fclose($id_file); 
    flock($id_file,3);

    }  if($t=true){
        echo '<p style=color:red> Deux utilisateur  ne peuvent avoir le meme login</p>';
       exit;
    }   if($tr=true){
        echo '<p style=color:red> Deux utilisateur  ne peuvent avoir le meme numero</p>';
       exit;
    }
}
}
else {echo "Fichier inaccessible";}
}

?>
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