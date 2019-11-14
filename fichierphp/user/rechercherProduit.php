<?php
include'acceuil.php';

?>  
<!DOCTYPE HTML>
<html> 
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.form-inline {  
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

.form-inline label {
  margin: 5px 10px 5px 0;
}

.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

#blue {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
  cursor: pointer;
}

#blue {
  background-color: royalblue;
}

@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }
  
  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
 
<body>

<div>
 
<form class="form-inline" action="rechercherProduit.php" method="post">
 
  <label >quantite:</label>
  <input type="number" placeholder="quantite" name="qte">
  <label >prix min:</label>
  <input type="number" placeholder="prix min" name="min">
  <label>prix max:</label>
  <input type="number" placeholder="prix max" name="max">
 
  <input id="blue" type="submit" name="ok" value="Rechercher">
</form>
</div>
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
                extract($_POST);
               
                $file=fopen("../liste.txt","r");
                $name= $_POST['nom'];
               
                if(isset($_POST['ok'])){
                  if (empty($_POST["qte"])&&empty($_POST["min"])&&empty($_POST["max"])) {
                    echo "<h3 style=color:red>renseigner au moins un champ</h3>";
                    exit;
                  }
                  
      while(!feof($file)){
                    $lign=trim(fgets($file));
                    $tab=explode(";",$lign);
                  
                       if($_POST['qte']<=$tab[2] &&empty($_POST["min"])&&empty($_POST["max"])){
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
                         else  if($_POST['max']>=$tab[1]&&empty($_POST["min"])&&empty($_POST["qte"])){
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
                          else if($_POST['min']<=$tab[1]&&empty($_POST["qte"])&&empty($_POST["max"])){
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
                          else if($_POST['min']<=$tab[1] && $_POST['max']>=$tab[1]&&empty($_POST["qte"])){
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
                           else if($_POST['qte']==$tab[2]  && $_POST['min']<=$tab[1]&& $_POST['max']>=$tab[1]){
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
                   
                    fclose($file);
           }
          }  
                
                  
              
                
            
      ?>      
      </table>
        </div>
    </div>
</div>

</body>
</html>