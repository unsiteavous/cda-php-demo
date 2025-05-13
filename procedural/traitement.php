<?php
// Vérification et sécurisation des infos reçues
/**
 * si champs vides + pas un nombre
 * pas négatif
 * taux <100
 * durée <= 25
 */
$errors = [];

if (
  $_SERVER['REQUEST_METHOD'] == 'POST'
  && (
    !isset($_POST['montant'])
    || !isset($_POST['taux'])
    || !isset($_POST['duree'])
    || empty($_POST['montant'])
    || empty($_POST['taux'])
    || empty($_POST['duree'])
  )
) {
  $errors['empty'] = "Tous les champs sont obligatoires.";
  require "emprunt.php";
  exit;
}

$montant = (int) htmlentities($_POST['montant']);
$taux = (float) htmlentities($_POST['taux']);
$duree = (int) htmlentities($_POST['duree']);

if ($montant < 1) {
  $errors['montant'] = "Le montant ne peut pas être inférieur à zéro";
}
if ($taux < 0 || $taux >= 100) {
  $errors['taux'] = "Le taux doit être compris entre 0 et 99";

}
if ($duree < 1 || $duree >= 26) {
  $errors['duree'] = "La durée doit être comprise entre 1 et 25 ans";
}

if (!empty($errors)) {
  require "emprunt.php";
  exit;
}


// traitement & calculs

$nbMois = $duree * 12;
$tauxPourcent = $taux/100;

$mensualites = round(($montant*($tauxPourcent/12))/(1-pow(1 + $tauxPourcent/12, - $nbMois )), 2);

$montantTotal = $mensualites * $nbMois;
$coutEmprunt = $montantTotal - $montant;

// Restitution :
include "emprunt.php";
include "restitution.php";