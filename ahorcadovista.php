<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ahorcado</title>
    <!--<link rel="icon" href="../../ico.ico">-->
    <link rel="stylesheet" type="text/css" href="esti.css">
    <?php require_once('funciones.php')?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="../../ico.ico">
    <style>

        #mover{
                margin-left:<?php echo 50-(strlen($palabra)*1.9)?>%;
        }

    </style>
</head>
<body onload="partida()">
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
    <button onclick="enviar('Ç')">Nueva palabra ramdom</button>
    <div  class="parte" id="volver">
               <div class="enjoy-css" onclick="envia('1')">Volver a DSW</div>


    </div>
    <script type="text/javascript">
        function envia(valor){
            if('1'==valor){
                location.href="../../dsw.html";
            }

        }
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
            if(pala!=undefined){
                enviar(pala);
            }
        }
        function enviar (pala){
            h=0
            while(h==0){
                if(/^([a-zA-Z]|ñ|Ñ)*$/.test(pala)|| pala=='Ç'){
                    document.getElementById("acertada").value="";
                    document.getElementById("malas").value='';
                    document.getElementById("vidas").value=6;
                    document.getElementById("valor").value='a';
                    document.getElementById("palabra").value=pala;
                    document.getElementById("form").submit();
                    h=1;
                }else{
                    alert('Solo puedes introducir letras');
                    pala=prompt('Introduce una palabra:','');
                }
            }
        }
        function partida (){
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
