$(document).ready(function(){
    buscar_tip();
    var funcion;
    var edit=false;
    //Crear Tipo
    $('#form-crear-tipo').submit(e=>{
        let nombre_tipo = $('#nombre-tipo').val();
        let id_editado = $('#id_editar_tip').val();
        if(edit==false){
            funcion='crear';
        }
        else{
            funcion='editar';
        }

        $.post('../controlador/TipoController.php',{nombre_tipo,id_editado,funcion},(response)=>{
            if(response=='add'){
                $('#add-tipo').hide('slow');
                $('#add-tipo').show(1000);
                $('#add-tipo').hide(2000);
                $('#form-crear-tipo').trigger('reset');
                buscar_tip();
            }
            if(response=='noadd'){
                $('#noadd-tipo').hide('slow');
                $('#noadd-tipo').show(1000);
                $('#noadd-tipo').hide(2000);
                $('#form-crear-tipo').trigger('reset');
            }
            if(response=='edit'){
                $('#edit-tip').hide('slow');
                $('#edit-tip').show(1000);
                $('#edit-tip').hide(2000);
                $('#form-crear-tipo').trigger('reset');
                buscar_tip();
            }
            edit=false;
        })
        e.preventDefault();
    });
    //Buscar Tipo de manera dinamica 
    function buscar_tip(consulta){
        funcion='buscar';
        $.post('../controlador/TipoController.php',{consulta,funcion},(response)=>{
            const tipos = JSON.parse(response);
            let template='';
            tipos.forEach(tipo =>{
                template+=`
                    <tr tipId="${tipo.id}" tipNombre="${tipo.nombre}">
                        <td>
                            <button class="editar-tip btn btn-success" title="Editar tipo" type="button" data-toggle="modal" data-target="#creartipo">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="borrar-tip btn btn-danger" title="Borrar tipo">
                                <i class="fas fa-trash-alt"></i>
                             </button>
                        </td>
                        <td>${tipo.nombre}</td>       
                    </tr>
                `;
            });
            $('#tipos').html(template);
        })
    }
    $(document).on('keyup','#buscar-tipo',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_tip(valor);
        }
        else{
            buscar_tip();
        }
    })
    //Borrar Tipo
    $(document).on('click','.borrar-tip',(e)=>{
        funcion="borrar";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('tipId');
        const nombre = $(elemento).attr('tipNombre');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
          })  
          swalWithBootstrapButtons.fire({
            title: 'Desea eliminar tipo '+nombre+'?',
            text: "No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borra esto!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                $.post('../controlador/TipoController.php',{id,funcion},(response)=>{
                    edit=false;
                    if(response=='borrado'){
                        swalWithBootstrapButtons.fire(
                            'Borrado!',
                            'El tipo '+nombre+' fue borrado',
                            'success'
                        )
                        buscar_tip();
                    }
                    else{
                        swalWithBootstrapButtons.fire(
                            'No se pudo borrar!',
                            'El tipo '+nombre+' no fue borrado porque esta siendo utilizado en un producto',
                            'error'
                        )
                    }
                })          
            } 
            else if (result.dismiss === Swal.DismissReason.cancel) 
            {
              swalWithBootstrapButtons.fire(
                'Cancelado',
                'El tipo '+nombre+' no fue borrado',
                'error'
              )
            }
        })
    }) 
    //Editar nombre del tipo
    $(document).on('click','.editar-tip',(e)=>{
        edit=true;
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('tipId');
        const nombre = $(elemento).attr('tipNombre');
        $('#id_editar_tip').val(id);
        $('#nombre-tipo').val(nombre);
              
    })  
});