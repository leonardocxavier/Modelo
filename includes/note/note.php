<?php

    require_once '../../db/lock_page.php'; 
    require_once '../../db/conection.php'; 

?>

<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>

<div class="row">
    <div class="col-sm-1">
        <div class="form-group h-100">
            <a href="javascript:;" class="form-control text-center" onclick="abremenu();"><i class="fa fa-book"></i></a>
            <a href="javascript:;" class="form-control text-center"><i class="fa fa-search"></i></a>
        </div>
    </div>
    <div id="menu_note" class="note1" style="display: none;">
    </div>
    <div id="menu_note2" class="" style="display: none;">
    </div>
    <div class="col-sm-11" id="editor">
        <div id="anotacoes" style="width:100%;" placeholder="Text here"></div>
    </div>
</div>
<div id="menssagem"></div>


<script>
function abremenu(){
    if ($("#editor").hasClass('col-sm-11')){
        $("#editor").removeClass('col-sm-11');
        $("#editor").addClass('col-sm-8');
        //new div to menu
        $("#menu_note").addClass('col-sm-3');
       // $("#menu_note").css("display","block");
        $("#menu_note").fadeIn(1000);
        atualizamenuwiki();
        $(".note-editable*").html('');
        sessionStorage.setItem('id_submenu_wiki', '');
        //$("#menu_note2").addClass('col-sm-3');
        //$("#menu_note2").css("display","block");
        //$("#menu_note2").fadeIn(1000);
    }else{
        $("#menu_note").removeClass('col-sm-3');
        //$("#menu_note").css("display","none");
        $("#menu_note").fadeOut(1000);
        $("#menu_note2").removeClass('col-sm-3');
        //$("#menu_note2").css("display","none");
        $("#menu_note2").fadeOut(1000);
        $(".note-editable*").html('');
        sessionStorage.setItem('id_submenu_wiki', '');
        //new div to menu
        setTimeout(() => {
            $("#editor").removeClass('col-sm-8');
            $("#editor").addClass('col-sm-11');
        }, 1100);
       
    }
} 

</script>