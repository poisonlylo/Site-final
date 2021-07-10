<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=study;', 'root', 'root');
$conn = mysqli_connect("localhost", "root", "root", "study");

if (isset($_GET['id'])) { //si l'id est defini dans l'URL
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM etudiant WHERE id_etudiant = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    if (isset($_SESSION['id']) and $userinfo['id_etudiant'] == $_SESSION['id']) {







?>

        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="css/recherche.css">
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
            <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recherche</title>
            <style>
                .msg_vide {
                    text-align: center;
                    font-size: 65px;
                    padding-top: 30px;
                }
            </style>
        </head>

        <body>
            <div class="header">
                <div class="background"></div>
                <div class="header-text">
                    <div class="logo">
                        <a href="index.html"><img src="imgs/logo.png" alt="logo"></a>
                    </div>
                    <div name="q" class="search-box">
                        <div name="q" class="dropdown">



                            <form action="" method="POST">
                                <select name="Matiere" class="dropdown__select" id="">
                                    <option value="0">Sélectionner une matière</option>
                                    <option value="1">Mathématique </option>
                                    <option value="2">Physique</option>
                                    <option value="3">Anglais</option>
                                </select>

                                <input type="submit" name='recherche' value="Recherche">
                            </form>
                        </div>



                    </div>
                    <a  href="deconnexion_eleve.php">Deconnexion</a>
                </div>

                <?php

                function select_Matiere($choix)
                {
                    $matiere = "";
                    switch ($choix) {
                        case "1":
                            $matiere = "Mathématique";
                            break;
                        case "2":
                            $matiere = "Physique";
                            break;
                        case "3":
                            $matiere = "Anglais";
                            break;
                        case "3":
                            $matiere = "Francais";
                            break;
                        case "3":
                            $matiere = "Anglais";
                            break;
                        case "3":
                            $matiere = "Anglais";
                            break;    
                    }
                    return $matiere;
                }

                if (isset($_POST['recherche'])) {
                    if (isset($_POST['Matiere'])) {
                        $matiere_choisi = select_Matiere($_POST['Matiere']);
                        $reqrecherche = $bdd->prepare("SELECT * from enseignant where Matiere = ?  ");
                        $reqrecherche->execute(array($matiere_choisi));
                    }
                    $nbr = $reqrecherche->rowcount();
                    if ($nbr == 0) { ?>
                        <h2 class="msg_vide"><?php echo  "rien trouve"; ?></h2>
                        <?php  } else { ?><?php
                                            while ($inforeq = $reqrecherche->fetch()) {

                                            ?>

                        <div class="cards">
                            <div class="card" onclick="toggle() " id="blur">


                                <div class="left-card">
                                    <div class="card-photo">
                                        <img src="" alt="">
                                    </div>
                                    <div class="card-text">

                                        <div class="nom"><?php echo $inforeq['Nom'] . ' ' . $inforeq['Prenom'] ?></div>


                                        <div class="matiere">
                                            <h1>Matiere</h1>

                                            <p><?= $inforeq['Matiere'] ?></p>

                                        </div>

                                    </div>

                                </div>
                                <div class="v-line"></div>
                                <div class="right-card">
                                    <h2>Presentation</h2>
                                    <p><?= $inforeq['eDes'] ?></p>
                                    <a class="btn_ens" href="<?php echo('carte_ensegnant.php?id='.$inforeq['ID']); ?>  ">plus d'info </a>

                                </div>
                            </div>

                        </div>
                    <?php }
                                        }
                                    } else {

                                        $result = $bdd->prepare("SELECT * FROM enseignant WHERE Matiere = uumatiere_choisie");
                                        $result->execute(array(":umatiere_choisie" => $matiere_choisi));
                                        $result->execute();
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                  
            <?php
                                        }
                                    } ?>

            </div>




    <?php

    } else {
        echo 'Veuillez vous connecter pour acceder a cette page. <a href="connexion_eleve.php">Se connecter</a>';
    }
} else {
    echo 'Veuillez vous connecter pour acceder a cette page. <a href="connexion_eleve.php">Se connecter</a>';
}
    ?>


        </body>
        <script src="js/recheche.js"></script>

        </html>