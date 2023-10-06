<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    /*
        name   : $('#inputName').val(),
        status : $('#inputName').val(),
        desc   : $('#inputDescription').val(),
        cli    : $('#inputClientCompany').val(),
        respon : $('#inputProjectLeader').val()
     */

    //passa variaveis do javascript para o php
    $titulo_proj = filter_input(INPUT_POST,'name');
    $titulo_proj = addslashes($titulo_proj);
    $stat_proj   = filter_input(INPUT_POST,'status');
    $stat_proj   = addslashes($stat_proj);
    $descr_proj  = filter_input(INPUT_POST,'desc');
    $descr_proj  = addslashes($descr_proj);
    $cli_proj    = filter_input(INPUT_POST,'cli');
    $cli_proj    = addslashes($cli_proj);
    $resp_proj   = filter_input(INPUT_POST,'respon');
    $resp_proj   = addslashes($resp_proj);
    if($titulo_proj==""){
        echo "<script>toastr['warning']('OOpsss! Você não informou o nome de seu projeto. <br/>Informe o nome e tnete novamente');</script>";
    }else{

        $sqlins = "INSERT INTO `projetos`(`id_empresa`, `nome`, `status`,
                                          `descricao`, `cliente`, `membros`)
                                  VALUES ('$idempresa','$titulo_proj','$stat_proj',
                                          '$descr_proj','$cli_proj','$resp_proj')";
        if($con->query($sqlins)){
            echo "<script>toastr['success']('Gravado com sucesso!');</script>";
        }else{
            // echo $sqlins;
            echo "<script>toastr['warning']('OOpsss! Ocorreu um erro aqui! Informe o suporte o erro: #CP0001');</script>";
        }

    }

?>