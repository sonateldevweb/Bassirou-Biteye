<?php 
 $tab1=array('1','2','3','6');
 $tab2=array('1','8','7','6');
   echo "le tableau 1 contient les element suivant:<br/>";
   print_r($tab1);
   echo "<hr/>";
   echo "le tableau 2 contient les element suivant:<br/>";
   print_r($tab2);
   echo "<hr/>";
   echo "les intersections est de \$tab1 et \$tab2 : ";
   $tab3=array_intersect($tab1, $tab2);
   echo "les resultat de l intersections est :";
    echo"<br/>";
    print_r($tab3);
     echo"<hr/>";
    $tab4=array_diff($tab1, $tab2);
     echo "les resultat de la difference est :";
    echo"<hr/>";
    print_r($tab4);
?>
https://www.youtube.com/?gl=SN&hl=fr