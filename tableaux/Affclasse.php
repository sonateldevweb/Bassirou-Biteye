  <table border="10" width="100%">
    <centre>
    	<tr>
  		<th>Identifiant</th>
  		<th>Libelle</th>
  	</tr>
    </centre>
  <?php
     include'connexion.php';

      	 $req="select * from classe ";
      	 $exe=executesql($req);
      	 while($classe=mysqli_fetch_array($exe))
      	 {
      	 	echo"<tr><td>".$classe['idcl']."</td><td>".$classe['libel']."</td></tr>";
      	 }

     
  ?>

</table>
