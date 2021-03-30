<?php
//param :(si plusirurs, séparer par une virgule, sans espace)
//PRA_NUM,PRA_NOM,PRA_CP
//Description : (sur une ligen seulement)
//Récuperer tous les infos des praticiens si aucun param, avec param, récupère les infos du praticien demandé (en fonction du nom ou de l'Id)

require '../_conf.php';
$PRA_NUM  = filter_input(INPUT_POST, 'param1');
$PRA_NOM  = filter_input(INPUT_POST, 'param2');


if(empty($PRA_NUM)){
    $PRA_NUM  = filter_input(INPUT_GET, 'PRA_NUM');

}

if(empty($PRA_NOM)){
    $PRA_NOM  = filter_input(INPUT_GET, 'PRA_NOM');

}

if(isset($PRA_NUM)){
    $reqNameUser = 'SELECT * FROM PRATICIEN WHERE PRA_NUM = ?';
    $stmt = $pdo->prepare($reqNameUser);
    $stmt->bindParam(1, $PRA_NUM, PDO::PARAM_INT);
    $stmt->execute();
    $MED_INFO = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($MED_INFO);
}else if(isset($PRA_NOM)){
    $reqNameUser = 'SELECT * FROM PRATICIEN WHERE PRA_NOM LIKE "%'.$PRA_NOM.'%"';
    $stmt = $pdo->prepare($reqNameUser);
    $stmt->bindParam(1, $PRA_NUM, PDO::PARAM_INT);
    $stmt->execute();
    $MED_INFO = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($MED_INFO);
}else{
    $reqNameUser = 'SELECT PRA_NOM FROM PRATICIEN';
    $stmt = $pdo->prepare($reqNameUser);
    $stmt->execute();
    $MED_NOMS = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $json = json_encode($MED_NOMS);
    $json = str_replace("," , ", ", $json);

    echo $json;
}



