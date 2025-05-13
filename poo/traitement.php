<?php
require "entity/Emprunt.php";

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

$emprunt = new Emprunt ($_POST);

var_dump($emprunt);

if (!empty($errors)) {
  require "emprunt.php";
  exit;
}

// Restitution :
include "emprunt.php";
// include "restitution.php";