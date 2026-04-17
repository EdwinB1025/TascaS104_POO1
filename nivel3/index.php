<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mediaQueries.css">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    spl_autoload_register(function ($class_name) {
        $base = __DIR__ . "/src/classes/";
        include $base . $class_name . '.php';
    });
    //this is important to avoid resetting the variable each time the page refreshes.
    if (!isset($_SESSION['cinemas'])) {
        $_SESSION['cinemas'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['cinemas'][] = new Cinema($_POST['nombre'], $_POST['poblacion']);
    }

    function crearArticulos(array $cinemas): string
    {
        $articulos = '';
        foreach ($cinemas as $cine) {
            $articulos .= '
                <div class="article">
                <a href="#">
                    <h3>' . $cine->obtenerNombre() . '
                        <a href="#" class="article-edit"></a>
                        <a href="#" class="article-delete"></a>
                    </h3>
                    Poblacion: ' . $cine->obtenerPoblacion() . '
                </a>
            </div>
            ' . '<br>';
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
            <form class="addCinema" action="index.php" method="post">
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