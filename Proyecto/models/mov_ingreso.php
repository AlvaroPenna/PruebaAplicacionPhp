<?php
require_once("../db/db.php");

function ingreso($usuario, $cif_cliente,$numero_factura, $fecha, $precio_sin_iva, $iva, $precio_con_iva){

    $conexion = conexion();

    try {
        $stmtVerificar = $conexion->prepare("SELECT nombre_factura FROM ingresos WHERE nombre_factura = :nombre_factura");
        $stmtVerificar->bindParam(':numero_factura', $numero_factura);
        $stmtVerificar->execute();
        $factura_existente = $stmtVerificar->fetch(PDO::FETCH_COLUMN);
        
        if($factura_existente !== false){
            return "La factura ya existe";
        } else {
            $stmtIngreso = $conexion->prepare("INSERT INTO ingresos (nombre_factura, id_usuario, cif-nif, fecha, precio_sin_iva, iva, precio_con_iva)
        VALUES (:numero_facura, :usuario, :cif_cliente, :fecha, :precio_sin_iva, :iva, :precio_con_iva)");
        $stmtIngreso->bindParam(':usuario', $usuario);
        $stmtIngreso->bindParam(':cif_cliente', $cif_cliente);
        $stmtIngreso->bindParam(':numero_factura', $numero_factura);
        $stmtIngreso->bindParam(':fecha', $fecha);
        $stmtIngreso->bindParam(':precio_sin_iva', $precio_sin_iva);
        $stmtIngreso->bindParam(':iva', $iva);
        $stmtIngreso->bindParam(':precio_con_iva', $precio_con_iva);
        $stmtIngreso->execute();

        echo "Factura ingresada correctamente";
        }
        // Insertar datos en la tabla de ingresos
        

    } catch (PDOException $ex) {
        echo "Error al ingresar ingreso: " . $ex->getMessage();
    }
}
?>
