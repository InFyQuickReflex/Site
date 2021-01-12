<?php
session_start();
?>

<header>
    <a href="menu_principal.php"><img src="../img/infy_white.png" class="logo"></a>

    <nav class="menu">
        <ul>
            <li><a href="menu_principal.php">ACCUEIL</a></li>
            <li><a href="notre_produit.php">NOTRE PRODUIT</a></li>
            <?php
            if(isset($_SESSION["ID"]))
            {
                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=infy;charset=utf8", "root", "root");
                }

                catch (Exception $e)
                {
                    die("Erreur : " . $e->getMessage());
                }

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
        </ul>
    </nav>

    <nav class="langue">
        <ul>
            <li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
            <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
        </ul>
    </nav>
</header>