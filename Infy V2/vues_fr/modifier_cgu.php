<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Modifier les CGU</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src = "../css/popup.js"></script>
    </head>

    <body>
      <?php include("header_footer/header.php")?>

    <main>
 	
	<?php
	if(isset($_SESSION["ID"]))
    {
        include('../controleur_fr/connexionbdd.php');
        include('../controleur_fr/fonctions/fonctions_cgu.php');
        include('../controleur_fr/fonctions/fonctions_permission.php');
        PermissionAdmin($bdd);
            $donnees = SelectOneCgu($bdd,$_GET["ID"]);
            ?> 
            <br>
            <h2>Modifier le paragraphe</h2>
            <form method="POST" action="../controleur_fr/modifier_cgu_traitement.php">
                <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>

                <label for="titre_fr">Titre (français) : </label><input type="text" name="titre_fr" id="titre" value="<?php echo $donnees["titre_fr"] ?>"><br><br>

                <label for="paragraphe_fr">Paragraphe (français) : </label><textarea rows="10" cols="100" name="paragraphe_fr" id="paragraphe"><?php echo $donnees["paragraphe_fr"] ?></textarea><br><br>

                <label for="titre_en">Titre (anglais) : </label><input type="text" name="titre_en" id="titre" value="<?php echo $donnees["titre_en"] ?>"><br><br>

                <label for="paragraphe_en">Paragraphe (anglais) : </label><textarea rows="10" cols="100" name="paragraphe_en" id="paragraphe"><?php echo $donnees["paragraphe_en"] ?></textarea><br><br>

                <input type="submit" name = "action" class = "modifier" value="Modifier" onclick= 'Confirmation()';>
                <a href="gerer_cgu.php" class="cancel">Annuler</a>
                <input type="submit" name = "action" value="Supprimer" class="delete" onclick= 'Confirmation()';>
            </form>
    <?php 
        }
    ?>
    </main>
      <?php include("header_footer/footer.php")?>
    </body>
</html>