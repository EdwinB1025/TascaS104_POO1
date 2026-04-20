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
    if (!isset($_SESSION['cinemas'])) {
        $_SESSION['cinemas'] = [];
    }
    function crearArticulos(array $cinemas): string
    {

        $articulos = '';
        foreach ($cinemas as $id => $cine) {
            $MayorDuracion =  $cine->buscarMayorDuracion();
            $articulos .= '
                <div class="article">
                    <h3>
                    <a href="/tasca4_3/nivel3/Peliculas.php?id=' . $id . '">' . $cine->obtenerNombre() . '</a>
                        <button popovertarget ="popup-' . $id . '" class="article-edit"></button>
                        <form method = "post" action = "/tasca4_3/nivel3/src/functions/eliminarCine.php?id=' . $id . '">
                        <button type ="submit" class="article-delete"></button>
                        </form>
                    </h3>
                <a href="/tasca4_3/nivel3/Peliculas.php?id=' . $id . '">
                    Poblacion: ' . $cine->obtenerPoblacion() . '<br>
                    Pelicula mas larga: ' . ($MayorDuracion?->obtenerNombre() ?? "No hay peliculas") . '<br>
                    ' . "  -  " . 'Tiempo: ' . ($MayorDuracion?->obtenerTiempo() ?? "No hay peliculas") . '
                </a>
            </div>
            <div id="popup-' . $id . '" popover>
            <form class="editCinema" method = "post" action = "/tasca4_3/nivel3/src/functions/editarCine.php">
            <input type="hidden" name="id" value = "' . $id . '">
            <label for="nombre">Nombre del cine:</label>
            <input name="nombre" id="nombre" type="text" value="' . $cine->obtenerNombre() . '">
            <label for="poblacion">Poblacion:</label>
            <select name="poblacion" id="poblacion" value = "' . $cine->obtenerPoblacion() . '">
                    <option value="Barcelona">Barcelona (capital)</option>
                    <option value="Badalona">Badalona</option>
                    <option value="Hosopitalet">Hosopitalet</option>
                    <option value="Terrassa">Terrassa</option>
                    <option value="Sabadell">Sabadell</option>
                    <option value="Mataro">Mataro</option>
                    <option value="Sant Cugat">Sant Cugat</option>
                    <option value="Igualada">Igualada</option>
                    <option value="Girona">Girona</option>
                    <option value="Tarragona">Tarragona</option>
                    <option value="Lleida">Lleida</option>
            </select>
            <button class= "editCinema-save" type="submit">Guardar</button>
            <button class= "editCinema-cancel" type="button" popovertarget="popup-' . $id . '" popovertargetaction="hide">Cancelar</button>
            </form>
            </div>
            ';
        }
        return $articulos;
    }
    ?>

    <div class="container">
        <header class="header">
            GESTOR DE CINES
        </header>
        <div class="content">
            <?php
            echo crearArticulos($_SESSION['cinemas'])
            ?>
        </div>
        <div class="config">
            <form class="addCinema" action="/tasca4_3/nivel3/src/functions/crearCine.php" method="post">
                <div>
                    <h3>Crear Cine</h3>
                </div>
                <label for="nombre">Nombre del cine:</label>
                <input name="nombre" id="nombre" type="text" placeholder="Ingrese el nombre del cine">
                <label for="poblacion">Poblacion</label>
                <select name="poblacion" id="poblacion">
                    <option value="Barcelona">Barcelona (capital)</option>
                    <option value="Badalona">Badalona</option>
                    <option value="Hosopitalet">Hosopitalet</option>
                    <option value="Terrassa">Terrassa</option>
                    <option value="Sabadell">Sabadell</option>
                    <option value="Mataro">Mataro</option>
                    <option value="Sant Cugat">Sant Cugat</option>
                    <option value="Igualada">Igualada</option>
                    <option value="Girona">Girona</option>
                    <option value="Tarragona">Tarragona</option>
                    <option value="Lleida">Lleida</option>
                </select>
                <button style="align-self: flex-start; margin: 0.5rem 0rem;" type="submit">Agregar</button>
            </form>
            <hr>
        </div>

    </div>
</body>

</html>