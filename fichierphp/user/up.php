<?php
//extract($_GET);
$nom='thieb';
$nomp='riz';
$prixp=100;
$qtep=200;   
$tab1="";
if($id_file=fopen("../liste.txt","r")){


    while(!feof($id_file)){

        $lign=fgets($id_file);
        $tab=explode(";",$lign);
        if($nom==$tab[0]){
         $tab[0]=$nomp;
         $tab[1]=$prixp;
         $tab[2]=$qtep;
         $tab[3]=$tab[1]*$tab[2];
        }
        $lig=$tab[0].';'.$tab[1].';'.$tab[2].';'.$tab[3].";\n";
        $tab1=$tab1.$lig;
        
        }
        var_dump($tab1) ;
          fclose($id_file);
      
          $file=fopen("../liste.txt","w+");
        fwrite($file,trim($tab1));
       fclose($file); 
}
