
<?php
  
  $name  = $date = "";
    $$nameError = $dateError = "";
    $isSuccess= false;
   
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       
        $name=verifyInput($_POST['name']);
        $code=verifyInput($_POST['code']);
        $date=verifyInput($_POST['date']);
        $isSuccess= true;
        if(empty($name))
        {
            $nameError="Et oui je veux tout savoir. Meme le nom";
        }
        
      
       
        if(empty($date))
        {
            $messageError=" je veux connaitre le moi du promo aussi ?";
            $isSuccess= false;
        }
        if($isSuccess)


        {$ran=rand(0,500);
            if($id_file=fopen("promo.txt","a+"))
            {
            flock($id_file,2); 
            $x=0;
            //$code=rand($et,$i);
            while($tab=trim(fgets($id_file))){
                $tab=explode(";",$tab);
                $i++;
                if ($tab[0]==strtolower($code)) {
                    $t=true; 
                }
                 
                if($t==false)
                 {
                    fwrite($id_file,$ran.";".$name.";".$date.";\n");
                fclose($id_file); 
                flock($id_file,3);
            
                } else{
                    echo '<p style=color:red> Deux promo  ne peuvent avoir le meme code</p>';
                   die();
                }  
            }
            }
            else {echo "Fichier inaccessible";
            }
            header("location:listepromo.php");
        }
    }
   
  
     function verifyInput($var){
         $var = trim($var);
         $var= stripcslashes($var);
         $var= htmlspecialchars($var);

         return $var;
    
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>ajout</title>
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
<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Sonatel Academy</strong> <a href="exclure.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-list"></i> apprenant</a></div>

<div class="col-sm-12">

<h5 class="card-title"><i class="fa fa-fw fa-plus-circle"></i> ajout promo</h5>

<form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

  <div class="row">

    <div class="col-sm-2">

      <div class="form-group">

        <label>Nom</label>
        <input type="text" class="form-control" placeholder="nom promo" name="name">
            <p class="comments"><?php echo $nameError; ?></p>

      </div>

    </div>

    <div class="col-sm-2">

      <div class="form-group">

        <label>date</label>

        <input type="month" class="form-control" placeholder="donner le moi "name="date">
            <p class="comments"><?php echo $dateError; ?></p>
      </div>

    </div>

   
    <div class="col-sm-4">

      <div class="form-group">

        <label>&nbsp;</label>

        <div>

          <button type="submit" name="submit" value="ajouter" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>ajouter</button>

          <a href="" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>

        </div>

      </div>

    </div>

  </div>

</form>

</div>

</div>
<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>code promo</th>
						<th>nom promo</th>
						<th>date prom</th>
						<th>nombre d'apprenant</th>
						<th class="text-center">Action</th>
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
                 
                }else
                $tab[3]=0;
            }
               echo "<tr>";
          echo '<td >' . $tab[0] . '</td>';
          echo '<td >' . $tab[1] . '</td>';
          echo '<td >' . $tab[2] . '</td>';
          echo '<td >' . $tab[3] . '</td>';
          echo "<td align='center'><a href='modifpromo.php?code=$tab[0]&nom=$tab[1]&date=$tab[2]' $c class='text-primary'><i class='fa fa-edit'></i> Edit</a></td>";
          echo "</tr>";
            
            
        fclose($file);
    }
    
fclose($id_file);

}
?>

									</tbody>
			</table>
        </div>

</body>
</html>
<div>
