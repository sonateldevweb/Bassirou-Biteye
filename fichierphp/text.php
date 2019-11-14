<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Compteur de visites</title>
</head>
<body>
<?php
if(file_exists("compteur.txt")) 
{
if($id_file=fopen("compteur.txt","r"))
{
flock($id_file,1); 
$nb=fread($id_file,10);
$nb++;



fclose($id_file);

$id_file=fopen("compteur.txt","w");
flock($id_file,1);
fwrite($id_file,$nb); 


fclose($id_file); 
flock($id_file,3);
}
else {echo "fichier introuvable"; }
}
else
{
$nb=10000;

$id_file=fopen("compteur.txt","w");

fwrite($id_file,$nb); 
fclose($id_file);

}
echo "<table border=\"1\" style=\"font-size:2em;\"> <tr> <td style=\"background-
color:blue;color:white;\">Voici déja </td>
<td style=\"font-size:1.2em;background-color:white;\"> $nb </td>
<td style=\"background-color:red;\"> visites sur le site </td>
</tr> </table> ";

?>
</body>
</html>