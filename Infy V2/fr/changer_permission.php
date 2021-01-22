<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Modifier un utilisateur</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script language='javascript'>
        function Confirmation()
        {
            if (confirm("Voulez-vous confirmer?"))
            {
                formulaire.submit();
            }
        }
        </script>
    </head>

    <body>
      <?php include("header_footer/header.php")?>

      <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
          include('../php_fr/connexionbdd.php');
          include('../php_fr/fonctions/fonctions_permission.php');
          PermissionAdmin($bdd);
          $donnees = ChangePerm($bdd, $_GET["ID"]);
          ?>
          <br>
          <h2>Modifier l'utilisateur</h2>
          <form method="POST" action="../php_fr/modifier_user_traitement.php">
                  <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>

                  <label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" value="<?php echo $donnees["prenom"] ?>"><br><br>

                  <label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?php echo $donnees["nom"] ?>"><br><br>

                  <label for="identifiant">Identifiant : </label><input type="text" name="identifiant" id="identifiant" value="<?php echo $donnees["identifiant"] ?>"><br><br>

                  <label for="email">Adresse email : </label><input type="text" name="email" id="email" value="<?php echo $donnees["email"] ?>"><br><br>

                  <label for="date_de_naissance"> Date de naissance : </label><input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php echo $donnees["date_de_naissance"] ?>"><br><br>

                  <label for="telephone">Telephone : </label><input type="tel" name="telephone" id="telephone" value="<?php echo $donnees["telephone"] ?>"><br><br>

                  <label for="permission">Permission : </label>
                  <select name = 'permission' id='permission'>
                  <?php 
                  $permissions = ['administrateur','utilisateur','gestionnaire'];
                  for ($j=0;$j<3;$j++)
                  {
                    if ($donnees['permission']==$permissions[$j])
			              {
			                echo "<option value = '".$permissions[$j]."' selected>".$permissions[$j]."</option>";
			              }
			              else
			              {
			                echo "<option value = '".$permissions[$j]."'>".$permissions[$j]."</option>";
			              }
                  }
                  ?>
                  </select>
                  <br><br>
                  <input type="submit" name="action" class="modifier" value="Modifier" onclick= 'Confirmation()';>
                  <a href="gerer_droits.php" class="cancel">Annuler</a>
              </form>

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