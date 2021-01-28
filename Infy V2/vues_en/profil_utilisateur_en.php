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
      include('../controleur_fr/connexionbdd.php');
      include('../controleur_fr/fonctions/fonctions_permission.php');
      include('../controleur_fr/fonctions/fonctions_affichage.php');
    ?>
      <br>
      <h2>User profile</h2>

      <div class="profil">
        <img src="../img/pp.png">
          <p>
          <?php
              $donnees = PermissionUser($bdd);
              echo "<strong>First name</strong> : ".$donnees["prenom"]."<br>";
              echo "<strong>Last name</strong> : ".$donnees["nom"]."<br>";
              echo "<strong>Username</strong> : ".$donnees["identifiant"]."<br>";
              echo "<strong>Email</strong> : ".$donnees["email"]."<br><br>";
            ?>
            <a href="../controleur_en/deconnexion_en.php" class="button"> Log Out</a>
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
        $req = AfficherTests($bdd,$_SESSION["ID"]);
        while ($donnees = $req->fetch())
        {
          echo '<p>Test of ' .$donnees["date_test"]. ' : <a href="results-'.$donnees["id_user"].'-'.$donnees["id_test"].'"> Results </a> </br></p>';       
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

