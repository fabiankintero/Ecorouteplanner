<?php
include 'conexion.php'; // Conecta a la base de datos

// Comprobar la acción a realizar
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'crear':
            $nombre_completo = $_POST['nombre_completo'];
            $direccion = $_POST['direccionRecogida'];
            $fecha = $_POST['fechaRecogida'];
            $hora = $_POST['horaRecogida'];

            $sql = "INSERT INTO citas (nombre_completo, direccion, fecha, hora) VALUES ('$nombre_completo', '$direccion', '$fecha', '$hora')";
            if ($conn->query($sql) === TRUE) {
                echo "Cita programada exitosamente.";
            } else {
                echo "Error: " . $conn->error;
            }
            break;

        case 'modificar':
            $id = $_POST['id'];
            $nombre_completo = $_POST['nombre_completo'];
            $direccion = $_POST['direccionRecogida'];
            $fecha = $_POST['fechaRecogida'];
            $hora = $_POST['horaRecogida'];

            $sql = "UPDATE citas SET nombre_completo='$nombre_completo', direccion='$direccion', fecha='$fecha', hora='$hora' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Cita actualizada exitosamente.";
            } else {
                echo "Error: " . $conn->error;
            }
            break;

        case 'eliminar':
            $id = $_POST['id'];
            $sql = "DELETE FROM citas WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Cita eliminada exitosamente.";
            } else {
                echo "Error: " . $conn->error;
            }
            break;

        default:
            echo "Acción no reconocida.";
            break;
    }

    $conn->close();
}
?>
