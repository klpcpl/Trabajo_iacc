

<?php 
define("PAHT",  getcwd());

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.youtube.com/">youtube</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://web.facebook.com/">facebook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.instagram.com/">Instagram</a>
            </li>
        </ul>
    </header>
    <?php 
    /**
 * Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 7
 * Contenidos de la semana 7.
 * NOMBRE: Operaciones en cadena y validaciones en PHP.
 * IACC
 */

    $dato = $_SERVER['PHP_SELF'];
    $resultado2 = str_replace("formularios", "validacion", $dato);
    ?>
    <br>
    <div class="container">
        <h2>Formulario de Registo</h2>
        <form action="<?php echo $resultado2 ?>" class="was-validated" method="POST">

            <div class="mb-3 mt-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre"
                    require>
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">No se ha ingresado en nombre</div>
            </div>

            <div class="mb-3 mt-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido"
                    require>
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">No se ha ingresado en Apellido</div>
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Ingrese el mail" name="email" require>
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">No se ha ingresado en email</div>
            </div>

            <div class="mb-3 mt-3">
                <label for="comment">Comentario:</label>
                <textarea class="form-control" rows="5" id="comment" name="text" require></textarea>
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">No se ha ingresado la observación</div>
            </div>


            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="valido" require>Validar para envio mail
                </label>
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">Tiene que seleccionarlo</div>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>

</body>

</html>