<?php 
  require 'config.php';

  //dados de conexão com o banco de dados
  $server         = 'localhost';
  $NomeBanco      = 'umentor'; 
  $usuarioBanco   = 'root'; 
  $SenhaUserBanco = 'root';
  
  //conexão ao banco de dados
  
  //mysql:host=localhost;dbname=test
  
  $conection = 'mysql:host='.$server.';dbname='.$NomeBanco;
  
  $con = new PDO($conection, $usuarioBanco, $SenhaUserBanco);

?>