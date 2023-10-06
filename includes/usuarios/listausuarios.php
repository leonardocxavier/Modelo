<?php
  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);

  //faz a consulta no banco pelos perfil cadastrados menos o master (perfil critico do sistema)
  // $sql   = "SELECT * FROM `usuarios` where id_usuario<>'1'";
  $sql   = "SELECT * FROM `usuarios` where id_empresa='$idempresa'";
  $respf = $con->query($sql);

?>

<div class="card-body">
    <table id="tabela" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome Usuário</th>
                <th>Login</th>
                <th>Perfil</th>
                <th class="text-center">Status</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $respf->fetch()){
                    
                    //zera as variaveis evitando duplicidade errada
                    $informacoes = '';
                    $img         = '';
                    $datacad     = $row['cadastrado_em'];
                    $mail = $row['login'];
                    $img = get_gravatar($mail);                   
                    //verifica se o cdastro tem foto, caso nao tenha coloca a foto padrão
                    if($img==''){
                        $img = '../dist/img/boxed-bg.jpg';
                    }
                    
                    //recupera o nome da empresa
                    //$id_proj   = $row['id_projeto'];
                    //$sqlproj   = "SELECT *FROM `projetos` where id_projeto='$id_proj'";
                    //$resproj   = $con->query($sqlproj);
                    //$dadosproj = $resproj->fetch();

                     //coelta informações do cdastro do cliente
                    if(empty($datacad)){
                        if (isset($dadosproj['nome'])) {
                            $informacoes = $dadosproj['nome'];
                        }else{
                            $informacoes='-';
                        }
                       
                    }else{
                        $ajustedata  = $row['cadastrado_em'];
                        $dataajusta  = explode('-',$ajustedata);
                        $dataajusta1 = $dataajusta[2].'/'.$dataajusta[1].'/'.$dataajusta[0];

                        $informacoes = 'Cadastrado em: '.$dataajusta1;
                    }

                    //recupera o nome do perfil
                    $id_perf   = $row['id_perfil'];
                    $sqlperf   = "SELECT *FROM `perfil` where id_perfil='$id_perf
                    '";
                    $resperf   = $con->query($sqlperf);
                    $dadosperf = $resperf->fetch();

                    //ajusta apresentação de status para tabela
                    if($row['status']=='Ativo'){
                        $statuspf = '<small class="badge badge-success">Ativo</small>';
                        $class    = 'success';
                    }else{
                        $statuspf = '<small class="badge badge-danger">Inativo</small>';
                        $class    = 'danger';
                    }

                    if(isset($dadosperf['nomeperfil'])){
                        $perfil=$dadosperf['nomeperfil'];
                    }else{
                        $perfil='-';
                    }

                    //mostra registros
                    echo   '<tr>
                                <td>
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="'.$img.'" alt="user image">
                                        <span class="username">
                                              <a href="javascript:;">'.$row['nome'].'</a>
                                        </span>
                                        <span class="description">'.$informacoes.'</span>
                                    </div>     
                                </td>
                                <td>'.$row['login'].'</td>
                                <td>'.  $perfil  .'</td>
                                <td class="text-center">'.$statuspf.'</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="javascript:;" class="btn btn-info" data-toggle="modal" data-target="#modaledicao" title="Editar Cadastro" onclick="editausuario('."'".$row['id_usuario']."'".')"><i class="fas fa-edit"></i></a>
                                        <!--<a href="javascript:;" class="btn btn-warning" title="Permissões"><i class="fas fa-list"></i></a>-->
                                        <a href="javascript:;" class="btn btn-secondary" title="Reset Senha"><i class="fas fa-key"></i></a>
                                        <a href="javascript:;" class="btn btn-'.$class.'" onclick="inativausuario('."'".$row['id_usuario']."'".');" title="Alterar Status"><i class="fas fa-check"></i></a>
                                    </div> 
                                </td>
                            </tr> ';        
                }
            ?>
        </tbody>
    </table>
</div>            

