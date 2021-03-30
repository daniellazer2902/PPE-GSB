<div class="col-md-12">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-10 ContainerBleu" style="margin-bottom: 50px">
            <div class="row ">
                <div class="col-md-12">
                    <div class="row">
                        <h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : </h3>
                    </div>
                    <div class="row">
                        <h4>Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?></h4>
                    </div>
                    <div class="row">
                        <h4> Montant validé : <?php echo $montantValide?></h4>
                    </div>
                </div>
            </div>
            <div>
                <h3>Eléments forfaitisés</h3>
            </div>
            <div class="row">
                <div class="col-md-12 col-6 ContainerBleu">
                    <div class="row">
                        <div class="col-md-2" style="height: 50px;"></div>
                        <?php
                        foreach ( $lesFraisForfait as $unFraisForfait )
                        {
                            $libelle = $unFraisForfait['libelle'];
                            ?>
                            <div class="col-md-2" style="vertical-align: center">
                                <h5 style="height: 70px;"> - <?php echo $libelle?></h5>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-md-2">
                            <h5 style="margin-top: 0px;"> - Etat</h5>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-6 ContainerBleu">
                    <div class="row">
                        <div class="col-md-2">
                            <h5>Quantite Visiteur</h5>
                        </div>

                        <?php
                        $tabquantite = array();
                        foreach (  $lesFraisForfait as $unFraisForfait  ) {
                            $quantite = $unFraisForfait['quantite'];
                            array_push($tabquantite, $quantite);
                            ?>
                            <div class="col-md-2" style="height: 80px;"><?php echo $quantite?> </div>
                            <?php
                        }
                        ?>
                        <div class="col-md-2">
                            <?php
                            if($_SESSION['role'] == 'Comptable'){
                                ?>
                                <form method="POST" action="index.php?uc=validationFrais&action=historique">
                                    <input name="idFiche" type="hidden" value="<?=$lesFraisForfait[0]["idFiche"]?>">
                                    <select name="etatFiche">
                                        <option selected><?php echo $lesFraisForfait[0]["Etat"]?></option>
                                        <option value="VA" >Validée et mise en paiement</option>
                                        <option value="RF">Refusé</option>
                                    </select>
                                    <input type="submit"></input>
                                </form>

                                <?php
                            }else{
                                echo $lesFraisForfait[0]["Etat"];
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if($_SESSION['role'] == 'Comptable'){
                ?>
                <div class="row">
                    <div class="col-md-12 col-6 ContainerBleu">
                        <div class="row">
                            <div class="col-md-2">
                                <h5 style="height: 70px">Infos Tarifs</h5>
                            </div>

                            <?php
                            $tabmontant = array();
                            foreach ($lesTarifsFrais as $unFrais) {
                                $mont = $unFrais['montant'];
                                array_push($tabmontant, $mont);

                                ?>
                                <div class="col-md-2" style="height: 70px"><?php echo $mont?> </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-12 col-6 ContainerBleu">
                        <div class="row">
                            <div class="col-md-2">
                                <h5 style="height: 70px">Quantites * Tarifs</h5>
                            </div>

                            <?php
                            $total = 0;
                            for ($i=0; $i< count($tabquantite); $i++) {
                                $multiplication = $tabquantite[$i] * $tabmontant[$i];
                                $total += $multiplication;
                                ?>
                                <div class="col-md-2" style="height: 70px"><?php echo $multiplication ?> </div>
                            <?php } ?>
                            <td class="col-md-2"><?php echo "Total : ".$total ?> </td>
                        </div>
                    </div>
                </div>


                <?php
            }
            ?>



            <div>
                <h3>Eléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -</h3>
            </div>
            <div class="row ContainerBleu">

                <div class="col-4 col-md-2">
                    <h5>date</h5>
                </div>

                <div class="col-4 col-md-2">
                    <h5>libelé</h5>
                </div>

                <div class="col-4 col-md-2">
                    <h5>montant</h5>
                </div>

                <div class="col-6 col-md-2">
                    <h5>état</h5>
                </div>

            </div>
                <?php
                foreach ( $lesFraisHorsForfait as $unFraisHorsForfait )
                {
                    $date = $unFraisHorsForfait['date'];
                    $libelle = $unFraisHorsForfait['libelle'];
                    $montant = $unFraisHorsForfait['montant'];
                    $etat = $unFraisHorsForfait['etat'];

                    ?>
                    <div class="row ContainerBleu">

                        <div class="col-4 col-md-2">
                            <p><?php echo $date ?></p>
                        </div>

                        <div class="col-4 col-md-2">
                            <p><?php echo $libelle ?></p>
                        </div>

                        <div class="col-4 col-md-2">
                            <p><?php echo $montant ?></p>
                        </div>

                        <div class="col-12 col-md-3">


                            <?php
                            if($_SESSION['role'] == 'Comptable'){
                                ?>

                                <form method="POST" action="index.php?uc=validationFrais&action=historique">
                                    <input name="idFicheHorsForfait" type="hidden" value="<?=$unFraisHorsForfait['id']?>">
                                    <select name="etatFicheHorsForfait">
                                        <option selected><?php echo $etat ?></option>
                                        <option value="VA" >Validée et mise en paiement</option>
                                        <option value="RF">Refusé</option>
                                    </select>
                                    <input type="submit"></input>
                                </form>

                                <?php

                            }else{
                                echo $etat;
                            }

                            ?>

                        </div>

                    </div>
                    <?php
                }
                ?>
        </div>
    </div>
</div>














