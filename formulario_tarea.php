<?php
include_once("conexion.php");
include_once("head.php");
$id = '';
$modo = '';
$proyecto_id = '';
$persona_id = '';
$descripcion = '';
$fecha_inicio = '';
$hora = '';




if (isset($_GET["id"])) {
    $modo = $_GET["modo"];
    $id = $_GET["id"];




    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $sql = "SELECT * FROM tarea where id ='" . $id . "'";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $id = $row["id"];
            $proyecto_id = $row["proyecto_id"];
            $persona_id = $row["persona_id"];
            $descripcion = $row["descripcion"];
            $fecha_inicio = $row["fecha_inicio"];
            $hora = $row["hora"];
        }
    }
}

?>

<h1>Creaciòn de formulario</h1>






<form action="">

    <label for="">ID Proyecto</label>
    <input class="form-control" name="proyecto_id" id="proyecto_id" value="<?php echo $proyecto_id; ?>" type="text">

    <label for="">ID Persona</label>
    <input class="form-control" name="persona_id" id="persona_id" value="<?php echo $persona_id; ?>" type="text">

    <label for="">Descripcion</label>
    <input class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>" type="text">

    <label for="">Fecha Inicio</label>
    <input class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fecha_inicio; ?>" type="datetime">

    <label for="">Hora</label>
    <input class="form-control" name="hora" id="hora" value="<?php echo $hora; ?>" type="text">


    <br>
    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

<?php
include_once("footer.php");
?>