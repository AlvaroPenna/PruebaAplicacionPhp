<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: ../index.php");
}

require_once("../models/mov_visualizarIngresos.php");

$usuario = $_SESSION['id_usuario'];
$fecha_ini = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

try {
    $resultado = visualizarIngreso($usuario, $fecha_ini, $fecha_fin);
} catch (Exception $ex) {
    echo "Error al procesar el gasto: " . $ex->getMessage();
}
$totalPrecioSinIva = 0;
$totalIva = 0;
$totalPrecioConIva = 0;

// Iterar sobre el resultado para calcular los totales
foreach ($resultado as $ingreso) {
    // Sumar al total del precio sin IVA
    $totalPrecioSinIva += $ingreso['precio_sin_iva'];
    
    // Sumar al total del IVA
    $totalIva += $ingreso['iva'];
    
    // Sumar al total del precio con IVA
    $totalPrecioConIva += $ingreso['precio_con_iva'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Gastos</title>
    <link href="../css/visualizarGastos.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Botón estilizado -->
    <a href="../views/principal.php" class="btn">Regresar a la página principal</a>

    <h2>Lista de Ingresos</h2>
    <table>
        <thead>
            <tr>
                <th>Cif Cliente</th>
                <th>Número Factura</th>
                <th>Fecha</th>
                <th>Precio Sin Iva</th>
                <th>Iva</th>
                <th>Precio Con Iva</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $ingreso) : ?>
                <tr>
                    <td><?php echo $ingreso['cif_cliente']; ?></td>
                    <td><?php echo $ingreso['numero_factura']; ?></td>
                    <td><?php echo $ingreso['fecha']; ?></td>
                    <td><?php echo $ingreso['precio_sin_iva']; ?></td>
                    <td><?php echo $ingreso['iva']; ?></td>
                    <td><?php echo $ingreso['precio_con_iva']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Mostrar totales -->
    <div>
        <h3>Totales:</h3>
        <p>Total Precio Sin Iva: <?php echo $totalPrecioSinIva; ?></p>
        <p>Total IVA: <?php echo $totalIva; ?></p>
        <p>Total Precio Con Iva: <?php echo $totalPrecioConIva; ?></p>
    </div>
</body>

</html>
