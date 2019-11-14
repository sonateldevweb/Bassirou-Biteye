<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Les fichiers PHP</title>
</head>
<body style="background-color: #ffcc00;">
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
<fieldset>
<legend><b>Enregistrez vos informations personnelles</b></legend>
<p><b>Votre nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="text" name="nom" > <br />
<b>Votre prénom</b>
<input type="text" name="prenom"> <br />
<input type="submit" value="Enregistrer">
<input type="reset" value="Effacer"></p>
</fieldset>
</form>
<?php
if(isset($_POST['nom']) && isset($_POST['prenom'])) 
{
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date=time();
echo "<h2>Merci $prenom $nom $date de votre visite</h2> ";

if($id_file=fopen("newfile.txt","a+"))
{
flock($id_file,2); 

while($ligne=fgets($id_file)){
    $user=explode(";",$ligne);
    if ($user[2]==$login) {
        
    }
    else {
        $x++;
    } 
}

fwrite($id_file,$prenom.";".$nom.";".$date."\n");



fclose($id_file); 
flock($id_file,3);
}
else {echo "Fichier inaccessible";}
}
else {echo "<h2>Complétez le formulaire puis cliquez sur 'Envoi' ! </h2> ";}
?>
</body>
</html>
