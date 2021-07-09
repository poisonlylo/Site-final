<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=study;charset=utf8', 'root', 'root');
} catch (Exception $e) {

    die('Erreur: ' . $e->getMessage());
}


    // verifier si le formulaire est bien envoye 
if ( isset($_POST['forminscription']) and $_SERVER["REQUEST_METHOD"] == "POST" )
{
    // verifier les champs sont pas vides 
   if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['motdepasse']))
       {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $motdepasse = htmlspecialchars($_POST['motdepasse']);


            //inserer les donnees dans la table etudiant 
         $insertuser = $bdd-> prepare("INSERT INTO etudiant(nom,prenom,email,motdepasse)values(?,?,?,?)"); 
         $insertuser ->execute(array($nom,$prenom,$email,$motdepasse));


         header("location: connexion_eleve.php");
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
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/inscription_eleve.css">
    <title>Sign in </title>
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
        <div class="signin">
          <form method="POST" action="#" class="sign-in-form">
            <h2 class="title">Inscription Elève</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nom" placeholder="Nom" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="prenom" placeholder="Prenom" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text"  name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  name="motdepasse" placeholder="Mot de passe" />
            </div>
            <input type="submit"  name="forminscription" value="S'inscrire" class="btn solid" /> 
          </form>
        </div>
      </div>

   </div>
  </body>
</html>