<?php
session_start();
?>

<header>
    <a href="menu_principal.php"><img src="../img/QuickReflexTransp.png" class="logo"></a>

    <nav class="menu">
        <ul>
            <li><a href="menu_principal.php">ACCUEIL</a></li>
            <li><a href="notre_produit.php">NOTRE PRODUIT</a></li>
            <?php
            if(isset($_SESSION["ID"]))
            {
                include('../controleur_fr/connexionbdd.php');

                $req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
                $req->execute(array($_SESSION["ID"]));
                $donnees = $req->fetch();
                
                if ($donnees["permission"] == "utilisateur")
                {
                    ?>
                    <li><a href="profil_utilisateur.php">MON PROFIL</a></li>
                    <?php
                }

                else if($donnees["permission"] == "gestionnaire")
                {
                    ?>
                    <li><a href="profil_gestionnaire.php">MON PROFIL</a></li>
                    <?php
                }
                
                if($donnees["permission"] == "administrateur")
                {
                    ?>
                    <li><a href="profil_administrateur.php">MON PROFIL</a></li>
                    <?php
                }
                
                $req->closeCursor();
            }

            else
            {
                ?>
                <li><a href="page_connexion.php">SE CONNECTER</a></li>
                
                <?php
            }
            ?>
            <nav class="langue">
                <ul>
                    <li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href="../vues_en/menu_principal_en.php"><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
        </ul>
    </nav>

    
</header>