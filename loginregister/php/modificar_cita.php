<?php
session_start();
include('conexion_be.php');

if (!isset($_SESSION['nombre_completo'])) {
    header("Location: ../index.php");
    exit();
}

$nombre_completo = $_SESSION['nombre_completo'];

// Inicializa variables para los datos de la cita
$fecha = '';
$hora = '';
$direccion = '';

// Verificar si se han enviado datos a través de GET
if (isset($_GET['fecha']) && isset($_GET['hora'])) {
    $fecha = $_GET['fecha'];
    $hora = $_GET['hora'];

    // Consulta para obtener la dirección actual de la cita
    $sql = "SELECT direccion FROM citas_recogida WHERE nombre_completo = ? AND fecha = ? AND hora = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $nombre_completo, $fecha, $hora);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $direccion = $row['direccion']; // Cargar la dirección actual
    } else {
        echo "No se encontró la cita.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nueva_fecha = $_POST['fecha'];
    $nueva_hora = $_POST['hora'];
    $nueva_direccion = $_POST['direccion'];

    // Actualizar la cita
    $sql = "UPDATE citas_recogida SET fecha = ?, hora = ?, direccion = ? WHERE nombre_completo = ? AND fecha = ? AND hora = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssss", $nueva_fecha, $nueva_hora, $nueva_direccion, $nombre_completo, $fecha, $hora);

    if ($stmt->execute()) {
        echo "Cita actualizada con éxito.";
        // Guardar la cita actualizada en la sesión
        $_SESSION['ultima_cita'] = [
            'fecha' => $nueva_fecha,
            'hora' => $nueva_hora,
            'direccion' => $nueva_direccion
        ];
        header("Location: ../bienvenida.php");
        exit();
    } else {
        echo "Error al actualizar la cita: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cita</title>
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
    <h1>Modificar Cita</h1>
   
    <form method="POST" action="">
        <label>Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $fecha; ?>" required>

        <label>Hora:</label>
        <input type="time" name="hora" value="<?php echo $hora; ?>" required>

        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $direccion; ?>" required>

        <button type="submit">Guardar Cambios</button>
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
</html>
