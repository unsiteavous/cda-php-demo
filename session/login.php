<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>

<body>
  <form action="./src/controller/traitement.php" method="post">
    <h1>Connexion</h1>
    <label for="email"> Email:
      <input type="email" required name="email">
    </label>
    <label for="password">Password:
      <input type="password" required name="password">
    </label>
    <?php if (isset($_SESSION['error'])) { ?>
      <div class="error">
        <?= $_SESSION['error'] ?>
      </div>
    <?php
      unset($_SESSION['error']);
    } ?>
    <input type="submit" value="Se connecter">
  </form>
</body>

<style>
  form {
    width: 400px;
    margin: 100px auto;
    display: flex;
    flex-direction: column;
  }

  form * {
    width: 100%;

  }

  .error {
    color: red;
    font-size: 12px;
    margin: 0 0 0 20px
  }

  .error::before {
    content: '🔴 ';
  }
</style>

</html>