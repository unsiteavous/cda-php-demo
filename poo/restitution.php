<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('location: emprunt.php');
}
?>
<div>
  <p>
    Nombre de mensualités : 
    <span><?= $Emprunt->getNbMois() ?></span>
  </p>
  <p>
    Montant des mensualités : 
    <span><?= $Emprunt->getMensualites() ?></span>
  </p>
  <p>
    Montant total : 
    <span><?= $Emprunt->getMontantTotal() ?></span>
  </p>
  <p>
    Coût de l'emprunt : 
    <span><?= $Emprunt->getCoutEmprunt() ?></span>
  </p>

</div>