<?php
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==3){
    include_once 'layouts/header.php';
?>
  <title>Sistema | Atributo</title>
  <?php
    include_once 'layouts/nav.php';
?>

<!-- Modal para Crear laboratorio -->
<div class="modal fade" id="crearlaboratorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Crear Laboratorio</h3>
            <button data-dismiss="modal" aria-label="Close"class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add" style='display:none;'>
            <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
            <span><i class="fas fa-times m-1"></i>El DNI ya existe </span>
          </div>
            <form id="form-crear-laboratorio">
                <div class="form-group">
                    <label for="nombre-laboratorio">Nombre</label>
                    <input id="nombre-laboratorio"type="text" class="form-control"placeholder="Ingrese nombre" required>
                </div>             
        </div>
        <div class="card-footer">
            <button type="submit"class="btn bg-gradient-primary float-right m-1">Crear</button>
            <button type="button"data-dismiss="modal"class="btn btn-outline-secondary float-right m-1 ">Cerrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal para Crear tipo -->
<div class="modal fade" id="creartipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Crear Tipo</h3>
            <button data-dismiss="modal" aria-label="Close"class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add" style='display:none;'>
            <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
            <span><i class="fas fa-times m-1"></i>El DNI ya existe </span>
          </div>
            <form id="form-crear-tipo">
                <div class="form-group">
                    <label for="nombre-tipo">Nombre</label>
                    <input id="nombre-tipo"type="text" class="form-control"placeholder="Ingrese nombre" required>
                </div>             
        </div>
        <div class="card-footer">
            <button type="submit"class="btn bg-gradient-primary float-right m-1">Crear</button>
            <button type="button"data-dismiss="modal"class="btn btn-outline-secondary float-right m-1 ">Cerrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal para Crear presentacion -->
<div class="modal fade" id="crearpresentacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Crear presentacion</h3>
            <button data-dismiss="modal" aria-label="Close"class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id="add" style='display:none;'>
            <span><i class="fas fa-check m-1"></i>Se agrego correctamente</span>
          </div>
          <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
            <span><i class="fas fa-times m-1"></i>El DNI ya existe </span>
          </div>
            <form id="form-crear-presentacion">
                <div class="form-group">
                    <label for="nombre-presentacion">Nombre</label>
                    <input id="nombre-presentacion"type="text" class="form-control"placeholder="Ingrese nombre" required>
                </div>             
        </div>
        <div class="card-footer">
            <button type="submit"class="btn bg-gradient-primary float-right m-1">Crear</button>
            <button type="button"data-dismiss="modal"class="btn btn-outline-secondary float-right m-1 ">Cerrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Contenido -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion atributos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gestion atributos</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <ul class="nav nav-pills">
                                <li class="nav-item"><a href="#laboratorio" class="nav-link active"data-toggle="tab">Laboratorio</a></li>
                                <li class="nav-item"><a href="#tipo" class="nav-link"data-toggle="tab">Tipo</a></li>
                                <li class="nav-item"><a href="#presentacion" class="nav-link"data-toggle="tab">Presentacion</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id='laboratorio'>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Busca laboratorio <button type="button" data-toggle="modal" data-target="#crearlaboratorio" class="btn bg-gradient-primary btn-sm m-2">Crear Laboratorio</button></div>
                                            <div class="input-group">
                                                <input id="buscar-laboratorio"type="text" class="form-control float-left" placeholder="Ingrese nombre"></input>
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id='tipo'>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Busca tipo <button type="button" data-toggle="modal" data-target="#creartipo" class="btn bg-gradient-primary btn-sm m-2">Crear Tipo</button></div>
                                            <div class="input-group">
                                                <input id="buscar-tipo"type="text" class="form-control float-left" placeholder="Ingrese nombre"></input>
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id='presentacion'>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Busca presentacion <button type="button" data-toggle="modal" data-target="#crearpresentacion" class="btn bg-gradient-primary btn-sm m-2">Crear Presentacion</button></div>
                                            <div class="input-group">
                                                <input id="buscar-presentacion"type="text" class="form-control float-left" placeholder="Ingrese nombre"></input>
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php 
include_once 'layouts/footer.php' ;  
}
else{
    header('Location: ../index.php');
}
?>