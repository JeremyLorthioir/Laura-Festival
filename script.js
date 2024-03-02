var fieldsetReservation = document.getElementById("reservation");
var fieldsetOptions = document.getElementById("options");
var fieldsetCoordonnees = document.getElementById("coordonnees");

//Par défaut afficher seulement la section "réservation"
fieldsetReservation.style.display = "block";
fieldsetOptions.style.display = "none";
fieldsetCoordonnees.style.display = "none";

//Au clic sur le bouton suivant, passer à la section "options" et cacher les autres
var btnSuivant1 = document.getElementById("btnSuivant1");

btnSuivant1.addEventListener('click', () => {
  fieldsetReservation.style.display = "none";
  fieldsetOptions.style.display = "block";
  fieldsetCoordonnees.style.display = "none";
})

//Au clic sur le bouton suivant, passer à la section "coordonnées" et cacher les autres
var btnSuivant2 = document.getElementById("btnSuivant2");

btnSuivant2.addEventListener('click', () => {
  fieldsetReservation.style.display = "none";
  fieldsetOptions.style.display = "none";
  fieldsetCoordonnees.style.display = "block";
})
//Au clic sur le bouton précédent on revient sur la section réservation
var btnPrecedent = document.getElementById("btnPrecedent");

btnPrecedent.addEventListener('click', () => {
  fieldsetReservation.style.display = "block";
  fieldsetOptions.style.display = "none";
  fieldsetCoordonnees.style.display = "none";
})

//Au clic sur le 2ème bouton précédent on revient sur la section options
var btnPrecedent2 = document.getElementById("btnPrecedent2");

btnPrecedent2.addEventListener('click', () => {
  fieldsetReservation.style.display = "none";
  fieldsetOptions.style.display = "block";
  fieldsetCoordonnees.style.display = "none";
})

//Afficher le choix de la date pour le pass 1 jour
function choixDate1jour() {
  let pass1jourCheckbox = document.getElementById("pass1jour");
  let pass1jourDateSection = document.getElementById("pass1jourDate");

  pass1jourDateSection.style.display = pass1jourCheckbox.checked ? "block" : "none";
}
//Décocher les checkbox de dates quand on sélectionne une date dans "CHOIX DATE 1 JOUR"
// document.addEventListener("DOMContentLoaded", function () {
//   let choixJour1 = document.getElementById("choixJour1");
//   let choixJour2 = document.getElementById("choixJour2");
//   let choixJour3 = document.getElementById("choixJour3");
//   //Empêcher de sélectionner plus d'une date 
//   choixJour1.addEventListener("change", function () {
//     if (choixJour1.checked) {
//       choixJour2.checked = false;
//       choixJour3.checked = false;
//     }
//   });
  //Empêcher de sélectionner plus d'une date 
//   choixJour2.addEventListener("change", function () {
//     if (choixJour2.checked) {
//       choixJour1.checked = false;
//       choixJour3.checked = false;
//     }
//   });
//   //Empêcher de sélectionner plus d'une date 
//   choixJour3.addEventListener("change", function () {
//     if (choixJour3.checked) {
//       choixJour1.checked = false;
//       choixJour2.checked = false;
//     }
//   });
// });

//Décocher une case quand une autre est cochée dans la section "CHOIX DATE 2 JOURS"
// document.addEventListener("DOMContentLoaded", function () {
//   let choixJour12 = document.getElementById("choixJour12");
//   let choixJour23 = document.getElementById("choixJour23");
//   //Empêcher de sélectionner plus d'une date 
//   choixJour12.addEventListener("change", function () {
//     if (choixJour12.checked) {
//       choixJour23.checked = false;
//     }
//   });
//   //Empêcher de sélectionner plus d'une date 
//   choixJour23.addEventListener("change", function () {
//     if (choixJour23.checked) {
//       choixJour12.checked = false;
//     }
//   });
// });
//Afficher le choix de date pour le pass 2 jours
function choixDate2jours() {
  let pass2joursCheckbox = document.getElementById("pass2jours");
  let pass2joursDateSection = document.getElementById("pass2joursDate");

  pass2joursDateSection.style.display = pass2joursCheckbox.checked ? "block" : "none";
}

//Afficher ou masquer les tarifs réduits
function afficherMasquerTarifsReduits() {
  let checkboxTarifReduit = document.getElementById("tarifReduit");
  let tarifsReduitsSection = document.getElementById("tarifsReduits");
  let tarifsNormauxSection = document.getElementById('tarifsNormaux');

  if (checkboxTarifReduit.checked) {
    tarifsReduitsSection.style.display = "block";
    tarifsNormauxSection.style.display = "none";
  } else {
    tarifsReduitsSection.style.display = "none";
    tarifsNormauxSection.style.display = "block";
  }
}

//Afficher le choix des jours PASS 1 JOUR REDUIT
function choixDate1jourReduit() {
  let checkboxPass1jourReduit = document.getElementById("pass1jourreduit");
  let pass1jourDateSection = document.getElementById("pass1jourDateReduit");

  pass1jourDateSection.style.display = checkboxPass1jourReduit.checked ? "block" : "none";
}
//Empêcher de cocher d'autres cases dans PASS 1 JOUR REDUIT
// document.addEventListener("DOMContentLoaded", function () {
//   let choixJour1reduit = document.getElementById("choixJour1reduit");
//   let choixJour2reduit = document.getElementById("choixJour2reduit");
//   let choixJour3reduit = document.getElementById("choixJour3reduit");
//   //Empêcher de sélectionner plus d'une date 
//   choixJour1reduit.addEventListener("change", function () {
//     if (choixJour1reduit.checked) {
//       choixJour2reduit.checked = false;
//       choixJour3reduit.checked = false;
//     }
//   });
  //Empêcher de sélectionner plus d'une date 
//   choixJour2reduit.addEventListener("change", function () {
//     if (choixJour2reduit.checked) {
//       choixJour1reduit.checked = false;
//       choixJour3reduit.checked = false;
//     }
//   });
//   //Empêcher de sélectionner plus d'une date 
//   choixJour3reduit.addEventListener("change", function () {
//     if (choixJour3reduit.checked) {
//       choixJour1reduit.checked = false;
//       choixJour2reduit.checked = false;
//     }
//   });
// });

//Afficher le choix des jours PASS 2 JOURS REDUIT
function choixDate2joursReduit() {
  let checkboxPass2joursReduit = document.getElementById("pass2joursreduit");
  let pass2joursDateSection = document.getElementById("pass2joursDateReduit");

  pass2joursDateSection.style.display = checkboxPass2joursReduit.checked ? "block" : "none";
}

// //Empêcher de sélectionner plusieurs jours PASS 2 JOURS REDUIT
// document.addEventListener("DOMContentLoaded", function () {
//   let choixJour12reduit = document.getElementById("choixJour12reduit");
//   let choixJour23reduit = document.getElementById("choixJour23reduit");
//   //Empêcher de sélectionner plus d'une date 
//   choixJour12reduit.addEventListener("change", function () {
//     if (choixJour12reduit.checked) {
//       choixJour23reduit.checked = false;
//     }
//   });
//   //Empêcher de sélectionner plus d'une date 
//   choixJour23reduit.addEventListener("change", function () {
//     if (choixJour23reduit.checked) {
//       choixJour12reduit.checked = false;
//     }
//   });
// });

// //Cocher seulement 1 case dans la section "enfants"
// choixJour23reduit.addEventListener("change", function () {
//   if (choixJour23reduit.checked) {
//     choixJour12reduit.checked = false;
//   }
// });

//Afficher la réservation de casques si la checkbox "enfants" est cochée
function afficherCasques() {
  let checkboxEnfantsOui = document.getElementById("enfantsOui");
  let sectionCasquesEnfants = document.getElementById("casquesEnfants");

  sectionCasquesEnfants.style.display = checkboxEnfantsOui.checked ? "block" : "none";
};

//Sélectionner OUI ou NON dans la section "enfants"
// let checkboxEnfantsOui = document.getElementById("enfantsOui");
// let checkboxEnfantsNon = document.getElementById("enfantsNon");

// checkboxEnfantsOui.addEventListener("change", function () {
//   if (checkboxEnfantsOui.checked) {
//     checkboxEnfantsNon.checked = false;
//   }
// });

// checkboxEnfantsNon.addEventListener("change", function () {
//   if (checkboxEnfantsNon.checked) {
//     checkboxEnfantsOui.checked = false;
//   }
// });