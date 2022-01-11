<?php

include_once("config.php");

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idclient = $_GET['id'];

    $stmt = $dbh -> prepare("DELETE FROM client WHERE idclient = '$idclient'");
    $stmt -> execute();

    header('Location: client_delete.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <title>DELETE client</title>
    <style>
    table{
        width: 900px;
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

        <?php

        $x = $dbh->prepare("SELECT client.idclient, nom, email, telephone
        FROM client
        INNER JOIN adresse ON adresse.idadresse = client.idadresse
        LIMIT 1");
        $x->execute();

        foreach($x->fetchAll(PDO::FETCH_ASSOC) AS $row){
            echo '<tr>';
        
            $columnName = array_keys($row);
            for($i=0; $i< count($columnName); $i++){
                echo '<td>'.$columnName[$i].'</td>';
            }
        
            echo '<td></td>';
            echo '</tr>';
        }

        $stmt = $dbh->prepare("SELECT client.* FROM client INNER JOIN adresse ON adresse.idadresse = client.idadresse");
        $stmt -> execute();
        foreach($stmt->fetchAll(PDO::FETCH_NUM) AS $index){
            echo '<tr>';
        
            for($i=0; $i < count($index); $i++){
                if($i != 4){echo '<td>'.$index[$i].'</td>';}
            }
            echo '<td><a href="client_delete.php?id='.$index[0].'">Supprimer</a></td>';
        
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>