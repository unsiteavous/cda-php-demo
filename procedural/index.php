<?php
if (isset($_POST['password'])) {
  $password = $_POST['password'];

  if (strlen($_POST['password']) >=8){
    $password = htmlentities($_POST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $check = password_verify($password, $hash);
  } else {
    $error = "Mot de passe trop court";
  }

} else {
  $password = null;
  $error = "Le mot de passe est obligatoire";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasher</title>
</head>

<body>
  <form action="#" method="POST">
    <label for="password">
      <input type="text" required name="password" <?= isset($error) ? 'class="error" value="' . $password . '"' : '' ?> >
      <?php if (isset($error)): ?>
        <p class="text-error"><?= $error ?></p>
      <?php endif ?>
    </label>
    <input type="submit" value="Hasher">
  </form>

  <?php if (isset($hash)): ?>
  <div class="success">
    <p><b>Mot de passe : </b><?php echo $password ?></p>
    <p><b>Hash correspondant : </b><?= $hash ?></p>
    <p><b>intégrité : </b><?= $check ? 'oui' : 'non' ?></p>
  </div>
  <?php endif ?>
</body>

<style>
  form {
    display: flex;
    flex-direction: column;
  }

  input {
    margin: 10px;
    width: max-content;
  }

  .error {
    border: 1px solid red;
  }

  .text-error {
    color: red;
    font-size: 12px;
    margin: 0 0 0 20px
  }

  .text-error::before {
    content: '🔴 ';
  }

  .success {
    background-color: #b4ffb4;
    padding: 20px;
  }
</style>

</html>