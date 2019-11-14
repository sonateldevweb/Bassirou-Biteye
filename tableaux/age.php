<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
  <form method="POST" action="">
  	 <input type="text" name="nom">
  	 <input type="date" name="datenais">
  	  <input type="submit" name="ok">
  </form> 
  <?php
  extract($_POST);
    /* $date=date('d/m/y'); */
    if (isset($_POST['ok'])) 
   {
   	  $age=floor((time()- strtotime($datenais))/3600/24/365);
        echo "tu as  $age ans Mr $nom";
   }
    /* $test=$date diff($datenais);*/
   if ($datenais==$date) {
  	echo "joyeux anniverssaire Mr $nom";
   }
?>
</body>
</html>
