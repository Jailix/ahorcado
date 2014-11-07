<?php

function palabra($palabra){


}
function letras($letra,$palabra,$puestas){
    $a="ABCDFGHYJKLMNÑOPQRSTUVWXYZ";
    $letras='';
    for($i=0;$i<27){
        if(false!=strpos($puestas,$letra)){
            $letras+=puestas($puestas,$letra);
        }elseif(false!=strpos($puestas,$letra)){
            $letras+=puestas($puestas,$letra);
        }else{
            $letras+="<div style=''></div>";
        }
    }
    return $letras;
}

function puestas($puestas,$letra){
    if(false!=strpos($puestas,$letra)){
        $letras+="<div style='' onclick='mirar(".$letra.")'></div>";
    }else{
        $letras+="<div style='' onclick='mirar(".$letra.")'></div>";
    }
    return $letras;
}
?>
