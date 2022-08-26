<?php
include_once("conexion.php");
include_once("head.php");
?>

<h1>Listado Proyectos</h1>
<button type="button" class="btn btn-primary">Agregar nuevo</button>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">ID</th>
                    <th scope="col">Consigna</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fecha Fin</th>
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

                $sql = "SELECT * FROM proyecto";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><a  href='formulario.php?modo=E&cedula=" .
                        $row['cedula'] . " 'class='btn btn-outline-primary' >Editar</a>
                        <a  href='formulario.php?modo=C&cedula=" .
                        $row['cedula'] . " 'class='btn btn-success' >Consultar</a>
                        <a href='listado_personas.php?modo=E&cedula=" .
                        $row['cedula'] . " 'class='btn btn-outline-danger' ><i class='bi bi-trash-fill'/></a>
                    </td>";
                        echo "<th scope='row'>" . $row["id"] . "</th>";
                        echo "<td>" . $row["consigna"] . "</td>";
                        echo "<td>" . $row["fecha_inicio"] . "</td>";
                        echo "<td>" . $row["fecha_fin"] . "</td>";
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