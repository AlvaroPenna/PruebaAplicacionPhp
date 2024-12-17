<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: ../index.php");
}

require_once("../models/mov_visualizarIngresos.php");
require_once("../models/mov_visualizarGastos.php");

$usuario = $_SESSION['id_usuario'];
$fecha_ini = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

try {
    $resultado = visualizarIngreso($usuario, $fecha_ini, $fecha_fin);
} catch (Exception $ex) {
    echo "Error al procesar el gasto: " . $ex->getMessage();
}

$totalPrecioSinIvaIngreso = 0;
$totalIvaIngreso = 0;
$totalPrecioConIvaIngreso = 0;

// Iterar sobre el resultado para calcular los totales
foreach ($resultado as $ingreso) {
    // Sumar al total del precio sin IVA
    $$totalPrecioSinIvaIngreso += $ingreso['precio_sin_iva'];
    
    // Sumar al total del IVA
    $totalIvaIngreso += $ingreso['iva'];
    
    // Sumar al total del precio con IVA
    $totalPrecioConIvaIngreso += $ingreso['precio_con_iva'];
}

try {
    $resultado = visualizarGasto($usuario, $fecha_ini, $fecha_fin);
} catch (Exception $ex) {
    echo "Error al procesar el gasto: " . $ex->getMessage();
}

$totalPrecioSinIvaGastos = 0;
$totalIvaGastos = 0;
$totalPrecioConIvaGastos = 0;

// Iterar sobre el resultado para calcular los totales
foreach ($resultado as $gasto) {
    // Sumar al total del precio sin IVA
    $totalPrecioSinIvaGastos += $gasto['precio_sin_iva'];
    
    // Sumar al total del IVA
    $totalIvaGastos += $gasto['iva'];
    
    // Sumar al total del precio con IVA
    $totalPrecioConIvaGastos += $gasto['precio_con_iva'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparativa Iva</title>
    <link href="../css/visualizarGastos.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Botón estilizado -->
    <a href="../views/principal.php" class="btn">Regresar a la página principal</a>

    <h2>Lista de Ingresos</h2>
    <table>
        <thead>
            <tr>
                <th> </th>
                <th>Precio Sin Iva</th>
                <th>Total Iva</th>
                <th>Total Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ingreso</td>
                <td><?php echo $totalPrecioSinIvaIngreso; ?></td>
                <td><?php echo $totalIvaIngreso; ?></td>
                <td><?php echo $totalPrecioConIvaIngreso; ?></td>
            </tr>
            <tr>
                <td>Gasto</td>
                <td><?php echo $totalPrecioSinIvaGastos; ?></td>
                <td><?php echo $totalIvaGastos; ?></td>
                <td><?php echo $totalPrecioConIvaGastos; ?></td>
            </tr>
        </tbody>
    </table>
    <!-- Mostrar totales -->
    <?php
    $apagar = 0;
    if($totalIvaIngreso > $totalIvaGastos){
        $apagar = $totalIvaIngreso - $totalIvaGastos;
        echo "<div><p> Los ingresos son superiores por: $apagar $</div>";
    }else{
        $apagar = $totalIvaGastos - $totalIvaIngreso;
        echo "<div><p> Los gastos son superiores por: $apagar $ </div>";
    }
    ?>
</body>

</html>
