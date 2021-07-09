<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=study;', 'root', 'root');

if (isset($_POST['delete'])) {
    $m = $_POST['Email'];
    $delmsg = $bdd->prepare("DELETE FROM enseignant WHERE Email = ?");
    $delmsg->execute(array($m));
    header('Location:gestion_membre.php');
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/gestion_membre.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/main-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>  
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <title> Membres administration </title>

</head>

<body>
    <header>
        <div class="btn1"> <a href="admin_content.php" style="color: white;"> <b> Précédent </b></a></div>
    </header>

    <div class="pageContent">

        <div class="input-field">
            <i class="fas fa-search"></i>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche par adresse e-mail.." title="Type in a name">
        </div>

        <div class="box">
            <table class="myTable">
                <tr>
                    <th> <b>E-mail</b></th>
                    <th> <b>Nom</b></th>
                    <th style="text-align:center"> <b>Prénom</b></th>
                    <th style="text-align:center"><b> Action </b></th>
                </tr>
               <?php
             $select_all_members = $bdd->query('SELECT * FROM enseignant ');
                if ($select_all_members->rowCount() > 0) {
                    while ($m = $select_all_members->fetch()) { ?>
                        <tr>
                            <td style="text-align:center"> <?= $m['Email']; ?> </td>
                            <td style="text-align:center"> <?= $m['Nom']; ?> </td>
                            <td style="text-align:center"> <?= $m['Prenom']; ?> </td>
                            <td>
                            <div class="suppMessage">
                                    <form action="" method="post">
                                        <input type="text" style="display: none;" value="<?= $m['Email'] ?>" name="Email">
                                        <input type="submit" value="Supprimer " class="delete btn" name="delete">
                                    </form>
                                   
                                </div>
                            </td>
                           
                        </tr>
                <?php
                    }
                } else {
                    echo "aucun membre trouver ! ";
                }
                ?>

            </table>

            <script>
                function myFunction() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("myTable");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>
        </div>
        
    </div>
</body>

</html>