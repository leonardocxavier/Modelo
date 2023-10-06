<?php
 header("X-XSS-Protection: 1; mode=block");
  session_start();

  require '../../db/conection.php'; 

   /*
      currlang : navigator.language,
      username : $('#nomeusuario').val(),
      userpass : $('#senhausuario').val() 
   */

//seleciona linguagem
$lang = filter_input(INPUT_POST,'currlang');

$ArquivoLinguagem = $lang.'.php';

if(!file_exists('../../dist/lang/'.$ArquivoLinguagem)){
   $ArquivoLinguagem = 'pt-BR.php';
}

require '../../dist/lang/'.$ArquivoLinguagem;

$user  = filter_input(INPUT_POST, 'username');
$senha = filter_input(INPUT_POST, 'userpass');

$user  = addslashes($user);
$senha = addslashes($senha);

$sql = "SELECT *FROM `usuarios` WHERE `login` = '$user';";

$resp = $con->query($sql);

$dados = $resp->fetch();

//função para pegar a imagem do usuario


if($dados){
   $senha_validacao = base64_encode($senha);
   if($senha_validacao === $dados['senha']){ 

      $_SESSION['nomeusuario']  = $dados['nome']; 
      $_SESSION['emailusuario'] = $dados['login'];
      $_SESSION['idusuario']    = $dados['id_usuario'];
      $_SESSION['fotousuario']  = get_gravatar($user);
      $_SESSION['language']     = $ArquivoLinguagem;
      $_SESSION['matriz']       = '';
      $_SESSION['idempresa']    = $dados['id_empresa'];
      $_SESSION['zebra']        = base64_encode($dados['login']);
      $_SESSION["txt_senha"]    = base64_encode($dados['senha']);
      $_SESSION["loginuser"]    = base64_encode($dados['nome']);
      $id = $dados['id_usuario'];

      $sqlupdtdata = "UPDATE `usuarios` set `ultimoacesso`=now() where id_usuario='$id'";
      $con->query($sqlupdtdata);

      echo '1';

   } else {
      
      echo '<div class="mt-3 alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> '.$TituloMsgSenhaIncorreta.'</h5>
                  '.$MsgSenhaIncorreta .'
         </div>';
   }
    
}else{
   echo '<div class="mt-3 alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> '.$TituloMsgUsuarioIncorreto.'</h5>
                  '.$MsgUsuarioIncorreto.'
         </div>';
}



?>