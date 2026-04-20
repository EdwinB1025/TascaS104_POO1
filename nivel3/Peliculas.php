<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mediaQueries.css">
    <title>Document</title>
</head>

<body>
    <?php
    spl_autoload_register(function ($class_name) {
        $base = __DIR__ . "/src/classes/";
        include $base . $class_name . '.php';
    });
    session_start();
    //this is important to avoid resetting the variable each time the page refreshes.
    $idCine = $_GET['id'];
    if (isset($_SESSION['cinemas'][$idCine])) {
        $cine = $_SESSION['cinemas'][$idCine];
        $pelis = $cine->obtenerPelis();
    } else {
        $cine = null;
        $pelis = [];
    }
    function crearTiempo(int $max): string
    {
        $options = '';
        for ($i = 0; $i <= $max; $i++) {
            $options .= '<option value = "' . str_pad($i, 2, '0', STR_PAD_LEFT) . '">
                        ';
        }
        return $options;
    }

    function crearArticulos(array $pelis, int $idCine): string
    {
        $articulos = '';
        foreach ($pelis as $id => $peli) {
            $articulos .= '
                <div class="article">
                    <h3>
                        ' . $peli->obtenerNombre() . '
                        <button popovertarget ="popup-' . $id . '" class="article-edit"></button>
                        <form method = "post" action = "/tasca4_3/nivel3/src/functions/eliminarPelicula.php?id=' . $id . '&idCine=' . $idCine . '">
                        <button type ="submit" class="article-delete"></button>
                        </form>
                    </h3>
                    Duracion: ' . $peli->obtenerTiempo() . ' <br>
                    Director: ' . $peli->obtenerDirector() . '
            </div>
            <div id="popup-' . $id . '" popover>
            <form class="editPelicula" style="padding: 1rem;" action="/tasca4_3/nivel3/src/functions/editarPelicula.php?idCine=' . $idCine . '" method="post">
                <input type="hidden" name="id" value = "' . $id . '">
                <label for="nombre">Nombre pelicula:</label>
                <input name="nombre" id="nombre" type="text" value="' . $peli->obtenerNombre() . '">
                <label for="director">Director:</label>
                <input name="director" id="director" type="text" value="' . $peli->obtenerDirector() . '">
                <label class="editPelicula_hr" for="hr">horas:</label>
                <label class="editPelicula_min" for="min">minutos:</label>
                <input class="editPelicula_hr" list="horas" name="hr" id="hr" value="' . $peli->obtenerHoras() . '">
                <input class="editPelicula_min" list="minutos" name="min" id="min" value="' . $peli->obtenerMinutos() . '">
                <button class= "editPelicula-save" type="submit">Guardar</button>
                <button class= "editPelicula-cancel" type="button" popovertarget="popup-' . $id . '" popovertargetaction="hide">Cancelar</button>
                <datalist id="horas">
                    ' . crearTiempo(12) . '
                </datalist>
                <datalist id="minutos">
                    ' . crearTiempo(60) . '
                </datalist>
            </form>
            </div>
            ';
        }
        return $articulos;
    }
    ?>

    <div class="container">
        <header class="header">
            <a href="/tasca4_3/nivel3/index.php" class=" header_home"></a>
            GESTOR DE PELICULAS
        </header>
        <div class="content">
            <?php
            echo crearArticulos($pelis, $idCine)
            ?>
        </div>
        <div class="config">
            <form class="editPelicula" action="/tasca4_3/nivel3/src/functions/crearPelicula.php?id=<?php echo $_GET['id'] ?>" method="post">
                <h3>Agregar Pelicula</h3>
                <label for="nombre">Nombre pelicula:</label>
                <input name="nombre" id="nombre" type="text" placeholder="Pulp Fiction">
                <label for="director">Director:</label>
                <input name="director" id="director" type="text" placeholder="Quentin Tarantino">
                <label class="editPelicula_hr" for="hr">horas:</label>
                <label class="editPelicula_min" for="min">minutos:</label>
                <input class="editPelicula_hr" list="horas" name="hr" id="hr" placeholder="01">
                <input class="editPelicula_min" list="minutos" name="min" id="min" placeholder="45">
                <button class="editPelicula-save" style="align-self: flex-start; margin: 0.5rem 0rem;" type="submit">Agregar</button>
                <datalist id="horas">
                    <?php
                    echo crearTiempo(12);
                    ?>
                </datalist>
                <datalist id="minutos">
                    <?php
                    echo crearTiempo(60);
                    ?>
                </datalist>
            </form>
            <hr>
        </div>

    </div>
</body>

</html>