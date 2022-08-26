<?php
include_once("conexion.php");
$cedula = $_GET["cedula"] ?? "";


$sql = "DELETE FROM persona WHERE cedula = '" . $cedula . "'";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: listado_personas.php");
} else {
    echo "Error deleting record: " . $conn->error;

    exit;
}
