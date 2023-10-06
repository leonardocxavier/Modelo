<?php
 header("X-XSS-Protection: 1; mode=block");

/*
    currlang : navigator.language
*/

//recebe variavel linguagem
$lang = filter_input(INPUT_POST,'currlang');
$ArquivoLinguagem = $lang.'.php';

if(!file_exists('../../dist/lang/'.$ArquivoLinguagem)){
    $ArquivoLinguagem = 'pt-BR.php';
}

require '../../dist/lang/'.$ArquivoLinguagem;

?>

<p class="login-box-msg"><?php echo htmlentities($FraseTelaLogin);?></p>

<div class="input-group mb-3">
    <input type="email" class="form-control" id="nomeusuario" placeholder="<?php echo htmlentities($PlaceHolderUsuario);?>">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
    <input type="password" class="form-control" id="senhausuario" placeholder="<?php echo htmlentities($PlaceHolderSenha);?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <p class="mb-1">
                <a href="forgot-password.html"><?php echo htmlentities($EsqueciSenha) ;?></a>
            </p>
        </div>
    <!-- /.col -->
    <div class="col-4">
        <button class="btn btn-primary btn-block" onclick="login();"><?php echo htmlentities($BotaoLogar);?></button>
    </div>
<!-- /.col -->
</div>