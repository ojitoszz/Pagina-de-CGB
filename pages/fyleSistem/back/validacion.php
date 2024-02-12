<?php
session_start();
include '../Google_API/vendor/autoload.php';
include 'conexion.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=cargaarchivos-409500-3f79d97ea0fc.json');

$empresa = $_POST['OptiEmpresa'];
$year = $_POST['OptionAnio'];
$mes = $_POST['OptionMes'];
$conexion = conectar();
echo $empresa;
echo $year;
echo $mes;
$_SESSION['mes']= $mes;
$_SESSION['empresa'] = $empresa; 

// Obtener la ruta desde la base de datos
$consulta = "SELECT ruta FROM rutas WHERE empresa = '$empresa' AND year = '$year' AND mes = '$mes'";
$resultado = mysqli_query($conexion, $consulta);

while ($fila = mysqli_fetch_assoc($resultado)) {
    $ruta = $fila['ruta'];
    $_SESSION['ruta'] = $ruta;
    echo "Ruta desde la base de datos: $ruta <br>";
}
?>

<form action ="subida.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-5">
            <div class="mb-2">
                <label for="formFileSm" class="form-label">Sube informacion</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="archivos">
            </div>

            <br>
            <select class="form-select" aria-label="Default select example" name="option">
                <option selected>Elige una opcion...</option>
                <option value="Ingresos">Ingresos</option>
                <option value="Egresos">Egresos</option>
                <option value="Constancias">Constancias</option>
                <option value="Estados de cuenta">Estados de cuenta</option>
            </select>
            <br>
            <button type="submit" class="btn btn-outline-warning">Enviar</button>
        </div>
    </div>
</form>

