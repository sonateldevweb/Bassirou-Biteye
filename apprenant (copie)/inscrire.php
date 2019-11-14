<?php


$firstname = $name = $email = $phone = $message =  $date = $promo = "";
$firstnameError = $nameError = $emailError = $phoneError = $dateError = "";

$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        $firstnameError = "Et oui je veux tout savoir. Meme le prenom";
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
        $code = 'apprenant_' . rand(0, 500);
        if ($id_file = fopen("apprenant.txt", "a+")) {
            flock($id_file, 2);
            $x = 0;

            while ($tab = trim(fgets($id_file))) {
                $tab = explode(";", $tab);
                $i++;
                if ($tab[0] == strtolower($code)) {
                    $t = true;
                }

                if ($t == false) {
                    fwrite($id_file, $code . ";" . $firstname . ";" . $name . ";" . $date . ";" . $phone . ";" . $email . ";" . $promo . ";" . $status . ";\n");
                    fclose($id_file);
                    flock($id_file, 3);
                } else {
                    echo '<p style=color:red> Deux apprenant   ne peuvent avoir le meme code</p>';
                    die();
                }
            }
        } else {
            echo "Fichier inaccessible";
        }
        header("location:exclure.php");
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
    <title>ajout apprenant</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/ajout.css">
</head>

<body>
    <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>sonatel academy</strong> <a href="ajoutpromo.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> promo</a></div>

    <div class="container">



        <div class="card">

            <div class="card-header"><i class="fa fa-fw fa-edit"></i> <strong>lite</strong> <a href="exclure.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> liste apprenant</a></div>

            <div class="card-body">



                <div class="col-sm-6">

                    <h5 class="card-title">modification <span class="text-danger">*</span> de promo!</h5>

                    <form method="post">

                        <div class="form-group">
                            <input type="text" name="code" class="form-control" hidden placeholder="" value="<?php echo $code; ?>">

                        </div>
                        <div class="form-group">
                            <label for="fisrtname">Prenom<span class="blue"> *</span></label>
                            <input type="text" name="firstname" class="form-control" placeholder="Votre Prenom" value="<?php echo $firstname; ?>">
                            <p class="comments"><?php echo $firstnameError; ?></p>
                        </div>
                        <div class="form-group">

                            <label for="name">Nom<span class="blue"> *</span></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Votre Nom" value="<?php echo $name; ?>">
                            <p class="comments"><?php echo $nameError; ?></p>
                        </div>

                        <div class="form-group">

                            <label for="email">Email<span class="blue"> *</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Votre Email" value="<?php echo $email; ?>">
                            <p class="comments"><?php echo $emailError; ?></p>
                        </div>

                        <div class="form-group">

                            <label for="phone">Telephone<span class="blue"> *</span></label>
                            <input type="tel" name="phone" class="form-control" placeholder="Votre Téléphone" value="<?php echo $phone; ?>">
                            <p class="comments"><?php echo $phoneError; ?></p>
                        </div>
                        <div class="form-group">
                            <label>date de naissance</label>
                            <input type="date" class="form-control" placeholder="donner le moi " name="date">
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


                            <button type="submit" value="Ajouter" name="ok" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> ajout apprenant</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


</body>

</html>