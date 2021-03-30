<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>APIGSB</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body{
            background-image: url('https://parlera.fr/wp/wp-content/uploads/2017/04/soft-white-wallpaper-48324-49923-hd-wallpapers.jpg');
            background-repeat: no-repeat;
            background-size: cover;

        }

        * {
            Padding: 0;
            Margin: 0;
            Box-sizing: border-box;
        }

        a { color: #FF0000; }

        .requete{
            background-color: #EFEFEF;
            box-shadow: 12px 12px 2px 1px #00000029;
            border: black 2px solid;
            margin: 20px;
            padding: 20px;
            border-radius: 19px;
        }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">    <link rel="icon" type="image/x-icon" href="OmniaLogo.PNG"/>
    <link rel="shortcut icon" type="image/x-icon" href="images/OmniaLogo.PNG"/>
    <link type="text/css" href="includes/styleK.css" rel="stylesheet">
</head>
    <body>
        <div class="container">

            <div class="row" style="margin-top: 100px;">
                <div class="col-md-12">
                    <h2>Bienvenue sur l'API de GSB</h2>
                    <h6>Vous pouvez voir ici un aperçu de toutes les requetes necessaire pour le bon fonctionnement de notre application mobile</h6>
                    <h4>REQUETES :</h4>
                    <?php
                    $dir_iterator = new RecursiveDirectoryIterator(dirname(__FILE__));

                    $iterator = new RecursiveIteratorIterator($dir_iterator);
                    $i = 0;
                    foreach ($iterator as $file) {
                        $i++;
                        if(substr($file, strlen($file) - 2) != ".." && substr($file, strlen($file) - 2) != "\." && !strpos($file, "_conf.php") && !strpos($file, "routes.php") && !strpos($file, ".idea")){
                            //echo $file.'<br>';
                            
                            $files = substr($file, 27);
                            //echo $files;
                            $fichier=substr($files, 7);
                            //echo $fichier.'<br>';
                            $fichier = str_replace("\\","/",$fichier);
                            // echo substr($file, strlen($file) - 2);
                            $param=file($file);

                            ?>
                                <div class="requete">
                                    <p><strong>routes :</strong> <a href="../<?=$files?>"><?=$files?></a></p>
                                    <p><strong>Description :</strong> <?=substr($param[4], 2)?></p>
                                    <?php
                                       $tabParam = explode(',', substr($param[2], 2));
                                       foreach ($tabParam as $param){
                                           ?>

                                           <div class="row">
                                               <div class="col-md-3">
                                                   <p><strong><?=$param?> :</strong> </p>
                                               </div>
                                               <div class="col-md-9">
                                                   <input class="<?=$i?>" type="text">
                                               </div>
                                           </div>
                                           <?php
                                       }
                                       ?>
                                            <div class="row">
                                                <div class="col-md-9" style="display: flex; justify-content: flex-end">
                                                    <input style="margin-right: 10px;" onclick="executerequete(<?=$i?>, '<?=$fichier?>');" type="submit" value="entrer">
                                                    <input onclick="nettoyer(<?=$i?>);" type="submit" value="nettoyer">
                                                </div>
                                            </div>
                                            <div id="<?=$i?>"  class="row">

                                            </div>
                                        <?php

                                    ?>
                                </div>


                            <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>

    <script>
        function executerequete(id, fichier){
            //console.log(fichier);
            var text = document.getElementsByClassName(id);
            var param1 = text[0].value;

            try{
                var param2 = text[1].value;
            } catch(ex){
                var param2 = "";
            }
            try{
                var param3 = text[2].value;
            } catch(ex){
                var param3 = "";
            }
            try{
                var param4 = text[3].value;
            } catch(ex){
                var param4 = "";
            }
            try{
                var param5 = text[4].value;
            } catch(ex){
                var param5 = "";
            }


            $.post(fichier, {param1: param1, param2: param2, param3: param3, param4: param4, param5: param5})
                .done(function(res) {
                    console.log(res);
                    document.getElementById(id).innerHTML = '<div class="row"><h4>Reponse : </h4><p>' + res + '</p></div>';
                });

        };


        function nettoyer(id){
            document.getElementById(id).innerHTML = '';
        }
    </script>

    </body>
</html>