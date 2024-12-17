<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./css/index.css" rel="stylesheet" type="text/css" />
  <title>Iniciar sesión</title>
  
</head>
<body>
  <div class="container">
    <form action="./controllers/login.php" method="POST">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario" required>

      <label for="contrasena">Contraseña:</label>
      <input type="password" id="contrasena" name="contrasena" required>

      <input type="submit" value="Iniciar sesión">
    </form>
  </div>
</body>
</html>
