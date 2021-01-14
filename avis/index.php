
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
                    <a href="../index.html"><img src="images/logo.png" alt="une image du logo"></a>
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
                                <a href="../index.php">Accueil</a>
                            </li>
                            <li>
                                <a href="../chambre/chambre.php">Chambres</a>
                            </li>
                            <li>
                                <a href="../bar/restaurant.php">Restaurant</a>
                            </li>
                            <li><a href='../spa/spa.php'>Spa</a></li>
                            <li><a href="../actu/actualite.php">Actualités</a></li>
                            <li><a href="avis.php">Inscription</a></li>
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
    <!--<a href="avis.html"  class="reservation">Reservation</a>-->

    <content>
        <div id="pageintro" class="hoc clear">
            <img class="mySlides2 opacity" style="background-image:url('roue/architecture-clean-contemporary.jpg');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('roue/restaurant.jpg');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb5.jpg');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb1.jpg');display: block;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb2.jpg');display: none;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb3.jpg');display: none;">
            <img class="mySlides2 opacity" style="background-image:url('roue/palweb4.jpg');display: none;">
            <div class="flexslider basicslider">
                <ul class="slides">

                </ul>
            </div>
        </div>
        </div>
        <div>
            <div style='display:flex;' class="rechercher">
                <i class="fas fa-search">&ensp;</i>
                <form action="#" class="formulaire">
                    <input style='border-radius:5px;' class="champ" type="text" value="Recherche" />
                </form>&ensp;
            </div>
        </div>
        <!--FIN- Haut de page -->
        <!-- onglets -->
        <nav id="nav">
            <ul class="numero">
                <li class="o1">
                    <a href="#articleA">INSCRIPTION </a>
                </li>
                
                <li>
                    <a href="#articleB">RESEVATION </a>
                </li>
            </ul>
        </nav>

        <main class="articleA">
            <section id="contact">
                <div class="group btmspace-50 demo">
                    <?php
                        require_once('inscrip.php');
                    ?>
                </div>

            </section>
        </main>


      





        <main class="articleB">
            <article>
                <div class="group btmspace-50 demo">
                    <?php
                        require_once('insert.php');
                    ?>
                </div>
            </article>
        </main>


        <!---------------------------------------%%%%%%%%%%%%%%%%%%%formulaire%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%------------------------------------------>
        
        

        <!--------------------------------------------------------%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%>>>>>>>>>>----------------------------->
        <!-- ACTUALITES -->
        <div class="wrapper row3">
            <section class="hoc container clear">

                <div class="btmspace-50 center">
                    <h2>Les Actualités de l'Hotel</h2>
                    <p>Des evenements sont régulierement organisés pour vous. </p>
                </div>
                <ul class="nospace group">
                    <li class="one_third first">
                        <article class="excerpt">
                            <a href="#"><img class="inspace-10 borderedbox" src="images/art.jpg" alt="une image de l'exposition"></a>
                            <div class="excerpttxt">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 06/01/2018</li>
                                    <li><i class="fa fa-comments"></i> <a href="#">4</a></li>
                                </ul>
                                <h6 class="heading font-x1">Exposition de Pop-Art Marvel</h6>
                                <p><a href="../actu/actualite.php">En savoir plus &raquo;</a></p>
                            </div>
                        </article>
                    </li>
                    <li class="one_third">
                        <article class="excerpt">
                            <a href="#"><img class="inspace-10 borderedbox" src="images/art1.jpg" alt="une image de BBKING"></a>
                            <div class="excerpttxt">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 05/07/2018</li>
                                    <li><i class="fa fa-comments"></i> <a href="#">4</a></li>
                                </ul>
                                <h6 class="heading font-x1">Les Amants de la bastille seront présent dans notre salles des fêtes</h6>
                                <p><a href="../actu/actualite.php">En savoir plus &raquo;</a></p>
                            </div>
                        </article>
                    </li>
                    <li class="one_third">
                        <article class="excerpt">
                            <a href="#"><img class="inspace-10 borderedbox" src="images/rang-bon-man.jpg" alt="une image des amants de la bastille"></a>
                            <div class="excerpttxt">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> 04/01/2017</li>
                                    <li><i class="fa fa-comments"></i> <a href="#">4</a></li>
                                </ul>
                                <h6 class="heading font-x1">L'un des meilleurs Blues/soul man jouera dans notre établissement</h6>
                                <p><a href="../actu/actualite.php">En savoir plus &raquo;</a></p>
                            </div>
                        </article>
                    </li>
                </ul>

            </section>
        </div>
        </main>


        <!-- RESERVATION CHAMBRE -->
        <div class="wrapper bgded overlay" style="background: #b33939">
            <article class="hoc container center">

                <i class="fas fa-address-book fa-3x"></i>
                <p>Reservez votre rendez-vous</p>
                <footer><a class="btn inverse inverse" href="avis.php">En Cliquant Ici</a></footer>

            </article>
        </div>
        <!-- FIN DE RESERVATION CHAMBRE -->

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
        <i class="fa fa-chevron-up"></i>
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
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="connexion.php">Pour rester informer de toute l'actualité</a></li>
                                    <form class="form-newsletter" method="get" action="">
                                        <input style='border-radius:5px; width: 110px;' name="newsletter" placeholder="Votre Email" type="mail"><br>
                                        <input style='border-radius:5px;color:black;background-color: #b33939;border:2px solid white; padding:10px; ' href='connexion.php' type="submit" id="btn inverse-submit"></input>

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

        <script src="jquery.js"></script>
        <script src="backtotop.js"></script>
        <script src="script.js"></script>
</body>

</html>