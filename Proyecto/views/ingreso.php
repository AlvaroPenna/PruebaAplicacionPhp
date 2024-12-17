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
    <link href="../css/ingreso.css" rel="stylesheet" type="text/css" />
    <script src="../js/formulario.js"></script>
    <title>Formulario de Ingresos - Reformas Peña</title>
</head>
<body>
    <h2>Formulario de Ingresos</h2>
    <form id="formulario-ingresos">
        <label for="numero_factura">Número de Factura:</label><br>
        <input type="text" id="numero_factura" name="numero_factura" required><br>
        
        <label for="cif_nif_cliente">CIF/NIF Cliente:</label><br>
        <input type="text" id="cif_cliente" name="cif_cliente" required><br>

        
        <label for="fecha">Fecha:</label><br>
        <input type="date" id="fecha" name="fecha" required><br>
        
        <label for="importe">Importe Sin Iva:</label><br>
        <input type="number" id="importe" name="importe" step="0.01" required><br><br>
        
        <button type="submit" id="guardar-ingreso">Guardar</button>
        <button type="button" onclick="window.history.back();">Volver</button>
        
    </form>

    <!-- Nos Muestra un mensaje si la factura ha sido creada o esta repetida -->
    

</body>
</html>
