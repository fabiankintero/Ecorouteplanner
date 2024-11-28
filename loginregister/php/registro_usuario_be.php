<?php
include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];


$query = "INSERT INTO usuarios(nombre_completo, cedula, correo, contrasena)
          VALUES('$nombre_completo', '$cedula', '$correo', '$contrasena')";

          $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

          if(mysqli_num_rows($verificar_correo) > 0){
            echo '
            <script>
            alert("este correo ya esta registrado, usa otro");
            window.location = "../index.php"; 
            
            
            </script>
            
            ';
            exit();
          }

          $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_completo='$nombre_completo'");

          if(mysqli_num_rows($verificar_usuario) > 0){
            echo '
            <script>
            alert("este usuario ya esta registrado, usa otro");
            window.location = "../index.php"; 
            
            
            </script>
            
            ';
            exit();
          }
          
          $ejecutar = mysqli_query($conexion, $query);

          if($ejecutar){
            echo '
            <script>
            alert("usuario agregado exitosamente");
            window.location = "../index.php";          
            
            </script>
            ';
          }else{
            echo '
            <script>
            alert("usuario no se agrego exitosamente");
            window.location = "../index.php";          
            
            </script>
            ';
          
          }


?>