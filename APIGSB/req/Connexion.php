<?php
//param :(si plusirurs, séparer par une virgule, sans espace)
//VIS_NOM
//Description : (sur une ligen seulement)
//Récuperer les infos d'un visiteur en fonction de son nom. Ex.: Villechalane



echo 'connecter';
/*
require '../_conf.php';
$VIS_NOM  = filter_input(INPUT_POST, 'param1');

if(empty($VIS_NOM)){
    $VIS_NOM = filter_input(INPUT_GET, 'VIS_NOM');

}

$reqNameUser="SELECT * FROM VISITEUR WHERE VIS_NOM = ?";
$stmt=$pdo->prepare($reqNameUser);
$stmt->bindParam(1, $VIS_NOM, PDO::PARAM_STR);
$stmt->execute();
$VIS_INFOS=$stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($VIS_INFOS); */