<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=study;', 'root', 'root');

if (isset($_POST['delete'])) {
    $m = $_POST['avis'];
    $delmsg = $bdd->prepare("DELETE FROM commentaire WHERE avis = ?");
    $delmsg->execute(array($m));
    header('Location:gestion_comments.php');
}
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
        <div class="btn1"> <a href="admin_content.php"  style="color: white;"> <b> Précédent </b></a></div>
    </header>
    <div class="box">
        <table class="myTable ">
            <tr>
                <th class="email"> <b>Commentaire</b></th>
                    <th> <b>Action</b></th>
            </tr>
            <?php
             $select_all_members = $bdd->query('SELECT * FROM commentaire ');
                if ($select_all_members->rowCount() > 0) {
                    while ($m = $select_all_members->fetch()) { 
            ?>
            <tr>
                <th>
                <div class="comment">
                <h2 > <?= $m['nom']; ?> <?= $m['prenom']; ?> </h2>
                <h5 > <?= $m['avis']; ?> </h5>
                </div>
                </th>
                <th>
                <div class="suppMessage">
                    <form action="" method="post">
                        <input type="text" style="display: none;" value="<?= $m['avis'] ?>" name="avis">
                        <input type="submit" value="Supprimer " class="delete btn" name="delete">
                    </form>
                   
                </div>
                </th>
            <?php
             
           
                    }
                } else {
                    echo "aucun commentaire trouver ! ";
                }
                ?>
            <th>
                
            </th>
            </tr>
        
        </table>
    </div>
</body>
</html>