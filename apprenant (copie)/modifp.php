<?php
require("index.php");
extract($_GET);
//var_dump($_GET);


if (isset(POST['ok'])) {
  $nomm = $_POST['nomm'];
  $codem = $_POST['codem'];
  $datem = $_POST['datem'];
  $monfichier = fopen('promo.txt', 'r');
  while (!feof($monfichier)) {
    $str = trim(fgets($monfichier));
    $l = explode(';', $str);
   /*  $code = $l[0];
    $nom = $l[1];
    $date = $l[2];
 */

    if (strcasecmp($l[0], $nomm) == 0) {

      var_dump($nomm);
      $ligne = $codem . ';' . $nomm . ';' . $datem . "\n";
    } else {
      $ligne = $str;
    }
    $az = $az . $ligne . "\n";
  }

  fclose($monfichier);


  $fichier = fopen('promo.txt', 'w+');
  fwrite($fichier, trim($az));
  fclose($fichier);
  //rechercher
  /* $ligne = "";
  $monfichier = fopen('promo.t+xt', 'r');
  $tmp = fopen('tempo.txt', 'a+');
  while (!feof($monfichier)) {
    $tab = trim(fgets($monfichier));
    $tab = explode(';', $tab);

    $code = $tab[0];
    $nom = $tab[1];
    $date = $tab[2];

    if ($code == $codem)
    {
      echo $codem;
      fwrite($tmp, $codem . ";" . $nomm . ";" . $datem . ";\n");
   
    } else 
    {
      $tmp=$tmp.$tab;
    }
  }

  fclose($monfichier);
  fclose($tmp);

  $fichier = 'promo.txt';
  unlink($fichier);
  $tmp = 'tempo.txt';
  rename($tmp, "promo.txt"); */
} else { }
function verifyInput($var)
{
  $var = trim($var);
  $var = stripcslashes($var);
  $var = htmlspecialchars($var);

  return $var;
}
?>