<?php
session_start();
if(!(isset($_SESSION['nombre']))){
      header("Location: ../index.php");
 }

require_once("../models/mov_gastos.php");

// Obtener datos del formulario y limpiarlos
$empresa = $_POST['empresa'];
$numero_factura = $_POST['numero_factura'];
$iva = $_POST['iva'];
$fecha = $_POST['fecha'];
$precio_sin_iva = $_POST['importe'];
$precio_con_iva = $precio_sin_iva + $iva;

$usuario = $_SESSION['id_usuario'];

// Intentar insertar el gasto y manejar errores si los hay
try {
    $resultado = gasto($numero_factura, $usuario, $empresa, $fecha, $precio_sin_iva, $iva, $precio_con_iva);
    echo $resultado; // Si gasto devuelve algún mensaje, lo mostramos
} catch (Exception $ex) {
    echo "Error al procesar el gasto: " . $ex->getMessage();
}
?>
