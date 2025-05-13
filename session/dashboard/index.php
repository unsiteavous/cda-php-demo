<?php
include "./../src/entity/User.php";
session_start();

$user = $_SESSION['user'];


if (!isset($_SESSION['user'])) {
  header('location: ./../login.php');
  die;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>

<body>
  <header>
    <span>LOGO.</span>
    <nav>
      <a href="index.php">Accueil</a>
      <a href="logout.php">Deconnexion</a>
    </nav>
  </header>
  <div class="container">
    <div class="colateral">
      <h3>Bonjour <?php echo $user->getFullName() ?></h3>
      <p><?= $user->getEmail() ?></p>
    </div>
    <main>
      <h1>Dashboard</h1>
    </main>
  </div>
</body>

<style>
  body {
    margin: 0;
  }

  header {
    display: flex;
    justify-content: space-between;
    background-color: black;
    color: white;
    padding: 20px;
  }

  header nav a {
    margin: 0 10px;
    color: white;
    text-decoration: none;
    border: 1px solid white;
    padding: 10px;
    border-radius: 5px;
  }

  .container {
    display: flex;
  }

  .colateral {
    width: 300px;
    background-color: lightgray;
    padding: 20px;
    border-right: 1px solid gray;
    height: calc(100vh - 100px);
  }

  main {
    flex: 1;
    padding: 20px;
  }
</style>

</html>