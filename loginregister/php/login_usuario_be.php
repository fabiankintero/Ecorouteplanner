<?php
session_start(); // Inicia la sesión

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$contrasena = $_POST['contrasena'];

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE
nombre_completo='$nombre_completo' AND contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    // Guarda el nombre completo en la sesión
    $_SESSION['nombre_completo'] = $nombre_completo;

    header("location: ../bienvenida.php");
} else {
    echo '
    <script>
    alert("Usuario no existe");
    window.location = "../index.php"; 
    </script>
    ';
}
exit;
?>
