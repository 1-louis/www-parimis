<?php
session_start();
try{ 
   $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');

}catch(Exception $e)
{
   die('ERROR:'.$e->getMessage());

}
//if(isset($_POST['forminscription'])){
  //if(isset($_GET['profil']) AND $_GET['id'] >0 ) {


  if(isset($_SESSION['id'])) { 


   /*********************************************************************************************************************************** */
   /**£££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££££
    * %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    */
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $user['pseudo']){

    $newpseudo = htmlspecialchars ($_POST['newpseudo']);
    $newmail = htmlspecialchars ($_POST['newmail']);
    $newmdp = htmlspecialchars ($_POST['newmdp']);
    

   ///////////////////////////////////////////////////


    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']){
      $insertpseudo = $bdd-> prepare("UPDATE membres SET pseudo=? WHERE id=?");
      $insertpseudo-> execute(array($newpseudo, $_SESSION['id']));
      header("Location:profil.php?id=".$_SESSION['id']);


   }

            ////pour changer l'e-mail
         

   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']){
      $insertmail = $bdd-> prepare("UPDATE membres SET mail=? WHERE id=?");
      $insertmail-> execute(array($newmail, $_SESSION['id']));
      //header("Location:profil.php?id=".$_SESSION['id']);
         ////si e-mail existe déjà
      if(filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
         $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
         $reqmail->execute(array($newmail));
         $mailexist = $reqmail->rowCount();

         if($mailexist == 0) {

            $_SESSION['pseudo'] = $userinfos['pseudo'];
            $_SESSION['mail'] = $userinfos['mail'];
            header("Location:profil.php?id=".$_SESSION['id']);

            //mot de passe 
            if(isset($_POST['newmdp']) AND !empty($_POST['newmdp'])   AND   isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])){
               $mdp=sha1($_POST['newmdp']);
               $mdp2=sha1($_POST['newmdp2']);
               if($mdp == $mdp2){
                  $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse =? WHERE id = ?");
                  $insertmdp-> execute(array($mdp, $_SESSION['id']));

                  header("Location:profil.php?id=".$_SESSION['id']);
                  if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']){
                   //  $_SESSION['id'] = $userinfo['id'];
                    // $_SESSION['pseudo'] = $userinfo['pseudo'];
                     //$_SESSION['mail'] = $userinfo['mail'];
                     header("Location:profil.php?id=".$_SESSION['id']);


                        //  ****************************************************----------------------------------------------  //////////  /   */  ///////////////////////////    
   


   ///////////////////////////////////////////////////pour ajouter une photo 
   if(isset($_FILES['avatar'])AND !empty($_FILES['avatar']['name'])){
      $tailleMax = 2097152;///////////////////////////////////////////////////////////////capacité
      $extentionValides= array('jpeg','jpg','gif','png','svg');////////////////////////////////////format de fichier
         if($_FILES['avatar']['size'] <= $tailleMax){
            $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],"."), 1));
   /////////////////////////////////////////////////////////////////////pour modifier le non du fichier
   
            if(in_array($extentionUpload, $extentionValides)){
   ///////////////////////////////////////////////////////////////////////////////////////////pour trouver son index
               $chemein= "membres/avatar/avatar".$_SESSION['id'].".".$extentionUpload;
               $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemein);
               if($resultat ){
   ///////////////////////////////////////////////////////////////////////////////////////pour entrer dans le bdd data
                  $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id ');
                  $updateavatar -> execute(array('avatar'=> $_SESSION['id'].".".$extentionUpload,"id"=>$_SESSION['id']));
                  if($resultat==1){
                     $userinfo=$updateavatar->rowCount();
                     header("Location:profil.php?id=".$_SESSION['id']);

                     $_SESSION['avatar'] = $userinfo['avatar'];
   
                  }
               }
               else{
                  $erreur ="Erreur durant l'impostation du fichier!";
               }
            }
            else{
               $erreur = "votre photo de profil doit être au format demandé :'jpeg','jpg', 'gif' ,'png' ,'svg'";
            }
      
         }
         else{
            $erreur= 'votre photo ne doit dépasser 2Mo ';
         }
      
      }
  
   ///////////////////////////////////////////////////


   if(!empty($userinfo['avatar'])){
      
      $userinfo['avatar'] = $_FILES['avatar'];

   }

               }/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                  }else{
                     $erreur= "vos deux mdp doivent coresponde";
                     }
            
               }else{
                  $erreur= "vos deux mdp doivent coresponde";
                  }

            }else{
               $erreur= 'votre mail est déjà utiliser';
               }

         }else{
            $erreur= "votre mail n'est pas valide ";
            }

      }else{
         $erreur= 'mail déjà utiliser! ';
         }

/**/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
  }else{
   $erreur= 'tous les lignes doit être completer! ';
   }
}

 
  
   
   //////////////////////////////////////////////////////////////////////////////////////////////////
   /*
   *
   * *
   */

      


?>

        <!------------------%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%---------------------------------->

   <html>
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
   <body>
         <div>
         <h2>Edition</h2>
         <br /><br />
        <!------------------%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%---------------------------------->
        <form method="POST" enctype='multipart/form-data' action="">
            <table>
               <tr>
                  <!--------------------------image---------------------------------------->
                  <tr>
                  <td>
                     <label for="pseudo">Nouveau Image :</label>
                  </td>
                  <td>
                     <img width="150px"  src="membres/avatar/avatar<?php echo $userinfo['avatar']; ?>" alt="">
                  </td>
                  
                  </tr>

                  <!--------------------------image---------------------------------------->
                  <td>
                     <label for="pseudo">Nouveau pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre nouveau pseudo" id="newpseudo" name="newpseudo" value="<?php echo $user ['pseudo'];?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="mail">Nouveau mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre nouveau mail" id="newmail" name="newmail" value="<?php echo $user ['mail'];?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="mdp">nouveau Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre nouveau mot de passe" id="newmdp" name="newmdp" />
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="newmdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre nouveau mdp" id="newmdp2" name="newmdp2" />
                  </td>
               </tr>
               <tr>
                  <td> 
                  
                  <label for="">Photo:</label>
                  <input type="file" name="avatar" value="">
                  
                  </td>
                  <br/>
                  <br/>
                  <td color="darkred">
                        <p> Attention vous allaz être déconnecter!</p>
                  </td>
                  
                 
                  <td >
                  <br/>

                     <input class="button" type="submit" name="formConnexion" value="modifier" />
                  </td>         
                  
                  
                  
               </tr>
            </table>
            <a href="deconnexion.php">Se déconnecter</a>
         <a href="profil.php">Profil</a>
         </form>
         <ul>
            <li><a href='https://fr-fr.facebook.com/'><i class="fab fa-facebook fa-2x"></i></a></li>
            <li><a href='https://twitter.com/?lang=fr'><i class="fab fa-tripadvisor fa-2x"></i></a></li>
            <li><a href='https://www.tripadvisor.fr/'><i class="fab fa-twitter-square fa-2x"></i></a></li>
        </ul>
         <?php  
        if(isset($erreur)) {echo '<font color="red">'.$erreur."<br/><a href=\"connexion.php\"><br/>connexion!</a></</font>";}
        ?>
   </body>
</html>
