<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FAQ - Utilisateur</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/stylefaq.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head> 

    <body> 
      <?php include("header_footer/header_en.php");
      include('../controleur_fr/connexionbdd.php');
      include('../controleur_fr/fonctions/fonctions_faq.php');?>

      <main>
        <br><br>
        <h1> FAQ !</h1>
        <?php
        $req = SelectFaq($bdd);

        while($donnees = $req->fetch())
          {?>
            <button class="accordion">
              <h3><?php echo $donnees['question_en']?></h3>
              </button>
            <div class="panel">    
              <?php echo $donnees['reponse_en']?>
            </div>
        <?php }?>
      </main>
      <script src="../css/faq.js"></script>
      <?php include("header_footer/footer_en.php")?>
    </body>
</html>