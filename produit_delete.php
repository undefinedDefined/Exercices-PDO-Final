<?php

include_once("config.php");

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idproduit = $_GET['id'];

    $stmt = $dbh -> prepare("DELETE FROM produit WHERE idproduit = '$idproduit'");
    $stmt -> execute();

    header('Location: produit_delete.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE produit</title>
    <style>
    table{
        width: 600px;
        margin: 2rem auto;
    }

    a{
        text-decoration: none;
        color: blue;
    }

    td{
        text-align: center;
    }

    table tr:nth-of-type(odd){
        background: #D8E3E5;
    }

    tr{
        height: 15px;
    }
    
    </style>
</head>
<body>
    <table border="1">

        <?php

        $x = $dbh->prepare("SELECT *
        FROM produit
        LIMIT 1");
        $x->execute();

        foreach($x->fetchAll(PDO::FETCH_ASSOC) AS $row){
            echo '<tr>';

            $columnName = array_keys($row);
            for($i=0; $i< count($columnName); $i++){
                echo '<td>'.$columnName[$i].'</td>';
            }
            //On ajoute manuellement la colonne supprimer
            // echo '<td>Supprimer</td>';

            echo '<td></td>';
            echo '</tr>';
        }

        $stmt = $dbh -> prepare("SELECT * FROM produit");
        $stmt -> execute();
        foreach($stmt -> fetchAll(PDO::FETCH_NUM) AS $index){
            echo '<tr>';
                for($i =0 ; $i < count($index); $i++){
                    echo '<td>'.$index[$i].'</td>';
                }
                echo '<td><a href="produit_delete.php?id='.$index[0].'">Supprimer</a></td>';
            echo '</tr>';
        }
        ?>
        
    </table>
</body>
</html>