<?php
include_once('config.php');
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire client</title>
    <style>
        table{
            display: table;
            width: 500px;
        }

        #row{
            display: table-row;
        }

        label, input{
            display: table-cell;
            margin: 10px;
        }

    </style>
</head>
<body>

<form action="" method="post">
    <fieldset>
        <legend>Création d'un nouveau client</legend>
    
        <div class="row">
        <label for="nom">Nom :</label><input type="text" name="nom" id="nom" required>
        </div>
        <div class="row">
        <label for="email">Email :</label><input type="email" name="email" id="email" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" placeholder="email@example.com" required>
        </div>
        <div class="row">
        <label for="">Téléphone :</label><input type="tel" name="phone" id="phone" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" placeholder="061122334455" required>
        </div>
        <div class="row">
        <label for="adresse">Adresse :</label>
        <select name="adresse" id="adresse">
            <option value="">--Choisir une adresse--</option>
            <?php

            $stmt = $dbh -> prepare("SELECT * FROM adresse");
            $stmt -> execute();
            foreach($stmt -> fetchAll(PDO::FETCH_NUM) AS $index){
                echo '<option value="'.$index[0].'">'.$index[3].', '.$index[1].', '.$index[2].'</option>';
            }

            ?>
        
        </select><br>
        </div>
        <input type="submit" value="Confirmer">

    </fieldset>
</form>

<?php

if(isset($_POST['nom']) AND !empty($_POST['nom'])){

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];

    $stmt = $dbh -> prepare("INSERT INTO client (nom, email, telephone, idadresse) VALUES ('$nom', '$email', $phone, $adresse)");
    $stmt -> execute();
    echo '<p>Client '.$nom.' ajouté à la BDD</p>';

}
?>
    
</body>
</html>