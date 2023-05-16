<?php
require_once "conexion.php";

session_start();

$valido = ["success" => false, "message" => ""];

if ($_POST) {
    $placa = $_POST["numberPlate"];
    $password = md5($_POST["password"]);

    $stmt = $conn->prepare("SELECT u.*, v.marca, v.modelo FROM usuarios u INNER JOIN vehiculos v ON u.documento = v.documento WHERE v.placa = ? AND u.password = ?");
    $stmt->bind_param("ss", $placa, $password);
    $stmt->execute();
    $resultadoConsulta = $stmt->get_result();
    $numeroConsulta = $resultadoConsulta->num_rows;

    if ($numeroConsulta == 1) {
        $usuario = $resultadoConsulta->fetch_assoc();

        $_SESSION["is_logged_in"] = true;
        $date_record = strtotime($usuario["date_record"]); // Convertir la fecha en un valor de tiempo Unix
        $_SESSION["date_record"] = date("Y-m-d", $date_record);
        $_SESSION["placa"] = $placa;
        $_SESSION["documento"] = $usuario["documento"];
        $_SESSION["marca"] = $usuario["marca"];
        $_SESSION["modelo"] = $usuario["modelo"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["status"] = $usuario["status"]; // Agregar la columna "status" en la sesión
        $valido["success"] = true;
        $valido["message"] = "Bienvenido, " . $usuario["nombre"] . "!";
    } else {
        $valido["error"] = false;
        $valido["message"] = "Su placa o contraseña no son válidos";
    }
} else {
    $valido["error"] = false;
    $valido["message"] = "Verifique sus datos.";
}

header("Content-Type: application/json");
echo json_encode($valido);
?>
