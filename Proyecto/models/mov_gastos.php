<?php
require_once("../db/db.php");

function gasto($numero_factura, $usuario, $empresa, $fecha, $precio_sin_iva, $iva, $precio_con_iva){

    $conexion = conexion();

    try {
        $stmtVerificar = $conexion->prepare("SELECT numero_factura FROM gastos WHERE numero_factura = :numero_factura");
        $stmtVerificar->bindParam(':numero_factura', $numero_factura);
        $stmtVerificar->execute();
        $factura_existente = $stmtVerificar->fetch(PDO::FETCH_COLUMN);
        
        if($factura_existente !== false){
            return "La factura ya existe";
        } else {
            $stmtGasto = $conexion->prepare("INSERT INTO gastos (numero_factura, id_usuario, empresa, fecha, precio_sin_iva, iva, precio_con_iva)
                VALUES (:numero_factura, :usuario, :empresa, :fecha, :precio_sin_iva, :iva, :precio_con_iva)");
            $stmtGasto->bindParam(':usuario', $usuario);
            $stmtGasto->bindParam(':numero_factura', $numero_factura);
            $stmtGasto->bindParam(':empresa', $empresa);
            $stmtGasto->bindParam(':fecha', $fecha);
            $stmtGasto->bindParam(':precio_sin_iva', $precio_sin_iva);
            $stmtGasto->bindParam(':iva', $iva);
            $stmtGasto->bindParam(':precio_con_iva', $precio_con_iva);
            $stmtGasto->execute();
        
            return "Gasto ingresado correctamente";
        }

    } catch (PDOException $ex) {
        return "Error al ingresar gasto: " . $ex->getMessage();
    }
}
?>
