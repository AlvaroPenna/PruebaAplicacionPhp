<?php
require_once("../db/db.php");

function visualizarGasto($usuario, $fecha_ini, $fecha_fin){
    $conexion = conexion();

    try {
        $stmtGasto = $conexion->prepare("SELECT numerofactura, empresa, fecha, precio_sin_iva, iva, precio_con_iva FROM gastos WHERE id_usuario = :usuario AND fecha BETWEEN :fecha_ini AND :fecha_fin");
        $stmtGasto->bindParam(':usuario', $usuario);
        $stmtGasto->bindParam(':fecha_ini', $fecha_ini);
        $stmtGasto->bindParam(':fecha_fin', $fecha_fin);
        $stmtGasto->execute();
        $gasto = $stmtGasto->fetchAll(PDO::FETCH_ASSOC);
        
        return $gasto;

    } catch (PDOException $ex) {
        // Manejo de errores PDO
        echo "Error al iniciar sesión: " . $ex->getMessage();
    }
}
?>
