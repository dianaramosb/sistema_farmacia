$(document).ready(function(){
    buscar_lab();
    var funcion;
    var edit=false;
    //Crear nuevo laboratorio
    $('#form-crear-laboratorio').submit(e=>{
        let nombre_laboratorio = $('#nombre-laboratorio').val();
        let id_editado = $('#id_editar_lab').val();
        if(edit==false){
            funcion='crear';
        }
        else{
            funcion='editar';
        }

        $.post('../controlador/LaboratorioController.php',{nombre_laboratorio,id_editado,funcion},(response)=>{
            if(response=='add'){
                $('#add-laboratorio').hide('slow');
                $('#add-laboratorio').show(1000);
                $('#add-laboratorio').hide(2000);
                $('#form-crear-laboratorio').trigger('reset');
                buscar_lab();
            }
            if(response=='noadd'){
                $('#noadd-laboratorio').hide('slow');
                $('#noadd-laboratorio').show(1000);
                $('#noadd-laboratorio').hide(2000);
                $('#form-crear-laboratorio').trigger('reset');
            }
            if(response=='edit'){
                $('#edit-lab').hide('slow');
                $('#edit-lab').show(1000);
                $('#edit-lab').hide(2000);
                $('#form-crear-laboratorio').trigger('reset');
                buscar_lab();
            }
            edit=false;
        })
        e.preventDefault();
    });
    //Buscar laboratorio de manera dinamica y capturar los datos del boton cambiar logo
    function buscar_lab(consulta){
        funcion='buscar';
        $.post('../controlador/LaboratorioController.php',{consulta,funcion},(response)=>{
            const laboratorios = JSON.parse(response);
            let template='';
            laboratorios.forEach(laboratorio =>{
                template+=`
                    <tr labId="${laboratorio.id}" labNombre="${laboratorio.nombre}" labAvatar="${laboratorio.avatar}">
                        <td>
                            <button class="avatar btn btn-info" title="Cambiar logo de laboratorio" type="button" data-toggle="modal" data-target="#cambiologo">
                                <i class="far fa-image"></i>
                            </button>
                            <button class="editar btn btn-success" title="Editar laboratorio" type="button" data-toggle="modal" data-target="#crearlaboratorio">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="borrar btn btn-danger" title="Borrar laboratorio">
                                <i class="fas fa-trash-alt"></i>
                             </button>
                        </td>
                        <td>
                            <img src="${laboratorio.avatar}" class="img-fluid rounded" width="70" heigth="70">
                        </td>
                        <td>${laboratorio.nombre}</td>       
                    </tr>
                `;
            });
            $('#laboratorios').html(template);
        })
    }
    $(document).on('keyup','#buscar-laboratorio',function(){
        let valor = $(this).val();
        if(valor!=''){
            buscar_lab(valor);
        }
        else{
            buscar_lab();
        }
    })
    $(document).on('click','.avatar',(e)=>{
        funcion="cambiar_logo";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('labId');
        const nombre = $(elemento).attr('labNombre');
        const avatar = $(elemento).attr('labAvatar');
        $('#logoactual').attr('src',avatar);
        $('#nombre_logo').html(nombre);
        $('#funcion').val(funcion);
        $('#id_logo_lab').val(id);
    })
    //Cambiar logo del laboratorio
    $('#form-logo').submit(e=>{
        let formData = new FormData($('#form-logo')[0]);
        $.ajax({
            url:'../controlador/LaboratorioController.php',
            type:'POST',
            data:formData,
            cache:false,
            processData:false,
            contentType:false
        }).done(function(response){
            const json = JSON.parse(response);
            if(json.alert=='edit'){
                $('#logoactual').attr('src',json.ruta);
                $('#form-logo').trigger('reset');
                $('#edit').hide('slow');
                $('#edit').show(1000);
                $('#edit').hide(2000);               
                buscar_lab();
            }
            else{
                $('#noedit').hide('slow');
                $('#noedit').show(1000);
                $('#noedit').hide(2000); 
                $('#form-logo').trigger('reset');   
            }     
        });
        e.preventDefault();
    })
    //Borrar el laboratorio
    $(document).on('click','.borrar',(e)=>{
        funcion="borrar";
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('labId');
        const nombre = $(elemento).attr('labNombre');
        const avatar = $(elemento).attr('labAvatar');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
          })  
          swalWithBootstrapButtons.fire({
            title: 'Desea eliminar laboratorio '+nombre+'?',
            text: "No podras revertir esto!",
            imageUrl:''+avatar+'',
            imageWidth: 100,
            imageHeight: 100,
            showCancelButton: true,
            confirmButtonText: 'Si, borra esto!',
            cancelButtonText: 'No, cancelar!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                $.post('../controlador/LaboratorioController.php',{id,funcion},(response)=>{
                    edit=false;
                    if(response=='borrado'){
                        swalWithBootstrapButtons.fire(
                            'Borrado!',
                            'El laboratorio '+nombre+' fue borrado',
                            'success'
                        )
                        buscar_lab();
                    }
                    else{
                        swalWithBootstrapButtons.fire(
                            'No se pudo borrar!',
                            'El laboratorio '+nombre+' no fue borrado porque esta siendo utilizado en un producto',
                            'error'
                        )
                    }
                })          
            } 
            else if (result.dismiss === Swal.DismissReason.cancel) 
            {
              swalWithBootstrapButtons.fire(
                'Cancelado',
                'El laboratorio '+nombre+' no fue borrado',
                'error'
              )
            }
        })
    }) 
    //Editar nombre del laboratorio
    $(document).on('click','.editar',(e)=>{
        edit=true; 
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr('labId');
        const nombre = $(elemento).attr('labNombre');
        $('#id_editar_lab').val(id);
        $('#nombre-laboratorio').val(nombre);         
    })  
});