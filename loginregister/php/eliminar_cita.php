<?php
session_start();
include('php/conexion.php'); // Asegúrate de que la ruta sea correcta

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre_completo'])) {
    header("Location: ../index.php");
    exit();
}

// Verifica si se ha enviado el ID de la cita
if (isset($_POST['cita_id'])) {
    $cita_id = $_POST['cita_id'];

    // Preparar la consulta para eliminar la cita
    $sql = "DELETE FROM citas WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cita_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Cita eliminada con éxito.";
    } else {
        echo "Error al eliminar la cita: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No se ha recibido el ID de la cita.";
}

$conn->close();
?>

