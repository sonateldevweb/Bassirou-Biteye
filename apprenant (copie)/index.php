<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"  crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height:80px">
  <a class="navbar-brand" href="index.php">logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      
      <li class="nav-item dropdown text-warning">
        <a class="nav-link dropdown-toggle  inline my-2 my-lg-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Promo
        </a>
        <div class="dropdown-menu btn btn-outline-success my-2 my-sm-0" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="ajoutpromo.php" >Ajout</a>
          <a class="dropdown-item" href="modifpromo.php">Modifier</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="listepromo.php">Liste</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Apprenant
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="inscrire.php">Inscrire</a>
          <a class="dropdown-item" href="exclure.php">Exclure</a>
          <a class="dropdown-item" href="modifapp.php">modifier</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="listeapprenant.php">liste apprenant d'une promo</a>
        </div>
      </li>
   
    </ul>
   
  </div>
</nav>

</body>
</html>
