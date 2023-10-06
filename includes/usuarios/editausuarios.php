<?php
  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);

/*
    idusuario: id
*/

//recebe variavais do javascript
    $id = filter_input(INPUT_POST,'idusuario');  
    
    $sqlus   = "SELECT *from `usuarios` where `id_usuario`='$id'";
    $respus  = $con->query($sqlus);
    $dadosus = $respus->fetch();  
     
    $sqlemp  = "SELECT *FROM `empresas` where `id_empresa`='$idempresa'";
    $sqlperf = "SELECT *FROM `perfil`   where `id_empresa`='$idempresa'";

    $imguser = get_gravatar($dadosus['login']);
   
?>
<style>
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    padding: 0 6px 0 6px;
    color: white;
    background-color: #6c757d;
    display: inline-block;
    cursor: pointer; /* "hand" cursor */
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: #007bff;
}

</style>
<div class="modal-header" style="place-items: center;">
    <h4 class="modal-title" >Edição de Usuário:</h4>
    <img class="ml-3 img-circle img-bordered-sm"  style="width: 50px;" src="<?php echo $imguser;?>" alt="user image">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div id="messages"></div>
    <div class="row">
        <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
                <label>Empresa</label>
                <select class="form-control" id="empresa">
                    <?php
                        $resemp = $con->query($sqlemp);
                        while ($row = $resemp->fetch()){
                            if($row['id_empresa']==$dadosus['id_empresa']){
                                echo '<option value="'.$row['id_empresa'].'" selected>'.$row['nome'].'</option>';
                            }else{
                                echo '<option value="'.$row['id_empresa'].'">'.$row['nome'].'</option>';
                            }    
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Perfil</label>
                <select class="form-control" id="perfil">
                    <option value="desativado" selected>Desativar Usuário</option>
                    <?php
                        $resperf = $con->query($sqlperf);
                        while ($row = $resperf->fetch()){
                            if($row['id_perfil']==$dadosus['id_perfil']){
                                echo '<option value="'.$row['id_perfil'].'" selected>'.$row['nomeperfil'].'</option>';
                            }else{
                                echo '<option value="'.$row['id_perfil'].'">'.$row['nomeperfil'].'</option>';
                            }    
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" value="<?php echo $dadosus['nome'];?>" id="nomeus" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Login</label>
                <input type="text" value="<?php echo $dadosus['login'];?>" id="login" class="form-control">
            </div>
        </div>
    </div>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="gravaeditausuario(<?php echo $id;?>);">Gravar</button>
</div>
