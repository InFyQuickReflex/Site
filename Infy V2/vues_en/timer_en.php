
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/commencer_test.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

      <main>
        <script>
            var sec = 5;
            function tick()
            {
                document.getElementById('decompte').innerText = sec;
        
                if(sec == 0)
                {
                    document.getElementById('decompte').innerText = 'Start of the test';
                    document.getElementById('cache').style.display = 'block';
                    window.clearInterval(timer);
                }

                sec--;
            }
            var timer = window.setInterval(tick, 1000);
        </script>

        <div class="timer">
            <p id="decompte">The test will start</p>
            <div id="cache" style="display: none;">  
            </div>
        </div>
      </main>

      <?php include("header_footer/footer_en.php")?>
    </body>
</html>
