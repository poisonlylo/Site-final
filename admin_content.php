<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=study;', 'root', 'root');




?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
            <link href="./css/adminContent.css" type="text/css" rel="stylesheet">
            <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
            <link rel="stylesheet" href="css/main-style.css">
            <link rel="stylesheet" href="css/admin_content.css">
            <link rel="icon" href="../../favicon.ico" type="image/x-icon">
            <title>Administration </title>
        </head>

        <body>
            <div class="parts">
                <div class="top_part">
                    <label for="check">
                        <i class="fas fa-bars" ID="sIDebar_btn"></i>
                    </label>
                    <div class="left_area">

                        <h3> ESPACE ADMINISTRATEUR</h3>

                    </div>
                    
                </div> 
                <div class="bottom_part">
                    <div class="btn_deconnexion"> <a href="deconnexion.php"> Deconnexion </a></div>
                    <div class="transbox">
                        <div class="btns">
                        <div class="btn"> <a href="gestion_comments.php?"> Gérer les commentaire </a></div>
                        <div class="btn"> <a href="gestion_membre.php?"> Gérer les membres </a></div>
                        </div>
                     </div>
                </div>
            </div>

        </body>

        </html>
<?php
   
 
?>