<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Infy - Mon profil</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/profil_utilisateur.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
    <?php include("header_footer/header.php")?>

      <main>
      <?php
      if(isset($_SESSION["ID"]))
        {
          include('../php_fr/connexionbdd.php');
          include('../php_fr/fonctions/fonctions_permission.php');
          include('../php_fr/fonctions/fonctions_affichage.php');
          $donnees = PermissionUser($bdd);
      ?>
      <br>
      <h2>Profil Utilisateur</h2>

      <div class="profil">
        <img src="../img/pp.png">
        <p>
        <?php  
          echo "<strong>Prénom</strong> : ".$donnees["prenom"]."<br>";
          echo "<strong>Nom</strong> : ".$donnees["nom"]."<br>";
          echo "<strong>Identifiant</strong> : ".$donnees["identifiant"]."<br>";
          echo "<strong>Adresse email</strong> : ".$donnees["email"]."<br><br>";
        ?>
          <a name="logout" href="../php_fr/deconnexion.php" value="Deconnexion" class="button"> Deconnexion</a>
          </p>
      </div>
      <br>
      <div class="start_test">
          <a href="commencer_test.php">Commencer un nouveau test</a>
      </div>   
      <br>
      <h3>Historique des tests</h3>
      <div class="test">
      <?php
        $reponse = AfficherTests($bdd,$_SESSION["ID"]) ;       
        while ($donnees = $reponse->fetch())
          {
            //echo '<p>Test du ' .$donnees["date_test"]. ' : <a href="affichage_resultat.php?ID='.$donnees["id_user"].'&IDtest='.$donnees["id_test"].'"> Voir les résultats </a> </br></p>'; 
            echo '<p>Test du ' .$donnees["date_test"]. ' : <a href="resultats-'.$donnees["id_user"].'-'.$donnees["id_test"].'"> Voir les résultats </a> </br></p>';      
          }
      ?>
      </div>
                       
      <?php
        }
      else
      {
        header("Location: menu_principal.php");
      }
      ?>  
      </main>
      <?php include("header_footer/footer.php")?>
    </body>
</html>

