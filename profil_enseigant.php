
<?php
session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=study;', 'root', 'root');
 $conn=mysqli_connect("localhost","root","root","study");
 
 if (isset($_GET['id'])) { //si l'id est defini dans l'URL
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM enseignant WHERE ID = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    if( isset($_POST['Niveau']) )
{
    $Niveau= $_POST['Niveau'];
    $id  =  $userinfo['ID'];
    $sql  = "UPDATE enseignant SET Niveau='$Niveau' WHERE ID=$id";
    $res = mysqli_query($conn,$sql) 
                                or die("Could not update".mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
}
if( isset($_POST['Nom']) )
{
    $Nom= $_POST['Nom'];
    $id  =  $userinfo['ID'];
    $sql  = "UPDATE enseignant SET Nom='$Nom' WHERE ID=$id";
    $res = mysqli_query($conn,$sql) 
                                or die("Could not update".mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
}

if( isset($_POST['Prenom']) )
{
    $Prenom= $_POST['Prenom'];
    $id  =  $userinfo['ID'];
    $sql  = "UPDATE enseignant SET Prenom='$Prenom' WHERE ID=$id";
    $res = mysqli_query($conn,$sql) 
                                or die("Could not update".mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
}
    if( isset($_POST['Matiere']) )
{
    $Matiere= $_POST['Matiere'];
    $id  =  $userinfo['ID'];
    $sql  = "UPDATE enseignant SET Matiere='$Matiere' WHERE ID=$id";
    $res = mysqli_query($conn,$sql) 
                                or die("Could not update".mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
}
    if (isset($_SESSION['id']) and $userinfo['ID'] == $_SESSION['id']) {
      
        if( isset($_POST['Tel']) )
        {
            $Tel= $_POST['Tel'];
            $id  =  $userinfo['ID'];
            $sql  = "UPDATE enseignant SET Tel='$Tel' WHERE ID=$id";
            $res = mysqli_query($conn,$sql) 
                                        or die("Could not update".mysqli_error());
            echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
        }
if( isset($_POST['Email']) )
{
    $Email= $_POST['Email'];
    $id  =  $userinfo['ID'];
    $sql  = "UPDATE enseignant SET Email='$Email' WHERE ID=$id";
    $res = mysqli_query($conn,$sql) 
                                or die("Could not update".mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
}
if( isset($_POST['MDP']) )
{
    $MDP= $_POST['MDP'];
    $id  =  $userinfo['ID'];
    $sql  = "UPDATE enseignant SET MDP='$MDP' WHERE ID=$id";
    $res = mysqli_query($conn,$sql) 
                                or die("Could not update".mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
}
if( isset($_POST['eDes']) )
{
    $eDes= $_POST['eDes'];
    $id  =  $userinfo['ID'];
    $sql  = "UPDATE enseignant SET eDes='$eDes' WHERE ID=$id";
    $res = mysqli_query($conn,$sql) 
                                or die("Could not update".mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=profil_enseigant.php '>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profil_enseignant.css">
    <link rel="stylesheet" href="css/main-style.css">
    <title>Profil</title>
</head>
<body>
    <div class="container">
        <div class="left_side">
            <div class="matiere">
                <h1>Matiere</h1>
                <h3><?= $userinfo['Matiere'] ?></h3>
            </div>
            <div class="modifier">
                <h1>Infos personnels</h1>
                <div class="num">
                            <i></i>
                            <h2><?= $userinfo['Tel'] ?></h2>
                        </div>
             </div>
        </div>
        <div class="right_side">
            <div class="top_content">
                <h1><?= $_SESSION['pseudo'] ?>  <?= $userinfo['Prenom'] ?></h1>
                <div class="btn_deconnexion">
                    <a href="">Deconnexion</a>
                </div>

            </div>
            <div class="bottom_content">
                <div class="boxes">
                    <div class="box box1">
                        <h2>Description</h2>
                        <p> <?= $userinfo['eDes'] ?> </p>

                    </div>
                    <div class="box box2">
                        
                        <div class="num">
                            <i></i>
                            <h2><?= $userinfo['Tel'] ?></h2>
                        </div>
                        <div class="email">
                            <i></i>
                            <form action="" method="POST">
                           
                            
                            
                    
                    <input type="text" name="Nom"  value="<?= $userinfo['Nom'] ?>"/>  
                   

                    
                    <input type="text" name="Prenom"  value="<?= $userinfo['Prenom'] ?>"/>               


                    <label for="Niveau"><a>Niveau:</a></label>
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
         
         <?php
 if(isset($_POST['submit'])){
  if(!empty($_POST['Niveau'])) {
    foreach($_POST['Niveau'] as $selected){
      echo '  ' . $selected;
    }          
  } else {
    echo 'Please select the value.';
  }
}
?> 
                    </div>
                
                    <td >
              <select name="Matiere" class="Matiere">
                  <option value="disabled selected" class="sel">Selectionner une matiere </option>
                  <option value="Mathematique">Mathematique</option>
                  <option value="Physique">Physique</option>
                  <option value="Anglais">Anglais</option>
              </select>
            </td>
          <?php
if(isset($_POST['submit'])){
  if(!empty($_POST['Matiere'])) {
    foreach($_POST['Matiere'] as $selected){
      echo '  ' . $selected;
    }          
  } else {
    echo 'Please select the value.';
  }
}
?>
                   
                            <input type="tel" name="Tel"  value="<?= $userinfo['Tel'] ?>"/>  
                            <input type="text" name="Email"  value="<?= $userinfo['Email'] ?>"/>  
                            <input type="password" name="MDP"  > 
                            <input type="text" name="eDes"  value="<?= $userinfo['eDes'] ?>"/>  
                            <input type="submit"  value="modifier">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="btn_comments">
                    <a href="prof_comments.php">Voir les commentaires</a>
                </div>
            </div>
        </div>
    </div>
    <?php
             
            }
         else {
                echo 'Veuillez vous connecter pour acceder a cette page. <a href="connexion_prof.php">Se connecter</a>';
            }
        } else {
            echo 'Veuillez vous connecter pour acceder a cette page. <a href="connexion_prof.php">Se connecter</a>';
        }
            ?> 
</body>
</html>
