<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
    include_once 'layouts/header.php';
?>
  <title>Adm | Editar Datos</title>
  <?php
    include_once 'layouts/nav.php';
?>

<!-- Modal para cambiar Logo de productos -->
<div class="modal fade" id="cambiologo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalLabel">Cambiar Logo</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <img id="logoactual"src="../img/avatar3.jpg" class="profile-user-img img-fluid img-circle">
        </div>
        <div class="text-center mb-2">
            <b id="nombre_logo">          
            </b>
        </div>
        <div class="alert alert-success text-center" id="edit" style='display:none;'>
            <span><i class="fas fa-check m-1"></i>Se cambio Logo correctamente</span>
        </div>
        <div class="alert alert-danger text-center" id="noedit" style='display:none;'>
            <span><i class="fas fa-times m-1"></i>Formato no permitido</span>
        </div>
        <form id="form-logo" enctype="multipart/form-data">
            <div class="input-group mb-3 ml-5 mt-2">
                <input type="file" name="photo"class="input-group">
                <input type="hidden" name="funcion" id="funcion">
                <input type="hidden" name="id_logo_prod" id="id_logo_prod">
                <input type="hidden" name="avatar" id="avatar">
            </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Crear nuevos productos -->
<div class="modal fade" id="crearproducto" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Crear Productos</h3>
            <button data-bs-dismiss="modal" aria-label="Close"class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add-prod" style='display:none;'>
            <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd-prod" style='display:none;'>
            <span><i class="fas fa-times m-1"></i>El producto ya existe </span>
          </div>
            <form id="form-crear-producto">
                <div class="form-group">
                    <label for="nombre_producto">Nombre</label>
                    <input id="nombre_producto"type="text" class="form-control"placeholder="Ingrese nombre" required>
                </div>
                <div class="form-group">
                    <label for="concentracion">Concentracion</label>
                    <input id="concentracion"type="text" class="form-control"placeholder="Ingrese concentracion">
                </div>
                <div class="form-group">
                    <label for="adicional">Adicional</label>
                    <input id="adicional"type="text" class="form-control"placeholder="Ingrese adicional">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input id="precio"type="number" class="form-control"value="1"placeholder="Ingrese precio" required>
                </div>
                <div class="form-group">
                    <label for="laboratorio">Laboratorios</label>
                    <select name="laboratorio" id="laboratorio" class="form-control select2" style="width: 100%"></select>
                </div> 
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control select2" style="width: 100%"></select>
                </div> 
                <div class="form-group">
                    <label for="presentacion">Presentacion</label>
                    <select name="presentacion" id="presentacion" class="form-control select2" style="width: 100%"></select>
                </div> 
                <input type="hidden" id="id_edit_prod">  
        </div>
        <div class="card-footer">
            <button type="submit"class="btn bg-gradient-primary float-right m-1">Guardar</button>
            <button type="button"data-bs-dismiss="modal"class="btn btn-outline-secondary float-right m-1 ">Cerrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion Productos <button id="button-crear"type="button" data-bs-toggle="modal" data-bs-target="#crearproducto"class="btn bg-gradient-primary ml-2">Crear Producto</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestión Producto</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section>
      <!-- card que muestra los datos de los productos -->
      <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Buscar Porducto</h3>
                <div class="input-group">
                    <input type="text" id="buscar-producto"class="form-control float-left" placeholder="Ingrese nombre de producto">
                    <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div id="productos"class="row d-flex align-items-stretch">

              </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
      </div>
    </section>
  </div>
<?php 
include_once 'layouts/footer.php' ;  
}
else{
    header('Location: ../index.php');
}
?>
<script src="../js/Producto.js"></script>