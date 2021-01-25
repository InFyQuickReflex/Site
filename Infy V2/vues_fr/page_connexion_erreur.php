<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Connexion</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/page_connexion.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")?>

      <main>
            <div>
                <h2>Connexion</h2>
                
                <form method="POST" action="../controleur_fr/connexion.php">
                    <p>
                        <label for="identifiant">Identifiant</label><br>
                        <input type="text" name = "identifiant" id="identifiant" required><br><br>
                        <label for="mot_de_passe">Mot de passe</label><br>
                        <input type="password" name = "mot_de_passe" id="mot_de_passe" required><br><br>
                        <input type="submit" value="Connexion" class="button"><br><br>
                        <p class="erreur">Identifiant ou mot de passe incorrect</p>
                    </p>
                </form>

            </div>
      </main>

      <?php include("header_footer/footer.php")?>
    </body>
</html>
