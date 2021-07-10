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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/gestion_comments.css">
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <title>Gestion des commentaires</title>
</head>

<body>
    <header>
    </header>
    <div class="box">
        <table class="myTable ">
            <tr>
                <th class="email"> <b>Commentaire</b></th>
            </tr>
            <?php



            $result = $bdd->prepare("SELECT * FROM commentaire where ID = :uid");
            $result->execute(array(":uid" => $course_id));
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {



                //$select_all_members = $bdd->query('SELECT * FROM commentaire where ID = "course_id"');
               //if ($select_all_members->rowCount() > 0) {
                 //    while ($m = $select_all_members->fetch()) {
            ?>
                <tr>
                    <th>
                        <div class="comment">
                            <h2> <?= $row['nom']; ?> <?= $row['prenom']; ?> </h2>
                            <h5> <?= $row['avis']; ?> </h5>
                        </div>
                    </th>
                <?php



            } //}}



                ?>
              
                </tr>

        </table>
        <?php
        if ($result->rowCount() == 0) {
            ?> <h1 class="pas_de_commentaire">
            <?php
            echo ("pas de comments");

            ?>
        </h1>
        <?php }?>
    </div>
</body>

</html>