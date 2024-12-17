<?php
session_start();
if(!(isset($_SESSION['nombre']))){
      header("Location: ../index.php");
 }
 
require_once("../models/mov_ingreso.php");

// Obtener datos del formulario
$usuario = $_SESSION['id_usuario'];
$numero_factura = $_POST['numero_factura'];
$cif_cliente = $_POST['cif_cliente'];
$fecha = $_POST['fecha'];
$precio_sin_iva = (float)$_POST['importe'];
$iva = $precio_sin_iva * 0.21;
$precio_con_iva = $precio_sin_iva + $iva;

// Intentar insertar el gasto y manejar errores si los hay
try {
    $resultado = ingreso($usuario, $cif_cliente, $numero_factura, $fecha,$precio_sin_iva, $iva, $precio_con_iva);
    echo $resultado; // Si ingreso devuelve algún mensaje, lo mostramos
} catch (Exception $ex) {
    echo "Error al procesar el gasto: " . $ex->getMessage();
}

?>

