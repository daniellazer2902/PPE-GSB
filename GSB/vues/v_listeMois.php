
<div class="col-md-10">
    <div class="row">
        <div class="col-md-12" style="margin: 10px 0 0 0; border: 2px solid #6988BE; min-height: 80px; padding: 10px; border-radius: 20px; background-color: rgba(230, 230, 255, 0.5); align-items: center">
            <div>
                <h2>Mes fiches de frais</h2>
            </div>

            <div>
                <h3>Selectionnez un mois : </h3>
                <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
                    <select id="lstMois" name="lstMois">
                        <?php
                        foreach ($lesMois as $unMois)
                        {
                            $mois = $unMois['mois'];
                            $numAnnee =  $unMois['numAnnee'];
                            $numMois =  $unMois['numMois'];
                            if($mois == $moisASelectionner){
                                ?>
                                <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                                <?php
                            }
                            else{ ?>
                                <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                                <?php
                            }

                        }

                        ?>

                    </select>
                    <input id="ok" type="submit" value="Valider" size="20" />
                </form>
            </div>
        </div>
    </div>
</div>