<?php

  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

    $id_user = $_SESSION['idusuario'];
    /*
        nomeemp     : $('#nfant').val(),
        nomerazao   : $('#nsoc').val(),
        ncnpj       : $('#cnpj').val(),
        telefone    : $('#telef').val(),
        celular     : $('#cel').val(),
        email       : $('#mail').val(),
        aceita_lig  : $('#Tel_contact').is(':checked'),
        aceita_watz : $('#Wpp_acept').is(':checked'),
        aceita_mail : $('#Receive_mail').is(':checked')
    */

    //passa variaveis do javascript para o php
    $nome_empresa   = filter_input(INPUT_POST,'nomeemp');
    $nome_empresa   = addslashes($nome_empresa);
    $nome_razao     = filter_input(INPUT_POST,'nomerazao');
    $nome_razao     = addslashes($nome_razao);
    $nome_cnpj      = filter_input(INPUT_POST,'ncnpj');
    $nome_cnpj      = addslashes($nome_cnpj);
    $nome_telefone  = filter_input(INPUT_POST,'telefone');
    $nome_telefone  = addslashes($nome_telefone);
    $nome_celular   = filter_input(INPUT_POST,'celular');
    $nome_celular   = addslashes($nome_celular);
    $nome_mail      = filter_input(INPUT_POST,'email');
    $nome_mail      = addslashes($nome_mail);
    $aceita_ligacao = filter_input(INPUT_POST,'aceita_lig');
    $aceita_ligacao = addslashes($aceita_ligacao);
    $aceita_wapp    = filter_input(INPUT_POST,'aceita_watz');
    $aceita_wapp    = addslashes($aceita_wapp);
    $aceita_mail    = filter_input(INPUT_POST,'aceita_mail');
    $aceita_mail    = addslashes($aceita_mail);

    //echo 'Nome: '.$nome_empresa.'<br/>';
   // echo 'Razão Social '.$nome_razao.'<br/>';
    //echo 'CNPJ '.$nome_cnpj.'<br/>';
   // echo 'Telefone '.$nome_telefone.'<br/>';
   // echo 'Celular '.$nome_celular.'<br/>';
   // echo 'Mail '.$nome_mail.'<br/>';
   // echo 'Ligacao '.$aceita_ligacao.'<br/>';
   // echo 'Wapp '.$aceita_wapp.'<br/>';
  //  echo 'Mail '.$aceita_mail.'<br/>';

    if($nome_empresa==="" || $nome_cnpj==="" || $nome_mail===""){
        echo "<script>toastr['info']('Os ampos <b>Nome Fantazia</b>,<b>CNP</b> e <b>E-Mail</b> São de preenchimento obrigatório.')</script>";
    }else{
        $insert = "INSERT INTO `empresas` ( `id_master`, `nome`, `cnpj`, `razaosocial`, `email`, `telefone`, 
                                       `aceita_email`, `aceita_wats`, `acita_ligacao`, `status`, 
                                       `id_usuario`, `qtd_projetos`,`qtd_usuarios`) 
                              VALUES ( '$id_user','$nome_empresa','$nome_cnpj','$nome_razao','$nome_mail','$nome_telefone',
                                       '$aceita_mail','$aceita_wapp','$aceita_ligacao','Ativo','$id_user',
                                       1,1)";
        if($con->query($insert)){
            //recupera o id da empresa e libera o acesso ao usuario:
            $sqlemp  = "SELECT *FROM `empresas` where `nome`='$nome_empresa' and `cnpj`='$nome_cnpj' and `status`='Ativo'";
            $respemp = $con->query($sqlemp);
            $dadosemp = $respemp->fetch();
            $_SESSION['idempresa']=$dadosemp['id_empresa']; 
            $idemp = $dadosemp['id_empresa']; 
            //atualiza perfil do usuario com o id da empresa cdastrada
            $sqlupdt = "UPDATE `usuarios` set id_empresa='$idemp' where id_usuario='$id_user'";
            $con->query($sqlupdt);

            echo   "<script>
                        toastr['success']('Dados Atualizados com sucesso!');
                        recarregasys();
                    </script>";
        }else{
            echo   $insert."<script>
                        toastr['info']('OOPsss! Estamos em manutenção neste momento.<br/>Por favor volte mais tarde..Desculpe o transtorno.');
                    </script>"; 
        }
       
    }

?> 


