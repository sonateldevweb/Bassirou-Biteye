<?php


$code = $firstname = $name = $email = $phone = $message =  $date = $promo = "";
$codeError = $firstnameError = $nameError = $emailError = $phoneError = $dateError = "";

$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $code = verifyInput($_POST['code']);
  $name = verifyInput($_POST['name']);
  $firstname = verifyInput($_POST['firstname']);
  $email = verifyInput($_POST['email']);
  $phone = verifyInput($_POST['phone']);
  $date = $_POST['date'];
  $promo = verifyInput($_POST['promo']);
  $isSuccess = true;

  if (empty($name)) {
    $nameError = "Et oui je veux tout savoir. Meme le nom";
    $isSuccess = false;
  }
  if (empty($firstname)) {
    $nameError = "Et oui je veux tout savoir. Meme le prenom";
    $isSuccess = false;
  }
  if (empty($code)) {
    $codeError = " je veux connaitre le code de l'apprenant !";
    $isSuccess = false;
  }

  if (empty($date)) {
    $dateError = " je veux connaitre ta date de naissance ?";
    $isSuccess = false;
  }
  if (!isEmail($email)) {
    $emailError = "T'essais de me rouler ? C'est pas un email ca";
    $isSuccess = false;
  }

  if (!isPhone($phone)) {
    $messageError = "Que des chiffres et des espaces,stp...";
    $isSuccess = false;
  }


  if ($isSuccess) {
    $status = 'accepté';
    $monfichier = fopen('apprenant.txt', 'r');

    while (!feof($monfichier)) {
      $tab = trim(fgets($monfichier));
      $tab = explode(';', $tab);


      $codee = $tab[0];



      if ($codee == $code) {


        $tmp = $code . ";" . $firstname . ";" . $name . ";" . $date . ";" . $phone . ";" . $email . ";" . $promo . ";" . $status . ";\n";
      } else {

        $tmp = $tab[0] . ";" . $tab[1] . ";" . $tab[2] . ";" . $tab[3] . ";" . $tab[4] . ";" . $tab[5] . ";" . $tab[6] . ";" . $tab[7] . ";\n";
      }
      $test = $test . $tmp;
    }
    fclose($monfichier);

    $file = fopen("apprenant.txt", "w+");
    fwrite($file, trim($test));
    fclose($file);
  }
}
function verifyInput($var)
{
  $var = trim($var);
  $var = stripcslashes($var);
  $var = htmlspecialchars($var);

  return $var;
}
function isEmail($var)
{
  return filter_var($var, FILTER_VALIDATE_EMAIL);
}
function isPhone($var)
{
  return preg_match("/^[0-9 ]*$/", $var);
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
  <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Sonatel Academy</strong> <a href="ajoutpromo.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-list"></i> promo</a></div>





  <div class="container">



    <div class="card">

      <div class="card-header"><i class="fa fa-fw fa-edit"></i> <strong>lite</strong> <a href="exclure.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> liste apprenant</a></div>

      <div class="card-body">



        <div class="col-sm-6">

          <h5 class="card-title">modification <span class="text-danger">*</span> d'apprenant!</h5>

          <form method="post">

            <div class="form-group">

              <input type="text" name="code" class="form-control" hidden placeholder="" value="<?php echo $_GET['code']; ?>">

            </div>
            <div class="form-group">
              <label for="fisrtname">Prenom<span class="blue"> *</span></label>
              <input type="text" name="firstname" class="form-control" placeholder="Votre Prenom" value="<?php echo $_GET['prenom']; ?>">
              <p class="comments"><?php echo $firstnameError; ?></p>
            </div>
            <div class="form-group">
              <label for="name">Nom<span class="blue"> *</span></label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Votre Nom" value="<?php echo $_GET['nom']; ?>">
              <p class="comments"><?php echo $nameError; ?></p>
            </div>

            <div class="form-group">
              <label for="email">Email<span class="blue"> *</span></label>
              <input type="email" name="email" class="form-control" placeholder="Votre Email" value="<?php echo $_GET['email']; ?>">
              <p class="comments"><?php echo $emailError; ?></p>
            </div>

            <div class="form-group">
              <label for="phone">Telephone<span class="blue"> *</span></label>
              <input type="tel" name="phone" class="form-control" placeholder="Votre Téléphone" value="<?php echo $_GET['tel']; ?>">
              <p class="comments"><?php echo $phoneError; ?></p>
            </div>
            <div class="form-group">
              <label>date de naissance</label>
              <input type="date" class="form-control" placeholder="donner le moi " name="date" value="<?php echo $_GET['date']; ?>">
              <p class="comments"><?php echo $dateError; ?></p>
              <p></p>
            </div>
            <div class="form-group">
              <label>promo</label>
              <select class="form-control" name="promo">
                <?php
                if ($id_file = fopen("promo.txt", "r")) {
                  while (!feof($id_file)) {
                    $tab = fgets($id_file);
                    $tab = explode(";", $tab);
                    echo "<option value=$tab[0]>$tab[1]</option>";
                  }
                  fclose($id_file);
                }
                ?>

              </select>

            </div>

            <div class="form-group">


              <button type="submit" value="Modifier" name="ok" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> modifier</button>

            </div>

          </form>

        </div>

      </div>

    </div>

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
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($id_file = fopen("apprenant.txt", "r")) {

        while (!feof($id_file)) {
          $tab = trim(fgets($id_file));
          $tab = explode(";", $tab);


          echo "<tr> 
<td > $tab[0] </td>
<td > $tab[1] </td> 
<td > $tab[2] </td>
<td > $tab[3] </td>
<td > $tab[4] </td> 
<td > $tab[5] </td> 
<td > $tab[6] </td>
<td > $tab[7] </td> 
<td > $tab[8] </td> ";
          echo "<td><a href='modifapp.php?code=$tab[0]&nom=$tab[1]&prenom=$tab[2]&date=$tab[3]&tel=$tab[4]&email=$tab[5]&promo=$tab[6]' class='btn btn-success'>modifier</a></td>";
          echo "</tr> ";
        }
        fclose($id_file);
      }
      ?>

    </tbody>
  </table>

</body>

</html>