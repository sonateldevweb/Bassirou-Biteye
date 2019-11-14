 <?php
  extract($_GET);
  include 'connexion.php';
  $sql="delete from etudiant where idet=$id";
  $exe=executesql($sql);
  header("location:afficheetudiant.php");

 ?>