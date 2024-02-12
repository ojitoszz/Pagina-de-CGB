<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../Css/style.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <title>Document</title>
</head>
<body>
  <header> 
    <div class="fondo">
        <div>
            <a class="navbar-brand" href="#">
                <img class="mt-4 ms-4 m-2" src="../../imgs/Logo cgb.png" alt="Logo" width="300" height="70">
            </a>
        </div>
    </div>
</header>
<h1>Bienvenido, Raul. <!--  <?php //echo $_SESSION['usuario']; ?>!--> </h1><br>

<div class="row">
  <div class="col-md-4"> 
    <div class="card mb-3 marg tarjeta" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="../../imgs/file/subir.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title titu">Upload files</h5>
            <p class="card-text texto">Sube  tu archivos  en carpeta ZIP</p>
            <button id="sube-archivos-btn" class="btn btn-warning "><p class="boton">Sube tus archivos</p></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- -->

  <div class="col-md-4"> 
    <div class="card mb-3 marg tarjeta" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="../../imgs/file/resultados.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title titu">Validate results</h5>
            <p class="card-text">Revisa tus entregables</p>
            <a href="#" class="btn btn-warning">Ir a resultados</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4"> 
    <div class="card mb-3 marg tarjeta" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="../../imgs/file/perfil.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title titu">Ajustes de perfil</h5>
            <p class="card-text texto">Revisa tus entregables</p>
            <a href="#" class="btn btn-warning">Editar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<a href="#" class="position-absolute bottom-0 end-0 mb-3 me-3">
  <img src="../../imgs/cerrar-sesion.png" class="rounded img-fluid size" alt="Cerrar sesión">
  <span class="mt-2">Cerrar sesión</span>
</a>
  <!-- -->
  <dialog id="mi-modal" class="mi-modal">
  <h1 class="titulo">Selecciona la fecha de tu empresa</h1><br>
    <div class="container contenedor d-flex justify-content-center align-items-center">
        <form action="back/validacion.php" method="post">
            <select class="form-select w-100" aria-label="Default select example" name="OptionAnio">
                <option selected>Selecciona un año...</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2026">2027</option>
            </select><br>

            <select class="form-select w-100" aria-label="Default select example" name="OptionMes">
                <option selected>Selecciona un mes...</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select><br>

            <?php
            include('back/conexion.php');
            $conexion = conectar();
            $sqlPeticion = "SELECT Empresa, Empresa2, Empresa3, Empresa4 FROM usuarios";
            $resultado = mysqli_query($conexion, $sqlPeticion);
            ?>

            <select class="form-select w-100" aria-label="Default select example" name="OptiEmpresa">
                <option selected>Selecciona una empresa...</option>
                <?php
                while ($row = mysqli_fetch_assoc($resultado)) {
                    foreach ($row as $empresa) {
                        if (!empty($empresa)) {
                            echo "<option value='$empresa'>$empresa</option>";
                        }
                    }
                }
                ?>
            </select><br>

            <button type="submit" class="btn btn-warning">Next</button>
            <button id="cerrar-modal-btn" type="button" class="btn btn-warning">Cerrar</button>

            
        </form>
    </div>

</dialog>

<script src="../../js/home.js"></script>
</body>
</html>
