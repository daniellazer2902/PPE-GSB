<?php
//param (si plusieurs, les séparer par une virgule, sans espace):
//MED_DEPOTLEGAL
//Description : (sur une ligen seulement)
//Récuperer tous les noms de medicaments si aucun param, avec param, récupère les infos du medicament demandé

require '../_conf.php';
$MED_DEPOTLEGAL  = filter_input(INPUT_POST, 'param1');

if(empty($MED_DEPOTLEGAL)){
    $MED_DEPOTLEGAL  = filter_input(INPUT_GET, 'MED_DEPOTLEGAL');
}

if(isset($MED_DEPOTLEGAL)){
    $reqNameUser = 'SELECT * FROM MEDICAMENT WHERE MED_DEPOTLEGAL = ?';
    $stmt = $pdo->prepare($reqNameUser);
    $stmt->bindParam(1, $MED_DEPOTLEGAL, PDO::PARAM_STR);
    $stmt->execute();
    $MED_INFO = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($MED_INFO);
}else{
    $reqNameUser = 'SELECT MED_NOMCOMMERCIAL FROM MEDICAMENT';
    $stmt = $pdo->prepare($reqNameUser);
    $stmt->execute();
    $MED_NOMS = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($MED_NOMS);
}



