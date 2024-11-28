<?php
session_start();
include('conexion_be.php');

// Verifica si el usuario ha iniciado sesión
if(!isset($_SESSION['nombre_completo'])){
    header("Location: ../index.php");
    exit();
}

$nombre_completo = $_SESSION['nombre_completo'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $direccion = $_POST['direccion'];

    // Aquí puedes procesar la creación de la nueva cita
    $sql = "INSERT INTO citas_recogida (nombre_completo, fecha, hora, direccion) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre_completo, $fecha, $hora, $direccion);
    
    if ($stmt->execute()) {
        // Almacena los datos de la cita en la sesión
        $_SESSION['ultima_cita'] = [
            'fecha' => $fecha,
            'hora' => $hora,
            'direccion' => $direccion
        ];
        header("Location: http://localhost/loginregister/bienvenida.php");
        exit();
    } else {
        echo "Error al crear la cita: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cita</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<header class="encabezado__container">
        <div class="encabezado">
            <a href="/" class="encabezado__logo" title="Página principal de Jornada">
                <img class="encabezado__logo--icono" alt="Logo de Ecorouteplanner" src="../img/logoeco.jpg" />
            </a>
            <nav class="encabezado__navegacion">
                <ul class="encabezado__navegacion--lista">
                    
                    <li class="encabezado__navegacion--elemento">
                    <form method="POST" action="salir.php" style="display:inline;">
                     <button type="submit">Salir</button>
                        </form>
                        
                        <a href="index.php" class="icon-link">
                            <i class="fa-solid fa-home"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
<body>



<section class = "centro">
    <h1>Crear Nueva Cita</h1>
    <form    method="POST" action="">
        <label>Fecha:</label>
        <input type="date" name="fecha" required>

        <label>Hora:</label>
        <input type="time" name="hora" required>

        <label>Dirección:</label>
        <input type="text" name="direccion" required>

        <button type="submit">Programar tu recogida</button>
    </form>
    </section>
   
</body>
<img class="pre-footer__image" alt="" src="../img/reciclaje2.jpg" />
    
    <footer class="footer__container">
        <div class="footer">
            <div class="footer__logo-container">
                <img class="footer__logo-icon" alt="" src="./img/logoeco.jpg" />
                <div class="footer__info-container">
                    <div class="footer__text-info">
                        Horario de atendimiento: 08h - 20h (Lunes a Sábado)                    </div>
                    <div class="footer__text-info">
                        Desarrollado por Grupo de estudio del SENA (Carla,Luis y Fabian)                    </div>
                </div>
            </div>
            <div class="footer__social-media-container">
                <div class="footer__social-media-text">Accede a nuestras redes sociales:</div>
                <div class="footer__social-media-icons">
                    <a href="">
                        <img class="footer__social-media-icon" alt="" src="../img/whatsapp-1.svg" />
                    </a>
                    <a href="">
                        <img class="footer__social-media-icon" alt="" src="../img/instragam-1.svg" />
                    </a>
                    <a href="">
                        <img class="footer__social-media-icon" alt="" src="../img/twiter-1.svg" />
                    </a>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>
</html>

</html>

