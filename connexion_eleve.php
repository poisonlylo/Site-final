<?php
session_start();

try {

    $bdd = new PDO('mysql:host=localhost;dbname=study;charset=utf8', 'root', 'root');
} catch (Exception $e) {

    die('Erreur: ' . $e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['submit1']))
 {   
                 
          if(!empty($_POST['email']) AND !empty($_POST['motdepasse']) )
          {
              $emailconnect = htmlspecialchars($_POST['email']);
              $pswconnect = htmlspecialchars($_POST['motdepasse']);

               $requser =$bdd->prepare("SELECT * FROM etudiant WHERE email = ? AND motdepasse = ? ");
               $requser->execute(array($emailconnect,$pswconnect));
               $userexist = $requser->rowCount();
                     // verifier si l etudiant existe
                      if($userexist == true)
                      { $userinfo = $requser->fetch();
                        $_SESSION['id'] = $userinfo['id_etudiant'];
                        $_SESSION['pseudo'] = $userinfo['nom'];
                        $_SESSION['mail'] = $userinfo['email'];
                       
                        
                         // url vers la page recherche
                         header("Location: recherche.php?id=" . $_SESSION['id']);
                      } 
                      else
                      {  
                          // email ou mot de passe sont pas valides
                         
                          echo "<div style='text-align:center;margin-top:50px;font-size:18px;padding:20px;line-height:1.7;'>";
                          echo " Email ou mot de passe invalide ! <br>";
                          echo "Veuillez saisir votre email et mot de passe correctement .<br>";
                          echo"<a style='text-decoration:none;' href=' index.html' > Aller vers page d'accueil </a>";
                          echo "</div>";
                          
                      }

          }   
          
           
 }


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>  
    <link rel="stylesheet" href="css/connexion_eleve.css">
    <link rel="stylesheet" href="css/main-style.css">
    <title>connexion</title>
  </head>
  <body>
    <div class="header">
      <div class="navbar-backg-color">
          <div class="navbar">
              <div class="logo">
                  <a href="index.php"><img src="imgs/logo.png" alt=""></a>
              </div>
                  <div class="navbar-right">
                      <a href="index2.php" class="navbar-right-link">Je suis prof</a>
                      <a href="index.php" class="navbar-right-link">Je suis eleve</a>
                  </div>
          </div>
      </div>
    </div>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  method="POST" action="#" class="sign-in-form">
            <h2 class="title">Connexion El??ve</h2>
        
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name ="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="motdepasse"  placeholder="Mot de passe" />
            </div>
            <input type="submit" value="Se connecter" name ="submit1" class="btn solid" /> 

           <?php if (isset($erreur)) {
               echo "<p style='color:red; text-align:center'>".$erreur."</p>";
            }
            
            ?>
           

          </form>
        </div>
      </div>


    </div>

  </body>
</html>