<?php
  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);


  //id do usuario 
  $idu = $_SESSION['idusuario'];
  
  $sqlemp  = "SELECT *FROM `empresas` where `id_empresa`='$idempresa'";
  $sqlperf = "SELECT *FROM `perfil`   where `id_empresa`='$idempresa'";


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
<div class="modal-header">
    <h4 class="modal-title">Novo Usuário</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div id="messages"></div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Cliente</label>
                <select class="form-control" id="empresa">
                    <option value="-" selected>-</option>
                <?php
                    $resemp = $con->query($sqlemp);
                    while ($row = $resemp->fetch()){
                        echo '<option value="'.$row['id_empresa'].'">'.$row['nome'].'</option>';
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Perfil</label>
                <select class="form-control" id="perfil">
                    <option value="-" selected>-</option>
                <?php
                    $resperf = $con->query($sqlperf);
                    while ($row = $resperf->fetch()){
                        echo '<option value="'.$row['id_perfil'].'">'.$row['nomeperfil'].'</option>';
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
                <label>Nome</label>
                <input type="text" id="nomeus" autocomplete="off" value="" class="form-control">
            </div>
        </div>
        <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
                <label>Login</label>
                <input type="text" id="login" autocomplete="new-user" value="" class="form-control">
            </div>
        </div>
        <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
                <label>Senha</label>
                <input type="password" id="pasus" autocomplete="new-password" class="form-control">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" id="status">
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    <button type="button" class="btn btn-primary" onclick="gravausuario();">Gravar</button>
</div>



