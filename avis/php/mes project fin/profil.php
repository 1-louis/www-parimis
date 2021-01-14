<?php
session_start();
try{ 
   $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'root', '');

}catch(Exception $e)
{
   die('ERROR:'.$e->getMessage());

}

if(isset($_GET['id']) AND $_GET['id'] >0 ) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
   if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']){
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];

   
   }
  //if(isset($_SESSION['formConnexion']) AND $userinfo['id'] == $_SESSION['id']) {session_start(); $_SESSION = array(); session_destroy();}
   /*********************************************************************************************************************************** */
   /**
    * 
  */
   
  
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

                  $_SESSION['avatar'] = $userinfo['avatar'];
                  header("Location:profil.php?id=".$_SESSION['id']);


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


//if(!empty($userinfo['avatar'])){
   
  // $userinfo['avatar'] = $_FILES['avatar'];

//}



///////////////////////////////////////////////////
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
*///////////////////////////////////////////////////////////////////////////



?>
<html>
   <head>
      <title>profil PHP</title>
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
   <form method="POST" enctype='multipart/form-data' action="">
   <label for="">Photo:
     
<!-------------------------///////////////////////////////////////////////////////////////////////////////////////////////////////////////////------------------------------->
<!-------------------///////////////////////////////////////////////////////////////////////////////////////////////////////////////////--------------->
   <tr>
                  <td > 
                  
                  <label for="">Photo:</label>
                  <input type="file" name="avatar" value="">
                  
                  </td>
                  
                  
                  <td color="darkred">
                        <p> télécharger une photo-------&gt;</p>
                  </td>
                  <td >

                     <input class="button" type="submit" name="formConnexion" value="modifier" />
                  </td>         
                  
                  
                 
                         
                  
                  
                  
   </tr>
   </label>
         <?php
         if(!empty($userinfo['avatar']))
         ?>
         <img width="150px" src="membres/avatar/avatar<?php echo $userinfo['avatar']; ?>"alt="">
         
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

   </form>
      <div method="GET"  action="">
      <h2>Profil de <?php echo $_SESSION['pseudo']; ?></h2>
         <p>  Pseudo = <?php echo $_SESSION['pseudo']; ?></p>
        <p> Mail = <?php echo $_SESSION['mail']; ?></p>
         
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
      </div>
      <div>
  

      </div>
      <?php  
       if(isset($erreur)) {        
            echo '<font color="red">'.$erreur."<br/><a href=\"connexion.php\"><br/>
             connexion!</a></</font>";
         }?>
         <ul>
            <li><a href='https://fr-fr.facebook.com/'><i class="fab fa-facebook fa-2x"></i></a></li>
            <li><a href='https://twitter.com/?lang=fr'><i class="fab fa-tripadvisor fa-2x"></i></a></li>
            <li><a href='https://www.tripadvisor.fr/'><i class="fab fa-twitter-square fa-2x"></i></a></li>
        </ul>
   </body>
</html>
