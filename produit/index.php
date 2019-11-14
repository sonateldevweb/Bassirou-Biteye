
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

extract($_POST);
$personne[0] = array('login'=>'bass' ,'pwd'=> 'bass','nom'=> 'bass');
$personne[1] = array('login'=>'coly' ,'pwd'=> 'coly','nom'=> 'coly');
$personne[1] = array('login'=>'admin' ,'pwd'=> 'admin','nom'=> 'admin');

  if (isset($_POST['ok'])) {
  foreach($personne as $p) { 
if ($login==$p['login'] && $password==$p['pwd']){
    header("location:acceuil.php");

}
else {
	echo"<p style=color:red>le login ou le mot de passe ne correspond pas !</p>";
	break;
}
}


}


?>
</body>
</html>