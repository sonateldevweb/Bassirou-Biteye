<?php

extract($_GET);
//var_dump($_GET);


if (isset($_POST['ok'])) {
  $nomm = $_POST['nomm'];
  $codem = $_POST['codem'];
  $datem = $_POST['datem'];

  $monfichier = fopen('promo.txt', 'r');

  while (!feof($monfichier)) {
    $tab = trim(fgets($monfichier));
    $tab = explode(';', $tab);


    $code = $tab[0];
    $nom = $tab[1];
    $date = $tab[2];


    if ($code == $codem) {


      $tmp = $codem . ";" . $nomm . ";" . $datem . ";\n";
    } else {

      $tmp = $tab[0] . ";" . $tab[1] . ";" . $tab[2] . ";\n";
    }
    $test = $test . $tmp;
  }
  fclose($monfichier);

  $file = fopen("promo.txt", "w+");
  fwrite($file, trim($test));
  fclose($file);
  header("location:ajoutpromo.php?c=$code");
}
function verifyInput($var)
{
  $var = trim($var);
  $var = stripcslashes($var);
  $var = htmlspecialchars($var);

  return $var;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Liste</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/ajout.css">
</head>

<body>
<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Sonatel Academy</strong> <a href="exclure.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-list"></i> apprenant</a></div>

<div class="container">



<div class="card">

  <div class="card-header"><i class="fa fa-fw fa-edit"></i> <strong>Edit Promo</strong> <a href="ajoutpromo.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> liste promo</a></div>

  <div class="card-body">



    <div class="col-sm-6">

      <h5 class="card-title">modification <span class="text-danger">*</span> de promo!</h5>

      <form method="post">

        <div class="form-group">

          <input type="text" name="codem" hidden value="<?php echo $_GET['code']; ?>" />
        </div>

        <div class="form-group">

          <label>nom promo</label>
          <input type="text" name="nomm" placeholder="nom" value="<?php echo $_GET['nom']; ?>" />
        </div>

        <div class="form-group">

          <label>date promo</label>
          <input type="month" name="datem" value="<?php echo $_GET['date']; ?>" />
        </div>

        <div class="form-group">


          <button type="submit" name="ok" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update promo</button>

        </div>

      </form>

    </div>

  </div>

</div>

</div>
</body>

</html>
