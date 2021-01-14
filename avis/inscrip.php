<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Accueil-Parimis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="synapse network">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="parimis, Parimis, hotel-parimis, restaurant-parimis, hotel-restaurant-parimis, parimis-paris, hotel-restaurant-spa,hotel, hotels, hôtel-spa, hôtel-spa Parimis, hotel spa, hotel spa parimis, luxe, hôtel de luxe, hôtel de luxe à Paris, hotel de luxe a paris, spa, soins, relaxation, restaurant, gourmet, hébérgement, hebergement,chambre, chambres, suite, paris, 8 arrondissement, réservation, réservations, reservation, PARIMIS, suite hotel">
    <meta name="googlebot" content="index, follow">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link rel="stylesheet" href="connexion.php">

</head>
<!-- Haut de page -->

<body id="top">




        <!---------------------------------------%%%%%%%%%%%%%%%%%%%formulaire%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%------------------------------------------>

        <div class="container">
            <div class="heading">
                <h2>Inscription</h2>
            </div>


            <form method="POST" action="" class="group btmspace-50 demo">
                <table class="cartebleu">
                    <tr>
                        <td>
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mail">Mail :</label>
                        </td>
                        <td>
                            <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mail2">Confirmation du mail :</label>
                        </td>
                        <td>
                            <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mdp">Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mdp2">Confirmation du mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br />
                            <input class="button" type="submit" name="forminscription" value="Je m'inscris" />
                        </td>
                    </tr>
                </table>
            </form>
            <a href="../php/connexion.php"> Connectez-vous</a>

        </div>


        <!--------------------------------------------------------%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%>>>>>>>>>>----------------------------->
      
        <!-- FIN DU FOOTER -->

        <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

        <script src="jquery.js"></script>
        <script src="backtotop.js"></script>
        <script src="script.js"></script>
</body>

</html>