<?php

$idFiche = filter_input(INPUT_POST, 'idFiche');
$etatFiche = filter_input(INPUT_POST, 'etatFiche');

$idFicheHorsForfait = filter_input(INPUT_POST, 'idFicheHorsForfait');
$etatFicheHorsForfait = filter_input(INPUT_POST, 'etatFicheHorsForfait');


if(isset($etatFiche) && isset($idFiche)){
  $pdo->changeEtatFiche($idFiche, $etatFiche);
}

if(isset($etatFicheHorsForfait) && isset($idFicheHorsForfait)){
    $pdo->changeEtatFicheHorsForfait($idFicheHorsForfait, $etatFicheHorsForfait);
  }

?>
<div id="ContainerLibelleFiches" class="col-md-10 col-sm-12">
    <div id="libelleFiches" class="row">

        <div class="col-md-1 col-sm-12">
            <h5>date</h5>
        </div>
        <div class="col-md-2 col-sm-12">
            <h5>Nom</h5>
        </div>
        <div class="col-md-4 col-sm-12">
            <h5>Dernier modification</h5>
        </div>

        <div class="col-md-4 col-sm-2">
        <h5>Etat</h5>
        </div>
          
    </div>
  <?php
    foreach($lesInfosFicheFrais as $uneInfoForfait){
      ?>
    <div class="row" style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center">

          <div class="col-12 col-md-1">
              <h5><?=substr($uneInfoForfait["dateModif"], 0, -3)?></h5>
          </div>

          <div class="col-12 col-md-2">
              <h5><?php echo $uneInfoForfait["prenom"]." ".$uneInfoForfait["nom"]?></h5>
          </div>

          <div class="col-12 col-md-4">
              <h5><?=$uneInfoForfait["dateModif"]?></h5>
          </div>


          <div class="col-12 col-md-3">
              <h5><?=$uneInfoForfait["libEtat"]?></h5>
          </div>

          <div class="col-12 col-md-2">
              <h5><a href="index.php?uc=validationFrais&action=showFiche&idVisiteur=<?=$uneInfoForfait['idVisiteur']?>&mois=<?=$uneInfoForfait['mois']?>">voir</a></h5>
          </div>
          
      </div>

      <?php
    }
  ?>

</div>








