<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
</head>
<body>
   <form method="POST" action="">
   	 <input type="date" name="xxx">
   </form>
   <?php

	$datejour = date('d/m/Y');

	$datefin= $donnees['fin'];  

       
	$dfin = explode("/", $datefin); 
	
      

        $djour = explode("/", $datejour); 
       
      
	$finab = $dfin[2].$dfin[1].$dfin[0]; 
         
	$auj = $djour[2].$djour[1].$djour[0]; 

	 

	if ($auj>$finab)
	{
//------Abonnement expiré;-------
	echo "abonnement expiré";
	}
	else
	{
	-------Abonnement en cours-----
	echo "abonnement valide":
	}
?>
</body>
</html>