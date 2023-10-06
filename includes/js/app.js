//session vars
sessionStorage.setItem('id_submenu_wiki', '');
sessionStorage.setItem('id_menu_wiki', '');
sessionStorage.setItem('id_documento_troca_wik','');
sessionStorage.setItem('id_manager_tasks','');

$("#buttondark").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
})

function dark(){
  if ($('#buttondark').prop('checked')) {
    $('body').addClass('dark-mode');
  } else {
    $('body').removeClass('dark-mode')
  }
}   
//funções gerais do sistema
function dasboard(){
   $.ajax({
        url:"../includes/dashboard/dash.php",
        success:function(resposta){
            $('#apresenta').html(resposta);
            abreteste();
        }
   }); 
}

function logout(){
    dhtmlx.confirm({
        title:"Atenção!",
        ok:"Sim", 
        cancel:"Não",
        text:"Deseja sair do sistema?",
        callback:function(r){
            if(r){
                $.ajax({
                    url:'logout.php',
                    success:function(data){
                        toastr["success"]("Agradecemos por utilizar nosso sitema!");
                        $('#edita').html(data);
                        setTimeout(() => {
                            window.location='../';
                            window.location='../';
                        }, 3000);
                    }
                }); 
            }
        }
    });         
}

//configuração Toastr
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

function CopyToClipboard() {
    str = $(".note-editable*").text();
    if (str !== ""){
        const el = document.createElement('textarea');
        el.value = str;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        toastr['success']('Conteúdo copiado para área de transferência:');
    }
}

function validarCNPJ(cnpj) {
    $('#cnpj').removeClass('is-invalid');
    $('#cnpj').removeClass('is-valid');
    cnpj = cnpj.replace(/[^\d]+/g,'');
 console.log(cnpj);
    if(cnpj == '') return false;
     
    if (cnpj.length != 14){
       toastr['warning']('CNPJ Incorreto, revise-o e tente novamente.');
       $('#cnpj').addClass('is-invalid');
       return false;
    }
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)){
        toastr['warning']('CNPJ Incorreto, revise-o e tente novamente.');
        $('#cnpj').addClass('is-invalid');
    }else{
        $('#cnpj').addClass('is-valid');
        return true;
    }
            
}
// configurações Data Tables
function carregatabela(){
    $("#tabela").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#tabela_wrapper .col-md-6:eq(0)');
}

//funções de usuários do sistema
function usuarios(){
    $.ajax({
        url:"../includes/usuarios/usuarios.php",
        success:function(resposta){
            $('#apresenta').html(resposta);
        }
    });
}

function listausuarios(){
    $.ajax({
        url:"../includes/usuarios/listausuarios.php",
        success:function(resposta){
            $('#mostratabela').fadeOut(1000);
            $('#mostratabela').html(resposta);
            $('#mostratabela').fadeIn(1000);
        }
    });
}

function novousuario(){
    $.ajax({
        url:"../includes/usuarios/novousuario.php",
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });
}

function gravausuario(){
    $.ajax({
        type:"POST",
        url:"../includes/usuarios/gravausuarios.php",
        data:{
            idproj    : $('#projeto').val(),
            idperfil  : $('#perfil').val(), 
            nomeuser  : $('#nomeus').val(),
            loginname : $('#login').val(),
            password  : $('#pasus').val(),
            statuscad : $('#status').val()
        },
        success:function(resposta){
           $('#mensagem').html(resposta);    
        }
    });    
}

function editausuario(id){
    $.ajax({
        type:"POST",
        url:"../includes/usuarios/editausuarios.php",
        data:{
            idusuario: id
        },
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });
}

function gravaeditausuario(id){
    $.ajax({
        type:"POST",
        url:"../includes/usuarios/gravaeditausuario.php",
        data:{
            iduser    : id,
            idproj    : $('#projeto').val(),
            idperfil  : $('#perfil').val(), 
            nomeuser  : $('#nomeus').val(),
            loginname : $('#login').val()
        },
        success:function(resposta){
           $('#mensagem').html(resposta);    
        }
    });
}

function inativausuario(id){
    $.ajax({
        type:"POST",
        url:"../includes/usuarios/mudastatususuarios.php",
        data:{
            idu : id
        },
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });  
}

//funções de anotações
function abreanotacoes(){
    $.ajax({
        url:"../includes/note/note.php",
        success:function(resposta){
           $('#apresenta').html(resposta);  
           $('#anotacoes').summernote({height: 350,});
           $('.note-view').append('<button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title aria-label="Salvar" data-original-title="Salvar" onclick="gravadocwiki();"><i class="fa fa-save"></i></button>'+
           '<button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title aria-label="Salvar" data-original-title="Salvar" onclick="CopyToClipboard();"><i class="fa fa-copy"></i></button>');   
        }
    }); 
}

function adicionamenuwiki(){
    sessionStorage.setItem('id_submenu_wiki', '');
    $.ajax({
        url:"../includes/note/adicionmenu.php",
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });
}

function atualizamenuwiki(){
    $.ajax({
        url:"../includes/note/menu.php",
        success:function(resposta){
           $('#menu_note').html(resposta);     
        }
    });
}

function gravamenuwiki(){
    $.ajax({
        type:"Post",
        url:"../includes/note/gravamenu.php",
        data:{
            title : $("#nome_menu").val(),
            stats : $("#status_menu").val(),
            desc  : $("#desc_menu").val()
        },
        success:function(resposta){
           toastr["success"](resposta);
           $("#modaledicao").modal('hide');    
           atualizamenuwiki();  
        }
    }); 
}

function editamenu_wiki(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/editamenu.php",
        data:{
            idm : id
        },
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });  
}

function gravaeditamenuwiki(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/gravaeditamenu.php",
        data:{
            idm   : id,
            title : $("#nome_menu").val(),
            stats : $("#status_menu").val(),
            desc  : $("#desc_menu").val()
        },
        success:function(resposta){
           toastr["success"](resposta);
           $("#modaledicao").modal('hide');  
           atualizamenuwiki();  
        }
    });    
}
//final funções do menu da wiki

//inicio das funções do sub-menu wiki
function abresubmenu_wiki(id){
    sessionStorage.setItem('id_menu_wiki',id);
    $.ajax({
        type:"Post",
        url:"../includes/note/submenu.php",
        data:{
            idm : id
        },
        success:function(resposta){
            $(".note-editable*").html('');
            sessionStorage.setItem('id_submenu_wiki','');
            $('#menu_note2').html(resposta);
            $("#menu_note2").addClass('col-sm-3');
            $("#menu_note2").fadeIn(1000);
            $("#editor").removeClass('col-sm-8');
            $("#editor").addClass('col-sm-5');    
        }
    });  
}

function adicionasubmenu(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/novosubmenu.php",
        data:{
            idm : id            
        },
        success:function(resposta){
           $('#janelacad').html(resposta);  
           $(".note-editable*").html('');
        }
    });
}

function removemenu_wiki(id){
    dhtmlx.confirm({
        title:"Atenção!!!",
        text:"Tem certeza que quer excluir este item de seus registros?",
        ok:"Sim", 
        cancel:"Não",
        callback:function(result){
            if(result){
                $.ajax({
                    type:"Post",
                    url:"../includes/note/removermenu.php",
                    data:{
                        idm : id  
                    },
                    success:function(resposta){
                        $("#menssagem").html(resposta); 
                        $('#indice_'+id).remove();
                        $("#menu_note2").removeClass('col-sm-3');
                        $("#menu_note2").fadeOut(1000);
                        setTimeout(() => {
                            $("#editor").removeClass('col-sm-5');
                            $("#editor").addClass('col-sm-8');
                        }, 1100);
                    }
                });
            }else{
                toastr["info"]('OK! Deixaremos como esta atualmente.');
            }
        }
    })  
}

function gravasubmenuwiki(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/gravasubmenu.php",
        data:{
            idm   : id,
            title : $("#nome_menu").val(),
            desc  : $("#desc_menu").val(),
            doc   : $(".note-editable*").html(),
            stats : $("#status_menu").val()   
        },
        success:function(resposta){
            toastr["success"](resposta);
            abresubmenu_wiki(id); 
            let submen =  sessionStorage.getItem('id_menu_wiki');
            abresubmenu_wiki(submen);
            contatotaldoc_wiki(submen);
            $("#modaledicao").modal('hide');  
            
        }
    });
}

function editasubmenu_wiki(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/editasubmenu.php",
        data:{
            idm   : id,
        },
        success:function(resposta){
            $("#janelacad").html(resposta);  
        }
    });
}

function gravaeditasubmenuwiki(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/gravaeditasubmenu.php",
        data:{
            idm   : id,
            title : $("#nome_menu").val(),
            desc  : $("#desc_menu").val(),
            doc   : $(".note-editable*").html(),
            stats : $("#status_menu").val()   
        },
        success:function(resposta){
            toastr["success"](resposta);
            $("#modaledicao").modal('hide');  
            let submen =  sessionStorage.getItem('id_menu_wiki');
            abresubmenu_wiki(submen);
            contatotaldoc_wiki(submen);    
        }
    });
}

function trocasubmenu_wiki(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/trocamenusubmenu.php",
        data:{
            idm   : id,
        },
        success:function(resposta){
            sessionStorage.setItem('id_documento_troca_wik',id);
            $("#janelacad").html(resposta);  
        }
    });
}

function gravatrocasubmenuwiki(id){
    $.ajax({
        type:"Post",
        url:"../includes/note/gravatrocamenusubmenu.php",
        data:{
            idm    : $('#novo_menu').val(),
            id_sub : id
        },
        success:function(resposta){
            $("#mensagem").html(resposta);  
            abresubmenu_wiki(sessionStorage.getItem('id_menu_wiki'));
            contatotaldoc_wiki(sessionStorage.getItem('id_menu_wiki'));
            contatotaldoc_wiki($('#novo_menu').val());
            toastr['success']('Alteração De Menu Do Documento Alterada Com Sucesso!');
            $("#modaledicao").modal('hide');
        }
    });
    
}

function removesubmenu_wiki(id){
        dhtmlx.confirm({
            title:"Atenção!!!",
            text:"Tem certeza que quer excluir este item de seus registros?",
            ok:"Sim", 
            cancel:"Não",
            callback:function(result){
                if(result){
                    $.ajax({
                        type:"Post",
                        url:"../includes/note/removesubmenu.php",
                        data:{
                            idm : id  
                        },
                        success:function(resposta){
                            $("#menssagem").html(resposta); 
                            let submen =  sessionStorage.getItem('id_menu_wiki');
                            contatotaldoc_wiki(submen);
                            abresubmenu_wiki(submen);
                            $('#modaledicao').modal('hide');
                        }
                    });
                }else{

                }
            }
        }) 
}

function contatotaldoc_wiki(id){
    let elemento='';
    $.ajax({
        type:"Post",
        url:"../includes/note/pegatotaldoc.php",
        data:{
            idm : id  
        },
        success:function(resposta){
            elemento = $('#total_doc'+id);
            elemento.html(resposta);
        }
    });
}

function mostradocumento_wiki(id){
    sessionStorage.setItem('id_submenu_wiki', id);
    $.ajax({
        type:"Post",
        url:"../includes/note/mostradocumento.php",
        data:{
            idm : id  
        },
        success:function(resposta){
            $(".note-editable*").html(resposta); 
        }
    });
}

function gravadocwiki(){
    let id_doc = sessionStorage.getItem('id_submenu_wiki');
    if(id_doc === ""){
        toastr["warning"]('Você precisa selecionar um documento para que possa ser Salvo.');
    }else{
        $.ajax({
            type:"Post",
            url:"../includes/note/gravadocumento.php",
            data:{
            idm : sessionStorage.getItem('id_submenu_wiki'),
            doc : $(".note-editable*").html()
            },
            success:function(resposta){
                $("#menssagem").html(resposta); 
            }
        });
    }
}

//final das funções de usuario
function tarefas(id){
    sessionStorage.setItem('id_manager_tasks',id); 
    $.ajax({
        type:"POST",
        url:"../includes/tarefas/tarefas.php",
        data:{
            idp : id
        },
        success:function(resposta){
           let id_temp = sessionStorage.getItem('id_manager_tasks'); 
           $('#apresenta').html(resposta);  
           carregapendentes(id_temp);
           carregaexecucao(id_temp);  
           carregavalidacao(id_temp);
           carregafinalizado(id_temp); 
        }
    });
}

function novatarefa(id){
    $.ajax({
        type:"POST",
        url:"../includes/tarefas/novatarefa.php",
        data:{
            idpr : id
        },
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });
} 

function gravanovatarefa(id){
    $.ajax({
        type:"Post",
        url:"../includes/tarefas/gravatarefa.php",
        data:{
            mange : id,
            title : $('#titulo').val(),
            stats : $('#status').val(),
            desc  : $('#descricao').val()
        },
        success:function(resposta){
            let statust = $('#status').val();
            if(statust==="P"){
                carregapendentes(id);
            }
            $('#modaledicao').modal('hide');
            $('#mensagem').html(resposta);     
        }
    });
}

function editatask_task(id){
    $.ajax({
        type:"Post",
        url:"../includes/tarefas/editatarefa.php",
        data:{
            mange : id
        },
        success:function(resposta){
            $('#janelacad').html(resposta);   
        }
    });
}

function gravaeditatarefa(id){
    $.ajax({
        type:"Post",
        url:"../includes/tarefas/gravaeditatarefa.php",
        data:{
            mange : id,
            title : $('#titulo').val(),
            stats : $('#status').val(),
            desc  : $('#descricao').val()
        },
        success:function(resposta){
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
            if(resposta==="Error"){
                toastr['info']('OOPSss! Ocorreu um erro aqui! Informe o nosso suporte deste erro: #ET0001');
            }  
            $('#modaledicao').modal('hide');
        }
    });
}

function excluir_task(id){
    dhtmlx.confirm({
        title:"Atenção!!!",
        text:"Tem certeza que quer excluir este item de seus registros?",
        ok:"Sim", 
        cancel:"Não",
        callback:function(result){
            if(result){
                $.ajax({
                    type:"Post",
                    url:"../includes/tarefas/excluirtask.php",
                    data:{
                        id_task : id
                    },
                    success:function(resposta){
                        console.log(resposta);
                        let id_temp = sessionStorage.getItem('id_manager_tasks');
                        if(resposta==="P"){
                            carregapendentes(id_temp);
                        }
                        if(resposta==="E"){
                            carregaexecucao(id_temp);
                        }
                        if(resposta==="V"){
                            carregavalidacao(id_temp);
                        }
                        if(resposta==="Error"){
                           toastr['info']('OOPSss! Ocorreu um erro aqui! Informe o nosso suporte deste erro: #ET0001');
                        }
                    }  
                });   
            }
        }
    });     
}

function carregapendentes(id){
    $.ajax({
        type:"POST",
        url:"../includes/tarefas/pendentes/pendingtask.php",
        data:{
            idpr : id
        },
        success:function(resposta){
            $('#P').fadeOut(1000);
            setTimeout(() => {
                $('#P').html(resposta);
            }, 1000);   
            $('#P').fadeIn(1000);     
        }
    }); 
}

function carregaexecucao(id){
    $.ajax({
        type:"POST",
        url:"../includes/tarefas/execucao/exectask.php",
        data:{
            idpr : id
        },
        success:function(resposta){
            $('#E').fadeOut(1000);
            setTimeout(() => {
                $('#E').html(resposta);
            }, 1000);   
            $('#E').fadeIn(1000);     
        }
    }); 
}

function carregavalidacao(id){
    $.ajax({
        type:"POST",
        url:"../includes/tarefas/validacao/validacao.php",
        data:{
            idpr : id
        },
        success:function(resposta){
            $('#V').fadeOut(1000);
            setTimeout(() => {
                $('#V').html(resposta);
            }, 1000);   
            $('#V').fadeIn(1000);     
        }
    });    
}

function carregafinalizado(id){
    $.ajax({
        type:"POST",
        url:"../includes/tarefas/finalizados/finishtask.php",
        data:{
            idpr : id
        },
        success:function(resposta){
            $('#F').fadeOut(1000);
            setTimeout(() => {
                $('#F').html(resposta);
            }, 1000);   
            $('#F').fadeIn(1000);     
        }
    });    
}
//final funções tarefas

//inicio funções de projetos
function projetos(){
    $.ajax({
        url:"../includes/projetos/projetos.php",
        success:function(resposta){
           $('#apresenta').html(resposta);   
           $('#mostraprojetos').fadeOut(1000);
           setTimeout(() => {
            carregaprojetos();
           }, 1000);  
        }
    });
}

function carregaprojetos(){
    $.ajax({
        url:"../includes/projetos/carregaprojetos.php",
        success:function(resposta){
                      
            $('#mostraprojetos').html(resposta);
            $('#mostraprojetos').fadeIn(1000);     
        }
    });   
}

function novoprojeto(){
    $.ajax({
        url:"../includes/projetos/adicionaprojeto.php",
        success:function(resposta){
           $('#apresenta').html(resposta);     
        }
    });
}

function gravaprojeto(){
    $.ajax({
        type:"POST",
        url:"../includes/projetos/gravaprojeto.php",
        data:{
            name   : $('#inputName').val(),
            status : $('#inputStatus').val(),
            desc   : $('#inputDescription').val(),
            cli    : $('#inputClientCompany').val(),
            respon : $('#inputProjectLeader').val()
        },
        success:function(resposta){
           $('#mensagem').html(resposta);     
        }
    }); 
}

function editaprojeto(id){
    $.ajax({
        type:"POST",
        url:"../includes/projetos/editaprojeto.php",
        data:{
            mange : id
        },
        success:function(resposta){
           $('#apresenta').html(resposta);     
        }
    });  
}
function gravaeditaprojeto(id){
    $.ajax({
        type:"POST",
        url:"../includes/projetos/gravaeditaprojeto.php",
        data:{
            mange : id,
            name   : $('#inputName').val(),
            status : $('#inputStatus').val(),
            desc   : $('#inputDescription').val(),
            cli    : $('#inputClientCompany').val(),
            respon : $('#inputProjectLeader').val()
        },
        success:function(resposta){
           $('#mensagem').html(resposta);     
        }
    });  
}

function removeprojetos(id){
    dhtmlx.confirm({
        title:"Atenção!!!",
        text:"Tem certeza que quer excluir este item de seus registros?",
        ok:"Sim", 
        cancel:"Não",
        callback:function(result){
            if(result){
                $.ajax({
                    type:"POST",
                    url:"../includes/projetos/removeprojeto.php",
                    data:{
                        mange : id
                    },
                    success:function(resposta){
                    $('#mensagem').html(resposta); 
                    carregaprojetos();    
                    }
                });
            }
        }
    });
}
//final procedimentos de projetos

//inicio primeiro acesso
function first_time(){
    $.ajax({
        url:"../includes/first_time/first_time.php",
        success:function(resposta){
            $('Body').fadeOut(1000);
            setTimeout(() => {
                $('Body').html(resposta);
            }, 1000);  
            $('Body').fadeIn(1000);
        }
    });  
}

function gravadados_first_time(){
    $.ajax({
        type:"Post",
        url:"../includes/first_time/grava_dados.php",
        data:{
            nomeemp     : $('#nfant').val(),
            nomerazao   : $('#nsoc').val(),
            ncnpj       : $('#cnpj').val(),
            telefone    : $('#telef').val(),
            celular     : $('#cel').val(),
            email       : $('#mail').val(),
            aceita_lig  : $('#Tel_contact').is(':checked'),
            aceita_watz : $('#Wpp_acept').is(':checked'),
            aceita_mail : $('#Receive_mail').is(':checked')
        },
        success:function(resposta){
            $('#message').html(resposta)
        }
    });   
}

function recarregasys(){
    $.ajax({
        url:"index.php",
        success:function(resposta){
            $('Body').fadeOut(1000);
            setTimeout(() => {
                $('Body').html(resposta);
            }, 1000);  
            $('Body').fadeIn(1000);
        }
    });  
}
//final primeiro acesso

//inicio do teste umentor
function abreteste(){
    $.ajax({
        url:"../includes/teste_umentor/cadastros.php",
        success:function(resposta){
           $('#testeumentor').html(resposta);     
        }
    });
}

function listacadastros(){
    $.ajax({
        url:"../includes/teste_umentor/listacadastros.php",
        success:function(resposta){
           $('#mostratabela').html(resposta);     
        }
    }); 
}

function novocadastro(){
    $.ajax({
        url:"../includes/teste_umentor/novocadastro.php",
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });  
}

function gravarcadastro(){
    $.ajax({
        type:"POST",
        url:"../includes/teste_umentor/gravarcadastro.php",
        data:{
            name    : $('#nome').val(),
            mail    : $('#mail').val(),
            dateadm : $('#datead').val()
        },
        success:function(resposta){
           $('#mensagem').html(resposta);
           listacadastros();    
        }
    });  
}

function editarcadastro(id){
    $.ajax({
        type:"POST",
        url:"../includes/teste_umentor/editacadastro.php",
        data:{
            idcad : id
        },
        success:function(resposta){
           $('#janelacad').html(resposta);     
        }
    });  
}

function gravareditacadastro(id){
    $.ajax({
        type:"POST",
        url:"../includes/teste_umentor/gravareditacadastro.php",
        data:{
            idcad   : id,
            name    : $('#nome').val(),
            mail    : $('#mail').val(),
            dateadm : $('#datead').val()
        },
        success:function(resposta){
           $('#mensagem').html(resposta);   
           listacadastros();  
        }
    }); 
}

function removercadastro(id){
    dhtmlx.confirm({
        title:"Atenção!!!",
        text:"Tem certeza que quer excluir este item de seus registros?",
        ok:"Sim", 
        cancel:"Não",
        callback:function(result){
            if(result){
                $.ajax({
                    type:"POST",
                    url:"../includes/teste_umentor/removecadastro.php",
                    data:{
                        idcad : id
                    },
                    success:function(resposta){
                        $('#mensagem').html(resposta);  
                        listacadastros();   
                    }
                }); 
            }
        }
    });
}