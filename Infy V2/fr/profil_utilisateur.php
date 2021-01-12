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
            ?>
            <br>
            <h2>Profil Utilisateur</h2>

            <div class="profil">
                <img src="../img/pp.png">
                <p>
                    <?php
                    try
                    {
                        $bdd = new PDO("mysql:host=localhost;dbname=infy;charset=utf8", "root", "root");
                    }
    
                    catch (Exception $e)
                    {
                        die("Erreur : " . $e->getMessage());
                    }
    
                    $req = $bdd->prepare("SELECT prenom, nom, identifiant, email, permission FROM users WHERE id_user = ?");
                    $req->execute(array($_SESSION["ID"]));
                    $donnees = $req->fetch();

                    if($donnees["permission"] != "utilisateur")
                    {
                        if($donnees["permission"] == "administrateur")
                        {
                            header("Location: profil_administrateur.php");
                        }

                        else if($donnees["permission"] == "gestionnaire")
                        {
                            header("Location: profil_gestionnaire.php");
                        }
                    }

                    else
                    {
                        echo "<strong>Prénom</strong> : ".$donnees["prenom"]."<br>";
                        echo "<strong>Nom</strong> : ".$donnees["nom"]."<br>";
                        echo "<strong>Identifiant</strong> : ".$donnees["identifiant"]."<br>";
                        echo "<strong>Adresse email</strong> : ".$donnees["email"]."<br><br>";
                    }
                    
                    $req->closeCursor();
                    ?>
    
                    <a href="../php_fr/deconnexion.php" class="button">Deconnexion</a>
                </p>
            </div>

            <br>
            <div class="start_test">
                <a href="">Commencer un nouveau test</a>
            </div>
            
            <br>
            <h3>Historique des tests</h3>
            
            <div class="test">
                <!--- Code PHP ici --->
                <p>Test du 20/12/2020 <a href="">Voir les résultats</a><hr></p>
                <p>Test du 14/10/2020 <a href="">Voir les résultats</a><hr></p>
                <p>Test du 05/09/2020 <a href="">Voir les résultats</a><hr></p>
                <p>Test du 23/06/2020 <a href="">Voir les résultats</a><hr></p>
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