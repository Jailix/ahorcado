<html lang="en">
<head>
    <meta charset="utf-8">
    <title>vista</title>
    <!--<link rel="icon" href="../../ico.ico">-->
    <link rel="stylesheet" type="text/css" href="esti.css">
    <?php require_once('funciones.php')?>
    <style>

        #mover{
                margin-left:<?php echo 50-(strlen($palabra)*2.3)?>%;
        }

    </style>
</head>
<body>
    <div id="centrar">
        <div id="letra">
           <?php
                echo $letrascorrectas;
            ?>
        </div>
        <div id="separador">
        </div>
        <div id="separar">
          <div class="teclado mitad">
           <?php
                echo $letras;
            ?>
          </div>
          <div>
           <?php
                echo $mostrarimagenes;
            ?>
          </div>
        </div>
    </div>

    <form id="form" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="text" id="acertada" name="acertadas" value="<?php echo $acertadas?>">
        <input type="text" id="malas" name="malas" value="<?php echo $malas?>">
        <input type="text" id="vidas" name="vidas" value="<?php echo $vidas ?>" required>
        <input type="text" id="valor" name="letra" value="">
        <input type="text" id="palabra" name="palabra" value="<?php echo $palabra?>" required>
        <input type="submit">
    </form>
    <button onclick="palabra()">Introduce una palabra nueva</button>
    <script type="text/javascript">
        function mirar(letra,tipo){
            if(tipo==0 || tipo==1){//false
                alert("Ya fue pulsada");
            }else{
                document.getElementById("valor").value = letra;
                document.getElementById("form").submit();
            }
        }

        function palabra (){
            pala=prompt('Introduce una palabra:','');
            enviar(pala);
        }
        function enviar (pala){
            document.getElementById("acertada").value="";
            document.getElementById("malas").value='';
            document.getElementById("vidas").value=6;
            document.getElementById("valor").value='a';
            document.getElementById("palabra").value=pala;
            document.getElementById("form").submit();
        }
        i=<?php echo $numero?>;
        if(i==0){
            pala=prompt('Enhorabuena ganastes ponga la nueva palabra:','');
            if(pala!=null){
                enviar(pala);
            }else{
                perdistes();
            }
        }else if(i==2){
            alert("Perdistes se reseteara la partida con la misma palabra");
            perdistes();
        }
        function perdistes(){
            document.getElementById("acertada").value="";
            document.getElementById("malas").value='';
            document.getElementById("vidas").value=6;
            document.getElementById("valor").value='a';
            document.getElementById("form").submit();
        }
    </script>
</body>
</html>
