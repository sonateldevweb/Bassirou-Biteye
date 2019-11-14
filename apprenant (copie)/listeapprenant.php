

<!DOCTYPE html>
<html>

<head>
  <title>Liste</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/ajout.css">
</head>

<body>

<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Sonatel Academy</strong> <a href="ajoutpromo.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-list"></i> promo</a></div>
  <div class="col-sm-12">

    <h5 class="card-title"><i class="fa fa-fw fa-search"></i> ajout promo</h5>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

      <div class="row">

        <div class="col-sm-2">

          <div class="form-group">

            <label>promo</label>
            <select class="form-control" name="promo">
              <?php
              if ($id_file = fopen("promo.txt", "r")) {
                while (!feof($id_file)) {
                  $tab = fgets($id_file);
                  $tab = explode(";", $tab);
                  echo "<option value=$tab[0]>$tab[1]</option>";
                }
                fclose($id_file);
              }
              ?>

            </select>
          </div>

        </div>




        <div class="col-sm-4">

          <div class="form-group">

            <label>&nbsp;</label>

            <div>

              <button type="submit" name="ok" value="ajouter" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i>rechercher</button>


            </div>

          </div>

        </div>

      </div>

    </form>

  </div>
  <table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
      
        <th scope="col">code</th>
        <th scope="col">Prenom</th>
        <th scope="col">Nom</th>
        <th scope="col">Date de Naissance</th>
        <th scope="col">Telephone</th>
        <th scope="col">Email</th>
        <th scope="col">Promo</th>
        <th scope="col">status</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_POST['ok'])) {

        if ($id_file = fopen("apprenant.txt", "r")) {

          while (!feof($id_file)) {
            $tab = trim(fgets($id_file));
            $tab = explode(";", $tab);
            if ($tab[6] == $_POST['promo']) {
              echo "<tr> 
              <td > $tab[0] </td>
              <td > $tab[1] </td> 
              <td > $tab[2] </td>
              <td > $tab[3] </td>
              <td > $tab[4] </td> 
              <td > $tab[5] </td> 
              <td > $tab[6] </td>
              <td > $tab[7] </td> 
               ";
              echo "<td ><a href='modifapp.php?code=$tab[0]&nom=$tab[1]&prenom=$tab[2]&date=$tab[3]&tel=$tab[4]&email=$tab[5]&promo=$tab[6]' class='btn btn-primary'><i class='fa fa-edit'></i>modifier</a></td>";
              echo "</tr> ";
            }
          }
          fclose($id_file);
        }
      }

      ?>

    </tbody>
  </table>

</body>

</html>