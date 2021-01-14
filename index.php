<?php
session_start();
require_once('php/database.php');
$bdd = Database::connect();

setcookie("pseudo","mail", time() +3600+24+30 );

//pour l'autre page
/*require_once(__DIR__).'function'. DIRECTORY_SEPARATOR. 'compteur.php';
ajouter_vue();*/

if(isset($_GET['id']) AND $_GET['id'] >0 ) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
   if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']){
  
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['avatar'] = $user['avatar'];
 
   }
  
}
?>
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

</head>
<!-- Haut de page -->

<body id="top">
    <header id="header" class="hoc clear">
        <div id="verlay">

            <div class="wrapper row1">

                <div id="logo" class="fl_left">
                    <h1></h1>
                    <a href="index.php"><img src="images/logo.png" alt="une image du logo"></a>
                </div>
                

                <!--la nav bar menu-->
                <nav id="mainav" class="fl_right">

                    <ul class=" clear">
                        <div class="burger" onclick="myFunction(this)">
                        
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                        <div class="navmenu">
                            <li>
                                <a href="histoires/histoire.html">Parimis</a>
                            </li>
                            <li>
                                <a href="chambre/chambre.php">Chambres</a>
                            </li>
                            <li>
                                <a href="bar/restaurant.php">Restaurant</a>
                            </li>
                            <li>
                                <a href='spa/spa.php'>Spa</a>
                            </li>
                            <li>
                                <a href="actu/actualite.php">Actualités</a>
                            </li>
                            <li>
                                <a href="avis/avis.php">Inscription</a>
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
    
    <a href="avis/avis.php" class="reservation">Reservation</a>

    <content>
        <!--image caroussel-->
        </div>
        <div id="pageintro" class="hoc clear">
            <img class="mySlides2 opacity" style="background-image:url('images/palweb2018.jpg');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('images/spa-long-img.jpg');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('images/spa-anthelia-ppalweb2018.jpg');display: none;">
            <img class="mySlides2 opacity" style="background-image:url('images/exemple-img.jpg');display: none;">
            <img class="mySlides2 opacity" style="background-image:url('images/img-pont-long.jpg');display: none;">
            <div class="flexslider basicslider">
                <ul class="slides">

                </ul>
            </div>
        </div>
        </div>
        <div>
            <div style='display:flex;' class="rechercher">
                <form method="GET" class="formulaire">
                            <!--<i class="fas fa-search"></i>-->
                        <a href="php/bardeRecherche.php">
                            <input  type="search" name="q" placeholder="" />
                            <input type="submit" value="Recherche..." class="fas fa-search"/>
                        </a>
                </form>
               
            </div>
        </div>
        <!--FIN top page -->
        <!-- onglets -->
        <div class="centrage">
                <ul class="formulaire">
                    <a href="../index.php" class="logo"><strong> Bienvenue chez nous-</strong><?php echo $userinfo['pseudo'];?></a>

                    <a href="php/deconnexion.php"><button> Deconnexion</button></a>
                </ul>

            <div class="partie1">
                <div class="divider"></div>
                <h2>Spa</h2>
                <p>Venez découvrir notre Spa équipé d'une salle de sport et d'une piscine ainsi qu'un sallon de massage. Relaxant, énergisant, détoxifiant ou encore réconfortant, l'hôtel Parimis vous propose des massages et traitements corps adaptés à toutes
                    vos envies. Pour un bien-être complet, découvrez également nos gommages et de nos enveloppements corps. L’hôtel Parimis offre aussi des soins localisés, pour les mains, le dos, le ventre ou les jambes ainsi qu’un de soin spécifique
                    pour les femmes enceintes.
                </p>
                <div class="group btmspace-50 demo">
                    <div class="one_half first"><img class="inspace-10 borderedbox" src="images/Thalasso-Concarneau-Spa-Marin-Piscine.jpg" alt="une image de Piscine"></div>
                    <div class="one_half"><img class="inspace-10 borderedbox" src="images/soins2.jpg" alt="une image de Spa"></div>
                </div>

                <div class="divider"></div>
                <h2>Nos Chambres</h2>
                <p class="justify">
                    Pour un séjour inoubliable au coeur de la vie parisienne, l'Hôtel Parimis dispose de 20 chambres et suites, toutes climatisées et insonorisées. Toutes bénéficient d'un cachet et d'une décoration uniques au sein une atmosphère raffinée et typiquement parisienne.
                    La plupart des chambres jouissent de vues exceptionnelles sur les monuments environnants. Les autres donnant sur notre calme cour arborée.</p>



                <!-- CHAMBRE -->
                <div class="group btmspace-50 demo">
                    <div class="one_quarter first">
                        <p>- Chambre Classique -</p>
                        <img class="inspace-10 borderedbox" src="images/chambre3.jpg" alt="une image de l'hotel">
                        <a href="php/connexion.php"><button><i class="far fa-calendar-alt"></i> Reserver</button></a>
                    </div>

                    <div class="one_quarter">
                        <p>- Chambre Confort -</p>
                        <img class="inspace-10 borderedbox" src="images/chambre2.jpg" alt="une image de l'hotel">
                        <a href="php/connexion.php"><button><i class="far fa-calendar-alt"></i> Reserver</button></a>
                    </div>
                    <div class="one_quarter">
                        <p>- Chambre Deluxe -</p>
                        <img class="inspace-10 borderedbox" src="images/chambre.jpg" alt="une image de l'hotel">
                        <a href="php/connexion.php"><button><i class="far fa-calendar-alt"></i> Reserver</button></a>
                    </div>
                    <div class="one_quarter">
                        <p>- Chambre Suite -</p>
                        <img class="inspace-10 borderedbox" src="images/chambre1.jpg" alt="une image de l'hotel">
                        <a href="php/connexion.php"><button><i class="far fa-calendar-alt"></i> Reserver</button></a>
                    </div>
                </div>
            </div>
            <!-- PARTIE 1 -->

            <div class="group btmspace-50 demo">
                <article class="partie2">
                    <div class="divider"></div>
                    <h2>Restaurant</h2>
                    <p>Nous avons plusieurs chefs extrement qualifiés. Avec notre équipe, ils imaginent nos cartes pour vous offrir des plats d'exception. Que vous recherchiez cuisine tendance, en-cas savoureux ou cadre sophistiqué, notre restaurant fait
                        partie des lieux les plus prisés de Paris...</p>
                </article>
                <div class="one_third first"><img style="border-radius: 5%;" src="images/restaurant1.jpg" alt="">
                    <div class="divider"></div>
                    <h3>Carte Restaurant</h3>
                    <p style="text-align:justify;">Notre bar propose une grande carte de cocktails avec de nombreuses créations, Comme en-cas savoureux ou cadre sophistiqué, notre restaurant fait partie des lieux les plus prisés de Paris.</p>
                </div>
                <div class="one_third"><img style="border-radius: 5%;" src="images/restaurant.jpg" alt="">
                    <div class="divider"></div>
                    <h3>Carte Dégustation</h3>
                    <p style="text-align:justify;">Au cœur de l’hôtel, le bar offre une belle sélection de boissons maison et de cocktails signature, à déguster perchés sur les hauts tabourets du comptoir ou lovés dans les fauteuils cosy
                    </p>
                </div>
                <div class="one_third"><img style="border-radius: 5%;" src="images/restaurant3.jpg" alt="">
                    <div class="divider"></div>
                    <h3>Carte Brasseriee</h3>
                    <p style="text-align:justify;">Café coloré propose une belle carte de cuisine traditionnelle et de saison. Buffet à volonté tous les samedis soirs et brunch tous les dimanches midi (pas de service à la carte les samedis soir et dimanches midi) Bar : ambiance feutrée
                        et chaleureuse, le bar vous invite à une pause détente autour d’une grande carte de
                    </p>
                </div>
            </div>


            <!-- FIN de la page d'accueil -->
        </div>
        <!-- RESERVATION CHAMBRE -->
        <article class="hoc container clear">
            <div class="three_quarter first">
                <h6 class="nospace">Reservez! </h6>
                <p class="nospace">N'hesitez pas à nous contacter.</p>
            </div>
            <footer class="one_quarter"><a class="btn" href="avis/avis.php">Cliquez ici »</a></footer>

        </article>
        <!-- FIN DE RESERVATION CHAMBRE -->
        <!-- ACTUALITES -->
        <div class="wrapper row3">
            <section class="hoc container clear">

                <div class="btmspace-50 center">
                    <h2>Les Actualités de l'Hotel</h2>
                    <p>Des evenements sont régulierement organisés pour vous. </p>
                </div>
                <div id=maino>
                    <ul class="nospace group">
                        <li class="one_third first">
                            <article class="excerpt">
                                <a href="#"><img class="inspace-10 borderedbox king" src="images/art.jpg" alt="une image de l'exposition"></a>
                                <div class="excerpttxt">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 06/01/2018</li>
                                        <li><i class="fa fa-comments"></i> <a href="#">4</a></li>
                                    </ul>
                                    <h6 class="heading font-x1">Exposition de Pop-Art Marvel</h6>
                                    <p><a href="actu/actualite.php">En savoir plus &raquo;</a></p>
                                </div>
                            </article>
                        </li>
                        <li class="one_third">
                            <article class="excerpt">
                                <a href="#"><img class="inspace-10 borderedbox king" src="images/art1.jpg" alt="une image de BBKING"></a>
                                <div class="excerpttxt">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 05/07/2018</li>
                                        <li><i class="fa fa-comments"></i> <a href="#">4</a></li>
                                    </ul>
                                    <h6 class="heading font-x1">Les Amants de la bastille seront présent dans notre salles des fêtes</h6>
                                    <p><a href="actu/actualite.php">En savoir plus &raquo;</a></p>
                                </div>
                            </article>
                        </li>
                        <li class="one_third">
                            <article class="excerpt">
                                <a href="#"><img class="inspace-10 borderedbox king" src="images/rang-bon-man.jpg" alt="une image des amants de la bastille"></a>
                                <div class="excerpttxt">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 04/01/2017</li>
                                        <li><i class="fa fa-comments"></i> <a href="#">4</a></li>
                                    </ul>
                                    <h6 class="heading font-x1">L'un des meilleurs Blues/soul man jouera dans notre établissement</h6>
                                    <p><a href="actu/actualite.php">En savoir plus &raquo;</a></p>
                                </div>
                            </article>
                        </li>
                    </ul>
                </div>
            </section>
        </div>

        <!-- FIN DE ACTUALITES -->
        <!-- MAP -->
        <div class="maps">
            <h2>Plan d'Accès</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10498.596421239594!2d2.2930292403146737!3d48.864901234301115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fdd0b743c25%3A0xf7293b466460cc38!2s1.+Avenue+Montaigne%2C+75008+Paris!5e0!3m2!1sfr!2sfr!4v1524784608977"
                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="partie1">
            <div class="divider"></div>
        </div>
        <!-- FIN DE MAP -->

        <!-- FOOTER -->
        <div class="bgded overlay" style="background-image:url('images/photo-heffel.jpg');">

            <div class="wrapper row4">
                <footer id="footer" class="hoc clear">

                    <div class="btmspace-50 center">
                        <h2 class="heading">Informations</h2>
                    </div>
                    <ul class="nospace group">
                        <li class="one_quarter first">
                            <div class="infobox"><i class="fa fa-phone"></i>
                                <ul class="nospace">
                                    <li>01 30 45 67 89</li>
                                    <li>01 30 45 67 90</li>
                                </ul>
                            </div>
                        </li>
                        <li class="one_quarter">
                            <div class="infobox"><i class="fa fa-envelope-o"></i>
                                <ul class="nospace">
                                    <li><a href="#">info@Parimis.com</a></li>
                                    <li><a href="#">recrut@Parimis.com</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="one_quarter">
                            <div class="infobox"><i class="fa fa-clock-o"></i>
                                <ul class="nospace">
                                    <li>Ouvert 24h/24</li>
                                    <li>1 Avenue Montaigne</li>
                                    <li>75008 Paris</li>

                                </ul>
                            </div>
                        </li>
                        <li class="one_quarter">
                            <div class="infobox"><i class="fa fa-support"></i>
                                <ul class="nospace">
                                    <li><a href="php/index.php">Newsletter</a></li>
                                    <li><a href="php/connexion.php">Pour rester informer de toute l'actualité</a></li>
                                    <form class="form-newsletter" method="POST" action="">
                                        <input type="email" name="mailconnect" placeholder="Mail" />
                                        <input type="password" name="mdpconnect" placeholder="Mot de passe" />
                                        <div class="btn">
                                            <a href="php/connexion.php" id="btn">VALIDER</a>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </footer>
            </div>

            <nav class="quicklinks row4">
                <ul class="hoc clear">
                    <li><a href="index.html"><i class="fa fa-lg fa-home"></i></a></li>
                    <li><a href="index.html">A Propos De Nous</a></li>
                    <li><a href="CGV.html">CGV</a></li>
                    <li><a href="mention.html">Mentions légales</a></li>
                    <li><a href="plandusite.html">Plan du Site</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="protection.html">Protection des données personelles</a></li>
                    <li><a href="javascript:window.print()"><i class="fas fa-print"></i> Imprimez la page </a></li>
                    <ul>
                        <li><a href='https://fr-fr.facebook.com/'><i class="fab fa-facebook fa-2x"></i></a></li>
                        <li><a href='https://twitter.com/?lang=fr'><i class="fab fa-tripadvisor fa-2x"></i></a></li>
                        <li><a href='https://www.tripadvisor.fr/'><i class="fab fa-twitter-square fa-2x"></i></a></li>
                    </ul>

                </ul>
            </nav>
            <div class="wrapper row5">
                <div id="copyright" class="hoc clear">

                    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">parimis</a></p>


                </div>
            </div>
        </div>


        <!-- FIN DU FOOTER -->

        <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    </content>
    <script src="jquery.js"></script>
    <script src="backtotop.js"></script>
    <script src="script.js"></script>
</body>

</html>