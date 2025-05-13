<?php
include "./../entity/User.php";
session_start();

// vérifier les données
if (
  !isset($_POST['email'])
  || !isset($_POST['password'])
  || empty($_POST['email'])
  || empty($_POST['password'])
) {
  $_SESSION['error'] = "Tous les champs sont requis.";
  header('location: ./../../login.php');
  die;
}

$email = trim(htmlentities($_POST['email']));
$password = htmlentities($_POST['password']);


$user = new User([
  'prenom' => 'théophile',
  'nom' => 'Bellintani',
  'email' => 'contact@unsiteavous.fr',
  'password' => 'azerty'
]);

if($email === $user->getEmail() && password_verify($password, $user->getPassword())) {
  $_SESSION['user'] = $user;
  header('location: ./../../dashboard/');
  die;
} else {
  $_SESSION['error'] = "Mot de passe ou email incorrect.";
  header('location: ./../../login.php');
  die;
}
