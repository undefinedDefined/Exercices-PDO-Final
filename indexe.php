<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin: 1rem auto;
            width: 600px;
            text-align: center;
        }

        table tr:nth-of-type(odd){
            background : #D8E3E5;
        }

        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <td>INSERT</td>
            <td>DELETE</td>
        </tr>
        <tr>
            <td><a href="formulaire_client.php" target="_blank">Créer un nouveau client</a></td>
            <td><a href="client_delete.php" target="_blank">Supprimer un client existant</a></td>
        </tr>

        <tr>
            <td><a href="etat_insert.php" target="_blank">Ajouter un nouvel état de commande</a></td>
            <td><a href="etat_delete.php" target="_blank">Supprimer un etat de commande</a></td>
        </tr>

        <tr>
            <td><a href="adresse_insert.php" target="_blank">Ajouter une nouvelle adresse</a></td>
            <td><a href="adresse_delete.php" target="_blank">Supprimer une adresse existante</a></td>
        </tr>

        <tr>
            <td><a href="produit_insert.php" target="_blank">Ajouter un nouveau produit</a></td>
            <td><a href="produit_delete.php" target="_blank">Supprimer un produit existant</a></td>
        </tr>

    </table>

    <table border="1">
        <tr>
            <td></td>
            <td>URL</td>
        </tr>

        <tr>
            <td>La liste de tous les clients</td>
            <td><a href="clients.php" target="_blank">Cliquez ici</a></td>
        </tr>

        <tr>
            <td>La liste de toutes les commandes</td>
            <td><a href="commandes.php" target="_blank">Cliquez ici</a></td>
        </tr>

    </table>
</body>
</html>