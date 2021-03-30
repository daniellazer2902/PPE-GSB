<!-- Division pour le sommaire -->
<div id="menuGauche" class="col-12 col-sm-2" style="border-radius: 30px">

    <form method="GET" action="index.php">
    <input type="hidden" name="uc" value="validationFrais">
    <input type="hidden" name="action" value="historique">

        <h4>Selectionner un visiteur</h4>

        <input name="visiteur" type="text" value="<?=$Visiteur?>" >

        <h4>Selectionner un état</h4>

        <select name="etat">
            <option selected>tous</option>
            <option>Refusé</option>
            <option>Validée et mise en paiement</option>
            <option>Saisie clôturée</option>
            <option>Fiche créée, saisie en cours</option>
            
        </select> 


        <h4>Selectionner une date</h4>

        <select name="mois">
            <option selected><?=$Mois?></option>
            <?php
            for($i = 1; $i <= 12; $i++){



                echo '<option>';

                if($i < 10){
                    echo "0";
                }

                echo $i;
                echo '</option>';
            }

            ?>
        </select> 


        <select name="annee">
            <?php
            for($i = date("y"); $i >= 10; $i--){
                echo '<option>20'.$i.'</option>';
            }

            ?>
        </select> 

        

        <p><input type="submit" value="rechercher"></p>
    
    </form>
</div>
    