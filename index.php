<?php
include 'includes/header.php';

if (isset($_POST) && $_POST) {
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];
  $telephone = $_POST["telephone"];
  $adressePostale = $_POST["adressePostale"];
  $nombrePlaces = $_POST["nombrePlaces"];

  $tarifReduit = isset($_POST["tarifReduit"]) ? "Oui" : "Non";

  if (isset($_POST['nbJourReduit'])) {
    // Récupérer la valeur sélectionnée
    $nombreJourReduit = $_POST['nbJourReduit'];

    // Analyser la valeur sélectionnée pour obtenir les informations nécessaires
    if ($nombreJourReduit == "pass1jourreduit") {
      $choixNombreJourReduit = "pass1jourReduit";
    }
    if ($nombreJourReduit == "pass2joursreduit") {
      $choixNombreJourReduit = "pass2joursReduit";
    }
    if ($nombreJourReduit == "pass3joursreduit") {
      $choixNombreJourReduit = "pass3joursReduit";
    }
  }
  if (!isset($_POST['nbJourReduit'])) {
    $choixNombreJourReduit = null;
  }

  if (isset($_POST['nbJour'])) {
    // Récupérer la valeur sélectionnée
    $nombreJour = $_POST['nbJour'];

    // Analyser la valeur sélectionnée pour obtenir les informations nécessaires
    if ($nombreJour == "pass1jour") {
      $choixNombreJour = "pass1jour";
    }
    if ($nombreJour == "pass2jours") {
      $choixNombreJour = "pass2jours";
    }
    if ($nombreJour == "pass3jours") {
      $choixNombreJour = "pass3jours";
    }
  }
  if (!isset($_POST['nbJour'])) {
    $choixNombreJour = null;
  }


  if (isset($_POST['datePass1jour'])) {
    // Récupérer la valeur sélectionnée
    $datePass1jour = $_POST['datePass1jour'];

    // Analyser la valeur sélectionnée pour obtenir les informations nécessaires
    if ($datePass1jour == "choixJour1") {
      $choixPass1jour = "Jour1";
    }
    if ($datePass1jour == "choixJour2") {
      $choixPass1jour = "Jour2";
    }
    if ($datePass1jour == "choixJour3") {
      $choixPass1jour = "Jour3";
    }
  }
  if (!isset($_POST['datePass1jour'])) {
    $choixPass1jour = null;
  }


  if (isset($_POST['datePass2jours'])) {
    // Récupérer la valeur sélectionnée
    $passSelection = $_POST['datePass2jours'];

    // Analyser la valeur sélectionnée pour obtenir les informations nécessaires
    if ($passSelection == "choixJour12") {
      $choixPass2Jours = "Jour12";
    }

    if ($passSelection == "choixJour23") {
      $choixPass2Jours = "Jour23";
    }
  }
  if (!isset($_POST['datePass2jours'])) {
    $choixPass2Jours = null;
  }


  $tenteNuit1 = isset($_POST["tenteNuit1"]) ? "Oui" : "Non";
  $tenteNuit2 = isset($_POST["tenteNuit2"]) ? "Oui" : "Non";
  $tenteNuit3 = isset($_POST["tenteNuit3"]) ? "Oui" : "Non";
  $tente3Nuits = isset($_POST["tente3Nuits"]) ? "Oui" : "Non";

  $vanNuit1 = isset($_POST["vanNuit1"]) ? "vanNuit1" : "Non";
  $vanNuit2 = isset($_POST["vanNuit2"]) ? "vanNuit2" : "Non";
  $vanNuit3 = isset($_POST["vanNuit3"]) ? "vanNuit3" : "Non";
  $van3Nuits = isset($_POST["van3Nuits"]) ? "van3Nuits" : "Non";

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

  $nombreCasquesEnfants = $_POST["nombreCasquesEnfants"];

  $NombreLugesEte = $_POST["NombreLugesEte"];

  $data = [$nom, $prenom, $email, $telephone, $adressePostale, $nombrePlaces, $tarifReduit, $choixNombreJourReduit, $choixNombreJour, $choixPass1jour, $choixPass2Jours, $tenteNuit1, $tenteNuit2, $tenteNuit3, $tente3Nuits, $vanNuit1, $vanNuit2, $vanNuit3, $van3Nuits, $enfant, $nombreCasquesEnfants, $NombreLugesEte];
  $csv = fopen("reservations.csv", "a");
  fputcsv($csv, $data);

  // Réponse à l'utilisateur
  echo "Merci pour votre réservation !";
}

if (isset($_POST) && $_POST && !isset($erreur)) { ?>
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
<?php } else { ?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de réservation Music Vercors Festival</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
  </head>

  <body>
    <?php
    if (isset($erreur) && $erreur != "") {
      echo $erreur;
    }
    ?>
    <form action="index.php" id="inscription" method="POST">
      <fieldset id="reservation">
        <legend>Réservation</legend>
        <h3>Nombre de réservation(s) :</h3>
        <input type="number" name="nombrePlaces" id="nombrePlaces" required min="1" required>
        <h3>Réservation(s) en tarif réduit</h3>
        <input type="checkbox" name="tarifReduit" id="tarifReduit" onclick="afficherMasquerTarifsReduits()">
        <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

        <h3>Choisissez votre formule :</h3>
        <div id="tarifsNormaux">
          <input type="checkbox" name="pass1jour" id="pass1jour" value="pass1jour" onclick="choixDate1jour()">
          <label for="pass1jour">Pass 1 jour : 40€</label>

          <!-- Si case cochée, afficher le choix du jour -->
          <section id="pass1jourDate" style="display: none;">
            <input type="checkbox" name="choixJour1" id="choixJour1" value="choixJour1">
            <label for="choixJour1">Pass pour la journée du 01/07</label>
            <input type="checkbox" name="choixJour2" id="choixJour2" value="choixJour2">
            <label for="choixJour2">Pass pour la journée du 02/07</label>
            <input type="checkbox" name="choixJour3" id="choixJour3" value="choixJour3">
            <label for="choixJour3">Pass pour la journée du 03/07</label>
          </section>

          <input type="checkbox" name="pass2jours" id="pass2jours" value="pass2jours" onclick="choixDate2jours()">
          <label for="pass2jours">Pass 2 jours : 70€</label>

          <!-- Si case cochée, afficher le choix des jours -->
          <section id="pass2joursDate" style="display: none;">
            <input type="checkbox" name="choixJour12" id="choixJour12" value="choixjour12">
            <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
            <input type="checkbox" name="choixJour23" id="choixJour23" value="choixjour23">
            <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
          </section>

          <input type="checkbox" name="pass3jours" id="pass3jours" value="pass3jours">
          <label for="pass3jours">Pass 3 jours : 100€</label>
        </div>

        <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
        <section class="tarifsReduits" id="tarifsReduits" style="display: none;">
          <input type="checkbox" name="pass1jourreduit" id="pass1jourreduit" value="pass1jourreduit"
            onclick="choixDate1jourReduit()">
          <label for="pass1jourreduit">Pass 1 jour : 25€</label>

          <section id="pass1jourDateReduit" style="display: none;">
            <input type="checkbox" name="choixJour1reduit" id="choixJour1reduit" value="choixJour1reduit">
            <label for="choixJour1">Pass pour la journée du 01/07</label>
            <input type="checkbox" name="choixJour2reduit" id="choixJour2reduit" value="choixJour2reduit">
            <label for="choixJour2">Pass pour la journée du 02/07</label>
            <input type="checkbox" name="choixJour3reduit" id="choixJour3reduit" value="choixJour3reduit">
            <label for="choixJour3">Pass pour la journée du 03/07</label>
          </section>


          <input type="checkbox" name="pass2joursreduit" id="pass2joursreduit" value="pass2joursreduit"
            onclick="choixDate2joursReduit()">
          <label for="pass2joursreduit">Pass 2 jours : 50€</label>

          <section id="pass2joursDateReduit" style="display: none;">
            <input type="checkbox" name="choixJour12reduit" id="choixJour12reduit" value="choixJour12reduit">
            <label for="choixJour12reduit">Pass pour deux journées du 01/07 au 02/07</label>
            <input type="checkbox" name="choixJour23reduit" id="choixJour23reduit" value="choixJour23reduit">
            <label for="choixJour23reduit">Pass pour deux journées du 02/07 au 03/07</label>
          </section>

          <input type="checkbox" name="pass3joursreduit" id="pass3joursreduit" value="pass3joursreduit">
          <label for="pass3joursreduit">Pass 3 jours : 65€</label>
        </section>

        <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->
        <div>
          <p class="bouton" id="btnSuivant1">Suivant</p>
        </div>

      </fieldset>
      <fieldset id="options">
        <legend>Options</legend>
        <h3>Réserver un emplacement de tente : </h3>
        <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
        <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
        <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
        <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
        <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
        <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
        <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
        <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

        <h3>Réserver un emplacement de camion aménagé : </h3>
        <input type="checkbox" id="vanNuit1" name="vanNuit1">
        <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
        <input type="checkbox" id="vanNuit2" name="vanNuit2">
        <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
        <input type="checkbox" id="vanNuit3" name="vanNuit3">
        <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
        <input type="checkbox" id="van3Nuits" name="van3Nuits">
        <label for="van3Nuits">Pour les 3 nuits (12€)</label>

        <h3>Venez-vous avec des enfants ?</h3>
        <input type="checkbox" name="enfantsOui" id="enfantsOui" onclick="afficherCasques()"><label
          for="enfantsOui">Oui</label>
        <input type="checkbox" name="enfantsNon" id="enfantsNon"><label for="enfantsNon">Non</label>

        <!-- Si oui, afficher : -->
        <section id="casquesEnfants" style="display: none;">
          <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
          <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
          <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" min="0">
          <p>*Dans la limite des stocks disponibles.</p>
        </section>

        <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
        <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
        <input type="number" name="NombreLugesEte" id="NombreLugesEte" min="0">

        <p class="bouton" id="btnPrecedent">Précédent</p>
        <p class="bouton" id="btnSuivant2">Suivant</p>


      </fieldset>

      <fieldset id="coordonnees">
        <legend>Coordonnées</legend>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" required>
        <br>
        <p class="bouton" id="btnPrecedent2">Précédent</p> <input type="submit" name="soumission" class="bouton"
          id=btnReserver value="Réserver">
      </fieldset>
    </form>
    <?php
    include 'includes/footer.php';
    ?>
  </body>

  </html>
<?php } ?>