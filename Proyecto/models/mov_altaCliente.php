<?php
require_once("../db/db.php");

function cliente($usuario, $nombre_cliente, $cif_cliente, $telefono){

    $conexion = conexion();

    try {
        $stmtVerificar = $conexion->prepare("SELECT cif_cliente FROM clientes WHERE cif_cliente = :cif_cliente");
        $stmtVerificar->bindParam(':cif_cliente', $cif_cliente);
        $stmtVerificar->execute();
        $factura_existente = $stmtVerificar->fetch(PDO::FETCH_COLUMN);
        
        if($factura_existente !== false){
            return "El cliente ya esta registrado";
        } else {
            $stmtCliente = $conexion->prepare("INSERT INTO clientes (id_usuario, nombre_cliente, cif_cliente, telefono_cliente)
                VALUES (:usuario, :nombre_cliente, :cif_cliente, :telefono)");
            $stmtCliente->bindParam(':usuario', $usuario);
            $stmtCliente->bindParam(':nombre_cliente', $nombre_cliente);
            $stmtCliente->bindParam(':cif_cliente', $cif_cliente);
            $stmtCliente->bindParam(':telefono', $telefono);
            $stmtCliente->execute();
        
            return "Cliente ingresado correctamente";
        }

    } catch (PDOException $ex) {
        return "Error al ingresar gasto: " . $ex->getMessage();
    }
}
?>
