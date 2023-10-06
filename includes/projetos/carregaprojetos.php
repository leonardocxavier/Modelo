<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

    $idempresa = $_SESSION['idempresa'];
    $idempresa = addslashes($idempresa);

    $projeto = ''; 
    $members = '';

$sqlproj="SELECT * FROM `projetos` WHERE `id_empresa`='$idempresa'";
$respproject=$con->query($sqlproj);

while( $row = $respproject->fetch() ){
    $members='';
    $id_projeto = $row['id_projeto'];
    $task_member = $row['membros'];
    if(empty($task_member)){
        $members='Não há membros neste projeto.';
    }else{
        $selectmemb="SELECT `login`,`nome` FROM `usuarios` WHERE `id_usuario` in ($task_member)";
        $respmember=$con->query($selectmemb);
        while($row1 = $respmember->fetch()){
            $img_gravatar = get_gravatar($row1['login']);
            $members.='<li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" title="'.$row1['nome'].'" src="'.$img_gravatar.'">
                    </li>';
        }
    }
    //calcula progresso do projeto
    //pega total de tarefas concluidas do projeto
    $progress="SELECT COUNT(*) as `concluidos` from `tasks` where `status`='F' and `id_projeto`='$id_projeto'";
    $respprogress=$con->query($progress);
    $dadosprogres=$respprogress->fetch();
    //pega as tarefas pendentes do projeto em questão
    $progress1="SELECT COUNT(*) as `pendentes` from `tasks` where `status`<>'F' and `id_projeto`='$id_projeto'";
    $respprogress1=$con->query($progress1);
    $dadosprogres1=$respprogress1->fetch();
    

    //calcula porcentagem
    $concluidos = $dadosprogres['concluidos'];
    $pendente   = $dadosprogres1['pendentes'];
    $total      = $pendente+$concluidos;
    //calcular porcentagem de conclusão
    if($total===0){
        $percent = 0;
    }else{
        $percent = round((($concluidos*100)/$total),2);
    }
   
    //verifica status do projeto
    /*
        <option value="">Selecione</option>
        <option value="A" selected="">Em Análise</option>
        <option value="C">Cancelado</option>
        <option value="S">Em Andamento</option>
    */

    $stat = $row['status'];
    $statusp ='';
    if($stat==="A"){
        $statusp ='<span class="badge badge-warning">Em Análise</span>';
    }
    if($stat==="C"){
        $statusp ='<span class="badge badge-secondary">Cancelado</span>';
    }
    if($stat==="S"){
        $statusp ='<span class="badge badge-success">Em Andamento</span>';
    }

    $projeto .= '<tr>
                <td>
                    <a>
                        '.$row['nome'].'
                    </a>
                    <br>
                    <small>
                        Criado em: '.date('d/m/Y h:m:s',strtotime($row['criado_em'])).'
                    </small>
                </td>
                <td>
                    <ul class="list-inline">
                        '.$members.'
                    </ul>
                </td>
                <td class="project_progress">Pendente:'.$pendente.' | Concluídos: '.$concluidos.' | Total: '.$total.'
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent.'%">
                        </div>
                    </div>
                    <small>
                        '.$percent.'% Complete
                    </small>
                </td>
                <td class="project-state">
                   '.$statusp.'
                </td>
                <td class="project-actions text-center">                      
                    <a class="btn btn-info btn-sm" href="javascript:;" onclick="editaprojeto('."'".$id_projeto."'".')">
                        <i class="fas fa-pencil-alt">
                        </i>
                    </a>
                    <a class="btn btn-warning btn-sm" href="javascript:;" onclick="tarefas('."'".$id_projeto."'".')">
                        <i class="fas fa-tasks">
                        </i>
                    </a>
                    <a class="btn btn-primary btn-sm" href="javascript:;">
                        <i class="fas fa-folder">
                        </i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="javascript:;" onclick="removeprojetos('."'".$id_projeto."'".')">
                        <i class="fas fa-trash">
                        </i>
                    </a>
                </td>
                </tr>';

    }

    echo $projeto;
?>



