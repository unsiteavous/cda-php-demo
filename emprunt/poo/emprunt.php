<?php
if (!isset($Emprunt) || !$Emprunt) {
  include "entity/Emprunt.php";
  $Emprunt = new Emprunt();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emprunt</title>
</head>

<body>
  <form action="traitement" method="POST">
    <label for="montant">Montant de l'emprunt :
      <input type="number" name="montant" id="montant" value="<?= $Emprunt->getMontant() ?? '' ?>" required min="1">
    </label>
    <?php if (isset($Emprunt->getErrors()['montant'])) : ?>
      <div class="error">
        <?= $Emprunt->getErrors()['montant'] ?>
      </div>
    <?php endif ?>

    <label for="taux">Taux d'intérêt :
      <input type="number" step="0.1" name="taux" id="taux" value="<?= $Emprunt->getTaux() ?? '' ?>" required min="0" max="99">
    </label>
    <?php if (isset($Emprunt->getErrors()['taux'])) : ?>
      <div class="error">
        <?= $Emprunt->getErrors()['taux'] ?>
      </div>
    <?php endif ?>

    <label for="duree">Durée de l'emprunt :
      <input type="number" name="duree" id="duree" value="<?= $Emprunt->getDuree() ?? '' ?>" min="0" max="25" required >
    </label>
    <?php if (isset($Emprunt->getErrors()['duree'])) : ?>
      <div class="error">
        <?= $Emprunt->getErrors()['duree'] ?>
      </div>
    <?php endif ?>

    <?php if (!empty($Emprunt->getErrors()['empty'])) { ?>
      <div class="error">
        <?= $Emprunt->getErrors()['empty'] ?>
      </div>
    <?php } ?>
    <input type="submit" value="Calculer">
  </form>

  <!-- // Affichage des retours (erreurs & succès) -->
</body>

<style>
  form {
    display: flex;
    flex-direction: column;
  }

  .error {
    background-color: #faa;
  }

  .error::before {
    content: "🔴";
  }
</style>

</html>