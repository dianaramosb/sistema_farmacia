<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layouts/header.php';
?>
  <title>Adm | Editar Datos</title>
  <?php
    include_once 'layouts/nav.php';
?>

<!-- Modal para Crear nuevos usuarios -->
<div class="modal fade" id="crearusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Crear Usuario</h3>
            <button data-bs-dismiss="modal" aria-label="Close"class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">
            <form id="#form-crear">
                <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input id="nombre"type="text" class="form-control"placeholder="Ingrese nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input id="apellido"type="text" class="form-control"placeholder="Ingrese apellido" required>
                </div>
                <div class="form-group">
                    <label for="edad">Nacimiento</label>
                    <input id="edad"type="date" class="form-control"placeholder="Ingrese fecha de nacimiento" required>
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input id="dni"type="text" class="form-control"placeholder="Ingrese DNI" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input id="pass"type="password" class="form-control"placeholder="Ingrese password" required>
                </div>   
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
            <h1>Gestion Usuarios <button type="button" data-bs-toggle="modal" data-bs-target="#crearusuario"class="btn bg-gradient-primary ml-2">Crear Usuario</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestión Usuario</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section>
      <!-- Formulario para registrar usuarios -->
      <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Buscar Usuario</h3>
                <div class="input-group">
                    <input type="text" id="buscar"class="form-control float-left" placeholder="Ingrese nombre de usuario">
                    <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div id="usuarios"class="card-body">

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
<script src="../js/Gestion_usuario.js"></script>