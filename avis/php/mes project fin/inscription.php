<?php 
try{ 
   $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');

}catch(Exception $e)
{
   
   $results= $database->query('SELECT first_name FROM espace_membre');
   while($row = $results->fetch()){
      echo $row['first_name'];
   }
   die('ERROR:'.$e->getMessage());

}
if(isset($_POST['forminscription'])){

   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {

      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                    if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                     $insertmbr->execute(array($pseudo, $mail, $mdp));
                     header("Location:connexion.php?id=".$_SESSION['id']);

                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Accueil-Chambre</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="synapse network">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="parimis, Parimis, hotel-parimis, restaurant-parimis, hotel-restaurant-parimis, parimis-paris, hotel-restaurant-spa,hotel, hotels, hôtel-spa, hôtel-spa Parimis, hotel spa, hotel spa parimis, luxe, hôtel de luxe, hôtel de luxe à Paris, hotel de luxe a paris, spa, soins, relaxation, restaurant, gourmet, hébérgement, hebergement,chambre, chambres, suite, paris, 8 arrondissement, réservation, réservations, reservation, PARIMIS, suite hotel">
    <meta name="googlebot" content="index, follow">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style-deux.css">
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
                                <a href="../index.html">Accueil</a>
                            </li>
                            <li>
                                <a href="../chambre/chambre.html">Chambres</a>
                            </li>
                            <li>
                                <a href="../bar/restaurant.html">Restaurant</a>
                            </li>
                            <li><a href='../spa/spa.html'>Spa</a></li>
                            <li><a href="../actu/actualite.html">Actualités</a></li>
                            <li><a href="avis.html">Avis</a></li>
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
      <!--  <div id="pageintro" class="hoc clear">
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
            </div>-->
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
                    <a href="#articleA">FORMULAIRE </a>
                </li>
                <li>
                    <a href="#articleD">AVIS</a>
                </li>
                <li>
                    <a href="#articleC">RESEVATION</a>
                </li>
            </ul>
        </nav>

        <main class="articleA">
            <section id="contact">
                <div class="container">
                    <div class="heading">
                        <h2>Inscription</h2>
                    </div>


                    <form method="POST" action="">
                        <table>
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


                </div>

            </section>
        </main>

        <!--avis -->
        <main class="articleC">

            <h2>Les avis</h2>
            <p style="text-align: center;">Donnez votre avis ici!</p>


            <div class="group btmspace-50 demo">

                <blockquote>
                    <article>

                        <div class="avis">
                            <img src="images/FB_IMG_1471729363212.jpg" alt="">
                        </div>

                        <p class="text">
                            syntia Doe
                            <a href="http://twitter.com/jdoe">@georgia</a> les suites sont très spacieuses avec un espace salon et une terrasse.
                        </p>
                        <div class="star-rating pull-right star-rating--4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                    </article>
                    <article>

                        <div class="avis">
                            <img src="images/FB_IMG_1471729356534.jpg" alt="">
                        </div>


                        <p class="text">
                            Annastazia Doe
                            <a href="http://twitter.com/jdoe">@paulina</a> Les Chambres Confort disposent d’un coin cuisine équipée et pour certaines, d’un balcon, alors que les appartements Confort, spacieux, incluent une cuisine ouverte avec coin salon.
                        </p>

                        <div class="star-rating pull-right star-rating--4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                    </article>

                    <article>

                        <div class="avis">
                            <img src="images/FB_IMG_1471729360027.jpg" alt="">
                        </div>


                        <p class="text">
                            Johanna Doe
                            <a href="http://twitter.com/jdoe">@jean</a> Pas question de finir ma journée sans profiter du Roof Top et de sa vue sur la tour Eiffel,
                        </p>

                        <div class="star-rating pull-right star-rating--4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                    </article>

                    <article>

                        <div class="avis">
                            <img src="images/FB_IMG_1471729389773.jpg" alt="">
                        </div>


                        <p class="text">
                            Jina Doe
                            <a href="http://twitter.com/jdoe">@jdoe</a> Spacieuses et agréables, elles présentent une décoration contemporaine au design étonnant.
                        </p>

                        <div class="star-rating pull-right star-rating--4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                    </article>
                    <article>

                        <div class="avis">
                            <img src="images/FB_IMG_1471728955097.jpg" alt="">
                        </div>


                        <p class="text">
                            John Doe
                            <a href="http://twitter.com/jdoe">@jdoe</a> L’hôtel 5* renferme en son spa un trésor de bien-être et de détente alors que côté restauration, les Meilleurs Ouvriers de France se relaient aux fourneaux, ponctuant votre séjour
                            d’une note gourmande inoubliable.
                        </p>

                        <div class="star-rating pull-right star-rating--4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </article>
                </blockquote>
                <div class="center">
                    <input type="text" data-fv-inp="{ &quot;name&quot;:&quot;fv-subject&quot;, &quot;req&quot;: true }" name="subject" placeholder="subject" maxlength="100">
                    <textarea data-fv-inp="{ &quot;name&quot;:&quot;fv-message&quot;, &quot;req&quot;: true }" name="message" placeholder="message" maxlength="1000"></textarea>
                    <button type="submit">PUBLIER</button>
                </div>
            </div>
        </main>





        <main class="articleD">
            <article>
                <div class="group btmspace-50 demo">
                    <form class="cartebleu">
                        <div class="">
                            <label for="firstname">Prénom <span class="blue">*</span></label>
                            <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">
                            <p class="comments"></p>
                        </div>
                        <div class="">
                            <label for="name">Nom <span class="blue">*</span></label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom">
                            <p class="comments"></p>
                        </div>
                        <div class="">
                            <label for="email">Email <span class="blue">*</span></label>
                            <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">
                            <p class="comments"></p>
                        </div>
                        <div class="">
                            <label for="phone">Téléphone</label>
                            <input id="phone" type="tel" name="phone" class="form-control" placeholder="Votre Téléphone">
                            <p class="comments"></p>
                        </div>
                        <!--datte arriver et départ-->
                        <div class="">
                            <label for="date">Date de arriver</label>
                            <input id="date" type="date" name="date" class="form-control" placeholder="Votre date">
                            <p class="comments"></p>
                            <label for="date">Date de depart</label>
                            <input id="date" type="date" name="date" class="form-control" placeholder="Votre date">
                            <p class="comments"></p>
                        </div>

                        <div class="">
                            <label for="Nombre">Personne</label>
                            <input id="personne" type="number" name="nombre" class="form-control" placeholder="Nombre de personne">
                            <p class="comments"></p>
                        </div>
                        <select name="list" id="">
                        <p>
                            Objet:
    
                            <option>... </option>
                            <section class="option" name="list"> <option>Hôtel</option>
                              <br>
                              <ul>
                                  <ol>
                                      <option> Classique</option>
                                  </ol>
                                  <ol>
                                      <option> Confort</option>
                                  </ol>
                                  <ol>
                                      <option>Deluxe</option>
                                  </ol>
                                  <ol>
                                    <option> Suite</option>
                                  </ol>
                                  
                              </ul>
                             </section>
    
                            
                            <section class="option" name="list"> <option>Restaurant </option>
                              <ul>
                                  <ol>
                                      <option> Restaurant</option>
                                  </ol>
                                  <ol>
                                      <option> Brasserie </option>
                                  </ol>
                                  <ol>
                                      <option>Degustation</option>
                                  </ol>
                              </ul>
                             </section>
                            
                            <section class="option" name="list"> <option> Spa</option>
                              <ul>
                                  <ol>
                                      <option> Sport</option>
                                  </ol>
                                  <ol>
                                      <option> Soins</option>
                                  </ol>
                                  <ol>
                                      <option>Piscine</option>
                                  </ol>
                              </ul>
                             </section>
                             <!---->
                             <p class="comments"></p>
    
                          </select>
                        <div class="">
                            <label for="nombre">Nuits</label>
                            <input id="nuit" type="number" name="nombre" class="form-control" placeholder="Nombre de nuits">
                            <p class="comments"></p>
                        </div>

                        </p>

                        <fieldset>
                            <legend>CB</legend>

                            <div class="">
                                <label for="carte">Numéro</label>
                                <input id="number" type="text" name="phone" class="form-control" placeholder="Numéro carte:">
                                <p class="comments"></p>
                            </div>


                            <p>Mois<input type="text" maxlength="2">/Année<input type="text"></p>

                            <p>Cryptogramme: <input type="text" maxlength="3"></p>
                        </fieldset>

                        <p>
                            <label><input type="checkbox">J'accepte.</label>
                        </p>

                        <div class="" id="envoyer">
                            <button type="submit" class="button1" value="Envoyer">Envoyer</button>
                            <button type="reset">Reset</button>

                        </div>

                    </form>
                </div>
            </article>
        </main>






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
                                <p><a href="../actu/actualite.html">En savoir plus &raquo;</a></p>
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
                                <p><a href="../actu/actualite.html">En savoir plus &raquo;</a></p>
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
                                <p><a href="../actu/actualite.html">En savoir plus &raquo;</a></p>
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
                <footer><a class="btn inverse inverse" href="avis.html">En Cliquant Ici</a></footer>

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
                                    <li><a href="#">Pour rester informer de toute l'actualité</a></li>
                                    <form class="form-newsletter" method="get" action="">
                                        <input style='border-radius:5px; width: 110px;' name="newsletter" placeholder="Votre Email" type="text"><br>
                                        <input style='border-radius:5px;color:black;background-color: #b33939;border:2px solid white; padding:10px; ' href='php/contact.php' type="submit" id="btn inverse-submit"></input>

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