<?php
    $palabra=isset($_POST['palabra'])? filter_input(INPUT_POST, 'palabra',FILTER_SANITIZE_STRING):"hola";
    $array = array("BAR","CAFETERIA","RELOJ","MUSICA","COCHE","PERRO");
    if($palabra=='Ç'){
        $palabra=$array[rand(0,count($array)-1)];
    }
    $mostrarimagenes='';
    $numero=1;
    $palabra=strtoupper($palabra);
    $acertadas=isset($_POST['acertadas'])? filter_input(INPUT_POST, 'acertadas',FILTER_SANITIZE_STRING):"";

    $malas=isset($_POST['malas'])? filter_input(INPUT_POST, 'malas',FILTER_SANITIZE_STRING):"";

    $vidas=isset($_POST['vidas'])? filter_input(INPUT_POST, 'vidas',FILTER_SANITIZE_STRING):"6";

    $letra=isset($_POST['letra'])? filter_input(INPUT_POST, 'letra',FILTER_SANITIZE_STRING):"4";
    if(false!==strpos($palabra,$letra)){
        $acertadas.=$letra;
    }else{
        $malas.=$letra;
        $vidas=$vidas-1;
    }
    if($vidas<=0){
        $numero=2;
    }
    for($i=5;$i>$vidas;$i--){
        if($i==5){
            $mostrarimagenes.="<img id='imagen' alt='foto".$i."' src='pia".$i.".jpg'>";
        }elseif($i==4){
            $mostrarimagenes.="<img id='cabe' alt='foto".$i."' src='pia".$i.".jpg'>";
        }elseif($i==3){
            $mostrarimagenes.="<img id='cuerpo' alt='foto".$i."' src='pia".$i.".jpg'>";
        }elseif($i==2){
            $mostrarimagenes.="<img id='manos' alt='foto".$i."' src='pia".$i.".jpg'>";
        }elseif($i==1){
            $mostrarimagenes.="<img id='pies' alt='foto".$i."' src='pia".$i.".jpg'>";
        }
    }
    $letras=letras($letra,$palabra,$acertadas,$malas);
    $letrascorrectas=letrasacertadas($palabra,$acertadas,$numero);

//$palabra,$letra
function letrasacertadas ($palabra,$acertadas,&$numero){
    $letrascorrectas="";
    $apariciones=strlen($palabra);
    $contador=0;
    for($i=0;$i<$apariciones;$i++){
        if(strpos($acertadas,$palabra[$i])!==false){
            if($i==0){
                if(strpos("ñ",$palabra[$i])!==false){
                    $i++;
                    $letrascorrectas.="<div class='letras' id='mover'>&#209;</div>";
                }else{
                    $letrascorrectas.="<div class='letras' id='mover'>".$palabra[$i]."</div>";
                }
            }else{
                if(strpos("ñ",$palabra[$i])!==false){
                    $i++;
                    $letrascorrectas.="<div class='letras'>&#209;</div>";
                }else{

                    $letrascorrectas.="<div class='letras'>".$palabra[$i]."</div>";
                }
            }
            $contador++;
        }else{
             if($i==0){
                if(strpos("ñ",$palabra[$i])!==false){
                    $i++;
                    $letrascorrectas.="<div class='letras' id='mover'></div>";
                }else{
                    $letrascorrectas.="<div class='letras' id='mover'></div>";
                }
             }else{
                if(strpos("ñ",$palabra[$i])!==false){
                    $i++;
                    $letrascorrectas.="<div class='letras'></div>";
                }else{
                    $letrascorrectas.="<div class='letras'></div>";
                }
             }
            $contador--;
        }
    }
    if($contador==$apariciones){
        $numero=0;
    }
    return $letrascorrectas;
}

function letras($letra,$palabra,$acertadas,$malas){
    $abecedario="ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    $letras="";
    for($i=0;$i<28;$i++){
        if($i!=15){
            if(false!==strpos($acertadas,$abecedario[$i])){
                if($i==14){
                    $letras.="<div class='verde' onclick=mirar('ñ',0)>Ñ</div>";
                }else{
                    $letras.="<div class='verde' onclick=mirar('".$abecedario[$i]."',0)>".$abecedario[$i]."</div>";
                }
            }elseif(false!==strpos($malas,$abecedario[$i])){
                if($i==14){
                    $letras.="<div class='rojo' onclick=mirar('ñ',1)>Ñ</div>";
                }else{
                    $letras.="<div class='rojo' onclick=mirar('".$abecedario[$i]."',1)>".$abecedario[$i]."</div>";
                }
            }else{
                if($i==14){
                    $letras.="<div class='naranja' onclick=mirar('ñ',2)>Ñ</div>";
                }else{
                    $letras.="<div class='naranja' onclick=mirar('".$abecedario[$i]."',2)>".$abecedario[$i]."</div>";
                }
            }
        }
    }
    return $letras;
}
?>
