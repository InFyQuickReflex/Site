<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Commencer un test</title>
        <link rel="stylesheet" href="../css/timer.css">
    </head>

    <body>
        <header>
            <p class="logo"> <img src="../img/infy2.png" alt="logo InFy" class="img_logo"> </br> by InFy Corporation </p>

            <nav>
                <ul id="menu">
                    <li><a href="menu_principal_fr.php">Accueil</a></li>
                    <li><a href="notre_produit_fr.php">Notre Produit</a></li>
                </ul>
            </nav>

            <div class="form">
                <p>S'identifier</p>
                <form method="post" action="" class="login"> 
                    <input type="text" name="username" placeholder = "Identifiant" required /></br>
                    <input type="password" name="password" placeholder = "Mot de Passe" required /></br>
                    <input name="submit" type="submit" value="Se connecter" /></br>
                </form>
            </div>

            <nav>
                <ul id="langue">
                    <li><a href=""><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
        </header>

        <main>
            <script>
                var sec = 5;
                function tick()
                {
                    document.getElementById('decompte').innerText = sec;
            
                    if(sec == 0)
                    {
                        document.getElementById('decompte').innerText = 'Début du test';
                        document.getElementById('cache').style.display = 'block';
                        window.clearInterval(timer);
                    }
    
                    sec--;
                }
                var timer = window.setInterval(tick, 1000);
            </script>
    
            <p id="decompte">Le test va bientot commencer</p>
            <div id="cache" style="display: none;">  
            </div>
        </main>

        <footer>
            <p class = "CGU"> Mentions légales: </p>
            <nav>
                <ul id="footer">
                    <li> <a href='#'> Nous contacter </a> </li>
                    <li> <a href='faq_fr.php'> FAQ </a> </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>
