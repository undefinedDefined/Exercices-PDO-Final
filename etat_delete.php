<?php

include_once("config.php");

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idEtat = $_GET['id'];

    $stmt = $dbh -> prepare("DELETE FROM etat WHERE idetat = '$idEtat'");
    $stmt -> execute();

    header('Location: etat_delete.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE etat</title>
    <style>
    table{
        width: 400px;
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
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <td>Libellé</td>
            <td></td>
        </tr>

        <?php

        $stmt = $dbh -> prepare("SELECT * FROM etat");
        $stmt -> execute();
        foreach($stmt -> fetchAll(PDO::FETCH_NUM) AS $index){
            echo '<tr>';
                echo '<td>'.$index[1].'</td>';
                echo '<td><a href="etat_delete.php?id='.$index[0].'">Supprimer</a></td>';
            echo '</tr>';
        }
        ?>
        
    </table>
</body>
</html>