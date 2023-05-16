<?php
// Iniciamos la sesión
session_start();

// Cerramos la sesión
session_destroy();

// Redireccionamos al usuario al inicio
header("Location: ../index.php");
exit;
?>
