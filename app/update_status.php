<?php
  require_once '../db/lock_page.php'; 
  require_once '../db/conection.php'; 

  $idempresa = $_SESSION['idempresa'];
  $idempresa = addslashes($idempresa);
    /*
        st  : id_box,
        tsk : id_task 
    */
//passa variabeis do js para o php
    $status = filter_input(INPUT_POST,'st');
    $task = filter_input(INPUT_POST,'tsk');
    //echo $task;

    $task1 = preg_replace('/[^0-9]/', '', $task);

    $status = addslashes(trim($status));
    $task1   = addslashes(trim($task1));

    $updatetask="UPDATE `tasks` set status='$status' where `id_task`='$task1' and `id_empresa`='$idempresa'";
    $con->query($updatetask);
    
    echo $status;

?>