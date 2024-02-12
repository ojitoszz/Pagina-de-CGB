<?php 
include ("conexion.php");
$mes=$_POST['OptionMes'];
session_start();
$_SESSION['Mes'] = $mes;
$empresa = $_POST['OptiEmpresa'];
$_SESSION['Empresa'] = $empresa;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../Css/style.css">
    <title>Formulario</title>
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
<form  method="POST" enctype="multipart/form-data">
<div class ="row">
<div class="col-md-5">
    <div class="mb-2">
    <label for="formFileSm" class="form-label">Sube informacion</label>
    <input class="form-control form-control-sm" id="formFileSm" type="file" name="archivos">
    </div>
 
<br><select class="form-select" aria-label="Default select example" name="option">
  <option selected>Elige una opcion...</option>
  <option value="Ingresos">Ingresos</option>
  <option value="Egresos">Egresos</option>
  <option value="Constancias">Constancias</option>
  <option value="Estados de cuenta">Estados de cuenta</option>
</select>
<br>
<button type="submit" class="btn btn-outline-warning">Enviar</button>
    </form>
    </div>


<div class="col-md-7">

<?php
$conexion = conectar();

$mes = mysqli_real_escape_string($conexion, $mes);
$sqlConsulta = "SELECT Opcion, Mes, Empresa,FechaSubida FROM files WHERE Mes = '$mes' AND Empresa = '$empresa'";
$sqlResult = mysqli_query($conexion, $sqlConsulta);

if (!$sqlResult) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Verificar si todas las opciones están presentes
$opciones_presentes = array('Egresos', 'Ingresos', 'Constancias', 'Estados de cuenta');
$opciones_encontradas = array();

if (mysqli_num_rows($sqlResult) > 0) {
    echo "<h3>Información subida:</h3>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Documento</th><th>Fecha de Subida</th><th>Accion</th></tr></thead><tbody>";
    
    while ($fila = mysqli_fetch_assoc($sqlResult)) {
        echo "<tr>";
        echo "<td><img src='../../../imgs/palomita.png' class='palomita'> {$fila['Opcion']}</td>";
        echo "<td>{$fila['FechaSubida']}</td>"; // Fecha de Subida (asegúrate de tener la columna en la base de datos)
        echo "<td><a href='#'>Eliminar</a></td>"; // Enlace para eliminar (puedes añadir el enlace real y la lógica de eliminación)
        echo "<td><a href='#'>Visualizar</a></td>";
        echo "</tr>";
        $opciones_encontradas[] = $fila['Opcion'];
    }
    
    echo "</tbody></table>";
    
} else {
    echo "No hay información disponible para el mes seleccionado y la empresa.";
}
        
if (count(array_diff($opciones_presentes, $opciones_encontradas)) === 0) {
    echo '<button onclick="enviarNotificacion()" class="btn btn-outline-warning" style="margin: 40px;">Enviar Notificación</button>';
}

/*
function enviarNotificacion() {
    // Obtener el remitente de la base de datos (reemplaza 'tu_columna_remitente' con el nombre real de la columna)
    $remitente = obtenerRemitenteDesdeBaseDeDatos(); 

    // Configuración del correo electrónico
    $to = 'organizacion@ctsasociados.com';
    $subject = 'Información de la empresa subida';
    $message = 'La información de la empresa ya está subida.';

    // Configuración de la cabecera del correo electrónico
    $headers = "From: $remitente\r\n";
    $headers .= "Reply-To: $remitente\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Configuración para usar el protocolo POP3
    ini_set('SMTP', 'smtp.ctsasociados.com');
    ini_set('smtp_port', 500);
    ini_set('sendmail_from', $remitente);

    // Envío del correo electrónico
    $success = mail($to, $subject, $message, $headers);

    if ($success) {
        echo 'Notificación enviada exitosamente.';
    } else {
        echo 'Error al enviar la notificación.';
    }
}

// Función para obtener el remitente desde la base de datos
function obtenerRemitente() {
 
    $peticionCorreo = ("SELECT ")

    return 'correo_electronico_obtenido_de_la_base_de_datos@example.com';
}



*/

?>
</div>



    </div>



</body>
</html>
