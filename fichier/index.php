<html>
    <head>
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit"  name="ok" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#"></a>
    </div>

  </div>

<?php
session_start();
extract($_REQUEST);
extract($_POST);
$log=$_POST['login'];
$mdp=$_POST['password'];
$trouve=false;

if($id_file=fopen("index.txt","r"));
if (isset($_POST['ok'])) {
while(!feof($id_file)){
	$tab=trim(fgets($id_file));
	$tab=explode(";",$tab);
	
	
		if ($log==$tab[0] && $mdp==$tab[1] && $tab[5]=='user')
		{	
			$trouve=true;
			if($tab[6]=='bloquer'){
				
				die("acces refuser");
			}else
			{
				$_SESSION['nom']=$tab[2];
				header("location:user/acceuil.php");
			}
			 
			
			}	 else if($log==$tab[0] && $mdp==$tab[1] && $tab[5]=='admin')
			{if($tab[6]=='bloquer'){
				$trouve=true;
				echo"<p style=color:red> acces refuser </p>";
				die();
			}else{
				$_SESSION['nom']=$tab[2];
				header("location:admin/index.php");
			}
				
			} 
				
		
    }
	if($trouve==false){
		echo"<p style=color:red>le login ou le mot de passe ne correspond pas !</p>";
	}	
			
	

		fclose($id_file);
   }

   if(isset($logout))
   {
	   echo "je me deconnecte ici";
	   unset($_SESSION);
	   session_destroy();
	   session_unset();
	   header("location:index.php");
   
   }
?>
</body>
</html>