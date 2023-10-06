function login(){
    console.log('executou');
    $('#mensagem').html('') ;
    $.ajax({
   	    type:"Post",
        url: 'includes/login/login_exec.php',
        data:{
            currlang : navigator.language,
            username : $('#nomeusuario').val(),
            userpass : $('#senhausuario').val() 
        },
        success:function(retorno){
            console.log(retorno);
            if (retorno=='1'){
                location='./app';
            }else{
               $('#mensagem').html(retorno) ;
            }       	    
        }
    });
 }

//seletor de linguagem
function mostrarlinguagem(){
    $.ajax({
        type:"POST",
        url:'includes/login/formulario.php',
        data:{
           currlang : navigator.language
        },
        success:function(data){
            $('#FormularioLogin').html(data);
        } 
    });
    
}

mostrarlinguagem();