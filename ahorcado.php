<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ahorcado</title>
    <link rel="icon" href="../../ico.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="estilo.css">
</head>
<body>
    <div>
      <div id="centrar">
        <div>
            <form action="ahorcadovista.php" method="post">
                    <h3>Introduce la palabra:</h3>
                    <input type="text" name="palabra" value="" required>
                <input type="submit" value="">
            </form>
        </div>
    </div>
        <div  class="parte" id="volver">
                   <div class="enjoy-css" onclick="envia()">Volver a DSW</div>
            </div>
    </div>
</body>
    <script>
        function envia(){
            location.href="../../dsw.html";
        }
    </script>
</html>
