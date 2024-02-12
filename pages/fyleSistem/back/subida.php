<?php
include('conexion.php');
include '../Google_API/vendor/autoload.php';
$option = $_POST['option'];
$conexion = conectar();
session_start();
$fechaSubida = date("Y/m/d");
echo $fechaSubida;
$mes = $_SESSION['mes'];
$empresa = $_SESSION['empresa'];
$ruta = $_SESSION['ruta'];
$sqlInsert = "INSERT INTO files (id, id_Usuario, Opcion, Mes, Empresa,FechaSubida) VALUES (NULL, '3', '$option', '$mes', '$empresa','$fechaSubida')";

$sqlResult = mysqli_query($conexion, $sqlInsert);

putenv('GOOGLE_APPLICATION_CREDENTIALS=cargaarchivos-409500-3f79d97ea0fc.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive.file']);

try {
    $service = new Google_Service_Drive($client);
    $file_path = $_FILES['archivos']['tmp_name'];

    $file = new Google_Service_Drive_DriveFile();
    $file->setName($_FILES['archivos']['name']);

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file_path);

    //debe ser remplzada por la liga que viene de la base de datos de la variable $ruta
    $file->setParents([$ruta]);

    $file->setDescription("Archivo cargado desde PHP");
    $file->setMimeType($mime_type);

    $resultado = $service->files->create(
        $file,
        [
            'data' => file_get_contents($file_path),
            'mimeType' => "image/jpg",
            'uploadType' => 'media'
        ]
    );

    echo "<script>alert('Archivo cargado exitosamente'); window.location.href = '../System/Opciones.php';</script>";
} catch (Google_Service_Exception $gs) {
    $mensaje = json_decode($gs->getMessage());
    echo $mensaje->error->message;
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
