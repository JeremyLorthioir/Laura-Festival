<?php
$password = "coucou";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password"] === $password) {
    } else {
        $error = "Le mot de passe ne correspond pas";
        include 'login-admin.php';
    }
}

$fichier = fopen("reservations.csv", "r");
?>

<style>
    table {
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #FFFFFF;
        border-collapse: collapse;
        border-width: 2px;
        border-color: #7EA8F8;
        border-style: solid;
        color: #000000;
    }

    table td,
    table th {
        border: 2px solid black;
        padding: 5px;
    }

    table thead {
        background-color: rgb(90, 166, 171);
    }
</style>
<table>
    <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Adresse postale</th>
        <th>Nombre de places</th>
        <th>Tarif réduit</th>
        <th>Nombre jour réduit</th>
        <th>Nombre jour</th>
        <th>Choix pass 1 jour</th>
        <th>Choix pass 2 jours</th>
        <th>Tente nuit 1</th>
        <th>Tente nuit 2</th>
        <th>Tente nuit 3</th>
        <th>Tente 3 nuits</th>
        <th>Van nuit 1</th>
        <th>Van nuit 2</th>
        <th>Van nuit 3</th>
        <th>Van 3 nuits</th>
        <th>Enfant</th>
        <th>Nombre casque enfant</th>
        <th>Nombre luge été</th>
    </thead>
    <tbody>
        <?php while (($ligne = fgetcsv($fichier, null, ",")) !== FALSE) { ?>
            <tr>
                <?php foreach ($ligne as $valeur) { ?>
                    <td>
                        <?= $valeur ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>