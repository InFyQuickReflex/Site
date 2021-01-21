<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Infy - My profile</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/profil_utilisateur.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

      <main>
          <?php
          if(isset($_SESSION["ID"]))
          {
            ?>
            <br>
            <h2>User profile</h2>

            <div class="profil">
                <img src="../img/pp.png">
                <p>
                    <?php
                    include('../php_fr/connexionbdd.php');
                    include('../php_fr/fonctions/fonctions_permission.php');
                    $donnees = PermissionUser($bdd);
                        echo "<strong>First name</strong> : ".$donnees["prenom"]."<br>";
                        echo "<strong>Last name</strong> : ".$donnees["nom"]."<br>";
                        echo "<strong>Username</strong> : ".$donnees["identifiant"]."<br>";
                        echo "<strong>Email</strong> : ".$donnees["email"]."<br><br>";
                    
                    $req->closeCursor();
                    ?>
    
                    <a href="../php_en/connexion_en.php" class="button">Log out</a>
                </p>
            </div>

            <br>
            <div class="start_test">
                <a href="commencer_test_en.php">Start a new test</a>
            </div>
            
            <br>
            <h3>Test history</h3>
            
            <div class="test">
               <?php
               $reponse = $bdd->prepare("SELECT users.id_user, id_test, date_test FROM tests INNER JOIN users ON (tests.id_user = users.id_user AND users.id_user = ?) ORDER BY date_test DESC LIMIT 0,4");
                $reponse->execute(array($_SESSION["ID"])); 

                while ($donnees = $reponse->fetch())
                {
                    echo '<p>Test of ' .$donnees["date_test"]. ' : <a href="affichage_resultat.php?ID='.$donnees["id_user"].'&IDtest='.$donnees["id_test"].'"> Results </a> </br></p>';       
                }
               ?>
            </div>
                       
            <?php
          }

          else
          {
              header("Location: menu_principal_en.php");
          }
          ?>  
      </main>

      <?php include("header_footer/footer_en.php")?>
    </body>
</html>

