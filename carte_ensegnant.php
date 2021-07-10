<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=study;', 'root', 'root');
$conn = mysqli_connect("localhost", "root", "root", "study");




$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$course_id = $params['id'];




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
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/carte_ensegnant.css">
    <title>Carte enseignant</title>
</head>

<body>

    <?php
    $result = $bdd->prepare("SELECT * FROM enseignant WHERE ID = :uid");
    $result->execute(array(":uid" => $course_id));
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    ?>

        <div class="container">
            <div class="carte">
                <div class="informations">
                    <div class="left_side">
                        <h1><?php echo ($row['Nom']); ?></h1>
                        <h2><?php echo ($row['Prenom']); ?></h2>
                        <h3><?php echo ($row['Matiere']); ?></h3>
                    </div>
                    <div class="v-line"></div>
                    <div class="right_side ">
                        <div class="tel box">

                            <h2><?php echo ($row['Tel']); ?></h2>
                        </div>
                        <div class="Email box">

                            <h2><?php echo ($row['Email']); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="presentation">
                    <h1>presentation</h1>
                    <p><?php echo ($row['eDes']); ?></p>

                </div>
                <div class="commentaires">
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <form class="form-etudiant" name="comment" action="" method="post">
                            <input class="inpt" type="text" name="comment" placeholder="Commenter" />
                            <input class="btn solid" type="submit" name="commentaire" value="commenter">
                        </form>
                    </div>





                    <?php



                    if (isset($_REQUEST['commentaire'])) {
                        $select_stmt_etd = $bdd->prepare("SELECT * FROM etudiant WHERE id_etudiant = :uidetudinat"); //sql select query
                        $select_stmt_etd->execute(array(':uidetudinat' => $_SESSION['id']));    //execute query with bind parameter
                        $row = $select_stmt_etd->fetch(PDO::FETCH_ASSOC);
                        $commentaire  = strip_tags($_REQUEST['comment']);



                        $insert_stmt = $bdd->prepare("INSERT INTO commentaire(avis,id_etudiant,nom,prenom,ID) VALUES
                    (:uavis,:uid_etudiant,:unom,:uprenom,:uid)");     //sql insert query					
                        $insert_stmt->execute(array(
                            ':uavis' => $commentaire,
                            ':uid_etudiant'  =>  $_SESSION['id'],
                            ':unom'  => $row['nom'],
                            ':uprenom' => $row['prenom'],
                            ':uid' => $course_id

                        ));
                    }







                    ?>





                </div>


                <div class="comments">
                    <a href="<?php echo ('prof_comments.php?id=' . $course_id); ?>">Voir les commentaires</a>

                </div>

            <?php }


            ?>
            </div>
        </div>
        </div>
</body>

</html>