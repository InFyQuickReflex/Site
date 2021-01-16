<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos résultats</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")?>
    <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
            echo "<h2>Vos Résultats</h2>";

            try
            {
                $bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
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
	           $reponse= $bdd->prepare('SELECT valeur, unite_mesure FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? )');
	           $reponse->execute(array($_GET["IDtest"]));

	           while ($donnees = $reponse->fetch())
                {
                    echo $donnees["valeur"].' '.$donnees["unite_mesure"].'</br>';
                }
                echo "<a href=profil_utilisateur.php> Retour au profil </a>";
            }
        }
        else
        {
            echo"why";
        }
        ?>
    </main>
    <?php include("header_footer/footer.php")?>
    </body>
</html>