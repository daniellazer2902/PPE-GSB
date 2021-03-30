<?php

$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['id'];
$role = $_SESSION['role'];


if($role == 'Comptable') {
    switch($action){
        case 'historique':{
           // $lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
            // Afin de sélectionner par défaut le dernier mois dans la zone de liste
            // on demande toutes les clés, et on prend la première,
            // les mois étant triés décroissant

            $Visiteur = filter_input(INPUT_GET, 'visiteur');

            $Annee = filter_input(INPUT_GET, 'annee');
            $Mois = filter_input(INPUT_GET, 'mois');
            $Etat = filter_input(INPUT_GET, 'etat');


            if(!isset($Visiteur)){
                $Visiteur="";
            }

            if(!isset($Mois)){
                $Mois=date("m");
            }

            if(!isset($Annee)){
                $Annee=date("yy");
            }


            if($Etat == "tous"){
                $Etat = "";
            }else if(!isset($Etat)){
                $Etat = "";
            }

            $lesInfosFicheFrais = $pdo->getLesInfosFicheFraisByRecherche($Visiteur, $Annee, $Mois, $Etat, 10);

            include("vues/v_selectFiche.php");
            include("vues/v_tousetatFrais.php");
            include("vues/v_sommaire.php");
            

            break;
        }
        case 'showFiche':{
            include("vues/v_sommaire.php");

            $idVisiteur = filter_input(INPUT_GET, 'idVisiteur');
            $leMois = filter_input(INPUT_GET, 'mois');
            $moisASelectionner = $leMois;

            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
            $lesTarifsFrais = $pdo->getLesTarifsFrais();


            $numAnnee =substr( $leMois,0,4);
            $numMois =substr( $leMois,4,2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif =  $lesInfosFicheFrais['dateModif'];
            $dateModif =  dateAnglaisVersFrancais($dateModif);
            include("vues/v_etatFrais.php");
        }
    }
}

?>