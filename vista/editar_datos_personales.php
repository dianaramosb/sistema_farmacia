<?php
session_start();
if($_SESSION['us_tipo']==1){
    include_once 'layouts/header.php';
?>
  <title>Adm | Editar</title>
  <?php
    include_once 'layouts/nav.php';
?>
  <!-- Card que muestra los datos del usuario logueado -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Datos personales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Datos Personales</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img src="../img/avatar3.jpg" class="profile-user-img img-fluid img-circle">
                                </div>
                                <h3 class="profile-username text-center text-success">Nombre</h3>
                                    <p class="text-muted text-center">Apellidos</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b style="color:#0B7300">Edad</b><a class="float-right">12</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b style="color:#0B7300">DNI</b><a class="float-right">12345</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b style="color:#0B7300">Tipo usuario</b>
                                            <span class="float-rigth badge badge-primary">Administrador</span>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sobre mí</h3>
                            </div>
                            <div class="card-body">
                                <strong style="color:#0B7300">
                                    <i class="fas fa-phone mr-1"></i>Telefono
                                </strong>
                                <p class="text-muted">12345678</p>
                                <strong style="color:#0B7300">
                                    <i class="fas fa-map-marker mr-1"></i>Residencia
                                </strong>
                                <p class="text-muted">12345678</p>
                                <strong style="color:#0B7300">
                                    <i class="fas fa-at mr-1"></i>Correo
                                </strong>
                                <p class="text-muted">12345678</p>
                                <strong style="color:#0B7300">
                                    <i class="fas fa-smile-wink mr-1"></i>Sexo
                                </strong>
                                <p class="text-muted">12345678</p>
                                <strong style="color:#0B7300">
                                    <i class="fas fa-pencil-alt mr-1"></i>Información adicional
                                </strong>
                                <p class="text-muted">12345678</p>
                                <button class="btn btn-block bg-gradient-danger">Editar</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Click en el botón si desea editar</p>
                            </div>
                        </div>
                    </div>
                    <!-- formulario para editar los datos del usuario -->
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Editar datos personales</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-10">
                                        <input type="number" id="telefono" class="form-control">
                                        </div>            
                                    </div>
                                    <div class="form-group row">
                                        <label for="residencia" class="col-sm-2 col-form-label">Residencia</label>
                                        <div class="col-sm-10">
                                        <input type="text" id="residencia" class="form-control">
                                        </div>            
                                    </div>
                                    <div class="form-group row">
                                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-10">
                                        <input type="email" id="correo" class="form-control">
                                        </div>            
                                    </div>
                                    <div class="form-group row">
                                        <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                                        <div class="col-sm-10">
                                        <input type="text" id="sexo" class="form-control">
                                        </div>            
                                    </div>
                                    <div class="form-group row">
                                        <label for="adicional" class="col-sm-2 col-form-label">Información adicional</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" id="adicional" cols="30" rows="10"></textarea>
                                        </div>            
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10 float-right">
                                            <button class="btn btn-block btn-outline-success">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Cuidado con ingresar datos erroneos</p>
                            </div>
                        </div>
                    </div>
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