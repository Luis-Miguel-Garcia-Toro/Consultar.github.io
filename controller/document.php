<?php
require_once "conexion.php";

session_start();

$valido = ["success" => false, "message" => ""];

if ($_POST) {
    $documento = $_POST["numberDocument"];
    $password = md5($_POST["passwordIdentify"]);

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE documento = ? AND password = ?");
    $stmt->bind_param("ss", $documento, $password);
    $stmt->execute();
    $resultadoConsulta = $stmt->get_result();
    $numeroConsulta = $resultadoConsulta->num_rows;

    if ($numeroConsulta == 1) {
        $usuario = $resultadoConsulta->fetch_assoc();

        $_SESSION["is_logged_in"] = true;
        $_SESSION["documento"] = $documento;
        $_SESSION["status"] = $usuario["status"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["date_record"] = $usuario["date_record"];
        $valido["success"] = true;
        $valido["message"] = "Bienvenido, " . $usuario["nombre"] . "!";
    } else {
        $valido["error"] = false;
        $valido["message"] = "Su documento o contraseña no son válidos";
    }
} else {
    $valido["error"] = false;
    $valido["message"] = "Verifique sus datos.";
}

header("Content-Type: application/json");
echo json_encode($valido);
?>
