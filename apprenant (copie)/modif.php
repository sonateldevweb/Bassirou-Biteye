<?php
extract($_GET);
//$_GET['login']='bass';
$code=$_GET['code'];
//$tab1=[];
$test= "";
if($id_file=fopen("apprenant.txt","r+")){

while(!feof($id_file)){

    $lign=fgets($id_file);
    $tab=explode(";",$lign);
    
    if($code==$tab[0]){
        if($tab[7]=='accepté')
            $tab[7]='exclu';
        else
        $tab[7]='accepté';
        
    }
    
    $tab1=$tab[0].';'.$tab[1].';'.$tab[2].';'.$tab[3].';'.$tab[4].';'.$tab[5].';'.$tab[6].';'.$tab[7].";\n";
  $test=$test.$tab1;
   
}

 fclose($id_file);
$file=fopen("apprenant.txt","w+");
fwrite($file,trim($test));
fclose($file); 
header("location:exclure.php?c=$code");
}
 
    

?>