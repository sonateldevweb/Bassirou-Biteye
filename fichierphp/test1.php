<?php
 //$ptr = fopen("liste.txt", "r");
// $contenu = fread($ptr, filesize("liste.txt"));
 //$contenu=fgets($ptr);
  //$nom='riz';
 /* On a plus besoin du pointeur */
 //fclose($ptr);
 //for($i=0;$i<$contenu;$i++){
     //$tab=trim(fgets($id_file));
 //$contenu = explode(PHP_EOL, $contenu); /* PHP_EOL contient le saut à la ligne utilisé sur le serveur (\n linux, \r\n windows ou \r Macintosh */
  //if($contenu[$i]==$nom){
    // unset($contenu[$i]); /* On supprime la ligne 52 par exemple */
     //$contenu = array_values($contenu); /* Ré-indexe l'array */
      
  //}
    /* Puis on reconstruit le tout et on l'écrit */
    //$contenu = implode(PHP_EOL, $contenu);
  //$ptr = fopen("liste.txt", "w");
    // fwrite($ptr, $contenu);
 
 //}
 
  
 
 
$ptr = fopen("liste.txt", "r");
$contenu = fread($ptr, filesize("liste.txt"));
 $nom='riz';
 $prix=10;
 $qte=200;
/* On a plus besoin du pointeur */
fclose($ptr);
$i=0;
$contenu = explode(";", $contenu); /* PHP_EOL contient le saut à la ligne utilisé sur le serveur (\n linux, \r\n windows ou \r Macintosh */

/* PHP_EOL contient le saut à la ligne utilisé sur le serveur (\n linux, \r\n windows ou \r Macintosh */
for($i = 0; $i < count($contenu); $i++) {
    //unset($contenu[$i]);
    
    if($contenu[$i]==$nom){
        var_dump($contenu[$i]);
        unset($contenu[$i]);
        $contenu = array_values($contenu); /* Ré-indexe l'array */
      
     }$i++;
}
$contenu = array_values($contenu); /* Ré-indexe l'array */


 /* On supprime la ligne 52 par exemple */

/* Puis on reconstruit le tout et on l'écrit */
$contenu = implode(PHP_EOL, $contenu);
$ptr = fopen("liste.txt", "w");
fwrite($ptr, $contenu); 
/* $file = "liste.txt";
$data = file($file);
$searchId = '';
for($i = 0; $i< count($data); $i++) {
        if(strpos($searchId, $data[$i]) == 0) {
                unset($data[$i]);
                break;
        }
}
file_put_contents($file, $data); */
?>