<?php
// // Conexión a la base de datos (asegúrate de reemplazar los valores según tu configuración)
// $servername = "tu_servidor";
// $username = "tu_usuario";
// $password = "tu_contraseña";
// $dbname = "tu_base_de_datos";


// $conn = new mysqli($servername, $username, $password, $dbname);


// // Verificar la conexión
// if ($conn->connect_error) {
//     die("Conexión fallida: " . $conn->connect_error);
// }


// // Obtener el ID del usuario (puedes obtenerlo de tu sistema de autenticación)
// $usuario_id = 1; // Reemplaza con el ID del usuario actual


// // Consulta SQL para obtener las valoraciones de las playlists del usuario
// $sql = "SELECT v.PUNTUACION, v.COMENTARIO, v.FECHA, p.NOMBRE AS NOMBRE_PLAYLIST
//         FROM VALORACION v
//         JOIN PLAYLIST p ON v.PLAYLIST_ID = p.ID_PL
//         WHERE p.CREADOR_ID = $usuario_id";


// $result = $conn->query($sql);


// // Inicializar un array para almacenar las valoraciones
// $valoraciones = array();


// // Verificar si hay resultados
// if ($result->num_rows > 0) {
//     // Almacenar los resultados en el array
//     while ($row = $result->fetch_assoc()) {
//         $valoracion = array(
//             'playlist' => $row["NOMBRE_PLAYLIST"],
//             'puntuacion' => $row["PUNTUACION"],
//             'comentario' => $row["COMENTARIO"],
//             'fecha' => $row["FECHA"]
//         );
//         $valoraciones[] = $valoracion;
//     }
// } else {
//     echo "<p>Este usuario no tiene valoraciones de playlists.</p>";
// }


// Cerrar la conexión
// $conn->close();
?>


<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://developer.spotify.com/images/guidelines/design/icon3@2x.png" type="image/png">
    <title>User - Music Life</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/usuario.css">
    <script src="./js/usuario.js" defer></script>
    <script src="./js/script.js" defer></script>
</head>


<body>
<video src="./img/FondoSpotifyClaro.mp4" id="videoFondo" autoplay="true" muted="true" loop="true"></video>
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
                    <li class="nav-item"><a class="nav-link" href="https://github.com/spariva/Music-Life" target="_blank">Info</a></li>
                    <li class="nav-item"><a class="nav-link" id="modo-oscuro">Modo Oscuro</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="contenedor-principal-menuUsuario">
        <div class="usuario" id="menuUsuario__izquierda">
            <h2>Usuario</h2>
            <img src="./img/imagenPerfil.png" alt="usuario-imagen">
            <div id="correo">correoelectronico@email.com</div>
            <div class="iframes__favoritos">
                <iframe class="menuUsuario_izquierda_iframe" style="border-radius:12px" src="https://open.spotify.com/embed/playlist/0XJs446xvZpKhz3pglrOlX?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                <iframe class="menuUsuario_izquierda_iframe" style="border-radius:12px" src="https://open.spotify.com/embed/playlist/20IwQZIfrykXjnyd4SLHtX?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>

        <div class="listas">
            <div class="valoraciones">
                <h2>VALORACIONES</h2>
                <div class="valoracion" id="val1">
                    <p><b>This is Lola Indigo: 5 estrellas</b> La mejor playlist del mundo, me ha encantado</p>
                </div>
                <div class="valoracion" id="val2">
                    <p><!-- <?php echo $valoraciones[1] ?> --><b>Sand + Maksocrames: 4 estrellas</b> La escucho sin parar</p></p>
                </div>
                <div class="valoracion" id="val3">
                    <p><b>Pain: 3 estrellas</b> Tiene canciones geniales pero otras tengo que saltarlas </p></p>
                </div>
                   
            </div>
            <div class="musica">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/159xmAdSIVlkemrogVpts1?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DZ06evO1QmCJj?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" defer></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</body>


</html>
