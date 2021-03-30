<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];

        $visiteur = $pdo->getInfosVisiteur($login);
		$comptable = $pdo->getInfosComptable($login);

		if ($visiteur != false || $comptable != false) {

            if(password_verify($mdp, $visiteur['hashmdp']) || password_verify($mdp, $comptable['hashmdp'])){
                if (is_array( $visiteur)){
                    $id = $visiteur['id'];
                    $nom =  $visiteur['nom'];
                    $prenom = $visiteur['prenom'];
                    connecter($id,$nom,$prenom, 'Visiteur');
                    include("vues/v_sommaire.php");
                    include("vues/v_accueilVisiteur.php");
                }
                else if (is_array( $comptable)){
                    $id = $comptable['id'];
                    $nom =  $comptable['nom'];
                    $prenom = $comptable['prenom'];
                    connecter($id,$nom,$prenom, 'Comptable');
                    include("vues/v_sommaire.php");
                    include("vues/v_accueilComptable.php");
                }
            }else{
                ajouterErreur("mot de passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
            }
        }else {
            ajouterErreur("Login incorrect");
            include("vues/v_erreurs.php");
            include("vues/v_connexion.php");
        }
		break;

	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}


?>