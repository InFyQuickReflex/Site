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
        include('../php_fr/connexionbdd.php');
        include('../php_fr/fonctions/fonctions_cgu.php');
        include('../php_fr/fonctions/fonctions_permission.php');
        PermissionAdmin($bdd);
            $donnees = SelectOneCgu($bdd,$_GET["ID"]);
            $donnees = $donnees->fetch();
            ?>
            <br>
            <h2>Modifier le paragraphe</h2>
            <form method="POST" action="../php_fr/modifier_cgu_traitement.php">
                <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>

                <label for="prenom">Titre : </label><input type="text" name="titre" id="titre" value="<?php echo $donnees["titre_fr"] ?>"><br><br>

                <label for="nom">Paragraphe : </label><textarea rows="10" cols="100" name="paragraphe" id="paragraphe"><?php echo $donnees["paragraphe_fr"] ?></textarea><br><br>

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