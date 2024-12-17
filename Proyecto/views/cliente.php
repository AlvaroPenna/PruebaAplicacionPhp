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
    <title>Formulario de Ingresos - Reformas Peña</title>
</head>
<body>
    <h2>Formulario de Ingresos</h2>
    <form id="formulario-cliente" method="POST">
        <label for="nombre_cliente">Nombre:</label><br>
        <input type="text" id="nombre_cliente" name="nombre_cliente" required><br>
        
        <label for="cif_nif_cliente">CIF/NIF:</label><br>
        <input type="text" id="cif_nif_cliente" name="cif_nif_cliente" required><br>
        
        <label for="telefono">Telefono:</label><br>
        <input type="number" id="telefono" name="telefono" required><br>
        
        <button type="submit">Guardar</button>
        <button type="button" onclick="window.history.back();">Volver</button>
        
    </form>
    <script>
        document.getElementById('formulario-cliente').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe directamente

        // Obtener datos del formulario
        var formData = new FormData(this);

        // Realizar la solicitud al servidor
        fetch('../controllers/altaCliente.php', { // Se corrigió la extensión del archivo .php
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log(response); // Imprimir la respuesta del servidor en la consola
            return response.text();
        })
        .then(message => {
            // Mostrar mensaje de éxito
            alert(message);
            // Limpiar los campos del formulario
            document.getElementById('formulario-gastos').reset();
        })
        .catch(error => {
            // Mostrar mensaje de error si ocurre algún problema
            console.error('Error:', error);
        });
    });
</script>

</body>
</html>
