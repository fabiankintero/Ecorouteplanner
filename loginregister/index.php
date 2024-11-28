<!DOCTYPE html>
<html lang="es">

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
                        <a href="#" id="showInicioFormLink" aria-label="Enlace a registro de usuario">Iniciar sesión</a>
                        <i class="fa-solid fa-user"></i>
                    </li>
                    <li class="encabezado__navegacion--elemento">
                        <a href="#" id="showRegisterFormLink" aria-label="Enlace a registro de usuario">Registrarse</a>
                        <i class="fa-solid fa-user-plus"></i>
                    </li>
                    <li class="encabezado__navegacion--elemento">
                        <a href="contacto.php" id="showContactoFormLink">Contacto</a>
                        <i class="fa-solid fa-envelope"></i>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <!-- Formulario de registro (oculto inicialmente) -->
        <form action="php/registro_usuario_be.php " method="POST"  id="registerForm" class="form-container hidden" >
            <h2>Registrarse</h2>
            <input type="text" id="registerName" placeholder="Nombre completo" name="nombre_completo" required>
            <i class="fa-solid fa-user"></i>
            <input type="number" id="registerCedula" placeholder="Cédula" name="cedula" required>
            <i class="fa-solid fa-id-card"></i>
            <input type="email" id="registerEmail" placeholder="Correo electrónico"name="correo" required
            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|co)$" 
             title="El correo debe incluir un @ y terminar con .com o .co">
            <i class="fa-solid fa-envelope"></i>
            <input type="password" id="contrasena" placeholder="contraseña" name="contrasena" required>
            <i class="fa-solid fa-lock"></i>
            <button type="submit" id="registerBtn">Registrarse</button>
        </form>

      
    </div>

    <div class="container2">
        <!-- Formulario de inicio de sesión (oculto inicialmente) -->
        <form action="php/login_usuario_be.php"   id="inicioForm" class="form-container hidden" action="#" method="POST">
            <h2>Inicio de sesión</h2>
            <input type="text" id="loginUser" placeholder="Nombre de usuario" name="nombre_completo" required>
            <i class="fa-solid fa-user"></i>
            <input type="password" id="loginPassword" placeholder="Contraseña" name="contrasena"required>
            <i class="fa-solid fa-lock"></i>
            <button type="submit" id="loginBtn">Iniciar sesión</button>
        </form>

       
    </div>

    <script src="script.js"></script>

    <section class="banner">
        <div class="banner__wrapper">
            <figure class="banner__img--wrapper">
                <img class="banner__img" alt="Camiones" src="./img/camiones.jpg" />
                <figcaption class="banner__img--descripcion">Somos una empresa comprometida con el cuidado del medio ambiente
                     a través de la recolección y gestión de residuos reciclables.
                      Nos encargamos de cada detalle, desde la recolección hasta
                       el proceso de reciclaje, garantizando que los materiales 
                       reciban el tratamiento adecuado para reducir su impacto ambiental. Juntos,
                        hacemos del reciclaje una tarea sencilla y efectiva para construir un 
                        futuro más sostenible.</figcaption>
            </figure>
        </div>
    </section>

    <main class="container3">
        <section class="ofertas__container">
            <div class="ofertas__titulo">
                <div class="ofertas__titulo--texto">Ofertas de la semana</div>
                <div class="ofertas__titulo--subrayado"></div>
            </div>
            <section class="ofertas">
                <article class="ofertas__cards--elemento ofertas__cards--recolector1">
                    <div class="ofertas__card">
                        <div class="ofertas__card--contenido">
                            <header class="ofertas__card--destino">
                                <div class="ofertas__card--destino-tipo">Recogida de materiales peligrosos</div>
                                <h2 class="ofertas__card--destino-nombre">Gratis</h2>
                            </header>
                            <div class="ofertas__card--precio">0$</div>
                            <div class="ofertas__card--boton">
                                <a href="#" class="ofertas__card--boton-texto">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="ofertas__cards--elemento ofertas__cards--recolector2">
                    <div class="ofertas__card">
                        <div class="ofertas__card--contenido">
                            <header class="ofertas__card--destino">
                                <p class="ofertas__card--destino-tipo">Programa de recompensa</p>
                                <h2 class="ofertas__card--destino-nombre">Puntos por reciclar</h2>
                            </header>
                            <div class="ofertas__card--precio">Acumula puntos y canjea</div>
                            <div class="ofertas__card--boton">
                                <a href="#" class="ofertas__card--boton-texto">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </article>
            </section>
        </section>

        <div class="testimonios">
            <div class="testimonios__titulo">
                <b class="testimonios__titulo--texto">Testimonios</b>
                <div class="testimonios__titulo--subrayado"></div>
            </div>
            <div class="testimonios__wrapper">
                <div class="testimonios__elemento">
                    <div class="testimonios__texto">
                        "Gracias a Ecorouteplanner, reciclar en nuestra comunidad es mucho más fácil. Su compromiso con el medio ambiente es admirable." – Ana Gomez.
                    </div>
                    <div class="testimonios__autor">
                        <img class="testimonios__autor--foto" alt="Ana Gomez" src="./img/TestimonioAna.png" />
                        <div class="testimonios__autor--info">
                            <b class="testimonios__autor--nombre">Ana Gomez</b>
                            <div class="testimonios__autor--evaluacion">
                                <img class="testimonios__autor--evaluacion-estrella" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" src="./img/star-1.svg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonios__elemento">
                    <div class="testimonios__texto">
                        "Ecorouteplanner ha mejorado significativamente nuestra gestión de residuos. Son puntuales y profesionales, ¡totalmente recomendados!" – Carlos Marin.
                    </div>
                    <div class="testimonios__autor">
                        <img class="testimonios__autor--foto" alt="Carlos" src="./img/TestimonioCarlos.png" />
                        <div class="testimonios__autor--info">
                            <b class="testimonios__autor--nombre">Carlos Marin</b>
                            <div class="testimonios__autor--evaluacion">
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonios__elemento">
                    <div class="testimonios__texto">
                        "El servicio de Ecorouteplanner es eficiente y amable. Nos ha ayudado a ser más sostenibles en la oficina." – Miguel Quintero
                    </div>
                    <div class="testimonios__autor">
                        <img class="testimonios__autor--foto" alt="Foto de Miguel" src="./img/TestimonioMiguel.png" />
                        <div class="testimonios__autor--info">
                            <b class="testimonios__autor--nombre">Miguel Quintero</b>
                            <div class="testimonios__autor--evaluacion">
                                
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                                <img class="testimonios__autor--evaluacion-estrella" alt="" src="./img/star-1.svg" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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