<?php
include_once("conexion.php");
include_once("head.php");
$id = '';
$modo = '';
$consigna = '';
$fecha_inicio = '';
$fecha_fin = '';

if (isset($_GET["id"])) {
    $modo = $_GET["modo"];
    $id = $_GET["id"];

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM proyecto where id ='" . $id . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $id = $row["id"];
            $consigna = $row["consigna"];
            $fecha_inicio = $row["fecha_inicio"];
            $fecha_fin = $row["fecha_fin"];
        }
    }
}

?>

<h1>Creaciòn de formulario</h1>

<form action="">

    <label for="">Consigna</label>
    <input class="form-control" name="consigna" id="consigna" value="<?php echo $consigna; ?>" type="text">

    <label for="">Fecha Inicio</label>
    <input class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fecha_inicio; ?>" type="date">

    <label for="">Fecha fin</label>
    <input class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo $fecha_fin; ?>" type="date">



    <br>
    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

<?php
include_once("footer.php");
?>