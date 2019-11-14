<?php
extract($_GET);
//$_GET['login']='bass';
$login=$_GET['login'];
//$tab1=[];
$test= "";
if($id_file=fopen("../index.txt","r+")){

while(!feof($id_file)){

    $lign=fgets($id_file);
    $tab=explode(";",$lign);
    
    if($login==$tab[0]){
        if($tab[6]=='actif')
            $tab[6]='bloquer';
        else
        $tab[6]='actif';
        if($login=='bass'){
            $tab[6]='actif';   
        }  
    }
    
    $tab1=$tab[0].';'.$tab[1].';'.$tab[2].';'.$tab[3].';'.$tab[4].';'.$tab[5].';'.$tab[6].";\n";
  $test=$test.$tab1;
   
}

 fclose($id_file);
$file=fopen("../index.txt","w+");
fwrite($file,trim($test));
fclose($file); 
header("location:liste.php");
}
 
    

?>