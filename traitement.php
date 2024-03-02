<?php
define("MAX_RANGE", 200);
define("PRIX_TENTE_VAN_1_NUIT", 7);
define("PRIX_TENTE_VAN_3_NUITS", 18);

//Vérification des champs des coordonnées
if (isset($_POST) && $_POST) {
    if (isset($_POST['nom']) && $_POST['nom'] !== "") {
        $nom = htmlspecialchars($_POST['nom']);
    } else {
        header('location:../index.php?error=' . "Le nom est obligatoire !");
        exit;
    }
    if (isset($_POST['prenom']) && $_POST['prenom'] !== "") {
        $nom = htmlspecialchars($_POST['prenom']);
    } else {
        header('location:../index.php?error=' . "Le prénom est obligatoire !");
        exit;
    }
 //Vérification email
    if (isset($_POST['email']) && $_POST['email'] !== "") {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST['email']);
        } else {
        header('location:../index.php?error=' . "L'email n'est pas valide.");
        exit;
    }
 //Vérification du numéro de téléphone
    if(filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT)) {
        $telephone = htmlspecialchars($_POST['telephone']);
    }else {
        header('location:../index.php?error='."Le numéro de téléphone n'est pas valide.");
        exit;
    }
    
//Vérification des caractères de l'adresse postale
    $adressePostale = htmlspecialchars($_POST['adressePostale']);    
    };

//Calcul du prix total
$tarifReduit = isset($_POST["tarifReduit"]) ? "Oui" : "Non";
$prixTotal = 0;
$nombreJourReduit = $choixNombreJourReduit = null;
    if (isset($_POST['nbJourReduit'])) {
        $nombreJourReduit = $_POST['nbJourReduit'];
        // Récupérer la valeur sélectionnée
        switch ($nombreJourReduit) {
            case "pass1jourreduit":
                $choixNombreJourReduit = "1 jour";
                $prixTotal += 25;
                break;
            case "pass2joursreduit":
                $choixNombreJourReduit = "2 jours";
                $prixTotal += 50;
                break;
            case "pass3joursreduit":
                $choixNombreJourReduit = "3 jours";
                $prixTotal += 65;
                break;
            default:
                break;
        }

    }

    $nombreJour = $choixNombreJour = null;
    if (isset($_POST['nbJour'])) {
        $nombreJour = $_POST['nbJour'];
        // Récupérer la valeur sélectionnée
        switch ($nombreJour) {
            case "pass1jour":
                $choixNombreJour = "1 jour";
                $prixTotal += 40;
                break;
            case "pass2jours":
                $choixNombreJour = "2 jours";
                $prixTotal += 70;
                break;
            case "pass3jours":
                $choixNombreJour = "3 jours";
                $prixTotal += 100;
                break;
            default:
                break;
        }
    }

    if (isset($_POST['pass1jour'])) {
        switch ($_POST['choixJour1']) {
            case 'choixJour1':
                $choixPass1jour = "Jour1";
                break;
            case 'choixJour2':
                $choixPass1jour = "Jour2";
                break;
            case 'choixJour3':
                $choixPass1jour = "Jour3";
                break;
            default:
                $choixPass1jour = null;
                break;
        }
    } else {
        $choixPass1jour = null;
    }

    if (isset($_POST['pass2jours'])) {
        switch ($_POST['choixJour12']) {
            case 'choixjour12':
                $choixPass2Jours = "Jour12";
                break;
            case 'choixjour23':
                $choixPass2Jours = "Jour23";
                break;
            default:
                $choixPass2Jours = null;
                break;
        }
    } else {
        $choixPass2Jours = null;
    }

    $tenteNuit1 = isset($_POST["tenteNuit1"]) ? "Oui" : "Non";
    $tenteNuit2 = isset($_POST["tenteNuit2"]) ? "Oui" : "Non";
    $tenteNuit3 = isset($_POST["tenteNuit3"]) ? "Oui" : "Non";
    $tente3Nuits = isset($_POST["tente3Nuits"]) ? "Oui" : "Non";

    $vanNuit1 = isset($_POST["vanNuit1"]) ? "Oui" : "Non";
    $vanNuit2 = isset($_POST["vanNuit2"]) ? "Oui" : "Non";
    $vanNuit3 = isset($_POST["vanNuit3"]) ? "Oui" : "Non";
    $van3Nuits = isset($_POST["van3Nuits"]) ? "Oui" : "Non";

    $enfant = "";
    if (isset($_POST['enfants'])) {
        $enfants = $_POST['enfants'];
        if ($enfants == "enfantsOui") {
            $enfant = "Oui";
        }

        if ($enfants == "enfantsNon") {
            $enfant = "Non";
        }
    }

    $nombreCasquesEnfants = isset($_POST["nombreCasquesEnfants"]) && $_POST["nombreCasquesEnfants"] !== "" ? $_POST["nombreCasquesEnfants"] : 0;
    $nombreLugesEte = isset($_POST["NombreLugesEte"]) && $_POST["NombreLugesEte"] !== "" ? $_POST["NombreLugesEte"] : 0;

    // Vérification prix pour la réservation tente
    if ($tenteNuit1 === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($tenteNuit2 === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($tenteNuit3 === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($tente3Nuits === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_3_NUITS;
    }

    // Vérification prix pour la réservation van 
    if ($vanNuit1 === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($vanNuit2 === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($vanNuit3 === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_1_NUIT;
    }
    if ($van3Nuits === "Oui") {
        $prixTotal += PRIX_TENTE_VAN_3_NUITS;
    }

    // Multiplication par le nombre de personnes
    $prixTotal *= $nombrePlaces;

    // Vérification prix des casques et des luges
    $prixTotal += ($nombreCasquesEnfants * 2);
    $prixTotal += ($nombreLugesEte * 5);
    if (!isset($erreur)) {
        $data = [
            $nom,
            $prenom,
            $email,
            $telephone,
            $adressePostale,
            $nombrePlaces,
            $tarifReduit,
            $prixTotal,
            $nombreJourReduit,
            $nombreJour,
            $choixPass1jour,
            $choixPass2Jours,
            $_POST['pass3jours'] ?? null,
            $tenteNuit1,
            $tenteNuit2,
            $tenteNuit3,
            $tente3Nuits,
            $vanNuit1,
            $vanNuit2,
            $vanNuit3,
            $van3Nuits,
            $enfant,
            $nombreCasquesEnfants,
            $nombreLugesEte
        ];
        $csv = fopen("reservations.csv", "a");
        fputcsv($csv, $data);

    // Réponse à l'utilisateur
        echo "Merci pour votre réservation !";
    }
} ?>

<!-- //Affichage récapitulatif réservation sous forme de liste -->

<h2>Récapitulatif réservation</h2>
<ul>
    <li>Nom :
        <?php echo $_POST["nom"]; ?>
    </li>
    <li>Prénom :
        <?php echo $_POST["prenom"]; ?>
    </li>
    <li>Email :
        <?php echo $_POST["email"]; ?>
    </li>
    <li>Telephone :
        <?php echo $_POST["telephone"]; ?>
    </li>
    <li>Adresse :
        <?php echo $_POST["adressePostale"]; ?>
    </li>
    <li>Nombre de places :
        <?php echo $_POST["nombrePlaces"]; ?>
    </li>
    <li>Tarif réduit :
        <?php echo $tarifReduit; ?>
    </li>
    <li>Pass réduits :
        <?php echo $choixNombreJourReduit; ?>
    </li>
    <li>Pass :
        <?php echo $choixNombreJour; ?>
    </li>
    <li>Jour choisi :
        <?php echo $choixPass1jour; ?>
    </li>
    <li>Jours choisis :
        <?php echo $choixPass2Jours; ?>
    </li>
    <li>Tente nuit 1 :
        <?php echo $tenteNuit1; ?>
    </li>
    <li>Tente nuit 2 :
        <?php echo $tenteNuit2; ?>
    </li>
    <li>Tente nuit 3 :
        <?php echo $tenteNuit3; ?>
    </li>
    <li>Tente 3 nuits :
        <?php echo $tente3Nuits; ?>
    </li>
    <li>Van nuit 1 :
        <?php echo $vanNuit1; ?>
    </li>
    <li>Van nuit 2 :
        <?php echo $vanNuit2; ?>
    </li>
    <li>Van nuit 3 :
        <?php echo $vanNuit3; ?>
    </li>
    <li>Van 3 nuits :
        <?php echo $van3Nuits; ?>
    </li>
    <li>Enfants :
        <?php echo $enfant; ?>
    </li>
    <li>Casques enfant :
        <?php echo $_POST["nombreCasquesEnfants"]; ?>
    </li>
    <li>Luge été :
        <?php echo $_POST["NombreLugesEte"]; ?>
    </li>
</ul>