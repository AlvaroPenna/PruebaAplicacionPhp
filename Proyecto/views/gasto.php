<?php
	session_start();
	if(!(isset($_SESSION['nombre']))){
	  	header("Location: ../index.php");
 	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/gasto.css" rel="stylesheet" type="text/css" />
    <script src="../js/formulario.js"></script>
    <title>Formulario de Gastos</title>
</head>
<body>
    <h2>Formulario de Gastos</h2>
    <form id="formulario-gastos">
        <label for="empresa">Empresa:</label><br>
        <input type="text" id="empresa" name="empresa" required><br>

        <label for="numero_factura">Número de Factura:</label><br>
        <input type="text" id="numero_factura" name="numero_factura" required><br>

        <input type="radio" id="iva21" name="iva" value="iva21" checked />
        <label for="iva21">21% IVA</label>

        <input type="radio" id="iva10" name="iva" value="iva10" />
        <label for="iva10">10% IVA</label><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" id="fecha" name="fecha" required><br>
        
        <label for="importe">Importe sin IVA:</label><br>
        <input type="text" id="importe" name="importe" step="0.01" required><br><br>
        
        <button type="submit" id="guardar-gasto">Guardar</button>
        <button type="button" onclick="window.history.back();">Volver</button>
    </form>
    
</body>
</html>
