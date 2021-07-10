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
 if(!empty($_POST['Nom']) AND !empty($_POST['Prenom']) AND !empty($_POST['Email']) AND !empty($_POST['MDP'] ) AND !empty($_POST['Tel'] ) AND !empty($_POST['eDes'] ) AND !empty($_POST['Matiere'] ))
     {
          $Nom = htmlspecialchars($_POST['Nom']);
          $Prenom = htmlspecialchars($_POST['Prenom']);
          $Email = htmlspecialchars($_POST['Email']);
          $MDP = htmlspecialchars($_POST['MDP']);
          $Tel = htmlspecialchars($_POST['Tel']);
          $eDes = htmlspecialchars($_POST['eDes']);
          $Matiere = htmlspecialchars($_POST['Matiere']);
          $Niveau = htmlspecialchars($_POST['Niveau']);
          //inserer les donnees dans la table enseignant 
       $insertuser = $bdd-> prepare("INSERT INTO enseignant(Nom,Prenom,Email,MDP,Tel,eDes,Matiere,Niveau)values(?,?,?,?,?,?,?,?)"); 
       $insertuser ->execute(array($Nom,$Prenom,$Email,$MDP,$Tel,$eDes,$Matiere,$Niveau));
       header("location: connexion_prof.php");
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
  <link rel="stylesheet" href="css/inscription_prof.css">
  <link rel="stylesheet" href="css/main-style.css">
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
          <h2 class="title">Inscription enseignant</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="Nom" placeholder="Nom" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="Prenom" placeholder="Prenom" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text"  name="Email" placeholder="Email" />
          </div>
          <div class="input-field ">
            <i class="fas fa-lock"></i>
            <input type="password"  name="MDP" placeholder="Mot de passe" />
          </div>
          <div class="input-field ">
            <i class="fas fa-pen"></i>
            <td >
              <select name="Niveau" class="Matiere">
                  <option value="disabled selected" class="sel">Niveau max  </option>
                  <option value="1AM">1AM</option>
                  <option value="2AM">2AM</option>
                  <option value="3AM">3AM</option>
                  <option value="1AM">4AM</option>
                  <option value="2AM">1AS</option>
                  <option value="3AM">2AS</option>
                  <option value="3AM">3AS</option>
              </select>
            </td>
          </div>
        <!--  <?php
 if(isset($_POST['submit'])){
  if(!empty($_POST['Niveau'])) {
    foreach($_POST['Niveau'] as $selected){
      echo '  ' . $selected;
    }          
  } else {
    echo 'Please select the value.';
  }
}
?> -->
         
          
          <div class="input-field ">
            <i class="fas fa-book"></i>
            <td >
              <select name="Matiere" class="Matiere">
                  <option value="disabled selected" class="sel">Selectionner une matiere </option>
                  <option value="Mathematique">Mathematique</option>
                  <option value="Physique">Physique</option>
                  <option value="Anglais">Anglais</option>
                  <option value="Français">Français</option>
                  <option value="Philosophie">Philosophie</option>
                  <option value="Histoire geographie">Histoire geographie</option>
                  <option value="Sciences">Sciences</option>
                  <option value="Thamazight">Thamazight</option>
                  
              </select>
            </td>
        <!--  <?php
if(isset($_POST['submit'])){
  if(!empty($_POST['Matiere'])) {
    foreach($_POST['Matiere'] as $selected){
      echo '  ' . $selected;
    }          
  } else {
    echo 'Please select the value.';
  }
}
?>-->
          </div>
          
          <div class="input-field descriptio">
            <i class="fas fa-phone"></i>
            <input type="tel"  name="Tel" placeholder="Tel" />
          </div>
          <div class="input-field description">
            <i class="fas fa-envelope"></i>
            <input type="text"  name="eDes" placeholder="Description" />
          </div>
          <input type="submit"  name="forminscription" value="S'inscrire" class="btn solid" /> 
          
        </form>
      </div>
    </div>

 </div>
</body>
</html>