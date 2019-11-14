

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/ajout.css">
</head>
<body>
<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>sonatel academy</strong> <a href="ajoutpromo.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-list"></i> promo</a></div>

<div class="col-sm-12">

<h5 class="card-title"><i class="fa fa-fw fa-list"></i>  apprenant</h5>

<form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

  <div class="row">

    
   
    <div class="col-sm-4">

      <div class="form-group">

        <label>&nbsp;</label>

        <div>

        <a href="inscrire.php" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>inscrire</button>
          <a href="modifapp.php" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i>Modifier</button>
          <a href="listeapprenant.php" class="btn btn-primary"><i class="fa fa-fw fa-list"></i>apprenant par promo </a>


        </div>

      </div>

    </div>

  </div>

</form>

</div>

<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col">code</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Date de Naissance</th>
      <th scope="col">Telephone</th>
      <th scope="col">Email</th>
      <th scope="col">Promo</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if($id_file=fopen("apprenant.txt","r")) 
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
        <td > $tab[6] </td>
        
        <td>";
         if($tab[7]==accepté){
             echo "<a href=modif.php?code=$tab[0] $c class='btn btn-success'>accepté</a>";
         } else if($tab[7]==exclu){
           echo "<a href=modif.php?code=$tab[0]  $c class='btn btn-danger'>exclu</a>";
         }
         
        echo  "</td> 
         </tr> ";
}
fclose($id_file);
}
?>

  </tbody>
</table>

</body>
</html>
