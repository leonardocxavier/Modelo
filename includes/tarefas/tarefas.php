<?php
  require_once '../../db/lock_page.php'; 
  require_once '../../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);
  /*
    idp : id
  */
//passa variaveis do javascript para o php
$idtask = filter_input(INPUT_POST,'idp');
$idtask = addslashes($idtask);

$selectproj="SELECT * FROM `projetos` WHERE `id_projeto`='$idtask' and `id_empresa`='$idempresa'";
$respprojects = $con->query($selectproj);
$dadosprojeto = $respprojects->fetch();


?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-1 text-center"><i class="fa fa-arrow-left" onclick="projetos();"></i></div>
          <div class="col-sm-11 text-center">
            <h1><?php echo $dadosprojeto['nome']; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="icon fas fa-tag mr-2"></i>
                 Pendentes
                </h3>
                <div class="card-tools">
                  <a href="javascript:;" class="btn btn-tool" data-toggle="modal" data-target="#modaledicao" onclick="novatarefa('<?php echo $idtask;?>');">
                    <i class="fas fa-plus mr-1"></i>
                    Nova Tarefa
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div id="P" class="card-body" >
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-sync-alt mr-2"></i>
                  Em Execução
                </h3>
              </div>
              <!-- /.card-header -->
              <div id="E" class="card-body">
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-flag mr-2"></i>
                  Validação
                </h3>
              </div>
              <!-- /.card-header -->
              <div id="V" class="card-body">
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-thumbs-up mr-2"></i>
                  Finalizadas
                </h3>
              </div>
              <!-- /.card-header -->
              <div id="F" class="card-body">
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
</div>
<div id="mensagem"></div>

<script>

  $( function() {
    $( "div.card-body" ).sortable({
      connectWith: "div",
      update: function( event, ui ) {
        var id = ui.item.attr("id");
        //console.log('Update: '+id);
      },
      receive: function( event, ui ) {
        let id_task = ui.item.attr("id");
        let id_box  = event.target.id; 
        $.ajax({
          type:"POST",
          url:"update_status.php",
          data:{
            st  : id_box,
            tsk : id_task 
          },
          success: function(resposta){
            let id_temp = sessionStorage.getItem('id_manager_tasks');
            if(resposta==="P"){
              carregapendentes(id_temp);
              toastr['success']('Tarefa Atualizada Com Sucesso!');
            }
            if(resposta==="E"){
              carregaexecucao(id_temp);
              toastr['success']('Tarefa Atualizada Com Sucesso!');
            }
            if(resposta==="V"){
              carregavalidacao(id_temp);
              toastr['success']('Tarefa Atualizada Com Sucesso!');
            } 
            if(resposta==="F"){
              carregafinalizado(id_temp);
              toastr['success']('Tarefa Atualizada Com Sucesso!');
            }
            if(resposta==="Error"){
              toastr['info']('OOPSss! Ocorreu um erro aqui! Informe o nosso suporte deste erro: #ET0001');
            }  
            toastr["info"]("Registro atualizado com sucesso!");
          }
        });
      }
    });
 
    $( "#P, #E, #V, #F" ).disableSelection();

  } );

</script>