<?php
session_start();
require_once('database.php');
$bdd = Database::connect();
?>


<?php


                    


$articles = $bdd->query('SELECT articles FROM titre ORDER BY id DESC');
if(isset($_GET['rep']) AND !empty($_GET['rep'])) {
   $q = htmlspecialchars($_GET['rep']);
         $q_array = explode(' ', $q);
         $q_array = $q;
       
   $articles = $bdd->query('SELECT * FROM titre WHERE articles LIKE "%'.$q.'%" ORDER BY id DESC');
   if($articles->rowCount() == 0 ) {
      $articles = $bdd->query('SELECT articles FROM  titre WHERE CONCAT(titre, contenu) LIKE "%'.$q_array.'%" ORDER BY id DESC');
}
} 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>PARIS-</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="synapse network">
    <meta name="robots" content="index, follow">

    <meta name="keywords" content="parimis, Parimis, hotel-parimis, restaurant-parimis, hotel-restaurant-parimis, parimis-paris, hotel-restaurant-spa,hotel, hotels, hôtel-spa, hôtel-spa Parimis, hotel spa, hotel spa parimis, luxe, hôtel de luxe, hôtel de luxe à Paris, hotel de luxe a paris, spa, soins, relaxation, restaurant, gourmet, hébérgement, hebergement,chambre, chambres, suite, paris, 8 arrondissement, réservation, réservations, reservation, PARIMIS, suite hotel">
    <meta name="googlebot" content="index, follow">

    <link rel="stylesheet" type="text/css" href="../style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
</head>
<!-- Haut de page -->

<body id="top">
    <header id="header" class="hoc clear">
        <div id="verlay">

            <div class="wrapper row1">

                <div id="logo" class="fl_left">
                    <h1></h1>
                    <a href="../index.php"><img src="images/logo.png" alt="une image du logo"></a>
                    <?php echo $userinfo['pseudo'];?>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <div class="burger" onclick="myFunction(this)">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                        <div class="navmenu">
                            <li>
                                <a href="../index.php">accueil</a>
                            </li>
                            <li>
                                <a href="../chambre/chambre.php">Chambres</a>
                            </li>
                            <li>
                                <a href="../bar/restaurant.php">Restaurant</a>
                            </li>
                            <li>
                                <a href='../spa/spa.php'>Spa</a>
                            </li>
                            <li>
                                <a href="../actu/actualite.php">Actualités</a>
                            </li>
                            <li>
                                <a href="../avis/avis.php">Inscription</a>
                            </li>
                        </div>
                        <div class="drapeaux">
                            <a href='#'><img style='width: 40px; ' class="flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/fr.svg" alt="France Flag"></a> &ensp;
                            <a href='#'><img style='width: 40px; ' class="flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg" alt="United Kingdom Flag"></a>
                        </div>
                    </ul>

                </nav>

            </div>
        </div>
    </header>
    <a href="../avis/avis.php" class="reservation">Reservation</a>

    <content>

        <div>
        <div id="pageintro" class="hoc clear">
            <img class="mySlides2 opacity" style="background-image:url('roue/steps-icon-1.png');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb5.jpg');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb2.jpg');display: none;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb3.jpg');display: none;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb4.jpg');display: none;">
            <div class="flexslider basicslider">
                <ul class="slides">

                </ul>
            </div>
        </div>
   </div>
    </content>
        <div style='display:flex;' class="rechercher">
           <i class="fas fa-search">&ensp;</i>
            <form method="GET">
               <input type="search" name="rep" placeholder="Recherche..." />
               <input type="submit" value="Valider" />

            </form>
         </div>
         </div>
<?php if($articles) {
   ?>
   <ul>
   <?php while ($item = $articles->fetch()) {?><h4><ul><li><i><?=   utf8_encode (  $item['articles']  );?></i></li></ul></h4> <?php }  ?>
   </ul>
<?php } 

else {   ?><p>Aucun autre reponse pour:...</p><?php  echo $q;  } 


?>
<?php
         require_once('../php/footer.php');
 ?>

