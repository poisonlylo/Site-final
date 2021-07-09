<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=study;', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['ok_connexion'])) {
    $pseudoconnect = htmlspecialchars($_POST['pseudo']);
    $mdpconnect = $_POST['mdp'];
    if (!empty($pseudoconnect) and !empty($mdpconnect)) {
        $requser = $bdd->prepare("SELECT * FROM admin WHERE pseudo_admin = ? AND pass_admin = ?");
        $requser->execute(array($pseudoconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id_admin'];
            $_SESSION['pseudo'] = $userinfo['pseudo_admin'];
            header("Location: admin_content.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "E-mail ou mot de passe incorrect";
        }
    } else {
        $erreur = "Tous les champs doivent être remplis";
    }
}



?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="/css/connexion_admin.css">
    <link rel="stylesheet" href="/css/main-style.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <title>Admin</title>

</head>



    <header>
        <div class="left_area">
            <a href="../index.php">
                <h3> PLATEFORME <span>L'ETUDIANT</span></h3>
            </a>
        </div>
    </header>

    <div class="content">
       

        <form action="#"class="box" method="POST">
            <h1> Connexion Admin</h1>
            <input type="text" name="pseudo" placeholder="Pseudo">
            <input type="password" name="mdp" placeholder="mot de passe">
            <input type="submit" name="ok_connexion" value="Connexion">


            <?php
            if (isset($erreur)) {
                echo "<p style='color:red; text-align:center'>" . $erreur . "</p>";
            }


            ?>
        </form>
    
    

    </div>

</body>

</html>