<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php 
    function getconnexion(){
           return mysqli_connect("localhost","root","","bdecole");
    	   }
   function executesql($sql){
    	   	$connexion=getconnexion();
    	   	return mysqli_query($connexion,$sql);
    	   }
  ?>
</body>
</html>