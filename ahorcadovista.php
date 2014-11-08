<html lang="en">
<head>
    <meta charset="utf-8">
    <title>vista</title>
    <?php require_once('funciones.php')?>
    <style>
        html,body{
            width: 100%;
            height: 100%;
        }
        body{
            background-repeat: no-repeat;
            background: #3b679e; /* Old browsers */
            background: -moz-linear-gradient(-45deg,  #3b679e 0%, #207cca 27%, #207cca 27%, #2b88d9 56%, #7db9e8 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#3b679e), color-stop(27%,#207cca), color-stop(27%,#207cca), color-stop(56%,#2b88d9), color-stop(100%,#7db9e8)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(-45deg,  #3b679e 0%,#207cca 27%,#207cca 27%,#2b88d9 56%,#7db9e8 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(-45deg,  #3b679e 0%,#207cca 27%,#207cca 27%,#2b88d9 56%,#7db9e8 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(-45deg,  #3b679e 0%,#207cca 27%,#207cca 27%,#2b88d9 56%,#7db9e8 100%); /* IE10+ */
            background: linear-gradient(135deg,  #3b679e 0%,#207cca 27%,#207cca 27%,#2b88d9 56%,#7db9e8 100%); /* W3C */
        }
        .letras{
            text-align: center;
            font-size: 300%;
            float: left;
            width: 4%;
            height: 40%;
            margin: 0 1%;
            margin-top: 3.5%;
            background: #feffff; /* Old browsers */
background: -moz-linear-gradient(-45deg,  #feffff 0%, #ddf1f9 54%, #a0d8ef 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#feffff), color-stop(54%,#ddf1f9), color-stop(100%,#a0d8ef)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(-45deg,  #feffff 0%,#ddf1f9 54%,#a0d8ef 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(-45deg,  #feffff 0%,#ddf1f9 54%,#a0d8ef 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(-45deg,  #feffff 0%,#ddf1f9 54%,#a0d8ef 100%); /* IE10+ */
background: linear-gradient(135deg,  #feffff 0%,#ddf1f9 54%,#a0d8ef 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feffff', endColorstr='#a0d8ef',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        }
        #mover{
            margin-left: 35%;
        }
        #separador{
        background: #a90329; /* Old browsers */
background: -moz-linear-gradient(-45deg,  #a90329 0%, #1a039e 49%, #140a14 87%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#a90329), color-stop(49%,#1a039e), color-stop(87%,#140a14)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(-45deg,  #a90329 0%,#1a039e 49%,#140a14 87%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(-45deg,  #a90329 0%,#1a039e 49%,#140a14 87%); /* Opera 11.10+ */
background: -ms-linear-gradient(-45deg,  #a90329 0%,#1a039e 49%,#140a14 87%); /* IE10+ */
background: linear-gradient(135deg,  #a90329 0%,#1a039e 49%,#140a14 87%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#140a14',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
            height: 2%;
        }
        #letra{
            height: 20%;
        }
        .teclado div{
            text-align: center;
            font-size: 200%;
            float: left;
            width: 4%;
            margin: 0 8%;
        }
        #mitad{
            width: 50%;
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
        <div id="mitad">
          <div class="teclado">
           <?php
                echo $letras;
            ?>
          </div>
        </div>
    </div>
    <form id="form" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input style="display:hidden" type="text" id="acertada" name="acertadas" value="<?php echo $acertadas?>">
        <input style="display:hidden" type="text" id="malas" name="malas" value="<?php echo $malas?>">
        <input style="display:hidden" type="text" id="vidas" name="vidas" value="<?php echo $vidas ?>" required>
        <input style="display:hidden" type="text" id="letra" name="letra" value="" required>
        <input style="display:hidden" type="text" id="palabra" name="palabra" value="<?php echo $palabra?>" required>
        <input style="display:hidden" type="submit">
    </form>
    <script type="text/javascript">
        function mirar(letra,tipo){
            if(tipo==0 || tipo==1){//false
                alert("Ya fue pulsada");
            }else{
                document.getElementById("letra").value=letra;
                document.getElementById("form").submit();
            }
        }

    </script>
</body>
</html>
