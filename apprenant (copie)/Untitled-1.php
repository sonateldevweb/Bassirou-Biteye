<?php
$k[10];
$i=0;
for($i=0;$i<10;$i++){
    for($j=5;$j<15;$j++){
   if($j==$i){
       echo $j."\n";
       
       $k[$i]=[$i]+1;
   }
    }
   
}

echo $k."\n";
?>