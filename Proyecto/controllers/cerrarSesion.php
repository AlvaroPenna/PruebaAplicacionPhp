<?php
// Iniciar la sesión si aún no está iniciada
session_start();

// Eliminar todas las variables de sesión
$_SESSION = array();

// Eliminar la cookie de sesión si está presente
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Finalmente, destruir la sesión
session_destroy();

// Eliminar todas las cookies
foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', time()-3600);
}

// Redirigir al usuario al index.php
header("Location: ../index.php");
exit;
?>
