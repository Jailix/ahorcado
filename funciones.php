<?php
$palabra=isset($_POST['palabra'])? filter_input(INPUT_POST, 'palabra',FILTER_SANITIZE_STRING):"hola";
if($palabra=="" || ereg("^[a-zA-Z]$", $palabra)){
    header('Location: ahorcado.php');
}else{
    $palabra=strtoupper($palabra);
    $acertadas=isset($_POST['acertadas'])? filter_input(INPUT_POST, 'acertadas',FILTER_SANITIZE_STRING):"H";

    $malas=isset($_POST['malas'])? filter_input(INPUT_POST, 'malas',FILTER_SANITIZE_STRING):"P";

    $vidas=isset($_POST['vidas'])? filter_input(INPUT_POST, 'vidas',FILTER_SANITIZE_STRING):"3";

    $letra=isset($_POST['letra'])? filter_input(INPUT_POST, 'letra',FILTER_SANITIZE_STRING):"L";
    if(true===palabra($palabra,$letra)){
        $acertadas.=$letra;
    }else{
        $malas.=$letra;
        $vidas=$vidas-1;
    }
    if($vidas==0){
        echo "Perdistes";
    }
    $letras=letras($letra,$palabra,$acertadas,$malas);
    $letrascorrectas=letrasacertadas($palabra,$acertadas);
}
// Para mirar la palabra y comparar con la palabra actual
//$palabra,$letra
function palabra($palabra,$letra){
    if(false!==strpos($palabra,$letra)){
        return true;
    }
    return false;
}
//$palabra,$letra
function letrasacertadas ($palabra,$acertadas){
    $letrascorrectas="";
    $contador=0;
    for($i=0;$i<strlen($palabra);$i++){
        if(strpos($acertadas,$palabra[$i])!==false){
            $letrascorrectas.="<div style='background-color:green'>".$palabra[$i]."</div>";
            $contador++;
        }else{
            $contador--;
            $letrascorrectas.="<div></div>";
        }
    }
    if($contador==strlen($palabra)){
        echo "Gano";
    }
    return $letrascorrectas;
}
//$letra,$palabra,$acertadas,$malas
function letras($letra,$palabra,$acertadas,$malas){
    $abecedario="ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    echo strlen($abecedario);
    $letras="";
    for($i=0;$i<28;$i++){
        if($i!=14){
            if(false!==strpos($acertadas,$abecedario[$i])){
                if($i==13){
                    $letras.="<div style='background-color:green' onclick=mirar('Ñ',0)>Ñ</div>";
                }else{
                    $letras.="<div style='background-color:green' onclick=mirar('".$abecedario[$i]."',0)>".$abecedario[$i]."</div>";
                }
            }elseif(false!==strpos($malas,$abecedario[$i])){
                if($i==13){
                    $letras.="<div style='background-color:red' onclick=mirar('Ñ',1)>Ñ</div>";
                }else{
                    $letras.="<div style='background-color:red' onclick=mirar('".$abecedario[$i]."',1)>".$abecedario[$i]."</div>";
                }
            }else{
                if($i==13){
                    $letras.="<div style='background-color:blue' onclick=mirar('Ñ',2)>Ñ</div>";
                }else{
                    $letras.="<div style='background-color:blue' onclick=mirar('".$abecedario[$i]."',2)>".$abecedario[$i]."</div>";
                }
            }
        }
    }
    return $letras;
}
?>
