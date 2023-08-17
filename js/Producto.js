$(document).ready(function(){
    var funcion;
    $('.select2').select2({
        dropdownParent: $('#crearproducto')     
    });
    rellenar_laboratorios();
    rellenar_tipos();
    rellenar_presentaciones();
    buscar_producto();

    //Rellenar laboratorio en el select
    function rellenar_laboratorios(){
        funcion="rellenar_laboratorios";
        $.post('../Controlador/LaboratorioController.php',{funcion},(response)=>{
            const laboratorios = JSON.parse(response);
            let template='';
            laboratorios.forEach(laboratorio => {
                template+=`
                    <option value="${laboratorio.id}">${laboratorio.nombre}</option>          
                `;               
            });
            $('#laboratorio').html(template);
        })
    }
    //Rellenar tipos en el select
    function rellenar_tipos(){
        funcion="rellenar_tipos";
        $.post('../Controlador/TipoController.php',{funcion},(response)=>{
            const tipos = JSON.parse(response);
            let template='';
            tipos.forEach(tipo => {
                template+=`
                    <option value="${tipo.id}">${tipo.nombre}</option>          
                `;               
            });
            $('#tipo').html(template);
        })
    }
    //Rellenar presentacion en el select
    function rellenar_presentaciones(){
        funcion="rellenar_presentaciones";
        $.post('../Controlador/PresentacionController.php',{funcion},(response)=>{
            const presentaciones = JSON.parse(response);
            let template='';
            presentaciones.forEach(presentacion => {
                template+=`
                    <option value="${presentacion.id}">${presentacion.nombre}</option>          
                `;               
            });
            $('#presentacion').html(template);
        })
    }
    //crear nuevos productos
    $('#form-crear-producto').submit(e=>{
        let nombre = $('#nombre_producto').val();
        let concentracion = $('#concentracion').val();
        let adicional = $('#adicional').val();
        let precio = $('#precio').val();
        let laboratorio = $('#laboratorio').val();
        let tipo = $('#tipo').val();
        let presentacion = $('#presentacion').val();
        funcion="crear";
        $.post('../Controlador/ProductoController.php',{funcion,nombre,concentracion,adicional,precio,laboratorio,tipo,presentacion},(response)=>{
            if(response=='add'){
                $('#add-prod').hide('slow');
                $('#add-prod').show(1000);
                $('#add-prod').hide(2000);
                $('#form-crear-producto').trigger('reset');
            }
            if(response=='noadd'){
                $('#noadd-prod').hide('slow');
                $('#noadd-prod').show(1000);
                $('#noadd-prod').hide(2000);
                $('#form-crear-producto').trigger('reset');
            }
            buscar_producto();
        });
        e.preventDefault();
    });
    function buscar_producto(consulta){
        funcion="buscar";
        $.post('../Controlador/ProductoController.php',{consulta,funcion},(response)=>{
            console.log(response);
        });
    }
    //Buscar usuarios
    $(document).on('keyup','#buscar-producto',function(){
        let valor = $(this).val();
        if(valor!=""){
            buscar_producto(valor);
        }
        else{
            buscar_producto();           
        }
    });
}) 