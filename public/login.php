<?php
//require_once '../config/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$errorsLogin = $_SESSION['errorsLogin'] ?? [];
// es lo mismo que isset($_SESSION['errorsLogin']) ? $_SESSION['errorsLogin'] : [];
unset($_SESSION['errorsLogin']);

$errorsSignUp = $_SESSION['errorsSignUp'] ?? [];
unset($_SESSION['errorsSignUp']);

//Si hay errores en el SignUp para que se cargue el Registro en vez del Login
$bodyClass = $_SESSION['bodyClass'] ?? "";
unset($_SESSION['bodyClass']);
//Recupera los datos del formulario de registro
$userNameSignUp = $_SESSION['userNameSignUp'] ?? "";
$userMailSignUp = $_SESSION['userMailSignUp'] ?? "";
unset($_SESSION['userNameSignUp']);
unset($_SESSION['userMailSignUp']);

//Recupera los datos del formulario de crear cuenta
$userNameLogin = $_SESSION['userNameLogin'] ?? "";
unset($_SESSION['userNameLogin']);

// if(isset($_POST["enviar"]) && (empty($comprobator->errors))){ 
//     $mailer = MailerSingleton::obtenerInstancia();
//     $mailer->enviarCorreo($userMail, $motivo, $nombre, $mensajeExtra);
// }

?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://developer.spotify.com/images/guidelines/design/icon3@2x.png" type="image/png">
        <title>Login - Music Life</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" href="./css/login.css">
        <script src="./js/login.js" defer></script>
        <script src="./js/script.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    </head>

    <body class="<?= $bodyClass ?>">
        <?php if ($bodyClass == "crearCuenta"): ?>
            <video src="./img/FondoSpotifyClaro.mp4" id="videoFondo" autoplay="true" muted="true" loop="true"
                disablePictureInPicture></video>
        <?php else: ?>
            <video src="./img/FondoIndexClaro.mp4" id="videoFondo" autoplay="true" muted="true" loop="true"
                disablePictureInPicture></video>
        <?php endif ?>
        <header id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="d-flex align-items-center">
                    <a class="textoCabecera" href="./index.php" id="logo">Music-Life</a>

                    <!-- desplegable para pantallas pequeñas -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="./login.php">Cuenta</a></li>
                        <li class="nav-item"><a class="nav-link" href="./usuario.php">Usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="./spotify.html">Spotify</a></li>
                        <li class="nav-item"><a class="nav-link" href="./contacto.php">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://github.com/spariva/Music-Life"
                                target="_blank">Info</a></li>
                        <li class="nav-item"><a class="nav-link" id="modo-oscuro">Modo Oscuro</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <div id="ubicador">
            <div class="contenedor">
                <span class="contenedor__efectos"></span>
                <form id="inicioSesion" action="../src/php/logIn.inc.php" method="POST">
                    <h2 class="formulario__titulo">Iniciar sesión</h2>
                    <div class="inputBox">
                        <input type="text" placeholder="Usuario" value="" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" placeholder="Contraseña" required>
                    </div>
                    <div class="inputBox">
                        <p>¿Primera vez aquí?</p><a href="#" id="crearCuenta">Crear cuenta</a>
                    </div>
                    <!--Login errors display-->
                    <?php if (count($errorsLogin) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errorsLogin as $error): ?>
                                <li>
                                    <?php echo $error; ?>
                                </li>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="inputBox">
                        <input type="submit" class="botonConectarse" value="Conectarse" name="submit">
                    </div>
                </form>

                <form id="registro" action="../src/php/signUp.inc.php" method="POST">
                    <h2 class="formulario__titulo">Registro</h2>
                    <div class="inputBox">
                        <input type="text" placeholder="Nombre de usuario" name="userName"
                            value="<?= htmlspecialchars($userNameSignUp) ?>" method="POST" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" placeholder="Dirección de correo electrónico" name="userMail"
                            value="<?= htmlspecialchars($userMailSignUp) ?>" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" placeholder="Crear contraseña" name="userPassword" name="userPassword"
                            value="" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" placeholder="Confirmar contraseña" name="confirmPassword" required>
                    </div>

                    <div class="inputBox">
                        <input type="submit" class="botonCrear" value="Crear Cuenta" name="submit">
                    </div>
                    <div class="inputBox">
                        <p>¿Ya tiene una cuenta?</p><a href="#" id="conectarCuenta">Conectarse</a>
                    </div>
                </form>
            </div>
            <!--Hay que usar js para quitarlo del login-->
            <?php if (isset($_GET['errorSignUp'])): ?>
                <!--SignUp errors display-->
                <?php if (count($errorsSignUp) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errorsSignUp as $error): ?>
                            <li>
                                <?php echo $error; ?>
                            </li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </body>

</html>