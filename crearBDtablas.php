<?php


/**
 * Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 8
 * Contenidos de la semana 8.
 * NOMBRE: Introducción a las Bases de Datos en PHP .
 * IACC
 */

//================================================================================
//===================CREAR UNA DB Y CONECCIONES  =============================
//================================================================================


define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("CLAVE", "");
define("DBNOMBRE", "prueba");


// Crear la conexión
$conn = new mysqli(SERVIDOR, USUARIO, CLAVE);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error."\n");
}

// Consulta SQL para crear la base de datos
$sql = "CREATE DATABASE IF NOT EXISTS ".DBNOMBRE;

// Ejecutar la consulta
if ($conn->query($sql) === true) {
    echo "Base de datos prueba fue creada exitosamente."."\n";
} else {
    echo "Error al crear la base de datos prueba con el siguiente problema: " . $conn->error."\n";
}

// Cerrar la conexión a la BD
$conn->close();

//================================================================================
//===================PASO DOS INSERTAR TABLAS A LA BD =============================
//================================================================================


// Crear la conexión nuevamente ahora conectada a la bd creada
$conn = new mysqli(SERVIDOR, USUARIO, CLAVE, DBNOMBRE);

// Verificar la conexión si fue exitosa no manda el mensaje de error
if ($conn->connect_error) {
    die("Error de conexión prueba: " . $conn->connect_error."\n");
}

// Consulta SQL para crear la tabla "operaciones" si esta existe no la genera a traves de SQL
$sql1 = "CREATE TABLE IF NOT EXISTS operaciones (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fecha DATE,
    monto DECIMAL(10, 2),
    tipo_operacion VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// Consulta SQL para crear la tabla "dato"
$sql2 = "CREATE TABLE IF NOT EXISTS dato (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    telefono VARCHAR(20)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

// Ejecutar las consultas
if ($conn->query($sql1) === true && $conn->query($sql2) === true) {
    echo "Tablas operaciones y dato fueron creadas exitosamente en la BD de .";
} else {
    echo "Error al crear las tablas operaciones y dato con el siguiente problema: " . $conn->error."\n";
}

// Cerrar la conexión a la base de datos
$conn->close();

?>