<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecorouteplanner</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prata&family=Unbounded:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header class="encabezado__container">
        <div class="encabezado">
            <a href="/" class="encabezado__logo" title="Página principal de Jornada">
                <img class="encabezado__logo--icono" alt="Logo de Ecorouteplanner" src="./img/logoeco.jpg" />
            </a>
            <nav class="encabezado__navegacion">
                <ul class="encabezado__navegacion--lista">
                    
                    <li class="encabezado__navegacion--elemento">
                        
                        <a href="index.php" class="icon-link">
                            <i class="fa-solid fa-home"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container2">
        <!-- Formulario de registro (oculto inicialmente) -->
        <form id="registerForm" class="form-container2 hidden2" action="#" method="POST">
            <h2>Si tienes alguna pregunta o comentario, no dudes en enviarnos un mensaje</h2>
            <input type="text" id="registerName" placeholder="Nombre completo" required>
            
            <input type="email" id="registerEmail" placeholder="Correo electrónico" required>
            
            <input type="number" id="registerPhone" placeholder="Número de celular" required>
            
            <textarea type="number" id="registerPhone" rows="10" placeholder="Número de celular" required>
                </textarea>
                <button class="botonenviar" type="submit" id="registerBtn">Enviar</button>
        </form>

        <div id="registerResult" class="hidden">
            <h3>Registro Exitoso</h3>
            <p><strong>Nombre:</strong> <span id="resultName"></span></p>
            <p><strong>Cédula:</strong> <span id="resultCedula"></span></p>
            <p><strong>Correo Electrónico:</strong> <span id="resultEmail"></span></p>
            <p><strong>Número de Celular:</strong> <span id="resultPhone"></span></p>
        </div>
    </div>

    <div class="container2">
        <!-- Formulario de inicio de sesión (oculto inicialmente) -->
        <form id="inicioForm" class="form-container hidden" action="#" method="POST">
            <h2>Inicio de sesión</h2>
            <input type="text" id="loginUser" placeholder="Nombre de usuario" required>
            <i class="fa-solid fa-user"></i>
            <input type="password" id="loginPassword" placeholder="Contraseña" required>
            <i class="fa-solid fa-lock"></i>
            <button type="submit" id="loginBtn">Iniciar sesión</button>
        </form>

        <div id="loginResult" class="hidden">
            <h3>Inicio de sesión exitoso</h3>
            <p>Bienvenido, <span id="loginUserName"></span></p>
        </div>
    </div>

    <script src="script.js"></script>

    

    </main>

    <img class="pre-footer__image" alt="" src="./img/reciclaje2.jpg" />
    
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