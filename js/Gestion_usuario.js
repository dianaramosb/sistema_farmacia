$(document).ready(function(){
    buscar_datos();
    var funcion;
    function buscar_datos(consulta){
        funcion='buscar_usuarios_adm';
        $.post('../controlador/UsuarioController.php',{consulta,funcion},(response)=>{
        console.log(response);
        });
    }
    $(document).on('keyup','#buscar',function(){
        let valor = $(this).val();
        if(valor!=""){
            buscar_datos(valor);
        }
        else{
            buscar_datos();           
        }
    });
})