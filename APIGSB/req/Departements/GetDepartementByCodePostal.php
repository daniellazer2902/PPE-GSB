<?php
//param : (si plusirurs, séparer par une virgule, sans espace)
//PRA_CP
//Description : (sur une ligen seulement)
//Récuperer la liste des départements qio ont au moins un medecin

require '../../_conf.php';
$VIS_CP  = filter_input(INPUT_POST, 'param1');

if(empty($VIS_CP)){
    $VIS_CP = filter_input(INPUT_GET, 'VIS_CP');

}

$reqNameUser='SELECT DISTINCT PRA_CP FROM PRATICIEN WHERE PRA_CP LIKE "%'.$VIS_CP.'%"';

$stmt=$pdo->prepare($reqNameUser);
$stmt->execute();
$VIS_INFOS=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($VIS_INFOS);