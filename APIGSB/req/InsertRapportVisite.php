<?php
//param (si plusieurs, les séparer par une virgule, sans espace):
//VIS_MATRICULE,PRA_NUM,RAP_DATE,RAP_BILAN,RAP_MOTIF
//Description : (sur une ligen seulement)
//Récuperer tous les noms de medicaments si aucun param, avec param, récupère les infos du medicament demandé

$VIS_MATRICULE  = filter_input(INPUT_POST, 'param1');
$PRA_NUM  = filter_input(INPUT_POST, 'param2');
$RAP_DATE  = filter_input(INPUT_POST, 'param3');
$RAP_BILAN  = filter_input(INPUT_POST, 'param4');
$RAP_MOTIF  = filter_input(INPUT_POST, 'param5');
if(!empty($VIS_MATRICULE) && !empty($PRA_NUM) && !empty($RAP_DATE) && !empty($RAP_BILAN) && !empty($RAP_MOTIF)){
    try{
        $reqNameUser = 'INSERT INTO RAPPORT_VISITER(VIS_MATRICULE,PRA_NUM,RAP_DATE,RAP_BILAN,RAP_MOTIF) VALUES(?, ?, ?, ?, ?)';
        $stmt = $pdo->prepare($reqNameUser);
        $stmt->bindParam(1, $VIS_MATRICULE, PDO::PARAM_STR);
        $stmt->bindParam(2, $PRA_NUM, PDO::PARAM_STR);
        $stmt->bindParam(3, $RAP_DATE, PDO::PARAM_STR);
        $stmt->bindParam(4, $RAP_BILAN, PDO::PARAM_STR);
        $stmt->bindParam(4, $RAP_MOTIF, PDO::PARAM_STR);

        $stmt->execute();

        echo 'La requete s\'est bien executé';
    }catch(ex){
        echo 'La requete a eu un problème, ré essayez';
    }
}else{
    echo 'il doit y avoir une erreur dans les paramêtres';
}

