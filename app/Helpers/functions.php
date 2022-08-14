<?php

function getTipo($line){
    return substr($line, 0,1);
}

function getData($line){
    return substr($line, 1,8);
}

function getValor($line){
    return ltrim(substr($line,9,10),"0");
}

function getCpf($line){
    return substr($line, 19,11);
}

function getCartao($line){
    return substr($line, 30,12);
}

function getHora($line){
    return substr($line, 42,6);
}

function getDonoLoja($line){
    return rtrim(substr($line, 48,14));
}

function getNomeLoja($line){
    return ltrim(rtrim(substr($line, 62,19)));
}
