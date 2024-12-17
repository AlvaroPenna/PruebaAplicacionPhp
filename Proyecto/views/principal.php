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
    <link href="../css/principal.css" rel="stylesheet" type="text/css" />
    <title>Aplicación</title>
    

</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo $_SESSION['nombre'] ?></h1>
        <a class="link" href="./ingreso.php">Ingresos</a>
        <a class="link" href="./gasto.php">Pagos</a>
        <a class="link" href="./cliente.php">Alta Cliente</a>
        <a class="link" href="./visualizarGasto.php">Visualizar Gastos</a>
        <a class="link" href="./visualizarIngreso.php">Visualizar Ingresos</a>
        <a class="link" href="./comparativa.php">Comparativa</a>
        
        <a class="link" href="../controllers/cerrarSesion.php">Cerrar Sesion</a>
    </div>
</body>
</html>
