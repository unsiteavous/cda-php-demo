<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  header('location: emprunt.php');
}
?>
<div>
  <p>
    Nombre de mensualités : 
    <span><?= $nbMois ?></span>
  </p>
  <p>
    Montant des mensualités : 
    <span><?= $mensualites ?></span>
  </p>
  <p>
    Montant total : 
    <span><?= $montantTotal ?></span>
  </p>
  <p>
    Coût de l'emprunt : 
    <span><?= $coutEmprunt ?></span>
  </p>

</div>