<?php
require_once("../db/db.php");

function visualizarIngreso($usuario, $fecha_ini, $fecha_fin){
    $conexion = conexion();

    try {
        $stmtIngreso = $conexion->prepare("SELECT cif_cliente, numero_factura, fecha, precio_sin_iva, iva, precio_con_iva FROM facturas WHERE id_usuario = :usuario AND fecha BETWEEN :fecha_ini AND :fecha_fin");
        $stmtIngreso->bindParam(':usuario', $usuario);
        $stmtIngreso->bindParam(':fecha_ini', $fecha_ini);
        $stmtIngreso->bindParam(':fecha_fin', $fecha_fin);
        $stmtIngreso->execute();
        $ingreso = $stmtIngreso->fetchAll(PDO::FETCH_ASSOC);
        
        return $ingreso;

    } catch (PDOException $ex) {
        // Manejo de errores PDO
        echo "Error al iniciar sesión: " . $ex->getMessage();
    }
}
?>
