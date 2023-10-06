<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    } 
    header("X-XSS-Protection: 1; mode=block");
    $requi='https://umentor.test/$nomesys/';
    $requi= strtolower("/$requi/");
    $server = $_SERVER['SERVER_NAME'];
    $server= strtolower("/$server/");
    //echo $server .' | '.$requi;
    if(preg_match($server, $requi) == 0){
        echo "Desculpe mas este tipo de acesso é proibido!";
        die();
    }else{
        if($_SESSION['zebra']==''){
            echo "Desculpe mas este tipo de acesso é proibido!";
            die(); 
        }
                
    }
?>