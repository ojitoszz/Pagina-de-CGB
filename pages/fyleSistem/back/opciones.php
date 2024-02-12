<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../Css/style.css">
    <title>Selecciona un mes</title>
</head>
<body>

    <header> 
        <div class="fondo">
            <div>
                <a class="navbar-brand" href="#">
                    <img class="mt-4 ms-4 m-2" src="../../../imgs/Logo cgb.png" alt="Logo" width="300" height="70">
                </a>
            </div>
        </div>
    </header>

    <h1 class="titulo">Selecciona la fecha de tu empresa</h1><br>
    <div class="container contenedor d-flex justify-content-center align-items-center">
        <form action="formulario.php" method="post">
            <select class="form-select w-100" aria-label="Default select example" name="OptionAnio">
                <option selected>Selecciona un año...</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
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
            include('conexion.php');
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
        </form>
    </div>

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2Xof4zfuZxLkoj1gXt5A2r0gqS9ErF91+3I" crossorigin="anonymous"></script>
</body>
</html>
