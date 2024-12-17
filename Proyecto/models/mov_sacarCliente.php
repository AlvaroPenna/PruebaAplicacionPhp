<?php
require_once("../db/db.php");

function mostrarClientes($usuario){
    $conexion = conexion();

    try {
        $stmtClientes = $conexion->prepare("SELECT id_cliente, nombre_cliente, cif_cliente, telefono_cliente FROM clientes WHERE id_usuario = :usuario");
        $stmtClientes->bindParam(':usuario', $usuario);
        $stmtClientes->execute();
        $clientes = $stmtClientes->fetchAll(PDO::FETCH_ASSOC);
        
        return $clientes;

    } catch (PDOException $ex) {
        // Manejo de errores PDO
        echo "Error al iniciar sesión: " . $ex->getMessage();
    }
}
?>
