<?php
session_start();

if($_SESSION){
    var_dump($_SESSION);
}else{
    echo "no hay sesion iniciada";
}
?>