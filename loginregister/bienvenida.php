<?php
session_start();
include('php/conexion_be.php');

if (!isset($_SESSION['nombre_completo'])) {
    header("Location: ../index.php");
    exit();
}

$nombre_completo = $_SESSION['nombre_completo'];

// Consulta para obtener las citas programadas
$sql = "SELECT * FROM citas_recogida WHERE nombre_completo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $nombre_completo);
$stmt->execute();
$result = $stmt->get_result();

// Variable para almacenar el mensaje de la última cita
$mensaje_cita_creada = "";

// Verificar si se ha creado una nueva cita y preparar el mensaje
if (isset($_SESSION['ultima_cita'])) {
    $ultima_cita = $_SESSION['ultima_cita'];
    $mensaje_cita_creada = "<h2 class='mensaje-exito'>Cita creada con éxito:</h2>
                            <p><strong>Fecha:</strong> " . $ultima_cita['fecha'] . "<br>
                            <strong>Hora:</strong> " . $ultima_cita['hora'] . "<br>
                            <strong>Dirección:</strong> " . $ultima_cita['direccion'] . "</p>";
    // Limpiar la variable de sesión para evitar mostrarla nuevamente
    unset($_SESSION['ultima_cita']);
}

// Eliminar una cita
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion'])) {
    if ($_POST['accion'] == 'eliminar') {
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        // Eliminar la cita
        $sql = "DELETE FROM citas_recogida WHERE nombre_completo = ? AND fecha = ? AND hora = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $nombre_completo, $fecha, $hora);

        if ($stmt->execute()) {
            echo "Cita eliminada con éxito.";
            header("Location: bienvenida.php");
            exit();
        } else {
            echo "Error al eliminar la cita: " . $conexion->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<header class="encabezado__container">
    <div class="encabezado">
        <a href="/" class="encabezado__logo" title="Página principal de Jornada">
            <img class="encabezado__logo--icono" alt="Logo de Ecorouteplanner" src="./img/logoeco.jpg" />
        </a>
        <nav class="encabezado__navegacion">
            <ul class="encabezado__navegacion--lista">
                <li class="encabezado__navegacion--elemento">
                    <form method="POST" action="php/salir.php" style="display:inline;">
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
    <!-- Sección de bienvenida -->
    <section class="centro">
        <h1> ¡Es un placer tenerte en nuestro sitio! <?php echo $nombre_completo; ?></h1>

        <!-- Mensaje de Cita Creada -->
        <?php if (!empty($mensaje_cita_creada)) echo $mensaje_cita_creada; ?>
        
        <!-- Sección de citas programadas -->
        <h1>Aqui se muestra tu recogida programada</h1>
        <h3></h3>
        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <strong>Fecha:</strong> <?php echo $row['fecha']; ?>,
                        <strong>Hora:</strong> <?php echo $row['hora']; ?>,
                        <strong>Dirección:</strong> <?php echo $row['direccion']; ?>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="fecha" value="<?php echo $row['fecha']; ?>">
                            <input type="hidden" name="hora" value="<?php echo $row['hora']; ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <button class="boton" type="submit">Eliminar</button>
                        </form>
                        <form method="GET" action="php/modificar_cita.php" style="display:inline;">
                            <input type="hidden" name="fecha" value="<?php echo $row['fecha']; ?>">
                            <input type="hidden" name="hora" value="<?php echo $row['hora']; ?>">
                            <input type="hidden" name="direccion" value="<?php echo $row['direccion']; ?>">
                            <button class="boton"type="submit">Modificar</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <h2>Actualmente no tienes recogidas programadas.</h2>
<form method="GET" action="php/crear_cita.php">
    <button class ="shake-button" type="submit" class="btn btn-primary">Solicita tu recogida</button>
</form>
        <?php endif; ?>
    </section>

    <!-- Imagen del footer -->
    <img class="pre-footer__image" alt="" src="./img/reciclaje2.jpg" />

    <!-- Pie de página -->
    <footer class="footer__container">
        <div class="footer">
            <div class="footer__logo-container">
                <img class="footer__logo-icon" alt="" src="./img/logoeco.jpg" />
                <div class="footer__info-container">
                    <div class="footer__text-info">
                        Horario de atendimiento: 08h - 20h (Lunes a Sábado)
                    </div>
                    <div class="footer__text-info">
                        Desarrollado por Grupo de estudio del SENA (Carla, Luis y Fabián)
                    </div>
                </div>
            </div>
            <div class="footer__social-media-container">
                <div class="footer__social-media-text">Accede a nuestras redes sociales:</div>
                <div class="footer__social-media-icons">
                    <a href="">
                        <img class="footer__social-media-icon" alt="" src="./img/whatsapp-1.svg" />
                    </a>
                    <a href="">
                        <img class="footer__social-media-icon" alt="" src="./img/instragam-1.svg" />
                    </a>
                    <a href="">
                        <img class="footer__social-media-icon" alt="" src="./img/twiter-1.svg" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
