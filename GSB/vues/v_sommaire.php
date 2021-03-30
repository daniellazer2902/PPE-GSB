    <!-- Division pour le sommaire -->
    <div id="menuGauche" class="col-12 col-sm-2" style="border-radius: 30px">

        <ul id="menuList" class="row">
			   <li class="col-12">
				      <?php echo $_SESSION['role']."  :  ".$_SESSION['prenom']."  ".$_SESSION['nom'];  ?>
			   </li>


            <?php if($_SESSION['role'] === 'Visiteur') {?>

                  <li class="smenu col-6 col-sm-12">
                     <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
                  </li>
                  <li class="smenu">
                     <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
                  </li>

            <?php }
            else {?>

                  <li class="smenu col-8 col-sm-12">
                     <a href="index.php?uc=validationFrais&action=historique" title="Validation des fiches">Validation des fiches</a>
                  </li>

            <?php }?>


 	         <li class="smenu col-4 col-sm-12">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
            </li>

         </ul>
        
    </div>
    