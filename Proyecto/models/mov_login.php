<?php
require_once("../db/db.php");

function inicio_sesion($usuario, $contrasena){
    $conexion = conexion();

    try {
        $stmtSesion = $conexion->prepare("SELECT id_usuario, nombre, cif FROM usuarios WHERE cif = :usuario and telefono = :contrasena");
        $stmtSesion->bindParam(':usuario', $usuario);
        $stmtSesion->bindParam(':contrasena', $contrasena);
        $stmtSesion->execute();
        $sesion = $stmtSesion->fetchAll(PDO::FETCH_ASSOC);
        
        return $sesion;

    } catch (PDOException $ex) {
        // Manejo de errores PDO
        echo "Error al iniciar sesión: " . $ex->getMessage();
    }
}
?>
