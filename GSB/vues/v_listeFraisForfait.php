<div class="col-md-10">
    <div class="row">
        <div style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center"  class="col-md-12">
            <h3>Renseigner ma fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h3>

        </div>

        <div style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center" class="col-md-12">
            <form method="POST"  action="index.php?uc=gererFrais&action=validerMajFraisForfait">
                <div class="row">
                    <div class="col-md-4 col-1"></div>

                    <div class="col-md-4 col-11" style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center">
                        <h3>Eléments forfaitisés</h3>

                        <?php
                        foreach ($lesFraisForfait as $unFrais)
                        {
                            $idFrais = $unFrais['idfrais'];
                            $libelle = $unFrais['libelle'];
                            $quantite = $unFrais['quantite'];
                            ?>
                                <div class="row">
                                    <div class="col-md-4 col-6" style="margin-top: 15px; ">
                                        <h5><label for="idFrais"><?php echo $libelle ?></label></h5>

                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" placeholder="Ex.: 56">

                                    </div>
                                </div>


                            <?php
                        }
                        ?>





                    </div>

                </div>
                <div class="row" style="justify-content: center">
                    <p>
                        <input id="ok" type="submit" value="Valider" size="20" />
                        <input id="annuler" type="reset" value="Effacer" size="20" />
                    </p>
                </div>


            </form>
        </div>

    </div>

</div>






