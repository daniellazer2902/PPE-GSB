
<div class="col-md-2">
</div>
<div class="col-md-10" style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center">
    <div class="row">
        <div   class="col-md-12">
            <h3>Descriptif des éléments hors forfait</h3>

            <div class="row" style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center">
                <div class="col-md-2 col-6">
                    <p>Date</p>
                </div>
                <div class="col-md-2 col-6">
                    <p>Libellé</p>
                </div>
                <div class="col-md-2">
                    <p>Montant</p>
                </div>
                <div class="col-md-2">
                    <p>Etat</p>
                </div>
                <div class="col-md-2">
                    <p></p>
                </div>

            </div>

            <?php
            foreach( $lesFraisHorsForfait as $unFraisHorsForfait)
            {
                $libelle = $unFraisHorsForfait['libelle'];
                $date = $unFraisHorsForfait['date'];
                $montant=$unFraisHorsForfait['montant'];
                $id = $unFraisHorsForfait['id'];
                $etat = $unFraisHorsForfait['etat'];

                ?>
                <div class="row" style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center">
                    <div class="col-md-2 col-6">
                        <p><?php echo $date ?></p>
                    </div>
                    <div class="col-md-2 col-6">
                        <p><?php echo $libelle ?></p>
                    </div>
                    <div class="col-md-2">
                        <p><?php echo $montant ?></p>
                    </div>
                    <div class="col-md-2">
                        <p><?php echo $etat ?></p>
                    </div>
                    <div class="col-md-2">
                        <p><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>"
                              onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></p>
                    </div>

                </div>

                <?php

            }
            ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <h3>Nouvel élément hors forfait</h3>

            <form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post">
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4" style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center">
                        <div class="row">
                            <div class="col-md-5 col-4">
                                <h5 for="txtDateHF">Date </h5>
                            </div>
                            <div class="col-md-6 col-6">
                                <input type="text" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value=""  placeholder="(jj/mm/aaaa)" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-4">
                                <h5 for="txtLibelleHF">Libellé</h5>
                            </div>
                            <div class="col-md-6 col-6">
                                <input type="text" id="txtLibelleHF" name="libelle" maxlength="256" value="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-4">
                                <h5 for="txtMontantHF">Montant </h5>
                            </div>
                            <div class="col-md-6 col-6">
                                <input type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" />
                            </div>
                        </div>

                    </div>


                </div>
                <div class="row" style="justify-content: center">
                    <p>
                        <input id="ajouter" type="submit" value="Ajouter" size="20" />
                        <input id="effacer" type="reset" value="Effacer" size="20" />
                    </p>
                </div>

            </form>
        </div>


    </div>
</div>

