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
    <link href="../css/visualizarGasto.css" rel="stylesheet" type="text/css" />
    <title>Formulario de Fechas</title>
</head>
<body>
    <h2>Introduce dos fechas</h2>
    <form action="../controllers/visualizarGastos.php" method="post">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required><br><br>
        
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required><br><br>
        
        <button type="submit">Enviar</button><br>
        <button type="button" onclick="history.back()">Volver Atrás</button>
    </form>
</body>
</html>
