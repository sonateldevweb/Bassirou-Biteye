<?php
include'acceuil.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <title>recherche</title>
</head>

<body class="userac">



    <div class="container">

    
<br>
        <form action="rechercher.php" method="POST">
            <input type="text" name="quantite" placeholder="quantite">
            <input type="text" name="pmin" placeholder="prix max">
            <input type="text" name="pmax" placeholder="prix min">
            <input type="submit" value="rechercher" name="ok"  class="btn btn-primary">
        </form>
        <br>
        <?php
        $quantite = $_POST['quantite'];
        $pmin = $_POST['pmin'];
        $pmax = $_POST['pmax'];
        if (isset($_POST['ok'])) {
           echo ' <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">liste des Produits</div>
                <div class="panel-body">
                <table class="table table-bordered table-striped ">
                        <tr>
                           
                            <td>Libelle</td>
                            <td>Prix Unitaire</td>
                            <td>Quantite en Stock</td>
                            <td>Montant total</td>                
                          
                        </tr>';
            $tab = fopen('../liste.txt', 'r+');
            while (!feof($tab)) {
                $line = fgets($tab);
                $col = explode(';', $line);
                if ($quantite < $col[2] && $quantite != '' && $pmin == '' && $pmax == '' && $quantite > 0) {
                    $mtn = $col[2] * $col[1];
                    if ($col[1] < 10) {

                        echo "<tr class='p-3 mb-2 bg-danger text-white'>
            <td>$col[0]</td>
            <td>$col[1]</td>
            <td>$col[2]</td>
            <td>$mtn</td>
             </tr>";
                    } else
                        echo "<tr>
            <td>$col[0]</td>
            <td>$col[1]</td>
            <td>$col[2]</td>
            <td>$mtn</td> 
             </tr>";
                } elseif ($pmin <= $col[1] && $pmin != '' && $pmax == '' && $quantite == '' && $pmin > 0) {
                    $mtn = $col[2] * $col[1];
                    if ($col[1] < 10) {
                        
                        echo "<tr class='p-3 mb-2 bg-danger text-white'> 
                         
                <td>$col[0]</td>
                <td>$col[1]</td>
                <td>$col[2]</td>
                <td>$mtn</td>  </tr>";
                    } else {
                        echo "<tr>
                <td>$col[0]</td>
                <td>$col[1]</td>
                <td>$col[2]</td>
                <td>$mtn</td> 
                 </tr>";
                    }
                } elseif ($pmax >= $col[1] && $pmax != '' && $pmin == '' && $quantite == '' && $pmax > 0) {
                    $mtn = $col[2] * $col[1];
                    if ($col[1] < 10) {

                        echo "<tr class='p-3 mb-2 bg-danger text-white'> 
                <td>$col[0]</td>
                <td>$col[1]</td>
                <td>$col[2]</td>
                <td>$mtn</td>  </tr>";
                    } else {
                        echo "<tr>
                <td>$col[0]</td>
                <td>$col[1]</td>
                <td>$col[2]</td>
                <td>$mtn</td> 
                 </tr>";
                    }
                } elseif ($pmin <= $col[1] && $pmax > $col[1]  && $pmin != '' && $pmax != '' && $quantite == '') {
                    $mtn = $col[2] * $col[1];
                    if ($col[1] < 10) {

                        echo "<tr class='p-3 mb-2 bg-danger text-white'> 
                <td>$col[0]</td>
                <td>$col[1]</td>
                <td>$col[2]</td>
                <td>$mtn</td> 
                </tr>";
                    } else {
                        echo "<tr>
                <td>$col[0]</td>
                <td>$col[1]</td>
                <td>$col[2]</td>
                <td>$mtn</td> 
                 </tr>";
                    }
                } elseif ($quantite <= $col[2] && $pmin <= $col[1] && $pmax >= $col[1] && $pmin != '' && $pmax != '' && $quantite != '') {
                    $mtn = $col[2] * $col[1];
                    if ($col[1] < 10 && $color = red) {

                        echo "<tr $color>
                    <td>$col[0]</td>
                    <td>$col[1]</td>
                    <td>$col[2]</td>
                    <td>$mtn</td> 
                    </tr>";
                    } else {
                        echo "<tr>
                    <td>$col[0]</td>
                    <td>$col[1]</td>
                    <td>$col[2]</td>
                    <td>$mtn</td> 
                     </tr>";
                    }
                }
            }
            echo " </table>";
            fclose($tab);
        }

        ?>

      </table>
    </div>
 </div>
</body>

</html>