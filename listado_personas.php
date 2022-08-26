<?php
include_once("conexion.php");
include_once("head.php");
var_dump($_GET, $_REQUEST);
$modo = $_GET["modo"] ?? "";
$cedula = $_GET["cedula"] ?? "";
if ($modo == "D") {
    $sql = "DELETE FROM persona WHERE cedula = '" . $cedula . "'";

    header("Location: listado_personas.php");
    exit;
}

?>

<h1>Listado de personas</h1>
<a href="formulario.php" type="button" class="btn btn-primary">Agregar nuevo</a>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM persona";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><a  href='formulario.php?modo=E&cedula=" .
                            $row['cedula'] . " 'class='btn btn-outline-primary' data-bs-toggle='tooltip' 
                            data-bs-placement='top' data-bs-title='Tooltip on top' ><i class='bi bi-pencil-fill'></i></a>
                            <a  href='formulario.php?modo=C&cedula=" .
                            $row['cedula'] . " 'class='btn btn-success' ><i class='bi bi-search'></i></a>
                            <form method='get' action='eliminar.php'>
                            <button type='submit'
                             class='btn btn-outline-danger'\">Eliminar</button>
                             <input type='hidden' name='cedula' value='".$row["cedula"]."'/></form>
                        </td>";
                        echo "<th scope='row'>" . $row["cedula"] . "</th>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellido"] . "</td>";
                        echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
                <!--
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                         -->
            </tbody>
        </table>
    </div>
</div>



<?php
include_once("footer.php");
?>