<?php
session_start();
if(!(isset($_SESSION['nombre']))){
      header("Location: ../index.php");
 }
require_once("../models/mov_altaCliente.php"); // Cambiado de ingreso.php a gasto.php

// Obtener datos del formulario y limpiarlos
$nombre_cliente = $_POST['nombre_cliente'];
$cif_cliente = $_POST['cif_nif_cliente'];
$telefono_cliente = $_POST['telefono'];
$usuario = $_SESSION['id_usuario'];

// Intentar insertar el gasto y manejar errores si los hay
try {
    $resultado = cliente($usuario,$nombre_cliente, $cif_cliente, $telefono_cliente);
    echo $resultado; // Si gasto devuelve algún mensaje, lo mostramos
} catch (Exception $ex) {
    echo "Error al procesar el gasto: " . $ex->getMessage();
}
?>
