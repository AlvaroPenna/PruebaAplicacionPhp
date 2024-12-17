<?php
require_once("../models/mov_login.php"); // Cambiado de ingreso.php a gasto.php

// Obtener datos del formulario y limpiarlos
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Intentar insertar el gasto y manejar errores si los hay
try {
    $resultado = inicio_sesion($usuario, $contrasena);
    var_dump($resultado);
    if(empty($resultado)){
        echo "Datos Incorrecto";
    } else {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Guardar datos en variables de sesión
        $_SESSION['id_usuario'] = $resultado[0]['id_usuario'];
        $_SESSION['nombre'] = $resultado[0]['nombre'];
        $_SESSION['cif'] = $resultado[0]['cif'];
        header("Location: ../views/principal.php");
    }

} catch (Exception $ex) {
    echo "Error al procesar el gasto: " . $ex->getMessage();
}
?>
