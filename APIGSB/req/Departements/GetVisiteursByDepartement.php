<?php
//param :(si plusirurs, séparer par une virgule, sans espace)
//VIS_CP
//Description :(sur une ligen seulement)
//Récuperer les medecins en fonction d'un departement

require '../../_conf.php';
$VIS_CP  = filter_input(INPUT_POST, 'param1');

if(empty($VIS_CP)){
    $VIS_CP = filter_input(INPUT_GET, 'VIS_CP');

}

$reqNameUser = 'SELECT DISTINCT * FROM PRATICIENS WHERE PRA_CP LIKE "%' . $VIS_CP . '%"';

$stmt = $pdo->prepare($reqNameUser);
$stmt->execute();
$VIS_INFOS = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($VIS_INFOS);